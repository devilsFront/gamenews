const formArray = document.querySelectorAll('[data-role="validation__form"]')

import {showForm} from './comment'

export function exportSendForm() {
  if (formArray) setTimeout(sendFormInit, 0)
}

function sendFormInit() {
  for (let i = 0; i < formArray.length; i++) {
    formArray[i].addEventListener('submit', sendForm)
  }
}

function sendForm(event) {
  event.preventDefault()
  const form = this
  this.classList.remove("post__comment-form_active")
  this.previousElementSibling.classList.remove("post__comment-answer_hide")
  const xhr = new XMLHttpRequest()
  const url = this.getAttribute("action")
  xhr.open("POST", url, true)
  xhr.send(new FormData(this))

  const data_redirect = this.getAttribute("data-redirect")
  const data_form_type = this.getAttribute("data-form-type")

  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      if (data_redirect) {
        if (xhr.response === "success") {
          window.location.href = data_redirect
        } else if (xhr.response === "email-registered" || "login-registered" || "email-login" || "password-login") {
          const formError = document.querySelector('[data-element="form-error"]')
          formError.classList.add("form-error_show")
          if (xhr.response === "email-registered") {
            getFormError(formError, "email", "Указанная почта уже используется")
          } else if (xhr.response === "login-registered") {
            getFormError(formError, "name", "Указанный логин уже используется")
          } else if (xhr.response === "email-login") {
            getFormError(formError, "email", "Пользователь с такой почтой не найден")
          } else if (xhr.response === "password-login") {
            getFormError(formError, "password", "Неверный пароль")
          }
        }
      } else if (data_form_type === "comment") {
        form.querySelector('[data-role="form-input"]').value = ""
        const parseResponse = JSON.parse(xhr.response)
        updateCommentsCount(parseResponse.count)
        updateComments(parseResponse.comment, parseResponse.comment_parent_object)
      }
    }
  }
}

function getFormError (formError, selector, text) {
  formError.innerHTML = text
  form.querySelector('input[name="' + selector + '"]').value = ""
}

function updateComments(comment, comment_parent_object) {
  const commentLayout = document.querySelector('[data-element="post__comment-layout"]')
  const newComment = commentLayout.cloneNode(true)
  updateName(comment.comment_author, newComment)
  updateTime(comment.comment_date, newComment)
  updateText(comment.comment_content, newComment)
  updateParent(comment.comment_parent, newComment)
  if (comment.comment_parent != 0) updateParentText(comment_parent_object, newComment)
  newComment.removeAttribute("data-element")
  newComment.removeAttribute("id")
  const answerButton = newComment.querySelector('[data-element="post__comment-answer"]')
  answerButton.addEventListener("click", showForm)
  commentLayout.after(newComment)
  newComment.classList.remove("post__comment_hidden")
  const form = newComment.getElementsByClassName("post__comment-form")[0]
  form.addEventListener('submit', sendForm)
  const element = document.getElementById("post__comment-form-main")
  element.scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"})

}

function updateParentText(comment_parent_object, newComment) {
  const answer = document.createElement("div");
  answer.classList.add("post__comment-text")
  answer.classList.add("post__comment-text_answer")
  const info = newComment.querySelector('[data-element="post__comment-info"]')
  answer.innerHTML = comment_parent_object.comment_author + ' писал: "' + comment_parent_object.comment_content + '"'
  info.after(answer)
}

function updateParent(comment_parent, newComment) {
  const parent = newComment.querySelector('[data-element="comment_parent"]')
  parent.value = comment_parent
  parent.setAttribute("value", comment_parent)
}

function updateName(comment_author, newComment) {
  const name = newComment.querySelector('[data-element="post__comment-name"]')
  name.innerHTML = comment_author
}

function updateTime(comment_date, newComment) {
  const date = newComment.querySelector('[data-element="post__comment-time"]')
  date.innerHTML = comment_date.substr(0, comment_date.length - 9)
}

function updateText(comment_content, newComment) {
  const content = newComment.querySelector('[data-element="post__comment-text"]')
  content.innerHTML = comment_content
}

function updateCommentsCount(count) {
  const postInfoCommentCount = document.querySelector('[data-element="post__info-comment-count"]')
  const postCommentCount = document.querySelector('[data-element="post__comment-count"]')
  postInfoCommentCount.innerHTML = count
  postCommentCount.innerHTML = count
}

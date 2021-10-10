const post = document.querySelector('[data-element="post"]')

export function exportPost() {
  if (post) setTimeout(postInit, 0)
}

function postInit() {
  const postCommentLink = post.querySelector('[data-element="post__comment-link"]')
  const postCommentTextarea = post.querySelector('[data-element="post__comment-textarea-main"]')
  const postCommentAnswerAll = post.querySelectorAll('[data-element="post__comment-answer"]')

  postCommentLink.addEventListener("click", textareaFocused)
  for (let i = 0; i < postCommentAnswerAll.length; i++) {
    postCommentAnswerAll[i].addEventListener("click", showForm)
  }

  function textareaFocused() {
    postCommentTextarea.focus()
  }
}

export function showForm() {
  const oldAnswerHide = post.getElementsByClassName("post__comment-answer_hide")[0]
  if (oldAnswerHide) oldAnswerHide.classList.remove("post__comment-answer_hide")
  const oldActiveForm = post.getElementsByClassName("post__comment-form_active")[0]
  if (oldActiveForm) oldActiveForm.classList.remove("post__comment-form_active")
  this.classList.add("post__comment-answer_hide")
  this.nextElementSibling.classList.add("post__comment-form_active")
  this.nextElementSibling.getElementsByTagName("textarea")[0].focus()
}

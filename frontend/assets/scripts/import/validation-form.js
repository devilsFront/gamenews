const validationForm = document.querySelector('[data-role="validation__form"]')

export function exportValidationForm() {
  if (validationForm) setTimeout(validationFormInit, 0)
}

function validationFormInit() {
  const inputs = validationForm.querySelectorAll('[data-role="form-input"]')
  const button = validationForm.querySelector('[data-role="form-button"]')

  const password2 = validationForm.querySelector('[data-element="password2"]')
  const password = validationForm.querySelector('[data-element="password"]')

  validationForm.addEventListener("input", checkForm)

  function checkForm() {
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].parentElement.classList.remove("form-label_wrong")
      inputs[i].parentElement.classList.remove("form-label_alright")
      inputs[i].parentElement.classList.add("form-label")
    }

    for (let i = 0; i < inputs.length; i++) {
      if (!inputs[i].validity.valid) {
        button.disabled = true
        inputs[i].parentElement.classList.remove("form-label")
        inputs[i].parentElement.classList.add("form-label_wrong")
        return
      } else {
        inputs[i].parentElement.classList.remove("form-label")
        inputs[i].parentElement.classList.add("form-label_alright")
      }
    }

    if (password2) {
      if (password.value !== password2.value) {
        password2.parentElement.classList.remove("form-label_alright")
        password2.parentElement.classList.add("form-label_wrong")
        button.disabled = true
        return
      } else {
        password2.parentElement.classList.add("form-label_alright")
      }
    }

    button.disabled = false
  }

}

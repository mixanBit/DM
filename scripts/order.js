let inputOrder = document.querySelectorAll('.input_order')
let error3 = document.querySelector('.error3')


for(let i = 0; i < inputOrder.length; i++){
  inputOrder[i].addEventListener('invalid', checkOrder)
  inputOrder[i].addEventListener('input', resetCheckOrder)
}

function checkOrder(el) {
  this.classList.add('input_reg_error')
  error3.classList.add('error_active')
  error3.innerText = 'Не все поля заполнены!'
  el.preventDefault()
}

function resetCheckOrder() {
  this.classList.remove('input_reg_error')
}
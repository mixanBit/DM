// Валидация аторизации
let inputsAuth = document.querySelectorAll('.input_auth')
let error2 = document.querySelector('.error2')

for(let i = 0; i < inputsAuth.length; i++){
  inputsAuth[i].addEventListener('invalid', check2)
  inputsAuth[i].addEventListener('input', reset2)
}

// Если все поля не заполнены
function check2(event){
  this.classList.add('input_reg_error')
  error2.classList.add('error_active')
  error2.innerText = 'Заполните все поля!'
  event.preventDefault()
}

// Снятие выделения
function reset2(){ this.classList.remove('input_reg_error') }






// Валидация регистрации
let inputsReg = document.querySelectorAll('.input_reg')
let error = document.querySelector('.error')
let formReg = document.querySelector('.form_reg')

for(let i = 0; i < inputsReg.length; i++){
  inputsReg[i].addEventListener('invalid', check)
  inputsReg[i].addEventListener('input', reset)
}

formReg.addEventListener('submit', checkPassword)

// Если все поля не заполнены
function check(event){
  this.classList.add('input_reg_error')
  error.classList.add('error_active')
  error.innerText = 'Заполните все поля!'
  event.preventDefault()
}

// Снятие выделения
function reset(){ this.classList.remove('input_reg_error') }

// Проверка одинаковости паролей  
function checkPassword(event) {
  error.classList.remove('error_active')
  let regPassword = document.querySelector('.reg_password')
  let regTopassword = document.querySelector('.reg_topassword')
  if(regPassword.value != regTopassword.value){
    regPassword.classList.add('input_reg_error')
    regTopassword.classList.add('input_reg_error')
    error.classList.remove('error_active')
    setTimeout(() => {error.classList.add('error_active')}, 400)
    error.innerText = 'Пароли не совподают!'
    event.preventDefault()
  } else{
    regPassword.classList.remove('input_reg_error')
    regTopassword.classList.remove('input_reg_error')
    event.preventDefault()
  }

  // Проверка согласия на обработку
  let personal = document.getElementById('personal').checked
  if(!personal){
    error.classList.remove('error_active')
    setTimeout(() => {error.classList.add('error_active')}, 400)
    error.innerText = 'Поставьте согласие!'
    event.preventDefault()
  }

  // Переход на проверку совпадения логина
  if(regPassword.value == regTopassword.value && personal == true){
    checkRegister()
  }
  event.preventDefault()
}

// Проверка на совпадение логина
async function checkRegister() {
  let regLogin = document.querySelector('.reg_login')
  let data = new FormData()
  data.append('login', regLogin.value)
  
  let response = await fetch('checkRegister.php', {
    method: "POST",
    body: data
  })
  
  let result = await response.json()
  if(result == 'error'){
    error.classList.add('error_active')
    error.innerText = 'Логин уже существует'
    regLogin.classList.add('input_reg_error')
  } 
  else{
    regLogin.classList.remove('input_reg_error')
    formReg.submit()
  }
}


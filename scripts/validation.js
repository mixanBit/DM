// Валидация аторизации
let authLogin = document.querySelector('.auth_login');
let authPassword = document.querySelector('.auth_password');
let btnAuth = document.querySelector('.btn_auth');
let error = document.querySelector('.error')

authLogin.addEventListener('input', authValid)
authPassword.addEventListener('input', authValid)

// Если все поля не заполнены
function authValid(){
  if(authLogin.value !== '' && authPassword.value !== ''){
    btnAuth.classList.add('btn_auth_active')
  } else{
    btnAuth.classList.remove('btn_auth_active')
  }
}

// Валидация регистрации
let regFIO = document.querySelector('.reg_FIO')
let regLogin = document.querySelector('.reg_login')
let regEmail = document.querySelector('.reg_email')
let regPassword = document.querySelector('.reg_password')
let regTopassword = document.querySelector('.reg_topassword')

let btnReg = document.querySelector('.btn_reg')

regFIO.addEventListener('input', regValid)
regLogin.addEventListener('input', regValid)
regEmail.addEventListener('input', regValid)
regPassword.addEventListener('input', () => {
  regValid()
  regPasswordValid()
})
regTopassword.addEventListener('input', () => {
  regValid()
  regPasswordValid()
})

// Если все поля не заполнены
function regValid() {
  if(regFIO.value !== '' && regLogin.value !== '' && regEmail.value !== '' && regPassword.value !== '' && regTopassword.value !== ''){
    if(regPassword.value == regTopassword.value){
      btnReg.classList.add('btn_auth_active')
    }
  } else{
    btnReg.classList.remove('btn_auth_active')
  }
}

// Если поля пароли не одинаковые 
function regPasswordValid(){
  if(regPassword.value !== regTopassword.value){
    error.classList.add('error_active')
    error.innerText = 'Вы ввели разные пароли'
    
    btnReg.classList.remove('btn_auth_active')

    regPassword.classList.add('reg_password_passive')
    regTopassword.classList.add('reg_password_passive')
  } else{
    error.classList.remove('error_active')

    regValid()

    regPassword.classList.remove('reg_password_passive')
    regTopassword.classList.remove('reg_password_passive')
    
  }
}


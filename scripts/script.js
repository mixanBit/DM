let modalBtn = document.querySelectorAll('.modal_btn'),
    modalUser = document.querySelectorAll('.modal_window'),
    modalWindowOverlay = document.querySelectorAll('.modal_window_overlay')

// Открытие модальных окон
for(let i = 0; i < modalBtn.length; i++) {
  modalBtn[i].addEventListener('click', () => {
    modalUser[i].classList.add('modal_active')

    modalUser[i].addEventListener('click', (el) => {
      if(el.target.classList.contains('modal_active')){
        modalUser[i].classList.remove('modal_active')
      }
    })
  })
}

// Бургер меню
let btnSidebar = document.querySelector('.btn_sidebar')
let sidebar = document.querySelector('.sidebar')

btnSidebar.addEventListener('click', () => {
  sidebar.classList.toggle('sidebar_active')
})

// var app = new Vue({
//   el: '#app',
//   data: {
//     message: 'Привет, Vue!'
//   }
// })
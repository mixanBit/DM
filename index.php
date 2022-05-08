<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Грум Room</title>

  <link rel="stylesheet" href="/style/style.css">
  <link rel="stylesheet" href="/style/exit.css">

  <script src="/scripts/script.js" defer></script>
  <script src="/scripts/validation.js" defer></script>
</head>

<body>
  <!-- Шапка -->
  <header>
    <div class="header_block">
      <div class="logo">
        <img src="/logo/logo_groom.png" alt="Логотип">
      </div>

      <!-- Бургер меню -->
      <nav class="sidebar">
        <button class="btn_sidebar">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <a class="kabinet" href="index.php">Главная</a>
        <div class="user_buttons">
          <button class="modal_btn">Личный кабинет</button>
        </div>
      </nav>

      <!-- Выбор регистрация или авторизация -->
      <div class="modal_window">
        <div class="modal_user_over modal_window_overlay">
          <button class="auth modal_btn">Войти</button>
          <button class="reg modal_btn">Регистрация</button>
        </div>
      </div>
    </div>
  </header>

  <!-- Форма авторизации -->
  <div class="modal_window">
    <form class="form_auth modal_window_overlay" action="login.php" method="post">
      <h2>Авторизация</h2>
      <input class="auth_login input_style" placeholder="Логин" required type="text" name="login">
      <input class="auth_password input_style" placeholder="Пароль" required type="password" name="password">
      <button class='btn_auth'>Далее ></button>
    </form>
  </div>

  <!-- Форма регистрации -->
  <div class="modal_window">
    <form class="form_reg modal_window_overlay" action="registration.php" method="post">
      <h2>Регистрация</h2>
      <input class="reg_FIO input_style" placeholder="ФИО" required type="text" name="name">
      <input class="reg_login input_style" placeholder="Логин" required type="text" name="login">
      <input class="reg_email input_style" placeholder="Email" required type="email" name="email">
      <input class="reg_password input_style" placeholder="Пароль" required type="password" name="password">
      <input class="reg_topassword input_style" placeholder="Повтор пороля" required type="password">
      <div class="personal_data">
        <input id="personal" type="checkbox" checked="true">
        <label for="personal">Обработка персональных данных</label>
      </div>
      <button class="btn_reg">Далее ></button>

      <div class="error"></div>
    </form>
  </div>

</body>

</html>
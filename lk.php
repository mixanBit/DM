<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_COOKIE['user']; ?></title>

  <link rel="stylesheet" href="/style/style.css">
  <link rel="stylesheet" href="/style/order.css">

  <script src="/scripts/script.js" defer></script>
  <script src="/scripts/validation.js" defer></script>
  <script src="/scripts/order.js" defer></script>
</head>

<body>
<header>
    <div class="header_block">
      <div class="logo">
        <img src="/logo/logo_groom.png" alt="Логотип">
      </div>
      <h1><?php echo $_COOKIE['user']; ?></h1>
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
        <div class="user_buttons">
          <a href="index.php">
            <form class="exit" action="logout.php" method="POST">
              <button>Выйти</button>
            </form>
          </a>
        </div>
      </nav>
    </div>
  </header>

  <!-- Выбор регистрация или авторизация -->
  <div class="modal_window">
    <div class="modal_user_over modal_window_overlay">
      <button class="auth modal_btn">Войти</button>
      <button class="reg modal_btn">Регистрация</button>
    </div>
  </div>

  <!-- Форма авторизации -->
  <div class="modal_window">
    <form class="form_auth modal_window_overlay" action="login.php" method="post">
      <h2>Авторизация</h2>
      <input class="auth_login input_style input_auth" placeholder="Логин" required type="text" name="login">
      <input class="auth_password input_style input_auth" placeholder="Пароль" required type="password" name="password">
      <button class='btn_auth btn_auth_active'>Далее ></button>

      <div class="error2"></div>
    </form>
  </div>

  <!-- Форма регистрации -->
  <div class="modal_window">
    <form class="form_reg modal_window_overlay" action="registration.php" method="post">
      <h2>Регистрация</h2>
      <input class="reg_FIO input_style input_reg" placeholder="ФИО" required type="text" name="name">
      <input class="reg_login input_style input_reg" placeholder="Логин" required type="text" name="login">
      <input class="reg_email input_style input_reg" placeholder="Email" required type="email" name="email">
      <input class="reg_password input_style input_reg" placeholder="Пароль" required type="password" name="password">
      <input class="reg_topassword input_style input_reg" placeholder="Повтор пороля" required type="password">
      <div class="personal_data">
        <input id="personal" type="checkbox">
        <label for="personal">Обработка персональных данных</label>
      </div>
      <button class="btn_reg btn_reg_active">Далее ></button>

      <div class="error"></div>
    </form>
  </div>

  <div class="order_container">
    <div class="order_btn modal_btn">
      <h2>+</h2>
      <p>Добавить заявку</p>
    </div>

    <!-- Форма отправки заявки -->
    <div class="modal_window">
      <form action="order.php" method="post">
        <h2>Заявка</h2>
        <input class="input_style input_order" type="text" placeholder="Кличка животного" required name='pet'>
        <input class="input_style input_order" type="text" placeholder="Описание работы" required name='description'>
        <select name="category">
          <option>Категория 1</option>
          <option>Категория 2</option>
        </select>
        <input class="order_img" type="file" name="img">
        <button class="btn_reg_active">Отправить ></button>
        <div class="error3"></div>
      </form>
    </div>
  </div>

    <!-- Вывод заявок -->
    <div class="order_container2">

    <?php
      $mysql = new mysqli('127.0.0.1', 'root', '', 'gromroom');
      $user = $_COOKIE['user'];
      $table = $mysql->query("SELECT * FROM `formorders` WHERE username = '$user'");

      while($result = $table->fetch_assoc()){
        echo '
        <div class="order_box">
        <img src="'.$result['img'].'" alt="">
          <div class="order_text">
            <h2>'.$result['pet'].'</h2>
            <p>'.$result['description'].'</p>
            <p>'.$result['category'].'</p>
            <p>'.$result['datetime'].'</p>
          </div>
          <div class="status">'.$result['status'].'</div>
        </div>
        ';
      }
    ?>
    </div>

</body>
</html>
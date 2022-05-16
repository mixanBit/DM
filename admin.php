<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_COOKIE['user']; ?></title>

  <link rel="stylesheet" href="/style/order.css">
  <link rel="stylesheet" href="/style/style.css">
  
  <script src="/scripts/script.js" defer></script>
</head>

<body>
  <!-- Шапка -->
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
          <form action="logout.php" method="POST">
            <button class="modal_btn">Выйти</button>
          </form>
        </div>
      </nav>
    </div>
  </header>

  <div class="order_container2">
  <?php
      $mysql = new mysqli('127.0.0.1', 'root', '', 'gromroom');
      $table = $mysql->query("SELECT * FROM `formorders`");

      while($result = $table->fetch_assoc()){
        echo '
        <div class="order_box">
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
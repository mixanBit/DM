<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Статус регистрации</title>
  <link rel="stylesheet" href="/style/exit.css">
</head>
<body>
  
  <?php 
    $mysql = new mysqli('localhost', 'root', '', 'gromroom');

    $name = $_POST["name"];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    echo '
      <div class="exit_con">
        <div class="exit_text green">
          <h2>Успешная регистрация</h2>
          <a href="index.php">Вернуться ></a>
        </div>
      </div>
    ';

    // Запись в базу
    $mysql->query("INSERT INTO `users` (`name`, `login`, `email`, `password`) VALUES ('$name', '$login', '$email', '$password')");
    exit();
  ?>

  </body>
</html>
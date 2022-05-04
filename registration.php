<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="/style/exit.css">
</head>
<body>
  <?php 

  $name = htmlspecialchars($_POST["name"]);
  $login = htmlspecialchars($_POST['login']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $mysql = new mysqli('localhost', 'root', '', 'gromroom');

  $result1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");

  // Проверка на уже существующего пользователя
  $user1 = $result1->fetch_assoc(); // Конвертируем в массив
  if(!empty($user1)){
    // echo "Данный логин уже используется!";
    echo '
      <div class="exit_con">
        <div class="exit_text">
          <h2>Данный логин уже используется!</h2>
          <a href="index.php">Вернуться ></a>
        </div>
      </div>
    ';
    exit();
  }

  // Запись в базу
  $mysql->query("INSERT INTO `users` (`name`, `login`, `email`, `password`) VALUES ('$name', '$login', '$email', '$password')");

  header('Location: /');
  ?>

</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ошибка</title>
  <link rel="stylesheet" href="/style/exit.css">
</head>
<body>
  <?php 

  $login = htmlspecialchars($_POST['login']);
  $password = htmlspecialchars($_POST['password']);

  // $adminLogin = 'admin';
  // $adminPassword = 'admin';

  $mysql = new mysqli('localhost', 'root', '', 'gromroom');

  $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

  $user = $result->fetch_assoc();


  // if($login == $adminLogin && $password == $adminPassword){
  //   $mysql->close();
  //   header('Location: admin.php');
  // } 
  if(isset($user) == 0){
    echo '
    <div class="exit_con">
        <div class="exit_text">
          <h2>Такой пользователь не найден!</h2>
          <a href="index.php">Вернуться ></a>
        </div>
      </div>
    ';
    exit();
  }
  // else{
  //   $mysql->close();
  //   header('Location: lk.php');
  // }

  $mysql->close();
  header('Location: lk.php');
  ?>
</body>
</html>


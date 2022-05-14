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
    session_start();
    $mysql = new mysqli('localhost', 'root', '', 'gromroom');

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    $user = $result->fetch_assoc();

    if(isset($user) == 0){
      echo '
      <div class="exit_con">
          <div class="exit_text">
            <h2>Логин или пароль неверный!</h2>
            <a href="index.php">Вернуться ></a>
          </div>
        </div>
      ';
      exit();
    } 
    else if($login == 'admin'){
      setcookie('user', $user['login'], time() + 3600, "/");
      setcookie('userid', $user['id'], time() + 3600, "/");
      header('Location: admin.php');
    }
    else{
      setcookie('user', $user['login'], time() + 3600, "/");
      setcookie('userid', $user['id'], time() + 3600, "/");
      header('Location: lk.php');
    }
    
    $mysql->close();
  ?>
  
</body>
</html>


<?php 
    $mysql = new mysqli('localhost', 'root', '', 'gromroom');

    $login = $_POST['login'];

    $result1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
    // Проверка на уже существующего пользователя
    if($result1->num_rows > 0){
      $response = 'error';
    } 
    else{
      $response = 'ok';
    }
    echo json_encode($response);
?>
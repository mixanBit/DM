<?php

    $mysql = new mysqli('127.0.0.1', 'root', '', 'gromroom');

    $pet = $_POST["pet"];
    $description = $_POST["description"];
    $userid = $_COOKIE['userid'];
    $username = $_COOKIE['user'];
    $category = $_POST['category'];
    $status = 'Новая';

    // Запись в базу
    $mysql->query("INSERT INTO `formorders`(`pet`, `description`, `userid`, `username`, `category`, `status`) VALUES ('$pet','$description','$userid','$username', '$category', '$status')");
    header("Location: lk.php");
?>
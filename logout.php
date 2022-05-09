<?php 
  setcookie('user', $user['login'], time() - 3600, "/");
  setcookie('userId', $user['id'], time() - 3600, "/");
  header("Location: /index.php");
?>
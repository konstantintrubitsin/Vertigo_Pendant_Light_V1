<?php
   $link = new mysqli('localhost', 'root', 'root', 'lamp');
   error_reporting(0);
   session_start();

   // подписка на уведомления
   if(isset($_POST['footer-email__button'])) {
      $email = $_POST['email'];
      mysqli_query($link, "INSERT INTO `subscriptions` (`id`, `email`) VALUES (NULL, '$email')");
      header('Location: ../index.php');
   }

   // выход
   if(isset($_POST['logout'])) {
      session_start();
      session_unset();
      session_destroy();
      header("Location: ../index.php");
  }

   // конфиг
   $conf = mysqli_query($link, "SELECT * FROM `config`");
   $config = [];

   foreach($conf as $key => $value) {
      $config[$value['name']] = $value['value'];
   }
?>
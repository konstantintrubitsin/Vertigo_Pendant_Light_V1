<?php
    session_start();
    include '../components/core.php';

    if(isset($_POST['+'])){
        $link->query("UPDATE `call_me_back` SET `status_id`='1'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['answer_1'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
      }
      if(isset($_POST['-'])){
        $link->query("UPDATE `call_me_back` SET `status_id`='2'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['answer_2'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
      }
      if(isset($_POST['--'])){
        $link->query("UPDATE `call_me_back` SET `status_id`='3'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['answer_3'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
      }
?>
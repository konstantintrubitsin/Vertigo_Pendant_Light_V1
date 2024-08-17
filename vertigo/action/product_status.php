<?php
    session_start();
    include '../components/core.php';

    if(isset($_POST['1'])){
        $link->query("UPDATE `product` SET `statuses_id`='1'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
      }
    if(isset($_POST['2'])){
        $link->query("UPDATE `product` SET `statuses_id`='2'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['3'])){
        $link->query("UPDATE `product` SET `statuses_id`='3'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['4'])){
        $link->query("UPDATE `product` SET `statuses_id`='4'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['5'])){
        $link->query("UPDATE `product` SET `statuses_id`='5'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['8'])){
        $link->query("UPDATE `product` SET `statuses_id`='8'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
?>
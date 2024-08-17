<?php
    session_start();
    include '../components/core.php';

    if(isset($_POST['2_'])){
        $link->query("UPDATE `rec_mc` SET `id_status`='2'
        WHERE `id` = '{$_POST['id']}'");
        $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['1_'])){
        if(!empty($_POST['time']) && $_POST['date']){
            $link->query("UPDATE `rec_mc` SET `id_status`='1', `date`='{$_POST['date']}', `time`='{$_POST['time']}' WHERE `id` = '{$_POST['id']}'");
            var_dump($_POST['time']);
            $_SESSION['success']['status'] = "Статус запроса успешно изменен!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['error']['empty'] = "Заполните поля!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
?>
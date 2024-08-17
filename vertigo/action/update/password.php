<?php
    session_start();
    include '../../components/core.php';

    if(isset($_POST['new_password_btn'])){
        if(empty($_POST['old_password']) || empty($_POST['new_password'])){
            $_SESSION['error']['empty'] = "Вы не заполнили поля!";
            header("location:".$_SERVER['HTTP_REFERER']);
        }
        else{
            $old = ($_POST['old_password']);
            $new = ($_POST['new_password']);
            $old_password = $link -> query("SELECT * FROM `users` WHERE `password` = '$old'
            AND `id` = '{$_SESSION['user']['id']}'");
            if($old_password -> num_rows == 1){
                $link -> query("UPDATE `users` SET `password` = '$new'
                WHERE `id` = '{$_SESSION['user']['id']}'");
                $_SESSION['success']['new_password'] = "Ваш пароль изменен! Авторизуйтесь заново!";
                unset($_SESSION['user']);
                header('location: ../../../auth.php');
            }
            else{
                $_SESSION['error']['old_password'] = "Старый пароль неверен!";
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
    }
?>
<?php
    session_start();
    include '../../components/core.php';

        
    if(isset($_POST["email_btn"])){
        if(!empty($_POST['email'])){
            $users = $link -> query("SELECT * FROM `users` WHERE `email` = '{$_POST['email']}'");
            if($users -> num_rows > 0){
                $_SESSION['error']['new_email'] = "Пользователь с таким адресом электронной почты уже существует!";
                header("Location:".$_SERVER["HTTP_REFERER"]);
            }else{
                $user = $link -> query("UPDATE `users` SET `email` = '{$_POST['email']}'
                WHERE `id` = '{$_SESSION['user']['id']}'");
                $_SESSION['success']['email'] = "Ваш адрес электронной почты изменен! Авторизуйтесь заново!";
                unset($_SESSION['user']);
                header("location: ../../../auth.php");
            }
        }
        else{
            $_SESSION['error']['email'] = "Вы не ввели новый адрес электронной почты!";
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
        
    }
?>
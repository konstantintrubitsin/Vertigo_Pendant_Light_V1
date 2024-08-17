<?php 
    session_start();
    include '../components/core.php';

    if(isset($_POST['auth'])){
        if(!empty($_POST['email'] && $_POST['password'])){
            $users = $link->query("SELECT * FROM `users` 
            WHERE `email` = '{$_POST['email']}' AND `password` = '{$_POST['password']}'");

            if($users -> num_rows != 0){
                $user = $users->fetch_assoc();
                $_SESSION['user']['id'] = $user['id'];
                $_SESSION['user']['isAdmin'] = $user['isAdmin'];
                $_SESSION['user']['login'] = $user['login'];
                header("location: ../private.php");
            }
            else{
                $_SESSION['error']['email'] = "Вы неправильно ввели адрес электронной почты или пароль!";
                header("location:".$_SERVER['HTTP_REFERER']);
            }
        }else{
            $_SESSION['error']['auth'] = "Корректно заполните все поля!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }

    }
?>
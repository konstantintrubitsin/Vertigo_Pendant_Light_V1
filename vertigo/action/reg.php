<?php
    session_start();
    include 'components/core.php';

        
    if(isset($_POST["reg"])){
        if(!empty($_POST['surname']) && $_POST['name'] && $_POST['email'] && $_POST['password']){
            $user = $link -> query("SELECT * FROM `users` WHERE `email` = '{$_POST['email']}'");
            if($user -> num_rows > 0){
                $_SESSION['error']['email'] = "Пользователь с таким адресом электронной почты уже существует!";
                header("location:" .$_SERVER['HTTP_REFERER']);
            }else{
                $link -> query ("INSERT INTO `users`(`isAdmin`,`surname`, `name`,
                `email`, `password`) 
                VALUES ('0', '{$_POST['surname']}', '{$_POST['name']}', '{$_POST['email']}', 
                '{$_POST['password']}')");
                $_SESSION['success']['reg'] = "Вы успешно зарегистрировались! Авторизуйтесь!";
                header('location: ../../auth.php');
            }
        }
        else{
            $_SESSION['error']['reg'] = "Корректно заполните все поля!";
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }
?>
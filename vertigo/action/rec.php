<?php 
    session_start();
    include '../components/core.php';

    if(isset($_POST['rec'])){
        if(!empty($_POST['name'] && $_POST['tel'])){
            $link->query("INSERT INTO `rec_mc`(`id_user`, `id_status`, `name_mc`, `tel`) 
            VALUES ('{$_SESSION['user']['id']}', '2', '{$_POST['name']}', '{$_POST['tel']}')");

            $_SESSION['success']['rec'] = "Мы свяжемся с Вами в течении пары часов и подберем для Вас удобную дату и время мастер-класса.";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['error']['rec'] = "Корректно заполните все поля!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
?>
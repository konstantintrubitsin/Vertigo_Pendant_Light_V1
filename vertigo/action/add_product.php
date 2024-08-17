<?php 
    session_start();
    include '../components/core.php';

    if(isset($_POST['add'])){
        if(!empty($_POST['number'])){
            $product = $link -> query("SELECT * FROM `product` 
            WHERE `number_product` = '{$_POST['number']}'");
            if($product -> num_rows > 0){
                $_SESSION['error']['number'] = "Изделие с таким номером уже существует!";
                header("location:" .$_SERVER['HTTP_REFERER']);
            }else{
                $link -> query("INSERT INTO `product` (`statuses_id`, `number_product`)
                VALUES ('1', '{$_POST['number']}')");
                $_SESSION['success']['product'] = "Изделие добавлено!";
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
        else{
            $_SESSION['error']['product'] = "Заполните поле!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
?>
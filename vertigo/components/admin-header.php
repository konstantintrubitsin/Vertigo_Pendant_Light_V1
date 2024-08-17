<?php
    include '../components/core.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css">
    <style>
    .general-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 25px;
    }

    .general-container input {
        padding: 8px 0 8px 10px;
        width: 100%;
        border-radius: 5px;
    }

    .general-container-update {
        margin-top: 0;
    }
    </style>
    <title>Админ</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Верхняя часть хедера -->
            <div class="top__header">
                 <div class="top__header__left">
                    <div class="logo">
                    <a href="../index.php">Vertigo</a>
                    </div>
                </div>
                <div class="top__header__center">
                    <div class="link">
                        <?php
                            if(isset($_SESSION['admin'])) {
                        ?>
                        <a href="../index.php">Vertigo</a>
                        <a href="../index.php#stock">About</a>
                        <a href="../product-main.php">Products</a>
                        <a href="basket.php#contact">Contacts</a>
                        <a href="admin_panel.php">Редактор</a>
                        <?php
                            } else {
                        ?>
                        <a href="../index.php#stock">About</a>
                        <a href="../product-main.php">Products</a>
                        <a href="../index.php#contact">Contacts</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <!-- авторизация -->
                <div class="top__header__right">
                    <div class="editor" style="padding: 0;">
                        <form action="../components/core.php" method="post" style="padding: 10px 30px">
                        <?php 
                            if(isset($_SESSION['admin'])) {
                        ?>
                        <button type="submit" name="logout" style="background: none; border: none; font-size: 14px; cursor: pointer">Выход</button>
                        <?php                                
                            } else {
                        ?>
                        <a href="admin-auto.php">Вход</a>
                        <?php                                
                            }
                        ?>
                        </form>
                    </div>
                    <div class="busket">
                    <a href="../product/basket.php"><img src="../assets/img/busket.png" alt="" width="40px" height="40px"></a>
                    </div>
                </div>   
            </div>
        </div>
    </header>
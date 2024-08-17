<?php
    include 'core.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/swiper/swiper.min.css">
    <link rel="stylesheet" href="../components/slider/css/slick.css">
    
    <link rel="stylesheet" href="../components/slider/css/styl.css">
    <link rel="stylesheet" href="../components/scroll/aos.css">
    <link rel="stylesheet" href="..//style.css">
    <link rel="stylesheet" href=".//styles.css">
    <title>Название продукта</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Верхняя часть хедера -->
            <dv class="top__header">
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
                        <a href="..//about.php">О нас</a>
                        <a href="..//product-main.php">Товары</a>
                        <a href="..//index.php">Контакты</a>
                        <a href="product/admin_panel.php">Редактор</a>
                        <?php 
                            } else {
                        ?>
                        <a href="..//about.php">О нас</a>
                        <a href="..//product-main.php">Товары</a>
                        <a href="..//contact.php">Контакты</a>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                <!-- авторизация -->
                <div class="account_top_nav">
                <div class="top__header__right">
                    <div class="auto">
                        <?php if(!isset($_SESSION['user'])): ?>
                                    <a href="..//login.php" class="bi">Личный кабинет</a>
                                <?php else: ?>
                                    <a href="..//private.php" class="b" >Личный кабинет</a>
                                <?php if($_SESSION['user']['isAdmin'] == '1'): ?>   
                                    <a href="..//admin_panel.php" class="b">Админ панель</a>
                                <?php endif; ?>
                                <a href="..//logout.php" class="bi">Выход</a>
                            <?php endif; ?>
                    </div>
                    <div class="link busket">
                        <a href="..//product/basket.php">Корзина</a>
                    </div>
                </div>   
            </div>
        </div>

        
    </header>

<?php
    include 'components/header.php';
    $products = mysqli_query($link, "SELECT * FROM `products`");
    $baseModel = mysqli_query($link, "SELECT * FROM `makes`");
    $baseColor = mysqli_query($link, "SELECT * FROM `colors`");
    

    if(isset($_GET['more'])) {
        $radio_color = $_GET['radio_color'];
        $radio_model = $_GET['radio_model'];
        $min = $_GET['min'];
        $max = $_GET['max'];

        if(isset($_GET['radio_color'])) {
            if(isset($where)) {
                $where .= " AND `product_colors`.`color_id` = '$radio_color' ";
            } else {
                $where = " `product_colors`.`color_id` = '$radio_color' ";
            }
        }


        if(isset($_GET['radio_model'])) {
            if(isset($where)) {
                $where .= " AND `makes`.`id` = '$radio_model' ";
            } else {
                $where = " `makes`.`id` = '$radio_model' ";
            }
        }

        if(isset($_GET['min']) or isset($_GET['max'])) {
            if(isset($where)) {
                $where .= " AND `products`.`price` BETWEEN '$min' AND '$max' ";
            } else {
                $where = " `products`.`price`BETWEEN '$min' AND '$max' ";
            }
        }

        if(!empty($where)) {
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`product_memory`.`ROM_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id`  
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id` WHERE $where
                GROUP BY `products`.`id`");
        } else {
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`product_memory`.`ROM_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id` 
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id`
                GROUP BY `products`.`id`");
        }
    }
?>
<main class="product catalog" data-aos="fade-up">
    <div class="container" id="catalog">
        <div class="top__catalog" name="catalog" data-aos="fade-up">
            <div class="top__catalog__h1" id="top__catalog__h1">
                <p>Каталог</p>
            </div>
        </div>
        <div class="catalog__goods__prod">
            <div class="catalog__goods__right">
                <!-- Здесь начинается каталог -->
                <?php 
                    if(!isset($_GET['more'])) {
                        while($row = mysqli_fetch_assoc($products)) {
                    ?>
                <div class="grid-catalog main" style="background-image: url('assets/img/<?php echo $row['img']; ?>');">
                <div class="grid-catalog-middle">
                <h3><?php echo $row['name']; ?></h3>
                </div>
                        
                    <div class="grid-catalog-bottom">
                        <div class="price">
                            <p class="price"><?php echo $row['price'] . ' ₽'; ?></p>
                        </div>
                    </div>   
                    <div class="grid-catalog__a-more">
                    <div class="grid-catalog__button-color">
                            <button id="color-black"></button>
                            <button id="color-two"></button>
                            <button id="color-three"></button>
                        </div>
                    </div>    
                     <a href="product/product.php?id=<?php echo $row['id']; ?>"
                            id="grid-catalog__a-more">Подробнее</a>
                    </div>
                <?php 
                        } 
                    } else {
                        if(mysqli_num_rows($choice) == 0) {
                            echo "<div style='display: flex; align-items: center; justify-content: center; font-size: 20px; width: 100%;'>Не найдено подходящих товаров</div>";
                        }
                        while($elem = mysqli_fetch_assoc($choice)) {
                        ?>

                    <div class="grid-catalog">
                    <div class="grid-catalog__img" style="display: flex; justify-content: center;">
                        <img src="assets/img/<?php echo $elem['img']; ?>" alt="" id="grid-catalog">
                    </div>
                    <div class="grid-catalog-middle">
                        <div class="grid-catalog__button-color">
                            <button id="color-black"><a href="product/product.php?id=<?php echo $row['id']; ?>" id="grid-catalog__a-more"></a></button>
                            <button id="color-two"></button>
                            <button id="color-three"></button>
                        </div>
                        <div class="grid-catalog__h2">
                            <h3><?php echo $elem['name']; ?></h3>
                        </div>
                      
                    </div>
                </div>
                <?php     
                    } 
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php
    include 'components/footer.php';
?>
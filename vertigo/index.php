
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
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id` 
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id` WHERE $where
                GROUP BY `products`.`id`");
        } else {
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id` 
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id`
                GROUP BY `products`.`id`");
        }
    }
?>
<main class="main">
    <div class="top">
        <div class="container" >
            <div class="main-scrin">
            <div class="bottom__header__img">
                <img src="./assets/img/main_pic.png" alt="">
            </div>
            <div class="title">Vertigo Pendant light</div>
            <div class="main-text">
                <p>Подвесной светильник Vertigo — это символ света. Созданный дизайнером Констанс Гиссе, он вызвал энтузиазм профессионалов дизайна. Конструкция приводится в движение при малейшем колебании воздуха, создавая эффект головокружения (отсюда и название).</p>
        </div>
             <div class="order">
        <a class="order" href="product-main.php">Выбрать лампу</a>
            </div>
            </div>
            <div class="top__main" data-aos="fade-up">
                <div class="top__main__left" id="stock">
                <div class="top__catalog__h1 designer" id="top__catalog__h1">
                <a class="top__catalog__h1" href="about.php">Дизайн</a>
            </div>
                    <div class="designer" >
                            <img src="./assets/img/designer.png" alt="">
                            <div class="about-designer">
                                <div class="mini-title"></div>
                                <p class='about'>Подвеска Vertigo, созданная с учетом движения и легкости, изготовлена ​​из сверхлегкого стекловолокна и украшена широкими полиуретановыми лентами, которые мягко покачиваются под воздействием воздушных потоков. При включении свет отбрасывает на стену и потолок узор ярких теней.
                                                Графический и воздушный кулон одинаково смело смотрится как в маленьких, так и в больших жилых помещениях.</p>
                            </div>
                    </div>
                    
                </div>            
         <div class="top__main__center"><img src="./assets/img/designer2png.png" alt=""></div> 
            </div>   
        </div>
        
    </div>
    </div>
</main>
<main class="catalog" data-aos="fade-up">
    <div class="container" id="catalog">
        <div class="top__catalog" name="catalog" data-aos="fade-up">
            <div class="top__catalog__h1" id="top__catalog__h1">
                <a class="top__catalog__h1" href="product-main.php">Светильники</a>
            </div>
        </div>
        <div class="catalog__goods">
                    <?php while($radioM = mysqli_fetch_assoc($baseModel)) { ?>
                    <?php } ?>
                    <div class="goods_left_color">
                    </div>
                </div>
            <div class="catalog__goods__right">
                <!-- Здесь начинается каталог -->
                <?php 
                    if(!isset($_GET['more'])) {
                        while($row = mysqli_fetch_assoc($products)) {
                    ?>
                <div class="grid-catalog" style="background-image: url('assets/img/<?php echo $row['img']; ?>');">
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
                <?php     
                    } 
                }
                ?>
            </div>
        </div>
    </div>
</main>
<section class="advantages-section" data-aos="fade-up">
  <div class="container">   
    <div class="main-top">
     <div class="top__catalog__h1" id="top__catalog__h1">
                <p>Преимущества</p>
            </div>
    <div class="advantages-grid">

      <div class="advantage-item">
        <img src="./assets/img/Современный дизайн.png" alt="Дизайн">
        <p class='mini-title'>Современный дизайн</p>
        <p>Подвеска Vertigo, созданная французским дизайнером Констанс Гиссе, стала культовым изделием благодаря своему современному дизайну. Настоящая звезда журналов о декоре, любимец декораторов и дизайнеров интерьера. Кулон Vertigo получил приз публики в 2006 году на вилле Ноай.</p>
      </div>

      <div class="advantage-item">
        <img src="./assets/img/Свет.png" alt="Свет">
        <p class='mini-title'>Новый тип освещения</p>
        <p>Расположение источника света позволяет получить как интенсивное, так и рассеянное освещение. Vertigo была одной из первых очень больших дизайнерских люстр и во многом повлияла на взгляды на этот тип светильников.</p>
      </div>

         <div class="advantage-item">
      </div>         



             <div class="advantage-item">
      </div>         

      <div class="advantage-item">
        <img src="./assets/img/Конструкция.png" alt="Конструкция">
        <p class='mini-title'>Прочная конструкция</p>
        <p>Этот подвесной светильник, изготовленный во Франции, состоит из множества гибких полиуретановых лент, натянутых вручную на тонкую структуру из стекловолокна. Целью проекта было разработать крупномасштабный графический кулон, сделав его очень легким и воздушным, чтобы добавить движения. Обладая настоящей эмоциональной силой, этот подвижный кулон чрезвычайно легкий.</p>      
    </div>
    
      <div class="advantage-item">
        <img src="./assets/img/Качество.png" alt="Качество">
        <p class='mini-title'>Высшее качество</p>
        <p>Замечательный образец дизайна, выполненный по самым высоким стандартам качества! Эта лампа не требует сборки. Он поставляется в сложенном виде. С самого начала Амели дю Пассаж, основательница Vertigo, сделала четкий выбор в пользу воплощения добра в красоте. Сегодня мастерская, в которой работают 30 человек, производит большую часть коллекций светильников Vertigo с высочайшей точностью.</p>
    </div>
    </div>
  </div>
</div>
</section>
<?php
    include 'components/footer.php';
?>
<?php
    include '../components/product-header.php';

    $id_tel = $_GET['id'];
    $telephone_des = mysqli_query($link, "SELECT * FROM `products` WHERE `id` = '$id_tel'");
    $top_products = mysqli_query($link, "SELECT * FROM `products` ORDER BY `point`/ `count_reviews` DESC LIMIT 4");
    $otziv = mysqli_query($link, "SELECT * FROM `reviews` WHERE `product_id` = '$id_tel'");

    // цвет
    $existingColorsProduct = mysqli_query($link, "SELECT `colors`.*, `product_colors`.*
    FROM `product_colors` 
    LEFT JOIN `colors` ON `product_colors`.`color_id` = `colors`.`id`
    WHERE `product_colors`.`product_id` = '$id_tel';");

    // картинки
    $existingImgProduct1 = mysqli_query($link, "SELECT `products`.*, `gallery`.*
    FROM `products` 
        LEFT JOIN `gallery` ON `gallery`.`product_id` = `products`.`id`
    WHERE `gallery`.`product_id` = '$id_tel'");

    $existingImgProduct2 = mysqli_query($link, "SELECT `products`.*, `gallery`.*
    FROM `products` 
        LEFT JOIN `gallery` ON `gallery`.`product_id` = `products`.`id`
    WHERE `gallery`.`product_id` = '$id_tel'");

    // отзывы
    if(isset($_POST['modal-add'])) {
        $modal_id = $_POST['modal-id'];
        $modal_name = $_POST['modal-name'];
        $modal_text = $_POST['modal-text'];
        $modal_select = $_POST['modal-select'];
        $ms_number = (int) $modal_select;

        mysqli_query($link, "INSERT INTO `reviews`(`id`, `product_id`, `name`, `descriptions`, `point`) VALUES (NULL, '$modal_id', '$modal_name', '$modal_text', '$modal_select')");
        mysqli_query($link, "UPDATE `products` SET `point` = (`point` + '$ms_number'), `count_reviews` = (`count_reviews` + 1) WHERE `id` = '$modal_id'");
    }
?>
<!-- модальное окно -->
<form class="main-modal" action="product.php?id=<?= $id_tel ?>" method="post">
    <div class="main-modal-container">
        <div class="main-modal__h-input-block">
            <div class="main-modal-exit__input">
                <input type="button" id="modal-exit" value="Закрыть" onclick="exit()">
            </div>
            <div class="main-modal__h">
                <h3>Напишите свой отзыв</h3>
            </div>
        </div>
        <input type="text" name="modal-id" value="<?php echo $id_tel ?>" hidden>
        <div style="margin-bottom: 25px;">
            <select name="modal-select" id="modal-select" style="padding: 8px 0 8px 10px;">
                <option value="1">Звёзд: 1</option>
                <option value="2">Звёзд: 2</option>
                <option value="3">Звёзд: 3</option>
                <option value="4">Звёзд: 4</option>
                <option value="5">Звёзд: 5</option>
            </select>
        </div>
        <div class="main-modal-name">
            <input type="text" id="modal-name" name="modal-name" placeholder="Имя">
        </div>
        <div class="main-modal-text">
            <textarea name="modal-text" id="modal-text" placeholder="текст отзыва"></textarea>

        </div>
        <div class="main-modal__button">
            <button type="submit" id="modal-add" name="modal-add">Добавить отзыв</button>
        </div>
    </div>
</form>
<!-- конец модального окна -->
<main class="main">
    <div class="container">
        <div class="main-top">
            <?php
                    while($arrTel = mysqli_fetch_assoc($telephone_des)) {
                ?>
            <div class="main-top__p">
                <p><?php echo $arrTel['diagonal'] . '" ' . $arrTel['name'] ?></p>
            </div>
            <div class="main-top-status">
            <?php if(mysqli_num_rows($otziv) > 0) {
                echo 'Средняя оценка: ' . round($arrTel['point'] /  $arrTel['count_reviews'], 5);
            } ?>
            </div>
        </div>
        <div class="main-top-review">
            <div class="main-top-review__p">
                <p><?php echo 'Всего отзывов: ' . $arrTel['count_reviews']; ?></p>
            </div>
        </div>
        <div class="main-middle">

        <?php if(mysqli_num_rows($existingImgProduct1) > 0 and mysqli_num_rows($existingImgProduct2) > 0) { ?>
            <div class="main-middle-left">

                <div class="cliders">
                <?php while($EIP1 = mysqli_fetch_assoc($existingImgProduct1)) { ?>
                    <div class="clider-block">
                        <div class="slider-wrapper"><img src="../assets/img/<?php echo $EIP1['img'] ?>" alt=""></div>
                    </div>
                <?php } ?>
                </div>

                <div class="cliders-two">
                <?php while($EIP2 = mysqli_fetch_assoc($existingImgProduct2)) { ?>
                    <div class="clider-block">
                        <div class="slider-wrapper-two"><img src="../assets/img/<?php echo $EIP2['img'] ?>" alt=""></div>
                    </div>
                <?php } ?>
                </div>

            </div>
        <?php } ?>

            <div class="main-middle-right">
                <div class="main-middle-right__h">
                    <h1><?php echo $arrTel['name'] ?></h1>
                </div>
                <div class="main-middle-right-color__button">

                    <?php while($ECP = mysqli_fetch_array($existingColorsProduct)) { ?>
                        <div class="grid-catalog__a-more">
                    <div class="grid-catalog__button-color main">
                            <button id="color-three"></button>
                        </div>
                    </div>  
                    <?php } ?>

                </div>
                </form>
                <div class="main-middle-right__p">
                    <p>О товаре</p>
                </div>
                <div class="main-middle-right__description__p">
                    <p><?php echo $arrTel['descriptions'] ?></p>
                </div>
                <div class="main-middle-right-button_count">
                    <div class="main-middle-right__button">
                        <button id="main-middle-right">
                            В корзину
                        </button>
                        <button id="main-middle-right-reviews" onclick="add()">
                            Добавить отзыв
                        </button>
                    </div>
                    <div class="main-middle-right-count__p">
                        <p><?php echo $arrTel['price'] . ' Р' ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
                    }
            ?>
        <?php if(mysqli_num_rows($otziv) == 0) {
            echo '';
            } else {
            ?>
        <div class="main-reviews">
            <div class="main-reviesw__h">
                <h1>ОТЗЫВЫ</h1>
            </div>
            <div class="swiper-container main-reviesw-block">
                <div class="swiper-wrapper">
                <?php while($rev = mysqli_fetch_array($otziv)) {?>
                    <div style="<?php if(mysqli_num_rows($otziv) > 0) { echo 'margin: 0 auto;'; } ?>" class="main-reviews-item <?php if(mysqli_num_rows($otziv) >= 4) { echo 'swiper-slide'; } ?> card">
                        <div class="main-reviews-item__h-status">
                            <div class="main-reviews-item__h">
                                <h3><?php echo $rev[2]; ?></h3>
                            </div>
                            <div class="main-reviews-item-status">
                                <?php echo 'Звёзд: ' . $rev[4]; ?>
                            </div>
                        </div>
                        <div class="main-reviesw__p">
                            <p><?php echo $rev[3]; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php if(mysqli_num_rows($otziv) >= 4) { ?>
            <div class="main-reviesw-block__button">
                <button class="swiper-button-do"></button>
                <button class="swiper-button-let"></button>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</main>
<?php
    include '../components/product-footer.php';
?>
<?php
   include '../components/core.php';
   include '../components/admin-header.php';

   $DBmodel = mysqli_query($link, "SELECT * FROM `makes`");

    // получение id
   $res = $_GET['idUpdate'];
   $result = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `products` WHERE `id` = '$res'"));

   // добавление цвета
   $DBcolors = mysqli_query($link, "SELECT * FROM `colors`");
   if(isset($_POST['addCol'])) {
    $product_id = $_POST['product_id'];
    $color_id = $_POST['color_id'];

    mysqli_query($link, "INSERT INTO `product_colors`(`id`,`product_id`, `color_id`) VALUES (NULL, '$product_id', '$color_id')");
   }

   $existingColors = mysqli_query($link, "SELECT `colors`.*, `product_colors`.*
   FROM `product_colors` 
   LEFT JOIN `colors` ON `product_colors`.`color_id` = `colors`.`id`
   WHERE `product_colors`.`product_id` = '$res';");

   // удаление цвета
   if(isset($_POST['btn-del-color'])) {
    $del_color_id = $_POST['del_color_id'];

    mysqli_query($link, "DELETE FROM `product_colors` WHERE `id` = '$del_color_id'");
   }


   $DBimage = mysqli_query($link, "SELECT * FROM `gallery`");
   
   $existingImg = mysqli_query($link, "SELECT `products`.*, `gallery`.*
   FROM `products` 
       LEFT JOIN `gallery` ON `gallery`.`product_id` = `products`.`id`
   WHERE `gallery`.`product_id` = $res");

   // проверка наличия id (обновление)  
   if(empty($_GET['idUpdate']) or $_GET['idUpdate'] !== $result[0]) {
    $_SESSION['errors']['update'] = 'Указанного ID не существует!';
    $_SESSION['errors']['delete'] = '';
    $_SESSION['errors']['img'] = '';
    header("Location: admin_panel.php");
   } else {
    $_SESSION['errors']['update'] = '';
    $_SESSION['errors']['delete'] = '';
    $_SESSION['errors']['img'] = '';
   }

   if(isset($_POST['addCol']) or isset($_POST['btn-del-color']) or isset($_POST['addMem']) or isset($_POST['btn-del-memory'])) {
    $_SESSION['errors']['update'] = '';
    $_SESSION['errors']['delete'] = '';
    $_SESSION['errors']['img'] = '';
   }

   // обновление товара
   if(isset($_POST['updateTovar'])) {
    $id = $_POST['idUpdate'];
    $name = $_POST['nameUpdate'];
    $price = $_POST['costUpdate'];
    $descriptions = $_POST['descriptionUpdate'];
    $img = $_POST['img__file'];
    $guarantee = $_POST['guarantee'];
    $model = $_POST['model'];
    $release_year = $_POST['release_year'];
    $diagonal = $_POST['diagonal'];
    $resolution = $_POST['resolution'];
    $makes = $_POST['model_id'];

    mysqli_query($link, "UPDATE `products` SET `name` = '$name', `price` = '$price', `descriptions` = '$descriptions', `img` = '$img', `guarantee` = '$guarantee', `model` = '$model', `release_year` = '$release_year', `diagonal` = '$diagonal', `resolution` = '$resolution', `model_id` = '$makes' WHERE `id` = '$id'");
    $_SESSION['errors']['update'] = '';
    header('Location: admin_panel.php');
   }

   if(isset($_SESSION['admin'])) {
?>
<h1 style="margin-top: 50px; text-align: center; font-style: normal; font-weight: 900; font-size: 30px; line-height: 63px; color: #1C1C1C;">Обновление продукта</h1>
<form action="update-product.php" method="post" style="max-width: 1000px; margin: 0 auto;">
            <div class="main-admin-block-update" id="update_Tovar" style=" margin-top: 50px; display: flex; justify-content: center;">
                <div class="main-admin-update-inputs" style="max-width: 516px; width: 100%; margin-left: 0;">
                    <div class="main-admin-update-inputs-id">
                        <input type="text" id="idUpdate" name="idUpdate" placeholder="id товара" value="<?php echo $result[0] ?>" hidden>
                    </div>
                    <div class="main-admin-update-inputs-newName">
                        <input type="text" id="nameUpdate" name="nameUpdate" placeholder="Новое название" value="<?php echo $result[1] ?>" required>
                    </div>

                    <!-- МОДЕЛЬ (МАРКА) -->
                    <div class="general-container-update">
                        <select name="model_id" style="margin-bottom: 25px; padding: 8px 0 8px 10px; border-radius: 5px; width: 100%;" required>
                        <?php 
                            while($elem_model = mysqli_fetch_assoc($DBmodel)) {
                        ?>
                        <option value="<?php echo $elem_model['id'];?>" <?php if($elem_model['id'] == $result[10]) { echo 'selected'; }?>><?php echo $elem_model['model']; ?></option>
                        <?php 
                            } 
                        ?>
                        </select>
                    </div>

                    <!-- ГАРАНТИЯ -->
                    <div class="general-container-update">
                        <input type="text" name="guarantee" id="guarantee" placeholder="Гарантия" value="<?php echo $result[5] ?>" required>
                    </div>
                    <!-- МОДЕЛЬ -->
                    <div class="general-container-update">
                        <input type="text" name="model" id="model" placeholder="Модель" value="<?php echo $result[6] ?>" required>
                    </div>
                    <!-- ГОД РЕЛИЗА -->
                    <div class="general-container-update">
                        <input type="text" name="release_year" id="release_year" placeholder="Год релиза" value="<?php echo $result[7] ?>" required>
                    </div>
                    <!-- ДИАГОНАЛЬ (ДЮЙМЫ) -->
                    <div class="general-container-update">
                        <input type="text" name="diagonal" id="diagonal" placeholder="Диагональ (дюймы)" value="<?php echo $result[8] ?>" required>
                    </div>
                    <!-- РАЗРЕШЕНИЕ -->
                    <div class="general-container-update">
                        <input type="text" name="resolution" id="resolution" placeholder="Разрешение экрана" value="<?php echo $result[9] ?>" required>
                    </div>
                    <div class="main-admin-update-inputs-newCost">
                        <input type="text" id="costUpdate" name="costUpdate" placeholder="Новая цена" value="<?php echo $result[2] ?>" required>
                    </div>
                    <div class="main-admin-update-inputs-newDescription">
                        <textarea name="descriptionUpdate" id="descriptionUpdate" placeholder="Новое описание" required><?php echo $result[3] ?></textarea>
                    </div>
                    <div class="main-admin-block-right-img__p" value="<?php echo $result[4] ?>">
                        <p>Изображения</p>
                    </div>
                    <div class="main-admin-block-right-img__input">
                        <input type="file" id="img__file" name="img__file">
                    </div>
                    <div class="main-admin-block-right-updateTovar">
                        <button id="updateTovar" name="updateTovar">Обновить товар</button>
                    </div>
                </div>
            </div>
        </form>

        <h1 style="margin-top: 50px; text-align: center; font-style: normal; font-weight: 900; font-size: 30px; line-height: 63px; color: #1C1C1C;">Добавление цвета продукту</h1>
        <form action="update-product.php" method="post" style="max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; justify-content: center; max-width: 516px">
        <!-- ЦВЕТ -->
            <input type="text" name="product_id" value="<?php echo $res; ?>" hidden>
            <select name="color_id" style="margin-top: 25px; padding: 8px 0 8px 10px; border-radius: 5px; width: 100%;" required>
                <?php while($elem_color = mysqli_fetch_assoc($DBcolors)) { ?>
                    <option value="<?php echo $elem_color['id']; ?>"><?php echo $elem_color['color']; ?></option>
                <?php } ?>
            </select>
            <div style="margin-top: 25px;">
                <p style="margin-bottom: 10px;">Уже добавленные цвета для <?php echo $result[1] ?>:</p>
                <div style="display: flex; gap: 20px;">
                <?php while($ExCol = mysqli_fetch_array($existingColors)) { ?>
                        <form action="update-product.php" method="post">
                        <div style="display: flex; gap: 5px;">
                            <input type="text" name="del_color_id" value="<?php echo $ExCol[2]; ?>" hidden>
                            <div style="width: 25px; height: 25px; border: 1px solid rgba(0, 0, 0, 0.25); border-radius: 50%; background-color: <?php echo $ExCol[1]; ?>;"></div>
                            <button name="btn-del-color" style="background-color: #C14231; border-radius: 5px; padding: 5px; color: white;">Удалить</button>
                            </div>
                        </form>
                <?php } ?>
                </div>
                <div style="display: flex; align-items: center; justify-content: center; margin: 50px;">
                <button type="submit" id="addCol" name="addCol" style="padding: 16px 64px; background-color: #C14231; color: #ffffff; border: none; border-radius: 5px;">Добавить цвет</button>
            </div>
            </div>
        </form>

        <h1 style="margin-top: 50px; text-align: center; font-style: normal; font-weight: 900; font-size: 30px; line-height: 63px; color: #1C1C1C;">Добавление памяти продукту</h1>
        <form action="update-product.php" method="post" style="max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; justify-content: center; max-width: 516px">
        <!-- ПАМЯТЬ -->
            <input type="text" name="product_id_mem" value="<?php echo $res; ?>" hidden>
            <select name="ROM_id" style="margin-top: 25px; padding: 8px 0 8px 10px; border-radius: 5px; width: 100%;" required>
                <?php while($elem_memory = mysqli_fetch_assoc($DBmemory)) { ?>
                    <option value="<?php echo $elem_memory['id']; ?>"><?php echo $elem_memory['ROM'] . ' Гб'; ?></option>
                <?php } ?>
            </select>
            <div style="margin-top: 25px;">
                <p style="margin-bottom: 10px;">Уже добавленная память для <?php echo $result[1] ?>:</p>
                <div style="display: flex; gap: 20px;">
                <?php while($ExMem = mysqli_fetch_array($existingMemory)) { ?>
                        <form action="update-product.php" method="post">
                        <div style="display: flex; gap: 5px; align-items: center;">
                            <input type="text" name="del_memory_id" value="<?php echo $ExMem[2]; ?>" hidden>
                            <div style="font-size: 16px;"><?php echo $ExMem[1] . ' Гб'; ?></div>
                            <button name="btn-del-memory" style="background-color: #C14231; border-radius: 5px; padding: 5px; color: white;">Удалить</button>
                            </div>
                        </form>
                <?php } ?>
                </div>
                <div style="display: flex; align-items: center; justify-content: center; margin: 50px;">
                <button type="submit" id="addMem" name="addMem" style="padding: 16px 64px; background-color: #C14231; color: #ffffff; border: none; border-radius: 5px;">Добавить память</button>
            </div>
            </div>
        </form>

        <h1 style="margin-top: 50px; text-align: center; font-style: normal; font-weight: 900; font-size: 30px; line-height: 63px; color: #1C1C1C;">Добавление картинки продукту</h1>
    <form action="addImage.php" method="post" enctype="multipart/form-data" style="max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; justify-content: center; max-width: 516px">
        <!-- КАРТИНКА -->
                    <input type="text" name="product_id_img" value="<?php echo $res; ?>" hidden>
                    <input type="file" name="addImg_file" id="addImg_file" required>

        <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                    <?php while($ExImg = mysqli_fetch_array($existingImg)) { ?>
                <div style="width: 180px; height: 240px; margin-bottom: 40px; text-align: center;" class="card-img">

                        <form action="addImage.php" method="post" style="margin-top: 10px;">
                            <input type="text" name="del_img_id" value="<?php echo $ExImg['id']; ?>" hidden>
                            <img style="width: 100%; height: 100%;" src=<?php echo '../assets/img/' . $ExImg['img'] ?>>
                            <button type="submit" name="btn-del-img" style="background-color: #C14231; border-radius: 5px; padding: 5px; color: white;">Удалить</button>
                        </form>
                        
                </div>
                    <?php } ?>
                <div style="text-align: center; width: 100%; display: flex; align-items: center; justify-content: center; margin: 50px;">
                    <button type="submit" id="addImg" name="addImg" style="padding: 16px 64px; background-color: #C14231; color: #ffffff; border: none; border-radius: 5px;">Добавить картинку</button>
                </div>   
        </div>
    </form>
<?php
    } else {
        header('Location: ../index.php');
    }
?>
<?php
    include '../components/core.php';
    include '../components/admin-header.php';

    $DBmakes = mysqli_query($link, "SELECT * FROM `makes`");
    
    // добавление товара
    if(isset($_POST['addTovar'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $descriptions = $_POST['descriptions'];
        $img = $_POST['img'];
        $guarantee = $_POST['guarantee'];
        $model = $_POST['model'];
        $release_year = $_POST['release_year'];
        $diagonal = $_POST['diagonal'];
        $resolution = $_POST['resolution'];
        $makes_id = $_POST['makes_id'];

        // загрузка картинки
        $uploaddir = '../assets/img/';
        $name_img = uniqid().'.'.substr($_FILES['img']['type'], 6);
        $uploadfile = $uploaddir . $name_img;
        if('image' == substr($_FILES['img']['type'], 0, 5)) {
            if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                $_SESSION['errors']['img'] = '';
                $_SESSION['errors']['delete'] = '';
                $_SESSION['errors']['update'] = '';
                mysqli_query($link, "INSERT INTO `products`(`id`, `name`, `price`, `descriptions`, `img`, `guarantee`, `model`, `release_year`, `diagonal`, `resolution`, `model_id`) 
                VALUES (NULL, '$name', '$price', '$descriptions', '$name_img', '$guarantee', '$model', '$release_year', '$diagonal', '$resolution', '$makes_id')");
            } 
        } else {
            $_SESSION['errors']['img'] = 'Неверный тип файла!';
            $_SESSION['errors']['delete'] = '';
            $_SESSION['errors']['update'] = '';
        }
        header('Location: admin_panel.php');
    }

    // удаление товара
    $delrows = mysqli_query($link, "SELECT `id` FROM `products`");
    if(isset($_POST['deleteTovar'])) {
        $id = $_POST['deleteTovarID'];
        $productExists = false;
        while($row = mysqli_fetch_assoc($delrows)){
            if($row['id'] == $id){
                $productExists = true;
                break;
            }
        }
        if($productExists) { 
            $_SESSION['errors']['delete'] = '';
            $_SESSION['errors']['img'] = '';
            $_SESSION['errors']['update'] = '';
            mysqli_query($link, "DELETE FROM `products` WHERE `id` = '$id'");
        } else {
            $_SESSION['errors']['delete'] = 'Указанного ID не существует!';
            $_SESSION['errors']['img'] = '';
            $_SESSION['errors']['update'] = '';
        }
        header('Location: admin_panel.php');
    }

    if(isset($_SESSION['admin'])) {
?>
    <main class="main">
        <div class="container">
            <div class="main-admin-block__h">
                <h1>Привет, Админ. Проверь корзину: там <font color="#C14231"> N </font>  товара(ов)</h1>
            </div>
            <div class="main-admin-block-a">
                <div class="main-admin-block__p">
                    <p>Что-то поменялось? Воспользуйся следующими функциями:</p>
                </div>
                <div class="main-admin-block__a">
                    <a href="#add_Tovar">Добавить товар</a>
                    <a href="#delete_Tovar">Удалить товар</a>
                    <a href="#update_Tovar">Обновить товар</a>
                </div>
            </div>
        <form action="admin_panel.php" method="post" enctype="multipart/form-data">
            <div class="main-admin-block-inputs" id="add_Tovar">
                <div class="main-admin-block-inputs-block">
                    <div class="main-admin-block__p_h">
                        <p>Добавление товара</p>
                    </div>
                    <div style="color: #C14231; font-weight: bold;"><?php echo $_SESSION['errors']['img']; ?></div>
                </div>
                
                <div class="main-admin-block-right">
                    <div class="main-admin-block__input-name">
                        <input type="text" placeholder="Название" name="name" required>
                    </div>

                    <!-- МОДЕЛЬ (МАРКА) -->
                    <div class="general-container">
                        <select name="makes_id" style="padding: 8px 0 8px 10px; border-radius: 5px; width: 100%;" required>
                        <?php while($elem_makes = mysqli_fetch_assoc($DBmakes)) { ?>
                            <option value="<?php echo $elem_makes['id']; ?>"><?php echo $elem_makes['model']; ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <!-- ГАРАНТИЯ -->
                    <div class="general-container">
                        <input type="text" name="guarantee" id="guarantee" placeholder="Гарантия" required>
                    </div>
                    <!-- МОДЕЛЬ -->
                    <div class="general-container">
                        <input type="text" name="model" id="model" placeholder="Модель" required>
                    </div>
                    <!-- ГОД РЕЛИЗА -->
                    <div class="general-container">
                        <input type="text" name="release_year" id="release_year" placeholder="Год релиза" required>
                    </div>
                    <!-- ДИАГОНАЛЬ (ДЮЙМЫ) -->
                    <div class="general-container">
                        <input type="text" name="diagonal" id="diagonal" placeholder="Диагональ (дюймы)" required>
                    </div>
                    <!-- РАЗРЕШЕНИЕ -->
                    <div class="general-container">
                        <input type="text" name="resolution" id="resolution" placeholder="Разрешение экрана" required>
                    </div>
                    <div class="main-admin-block-right-cost">
                        <input type="text" placeholder="Цена" id="cost" name="price" required>
                    </div>
                    <div class="main-admin-block-right__textarea">
                        <textarea id="description" placeholder="Описание" name="descriptions" required></textarea>
                    </div>
                    <div class="main-admin-block-right-img__p">
                        <p>Изображения</p>
                    </div>
                    <div class="main-admin-block-right-img__input">
                        <input type="file" id="img__file" name="img" required>
                    </div>
                    <div class="main-admin-block-right-addTovar">
                        <button id="addTovar" name="addTovar">Добавить товар</button>
                    </div>
                </div>
            </div>
        </form>
        <form action="admin_panel.php" method="post">
            <div class="main-admin-block-delete" id="delete_Tovar">
                <div class="main-admin-block-delete__p">
                    <p>Удалить товар</p>
                </div>
                <div class="main-admin-block-delete__input">
                    <input type="text" placeholder="id товара" name="deleteTovarID" required>
                </div>
            </div>
            <div style="color: #C14231; font-weight: bold;"><?php echo $_SESSION['errors']['delete']; ?></div>
            <div class="main-admin-block-delete__button">
                <button id="deleteTovar" name="deleteTovar" type="submit">Удалить товар</button>
            </div>
        </form>

        <form action="update-product.php" method="get">
            <div class="main-admin-block-update" id="update_Tovar">
                <div class="main-admin-update-p">
                    <div class="main-admin-update__p">
                        <p>Обновить товар</p>
                    </div>
                    <div style="color: #C14231; font-weight: bold;"><?php echo $_SESSION['errors']['update']; ?></div>
                </div>
                <div class="main-admin-update-inputs">
                    <div class="main-admin-update-inputs-id">
                        <input type="text" id="idUpdate" name="idUpdate" placeholder="id товара">
                    </div>
                    <div class="main-admin-block-right-updateTovar">
                        <button id="updateTovar" name="updateTovar" type="submit">Обновить товар</button>
                    </div>
                </div>
            </div>
        </form>

        </div>
    </main>
</body>
</html>
<?php
    } else {
        header('Location: ../index.php');
    }
?>
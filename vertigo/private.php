<?php
    include 'components/core.php';
    include 'components/header.php';

    if(!isset($_SESSION['user'])){
        header("location: index.php");
    }

    $user = $link->query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['user']['id']}'");
    $rec = $link->query("SELECT `statuses_rec_mc`.*, `rec_mc`.*
    FROM `statuses_rec_mc` 
        LEFT JOIN `rec_mc` ON `rec_mc`.`id_status` = `statuses_rec_mc`.`id`
        WHERE `id_user` = '{$_SESSION['user']['id']}'");
?>
<div class="private">
    <div class="container">
    <div class="top__catalog__h1">
        <p>Личный кабинет</p>
    </div>
    <div class="block_btn_private">
        <div class="personal_data">
            <?php foreach($user as $key => $value): ?>
                <p>Фамилия: <b><?= $value ['surname'] ?></b></p>
                <p>Имя: <b><?= $value ['name'] ?></b></p>
                <div class="personal_data_point">
                    <p>Почта: <b><?= $value ['email'] ?></b></p>
                    <form action="vendor/action/update/email.php" method="post">
                        <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" title="Введите корректный адрес своей электронной почты!">
                        <button name="email_btn">Изменить</button>
                    </form>
                    <p style="color: red" class="session_res"><?php
                        if(isset($_SESSION['error']['email'])){
                            echo $_SESSION['error']['email'];
                            unset ($_SESSION['error']['email']);
                        }
                    ?></p>
                    <p style="color: red" class="session_res"><?php
                        if(isset($_SESSION['error']['new_email'])){
                            echo $_SESSION['error']['new_email'];
                            unset ($_SESSION['error']['new_email']);
                        }
                    ?></p>
                    <form action="vendor/action/update/password.php" method="post">
                        <input type="password" name="old_password" placeholder="Старый пароль">
                        <input type="password" name="new_password" placeholder="Новый пароль" pattern="[A-Za-z0-9]{6,}" title="Пароль должен содержать не менее 6 латинских символов или цифр!">
                        <button name="new_password_btn">Изменить</button>
                    </form>
                    <p style="color: red" class="session_res"><?php
                        if(isset($_SESSION['error']['empty'])){
                            echo $_SESSION['error']['empty'];
                            unset ($_SESSION['error']['empty']);
                        }
                    ?></p>
                    <p style="color: red" class="session_res"><?php
                        if(isset($_SESSION['error']['old_password'])){
                            echo $_SESSION['error']['old_password'];
                            unset ($_SESSION['error']['old_password']);
                        }
                    ?></p>
                </div>
            
            <?php endforeach; ?>
            </div>
        </div>
</div>
<?php
    include 'components/footer.php';
?>


</div>
<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/maskedinput.js"></script>
<script src="assets/scripts/script.js"></script>
<script src="assets/scripts/WOW-master/dist/wow.min.js"></script>
<script type="text/javascript">
    new WOW().init();
</script>
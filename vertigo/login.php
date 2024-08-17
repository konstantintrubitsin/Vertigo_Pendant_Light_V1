<?php
    include 'components/core.php';
    include 'components/header.php';
?>
<div class="auth_reg">
    <div class="mini_gallery"></div>
    <div class="form_auth_reg">
        <div class="top__catalog__h1">
            <p>Авторизация</p>
        </div>
        <div class="form_">
            <form action="action/login.php" method="post">
                <input type="email" name="email" placeholder="введите адрес своей электронной почты">
                <input type="password" name="password" placeholder="введите свой пароль">
                <button name="auth">Войти</button>
                <p class="mini_btn">еще нет аккаунта? нажмите <a href="reg.php">сюда</a></p>
            </form>
            <p style="color: red" class="session_res"><?php
                if(isset($_SESSION['error']['auth'])){
                    echo $_SESSION['error']['auth'];
                    unset ($_SESSION['error']['auth']);
                }
            ?>
            <p style="color: red" class="session_res"><?php
                if(isset($_SESSION['error']['email'])){
                    echo $_SESSION['error']['email'];
                    unset ($_SESSION['error']['email']);
                }
            ?>
            <p style="color: green" class="session_res"><?php
                if(isset($_SESSION['success']['reg'])){
                    echo $_SESSION['success']['reg'];
                    unset ($_SESSION['success']['reg']);
                }
            ?>
            <p style="color: green" class="session_res"><?php
                if(isset($_SESSION['success']['email'])){
                    echo $_SESSION['success']['email'];
                    unset ($_SESSION['success']['email']);
                }
            ?></p>
            <p style="color: green" class="session_res"><?php
                if(isset($_SESSION['success']['new_password'])){
                    echo $_SESSION['success']['new_password'];
                    unset ($_SESSION['success']['new_password']);
                }
            ?></p>
        </div>
    </div>
    <div class="mini_gallery"></div>
</div>
<?php
    include 'components/footer.php';
?>
<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/maskedinput.js"></script>
<script src="assets/scripts/script.js"></script>
<script src="assets/scripts/WOW-master/dist/wow.min.js"></script>
<script type="text/javascript">
    new WOW().init();
</script>
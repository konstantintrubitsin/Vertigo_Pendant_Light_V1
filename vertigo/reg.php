<?php
    include 'components/core.php';
    include 'components/header.php';
?>
<div class="auth_reg">
    <div class="mini_gallery"></div>
    <div class="form_auth_reg">
        <div class="top__catalog__h1">
            <p>Регистрация</p>
        </div>
        <div class="form_">
            <form action="action/reg.php" method="post">
                <input type="text" name="surname" placeholder="введите свою фамилию" pattern="[а-яА-Я\s\-]+" title="Введите фамилию на русском языке">
                <input type="text" name="name" placeholder="введите свое имя" pattern="[а-яА-Я\s\-]+" title="Введите имя на русском языке">
                <input type="email" name="email" placeholder="введите адрес своей электронной почты" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" title="Введите корректный адрес своей электронной почты!">
                <input type="password" name="password" placeholder="придумайте пароль" pattern="[A-Za-z0-9]{6,}" title="Пароль должен содержать не менее 6 латинских символов или цифр!">
                <button name="reg">Зарегистрироваться</button>
                <p class="mini_btn">У вас уже есть аккаунт? нажмите <a href="login.php">сюда</a></p>
            </form>
            <p style="color: red" class="session_res"><?php
                if(isset($_SESSION['error']['reg'])){
                    echo $_SESSION['error']['reg'];
                    unset ($_SESSION['error']['reg']);
                }
            ?>
            <p style="color: red" class="session_res"><?php
                if(isset($_SESSION['error']['email'])){
                    echo $_SESSION['error']['email'];
                    unset ($_SESSION['error']['email']);
                }
            ?>
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
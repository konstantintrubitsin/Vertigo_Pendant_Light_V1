<?php
    include '../components/core.php';
    include '../components/admin-header.php';

    if(isset($_POST['entrance'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $users = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        $user = mysqli_fetch_assoc($users);
        // var_dump($user);
        if($user['login'] == 'admin') {
            if($user['password'] == 'admin11') {
                $_SESSION['admin']['id'] = $user['id'];
                header('Location: admin_panel.php');
            } else {
                if($user['password'] !== 'admin11') {
                    $error = 'Неверный логин и/или пароль';
                }
            }
        } else {
            if($user['login'] !== 'admin') {
                $error = 'Неверный логин и/или пароль';
            }
        }
    }

    if(!isset($_SESSION['admin'])) {
?>
    <main>
        <form action="admin-auto.php" method="post">
            <div class="auto">
                <div class="auto-block">
                    <div class="auto-block__h">
                        <h3>Авторизация админа</h3>
                    </div>
                    <div class="auto-block__input-login">
                        <input type="text" id="login" name="login" placeholder="Логин" required>
                    </div>
                    <div class="auto-block__input-password">
                        <input type="text" id="password" name="password" placeholder="Пароль" required>
                    </div>
                    <div style="margin-top: 20px">
                            <?php echo $error; ?>
                        </div>
                    <div class="auto-block__button-enter">
                        <button id="autoEnter" type="submit" name="entrance">Войти</button>
                    </div>
                    <div class="auto-block__button-cancel">
                        <button id="autoCancel" type="submit">Отмена</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>
<?php
    } else {
        header('Location: admin_panel.php');
    }
?>
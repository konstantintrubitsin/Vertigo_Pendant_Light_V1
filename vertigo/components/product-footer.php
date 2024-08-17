<footer class="footer" id="contact">
        <div class="container">
        <footer class="footer" id="contact">
    <div class="container">
        <div class="footer-block">
            <div class="footer-block-left">
                <div class="footer-block-left__p">
                    <p>КОНТАКТЫ</p>
                </div>
                <div class="fotter-block-left__contact">
                    <p>г. Омск, ул. Гагарина 10</p>
                </div>
                <div class="footer-block-left__number">
                    <p>8 951 789 78 90</p>
                </div>
            </div>
            <div class="footer-block-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3849.3018335429974!2d73.37184758099278!3d54.993990346901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43aafe17f49a98c1%3A0xbd7031ddd6849111!2z0KTQu9Cw0LPQvNCw0L0!5e0!3m2!1sru!2sru!4v1679119707236!5m2!1sru!2sru" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
            <div class="footer-header" >
            <div class="top__header">
                 <div class="top__header__left">
                    <div class="link logo">
                        <a href="..//index.php">Vertigo</a>
                    </div>
                </div>
                <div class="top__header__center">
                <div class="link">
                <?php 
                            if(isset($_SESSION['admin'])) {
                        ?>
                        <a href="#stock">О нас</a>
                        <a href="..//product-main.php">Товары</a>
                        <a href="..//index.php#contact">Контакты</a>
                        <a href="..//product/admin_panel.php">Редактор</a>
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
                <div class="top__header__right footer">
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
            </div>
        </div>
    </footer>
  <script src="../components/swiper/swiper.min.js"></script>
    <script src="../components/slider/js/jquery.js"></script>
    <script src="../components/slider/js/slick.js"></script>
    <script src="../components/scroll/aos.js"></script>
    <script src="../components/modal/modal.js"></script>
    <script src="../components/slider/js/script.js"></script>
</body>
</html>
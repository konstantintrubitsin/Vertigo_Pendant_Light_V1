<?php
    include '../components/admin-header.php';

    if(isset($_SESSION['admin'])) {
?>
    <main class="main">
        <div class="container">
            <div class="main-basket-block">
                <div class="main-basket-item">
                    <div class="main-basket-item__img">
                        <img src="../assets/img/basket-item.png" alt="">
                    </div>
                    <div class="main-basket-item-name">
                        <p>Apple IPhone 11 Black, 1шт</p>
                    </div>
                    <div class="main-basket-item-cost">
                        <h3>169$</h3>
                    </div>
                    <div class="main-basket-item-status">
                        <div class="main-basket-status__left">
                            <p>Статус</p>
                        </div>
                        <div class="main-basket-status__right">
                            <p id="status">В обработке</p>
                        </div>
                    </div>
                    <div class="main-basket-item-number">
                        <div class="main-basket-status__left">
                            <p>Телефон</p> 
                        </div>
                        <div class="main-basket-status__right">
                           <p>89026798495</p> 
                        </div>
                    </div>
                    <div class="main-basket-accept">
                        <button id="accept">Принять заказ</button>
                    </div>
                    <div class="main-basket-decline">
                        <button id="decline">Отклонить заказ</button>
                    </div>
                </div>
                <div class="main-basket-item">
                    <div class="main-basket-item__img">
                        <img src="../assets/img/basket-item.png" alt="">
                    </div>
                    <div class="main-basket-item-name">
                        <p>Apple IPhone 11 Black, 1шт</p>
                    </div>
                    <div class="main-basket-item-cost">
                        <h3>169$</h3>
                    </div>
                    <div class="main-basket-item-status">
                        <div class="main-basket-status__left">
                            <p>Статус</p>
                        </div>
                        <div class="main-basket-status__right">
                            <p id="status">В обработке</p>
                        </div>
                    </div>
                    <div class="main-basket-item-number">
                        <div class="main-basket-status__left">
                            <p>Телефон</p> 
                        </div>
                        <div class="main-basket-status__right">
                           <p>89026798495</p> 
                        </div>
                    </div>
                    <div class="main-basket-accept">
                        <button id="accept">Принять заказ</button>
                    </div>
                    <div class="main-basket-decline">
                        <button id="decline">Отклонить заказ</button>
                    </div>
                </div>
                <div class="main-basket-item">
                    <div class="main-basket-item__img">
                        <img src="../assets/img/basket-item.png" alt="">
                    </div>
                    <div class="main-basket-item-name">
                        <p>Apple IPhone 11 Black, 1шт</p>
                    </div>
                    <div class="main-basket-item-cost">
                        <h3>169$</h3>
                    </div>
                    <div class="main-basket-item-status">
                        <div class="main-basket-status__left">
                            <p>Статус</p>
                        </div>
                        <div class="main-basket-status__right">
                            <p id="status">В обработке</p>
                        </div>
                    </div>
                    <div class="main-basket-item-number">
                        <div class="main-basket-status__left">
                            <p>Телефон</p> 
                        </div>
                        <div class="main-basket-status__right">
                           <p>89026798495</p> 
                        </div>
                    </div>
                    <div class="main-basket-accept">
                        <button id="accept">Принять заказ</button>
                    </div>
                    <div class="main-basket-decline">
                        <button id="decline">Отклонить заказ</button>
                    </div>
                </div>
                <div class="main-basket-item">
                    <div class="main-basket-item__img">
                        <img src="../assets/img/basket-item.png" alt="">
                    </div>
                    <div class="main-basket-item-name">
                        <p>Apple IPhone 11 Black, 1шт</p>
                    </div>
                    <div class="main-basket-item-cost">
                        <h3>169$</h3>
                    </div>
                    <div class="main-basket-item-status">
                        <div class="main-basket-status__left">
                            <p>Статус</p>
                        </div>
                        <div class="main-basket-status__right">
                            <p id="status">В обработке</p>
                        </div>
                    </div>
                    <div class="main-basket-item-number">
                        <div class="main-basket-status__left">
                            <p>Телефон</p> 
                        </div>
                        <div class="main-basket-status__right">
                           <p>89026798495</p> 
                        </div>
                    </div>
                    <div class="main-basket-accept">
                        <button id="accept">Принять заказ</button>
                    </div>
                    <div class="main-basket-decline">
                        <button id="decline">Отклонить заказ</button>
                    </div>
                </div>
                <div class="main-basket-item">
                    <div class="main-basket-item__img">
                        <img src="../assets/img/basket-item.png" alt="">
                    </div>
                    <div class="main-basket-item-name">
                        <p>Apple IPhone 11 Black, 1шт</p>
                    </div>
                    <div class="main-basket-item-cost">
                        <h3>169$</h3>
                    </div>
                    <div class="main-basket-item-status">
                        <div class="main-basket-status__left">
                            <p>Статус</p>
                        </div>
                        <div class="main-basket-status__right">
                            <p id="status">В обработке</p>
                        </div>
                    </div>
                    <div class="main-basket-item-number">
                        <div class="main-basket-status__left">
                            <p>Телефон</p> 
                        </div>
                        <div class="main-basket-status__right">
                           <p>89026798495</p> 
                        </div>
                    </div>
                    <div class="main-basket-accept">
                        <button id="accept">Принять заказ</button>
                    </div>
                    <div class="main-basket-decline">
                        <button id="decline">Отклонить заказ</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php
    } else {
        header('Location: ../index.php');
    }
?>
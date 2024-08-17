<?php
    include '../components/basket-header.php';
?>
<!-- модальное окно -->
    <div class="modal-basket" data-aos="fade-up">
        <div class="modal-basket-container">
            <div class="main-modal__h-input-block">
                <div class="main-modal-exit__input">
                    <input type="button" id="modal-exit" onclick="exit()" value="Закрыть">
                </div>
            </div>
            <div class="modal-basket-text">
                <p>Спасибо за заказ</p>
                <p>Через 15 минут мы Вам перезвоним!</p>
            </div>
        </div>            
    </div>
<main class="main">
    <div class="container">
        <div class="main-basket">
            <div class="top__catalog__h1">
                <h1>Корзина</h1>
            </div>
            <div class="main-basket-block">
                <div class="main-basket-left">
                    <div class="main-basket-left-block">
                        <!-- Отсюда начинается карточка товара -->
                        <div class="main-basket-left-item">
                            <div class="main-basket-left-item__img">
                                <img src="../assets/img/smallmed.png" alt="" id="basket-item">
                            </div>
                            <div class="main-basket-left-item__h3">
                                <h3>Vertigo Medium Pendant light</h3>
                            </div>
                            <div class="main-basket-left-item-block-counter">
                                <div class="main-basket-left-item-block__button">
                                    <button id="counter-less">
                                        -
                                    </button>
                                    <span id="counter">
                                        1
                                    </span>
                                    <button id="counter-more">
                                        +
                                    </button>
                                </div>
                                <div class="main-basket-left-item-count">
                                    <p>89990</p>
                                </div>
                            </div>
                            <div class="main-basket-left-item-delete">
                                <div class="main-basket-left-item-delete__button">
                                    <button id="busket-delete">
                                        Удалить товар
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- А здесь заканчивается -->
                        <div class="main-basket-left-item">
                            <div class="main-basket-left-item__img">
                                <img src="../assets/img/smallmed.png" alt="" id="basket-item">
                            </div>
                            <div class="main-basket-left-item__h3">
                                <h3>Vertigo Medium Pendant light</h3>
                            </div>
                            <div class="main-basket-left-item-block-counter">
                                <div class="main-basket-left-item-block__button">
                                    <button id="counter-less">
                                        -
                                    </button>
                                    <span id="counter">
                                        1
                                    </span>
                                    <button id="counter-more">
                                        +
                                    </button>
                                </div>
                                <div class="main-basket-left-item-count">
                                    <p>78990</p>
                                </div>
                            </div>
                            <div class="main-basket-left-item-delete">
                                <div class="main-basket-left-item-delete__button">
                                    <button id="busket-delete">
                                        Удалить товар
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-basket-right">
                    <div class="main-basket-right__h2">
                        <h2>Оформление заказа</h2>
                    </div>
                    <div class="main-basket__p">
                        <p>2 товара</p>
                        <p>168980</p>
                    </div>
                    <hr>
                    <div class="main-basket__p">
                        <p>Скидка</p>
                        <p>Нет</p>
                    </div>
                    <hr>
                    <div class="main-basker-right__p__input">
                        <p>Выберите город и способ получения</p>
                    </div>
                   <form action="">
                       <div class="main-basket-right-input">
                       <select name="city" id="city">
                            <option value="" disabled>Выберите город</option>
                            <option value="">Омск</option>
                            <option value="">Москва</option>
                            <option value="">Григорий</option>
                       </select>
                        </div>
                        <div class="main-basket-delivery-block">
                            <div class="delivery-block-pickup">
                                <input type="radio" name="delivery" id="pickup">
                                <label for="pickup">Самовывоз</label>
                            </div>
                            <div class="delivery-block-delivery">
                                <input type="radio" name="delivery" id="delivery">
                                <label for="delivery">Доставка</label>
                            </div>
                        </div>
                    <div class="main-basket-delivery-city__input">
                        <input type="text" name="city_delivery" id="city_delivery" placeholder="Введите адрес доставки">
                    </div>
                    <div class="main-basket-payment">
                        <div class="main-basket-payment__p">
                            <p>Оплата заказа</p>
                        </div>
                        <div class="main-basket-payment-card">
                            <div class="payment-card-left">
                                <div class="payment-card-left-number__input">
                                    <input type="number" name="number-card" id="number-card" placeholder="Номер карты" >
                                </div>
                                <div class="payment-card-left-date__input">
                                    <input type="number" name="date-card" id="date-card" placeholder="XX/XX" >
                                </div>
                                <div class="payment-card-left-holder-block">
                                <div class="payment-card-left-holder__input">
                                    <input type="text" name="holder-card" id="holder-card" placeholder="Владелец карты">    
                                </div>
                                <div class="payment-card-left-holder__img">
                                    <img src="../assets/img/card_mir.png" alt="">
                                </div>
                            </div>
                            </div>
                            <div class="payment-card-right">
                                <div class="payment-card-right__span">
                                    <span></span>
                                </div>
                                <div class="payment-card-right-cvc__input">
                                    <input type="number" name="cvc" id="cvc" placeholder="cvc">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-delivary-block">
                        <div class="main-delivary__p">
                            <p>Доставка</p>
                        </div>
                        <div class="main-delivary-cost__p">
                            <p>500</p>
                        </div>
                    </div>
                    <hr>
                    <div class="main-busket-total-block">
                        <div class="main-busket-total__h">
                            <h1>Итого</h1>
                        </div>
                        <div class="main-busket-total__count">
                            <h1>169480</h1> 
                        </div>
                    </div>
                    <div class="main-busket-consent">
                        <input type="checkbox" name="consent" id="consent">
                        <label for="consent" id="consent__label"> Я даю согласие на обработку моих персональных данных согласно <font color="#C14231"> политике конфиденциальности</font></label>
                    </div>
                    <div class="main-busket-order">
                        <div class="main-busket-order__button">
                            <button id="busket-order" onclick="order()"> Сделать заказ</button>
                        </div>
                    </div>
                   </form>
                </div>
                
            </div>

        </div>
    </div>
</main>
<?php
    include '../components/basket-footer.php';
?>
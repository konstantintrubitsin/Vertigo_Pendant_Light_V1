
<?php
    include 'components/header.php';
    $products = mysqli_query($link, "SELECT * FROM `products`");
    $baseModel = mysqli_query($link, "SELECT * FROM `makes`");
    $baseColor = mysqli_query($link, "SELECT * FROM `colors`");
    

    if(isset($_GET['more'])) {
        $radio_color = $_GET['radio_color'];
        $radio_model = $_GET['radio_model'];
        $min = $_GET['min'];
        $max = $_GET['max'];

        if(isset($_GET['radio_color'])) {
            if(isset($where)) {
                $where .= " AND `product_colors`.`color_id` = '$radio_color' ";
            } else {
                $where = " `product_colors`.`color_id` = '$radio_color' ";
            }
        }


        if(isset($_GET['radio_model'])) {
            if(isset($where)) {
                $where .= " AND `makes`.`id` = '$radio_model' ";
            } else {
                $where = " `makes`.`id` = '$radio_model' ";
            }
        }

        if(isset($_GET['min']) or isset($_GET['max'])) {
            if(isset($where)) {
                $where .= " AND `products`.`price` BETWEEN '$min' AND '$max' ";
            } else {
                $where = " `products`.`price`BETWEEN '$min' AND '$max' ";
            }
        }

        if(!empty($where)) {
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id` 
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id` WHERE $where
                GROUP BY `products`.`id`");
        } else {
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id` 
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id`
                GROUP BY `products`.`id`");
        }
    }
?>
<main class="about-section">
  <div class="container">   
    <div class="main-top">
     <div class="about_h1" id="top__catalog__h1">
                <p>Компания</p>
            </div>
    <div class="about-grid">
        <div class="about-item">
        </div> 
      <div class="about-item">
        <p>Vertigo ищет формы выражения, наполненные чувственностью и поэзией. Каждая коллекция – это дверь в мечту.
            Не забывая и о смелых, причудливых, а иногда и сюрреалистических аспектах, которые выделяют бренд и являются отличительными чертами его уникального стиля.
            Каждая коллекция – это история, которую нужно прожить.
            Последние 10 лет Vertigo ищет смелые, вдохновляющие и необычные произведения. Каждая коллекция — это приглашение отправиться в новое путешествие по стране грез.</p>
      </div>
      <div class="about-item">
        <p>Подвесной светильник Vertigo, задуманный как «кабинный светильник», поэтичен, графичен и вне времени. Лично я поклонник его органичной формы, тени, которую он создает на стенах и потолке, а также его движения, когда он подхвачен легким ветерком.
            С момента своего создания в 2010 году он зарекомендовал себя в самых красивых интерьерах. Мы находим его в гостиной, спальне или даже на лестнице, и во всех случаях его присутствие неоспоримо.</p>
      </div>
      <div class="about-item">
        <img src="./assets/img/adress1.png" alt="Качество">
        <p class='mini-title'>ADRESS: 14 rue Cave, 75018 Paris</p>
    </div>
        <div class="about-item">
        <img src="./assets/img/adress2.png" alt="Качество">
        </div>
        <div class="about-item">
        </div> 
  </div>
</div>
</main>

<main class="about-section">
  <div class="container">   
    <div class="main-top">
     <div class="lamp_h1" id="top__catalog__h1">
                <p>Светильник</p>
            </div>
    <div class="about-grid">
        <div class="about-item combined">
        <img src="./assets/img/about-fullamp.png" alt="Качество">
        </div> 
    </div>
    <div class="about-grid border">
        <div class="about-item">
        <a class="order aboutbut" href="product-main.php">Выбрать лампу</a>
        </div> 
        <div class="about-item">
        <div class="about-designer">
                                <p class='mini-title'>Размеры:</p>
                                <p>Small: 110cm </p>
                                <p>Medium: 140cm</p>
                                <p>Large: 200cm</p>
                            </div>
                            <div class="about-designer">
                                <p class='mini-title'>Материалы:</p>
                                <p>Стекловолокно, сталь, полиуретан Тканевый кабель, белый или черный, 3 м. Кабель длиной 10 м продается отдельно. Розетка и потолочный стакан из белого или черного пластика.</p>
                                
                            </div>
                            <div class="about-designer">
                                <p class='mini-title'>Освещение:</p>
                                <p>UE: мощность освещения макс. 60 Вт; Цокольная лампа Е27.
                                Великобритания: Мощность освещения макс. 60 Вт; Цоколь лампы E27
                                Мощность > 220–240 В, 50–60 Гц</p>
                            </div>
</div>
        <div class="about-item">
            <p>Подвесной светильник Vertigo в форме женской шляпки выражает французскую моду и романтику. Изготовлен из стекловолокна и полиуретана, корпус и металлическая потолочная пластина. Доступен в трех размерах и четырех вариантах отделки.
                Подвесной светильник Vertigo — это символ Vertigo. Созданный дизайнером Констанс Гиссе, он вызвал энтузиазм профессионалов дизайна. Эта большая дизайнерская люстра, получившая признание Россаны Орланди очень рано, вошла в антологию престижных постоянных коллекций, таких как Moma, CAP и MAD. Но плебисцит исходил и от общественности. Помимо достигнутого успеха, подвесной светильник Vertigo получил общественную награду в 2006 году на вилле Ноай.</p>
        </div> 
        </div> 
    </div>
  </div>
</main>         
<main class="about-section">
  <div class="container">   
    <div class="main-top">
     <div class="about_h1" id="top__catalog__h1">
                <p>Создатель</p>
            </div>
    <div class="about-grid ">
    <div class="about-item">
        <img src="./assets/img/constance1.png" alt="Качество">
    </div>
        <div class="about-item">
        <img src="./assets/img/constance2.png" alt="Качество">
        </div>
        <div class="about-item"></div> 
        <div class="about-item"></div> 
        <div class="about-item">
            <p>Констанс Гиссе основала свою студию, специализирующуюся на дизайне, архитектуре интерьера и сценографии, в 2009 году. Ее творчество отмечено поиском баланса между эргономикой, деликатностью и фантазией. Его объектами являются попытки исследовать воплощение движения через легкость или неожиданность, защищая при этом требование комфорта и гостеприимства тел и их жестов.
                После учебы в ESSEC и Sciences Po, а затем года в Парламенте Токио, Констанс Гиссе решила заняться творчеством и поступила в ENSCI – Les Ateliers, который окончила в 2007 году.
                В 2008 году она получила Гран-при города Парижа за дизайн, приз публики на параде дизайна на вилле Ноай и два проектных гранта от VIA. В 2010 году она была названа Дизайнером года по версии Salon Maison & Objet и выиграла премию Audi Talents Awards.</p>
        </div> 
        <div class="about-item">
            <p>Констанс Гиссе сотрудничает со многими французскими и международными мебельными издательствами, такими как Vertigo, Mustache, Tectona, Nature & Découvertes, Molteni&C, LaCividina, ZaoZuo и др. Студия также разрабатывает промышленные объекты для LaCie – Seagate или украшения для MiniMasterpiece Gallery, для пример.
                Его объекты сегодня являются частью коллекций FNAC (аквариум с двухуровневой клеткой), CNAP (лампа Vertigo) и Национального центра искусства и культуры Жоржа-Помпиду (лампа Левиоза).
                С 2009 года Констанс Гиссе создавала декорации для спектаклей, в частности, для балетов «Венамбюль», «Ночные ночи», «Фреска» и «Зимний путь» Анжелена Прельжокажа, концерта Лорана Гарнье в зале «Плейель» и хореографии «Everyness» труппы Вана Рамиреса.</p>
        </div>
        </div> 
    </div>
  </div>
</main>         
<?php
    include 'components/footer.php';
?>
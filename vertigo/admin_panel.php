<?php
    include 'components/core.php';
    include 'components/header.php';

    if(!isset($_SESSION['user'])){
      header("location: index.php");
      }
      else{
        if($_SESSION['user']['isAdmin'] != 1){
        header("location: index.php");
      }
    }

    $user = $link->query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['user']['id']}'");
?>
<div class="container">
<div class="admin_panel">
    <div class="top__catalog__h1">
        <p>Админ панель</p>
    </div>
    <div class="block_btn_admin_panel">
        <a href="product-main.php">
            <button>Список товаров</button>
        </a>
    </div>
</div>
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
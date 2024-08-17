<?php
   include '../components/core.php';

   //добавление картинки товару
   if(isset($_POST['addImg'])) {
       $idProduct = $_POST['product_id_img'];
       $img = $_POST['addImg_file'];

       $uploaddir = '../assets/img/';
       $name_img = uniqid().'.'.substr($_FILES['addImg_file']['type'], 6);
       $uploadfile = $uploaddir . $name_img;
       if('image' == substr($_FILES['addImg_file']['type'], 0, 5)) {
           if(move_uploaded_file($_FILES['addImg_file']['tmp_name'], $uploadfile)) {
           mysqli_query($link, "INSERT INTO `gallery`(`id`, `product_id`, `img`) VALUES (NULL, '$idProduct', '$name_img')");
           header('Location: admin_panel.php');
         }
      }
   }

      // удаление картинки
  if(isset($_POST['btn-del-img'])) {
   $del_img_id = $_POST['del_img_id'];

   mysqli_query($link, "DELETE FROM `gallery` WHERE `id` = '$del_img_id'");
   header('Location: admin_panel.php');
  }
?>
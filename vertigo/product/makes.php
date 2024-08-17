<?php
    include '../components/core.php';
    include '../components/admin-header.php';

      $makes = mysqli_query($link, "SELECT * FROM `makes`");

   // добавление модели
   if(isset($_POST['addModel'])) {
      $model = $_POST['nameModel'];

      mysqli_query($link, "INSERT INTO `makes`(`id`, `model`) VALUES (NULL, '$model')");
      header('Location: makes.php');
   }

   // удаление модели
   if(isset($_POST['delModel'])) {
      $delModel = $_POST['idModel'];
      
      mysqli_query($link, "DELETE FROM `makes` WHERE `id` = '$delModel'");
      header('Location: makes.php');
   }

    if(isset($_SESSION['admin'])) {
?>

<h1 style="margin-top: 50px; text-align: center; font-style: normal; font-weight: 900; font-size: 30px; line-height: 63px; color: #1C1C1C;">Добавление модели</h1>

<form action="makes.php" method="post" style="max-width: 1000px; margin: 0 auto;">
            <div class="main-admin-block-update" id="update_Tovar" style=" margin-top: 50px; display: flex; justify-content: center;">
                <div class="main-admin-update-inputs" style="margin: 0;">
                    <div class="main-admin-update-inputs-newName">
                        <input type="text" id="nameModel" name="nameModel" placeholder="Название модели" required>
                    </div>
                    <div class="main-admin-block-right-updateTovar">
                        <button id="addModel" name="addModel">Добавить модель</button>
                    </div>
                </div>
            </div>
        </form>

<div style="max-width: 500px; margin: 0 auto;">
      <?php 
         while($row_model = mysqli_fetch_assoc($makes)) {
            ?>
            <form action="makes.php" method="post">
               <div class="cell" style="display: flex; align-items: center; justify-content: space-between; font-size: 20px; margin-bottom: 25px; border: 1px solid #C14231; padding: 5px; border-radius: 5px;">
               <input id="idModel" name="idModel" type="text" value="<?php echo $row_model['id']; ?>" hidden>
               <?php echo $row_model['model']; ?>
               <button id="delModel" name="delModel" type="submit" style="background-color: #C14231; border-radius: 5px; padding: 5px; color: white;">Удалить</button>
               </div>
            </form>
            <?php 
         }
      ?>
</div>

<?php
   } else {
      header('Location: ../index.php');
   }
?>
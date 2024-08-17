<?php
    include '../components/core.php';
    include '../components/admin-header.php';

   $colr = mysqli_query($link, "SELECT * FROM `colors`");

   // добавление цвета
   if(isset($_POST['addColor'])) {
      $color = $_POST['nameColor'];

      mysqli_query($link, "INSERT INTO `colors`(`id`, `color`) VALUES (NULL, '$color')");
      header('Location: colors.php');
   }

   // удаление цвета
   if(isset($_POST['delColor'])) {
      $delColr = $_POST['idColor'];
      
      mysqli_query($link, "DELETE FROM `colors` WHERE `id` = '$delColr'");
      header('Location: colors.php');
   }

    if(isset($_SESSION['admin'])) {
?>

<h1 style="margin-top: 50px; text-align: center; font-style: normal; font-weight: 900; font-size: 30px; line-height: 63px; color: #1C1C1C;">Добавление цвета</h1>

<form action="colors.php" method="post" style="max-width: 1000px; margin: 0 auto;">
            <div class="main-admin-block-update" id="update_Tovar" style=" margin-top: 50px; display: flex; justify-content: center;">
                <div class="main-admin-update-inputs" style="margin: 0;">
                    <div class="main-admin-update-inputs-newName">
                        <input type="text" id="nameColor" name="nameColor" placeholder="Название цвета" required>
                    </div>
                    <div class="main-admin-block-right-updateTovar">
                        <button id="addColor" name="addColor">Добавить цвет</button>
                    </div>
                </div>
            </div>
        </form>

<div style="max-width: 500px; margin: 0 auto;">
      <?php 
         while($row_color = mysqli_fetch_assoc($colr)) {
            ?>
            <form action="colors.php" method="post">
               <div class="cell" style="display: flex; align-items: center; justify-content: space-between; font-size: 20px; margin-bottom: 25px; border: 1px solid #C14231; padding: 5px; border-radius: 5px;">
               <input id="idColor" name="idColor" type="text" value="<?php echo $row_color['id'] ?>" hidden>
               <div style="display: flex; align-items: center; gap: 10px;">
               <div class="circle-color" style="width: 25px; height: 25px; border: 1px solid rgba(0, 0, 0, 0.25); border-radius: 50%; background-color: <?php echo $row_color['color']; ?>;"></div>
               <?php echo ' - ' . $row_color['color']; ?>
               </div>
               <button id="delColor" name="delColor" type="submit" style="background-color: #C14231; border-radius: 5px; padding: 5px; color: white;">Удалить</button>
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
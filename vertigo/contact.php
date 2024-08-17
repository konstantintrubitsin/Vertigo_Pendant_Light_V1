
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
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`product_memory`.`ROM_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id`  
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id` WHERE $where
                GROUP BY `products`.`id`");
        } else {
            $choice = mysqli_query($link, "SELECT MAX(`product_colors`.`color_id`), MAX(`product_memory`.`ROM_id`), MAX(`makes`.`id`), `products`.*
            FROM `products` 
                LEFT JOIN `product_colors` ON `product_colors`.`product_id` = `products`.`id` 
                LEFT JOIN `makes` ON `products`.`model_id` = `makes`.`id`
                GROUP BY `products`.`id`");
        }
    }
?>

<?php
    include 'components/footer.php';
?>
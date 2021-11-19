<?php
     include_once '../model/db_config.php';

    $sql = "SELECT * FROM sub_categories";
    $execute = mysqli_query($link,$sql);
    if($execute->num_rows>0){
        while($row=$execute->fetch_assoc()){
            echo '<tr>';
               echo '<td>' .$row['sub_cat_name'].'</td>';
               echo '<td>' .$row['sub_cat_code'].'</td>';
                echo '<td>' .'Edit' .'</td>';
                echo '<td>' .'Delete' .'</td>';
                echo '</tr>';
        }
    }
?>
               
 
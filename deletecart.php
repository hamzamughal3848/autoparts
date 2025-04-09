<?php
    include "conn.php";


    $sql = "DELETE FROM cart";
    $result = mysqli_query($conn,$sql);
    header('location:product.php');

 ?>

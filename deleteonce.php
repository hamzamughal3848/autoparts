<?php
    include "conn.php";

    $id = $_GET['id'];
    $sql = "DELETE FROM cart WHERE `cart`.`id` = '$id'";
    $result = mysqli_query($conn,$sql);
    header('location:check_order.php');

 ?>

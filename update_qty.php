<?php
  include "conn.php";
  $sql = "SELECT * FROM cart";
  $result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)){

      $id = $row['p_id'];
      echo $id;
      $qty = $row['qty'];
      $sql_3 =    "SELECT * FROM product WHERE id = '$id'";
      $result3 = mysqli_query($conn,$sql_3);
      while ($row_2 = mysqli_fetch_assoc($result3)) {
        $p_qty = $row_2['qty'];
      }
      $new_qty =  $p_qty - $qty;
        $sql_2 =    "UPDATE `product` SET `qty` = '$new_qty' WHERE `product`.`id` = '$id'";
        $result2 = mysqli_query($conn,$sql_2);

      header('location:deletecart.php');
}
header('location:deletecart.php');

 ?>

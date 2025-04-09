<?php
  include "conn.php";
  $id = $_POST['p_id'];
  $qty = $_POST['qty'];
  $sql = "UPDATE product SET qty = '$qty' WHERE id = '$id'";
  $result = mysqli_query($conn,$sql);

?>

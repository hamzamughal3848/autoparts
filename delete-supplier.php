<?php

  include 'conn.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM suppliers  WHERE id = '$id'";
  $result = mysqli_query($conn,$sql);
  header('location:suppliers.php');
?>

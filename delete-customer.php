<?php

  include 'conn.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM customers  WHERE id = '$id'";
  $result = mysqli_query($conn,$sql);
  header('location:customers.php');
?>

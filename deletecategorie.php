<?php
  include('conn.php');
  $id = $_GET['id'];
  $sql = "DELETE FROM categories WHERE id = '$id'";
  $result = mysqli_query($conn,$sql);
  header("location:categories.php");
?>

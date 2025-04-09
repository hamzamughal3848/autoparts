<?php
  $id = $_GET['id'];
  include 'header.php';
 ?>

<div id="confirm-model" style="">
  <div id="confirm-model-box">
    <h5>Are you Sure you want to delete</h5>
    <a href="delete-product.php?id=<?php echo $id; ?>"><button class="btn btn-success">Confirm</button></a>
    <a type="button" name="button" class="btn btn-danger" id="close-btn" href="product.php">Close</a>
  </div>
</div>

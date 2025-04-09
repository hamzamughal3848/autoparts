<?php
      include ('conn.php');
      $id =  $_POST['id'];
      $name =  $_POST['name'];
      $categorie =  $_POST['option'];
      $qty =  $_POST['qty'];

      $p_price =  $_POST['p-price'];
      $s_price =  $_POST['sale-price'];
      $sql = "UPDATE product SET name = '$name', categorie = '$categorie' ,  qty = '$qty' , p_price = '$p_price' , s_price = '$s_price' WHERE id = '$id'";
      $result = mysqli_query($conn,$sql);
      header('location:product.php');

?>

<?php
      include ('conn.php');
      $id =  $_POST['id'];
      $name =  $_POST['name'];
      $adress =  $_POST['adress'];
      $phone =  $_POST['phone'];
      $sql = "UPDATE customers SET name = '$name', adress = '$adress' , phone = '$phone'  WHERE id = '$id'";
      $result = mysqli_query($conn,$sql);

?>

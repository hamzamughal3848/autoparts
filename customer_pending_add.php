<?php
      include ('conn.php');
        $id =  $_POST['id'];
      $name =  $_POST['name'];
      $c_name =  $_POST['customer_car'];
      $p_pending =  $_POST['pending_payment'];
      $sql = "INSERT INTO customers_pending(customer_id,customer_name,customer_car,pending_payment) values('$id','$name','$c_name','$p_pending')";
      $result = mysqli_query($conn,$sql);
      header('location:customers.php')
?>

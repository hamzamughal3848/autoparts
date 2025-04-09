<?php
  include "conn.php";
    $id = $_POST['id'];
  $name = $_POST['name'];
  $customer = $_POST['customer'];
  if(isset($_POST['customer_car'])){
    $customer_car = $_POST['customer_car'];
  }else{
    $customer_car = "";
  }
  $qty = $_POST['qty'];
      $sql = "SELECT * FROM product WHERE id = '$id'";
      $result = mysqli_query($conn,$sql);
      while($row_3 = mysqli_fetch_assoc($result)){
        $total_qty = $row_3['qty'];
        $new_qty = $total_qty - $qty;
      }
      if($total_qty >= $qty ){
  $p_price = $_POST['p_price'];
  $s_price = $_POST['s_price'];
  $date = $_POST['date'];
  if(empty($customer_car)){
    $sql_3 = "INSERT INTO cart(p_id,p_name,qty,p_price,s_price,date) values('$id','$name','$qty','$p_price','$s_price','$date')";
    $result_3 = mysqli_query($conn,$sql_3);
    $sql_4 = "UPDATE product SET qty = '$new_qty' WHERE id = '$id'";
    $result_4 = mysqli_query($conn,$sql_4);
    header('location:check_order.php');
  }else{

    $sql_3 = "INSERT INTO cart(p_id,p_name,customer,customer_car,qty,p_price,s_price,date) values('$id','$name','$customer','$customer_car','$qty','$p_price','$s_price','$date')";
    $result_3 = mysqli_query($conn,$sql_3);
    header('location:check_order.php');
  }
}else{
  header('location:alert_qty.php');
}
 ?>

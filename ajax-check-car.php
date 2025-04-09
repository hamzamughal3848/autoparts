<?php

  include('conn.php');

   $id = $_POST['id'];
   $sql = "SELECT * FROM customers_pending WHERE customer_id =  '$id'";
   $result = mysqli_query($conn,$sql);
   $output = "<label class='my-2'>Select Car</label>";
   $output .= "<br>";
   $output .= '<select class="select my-2" name="customer_car">';
    while ($row_2 = mysqli_fetch_assoc($result)) {
        $output .=    "<option value='";
        $output .=     $row_2['customer_car'];
        $output .= "'>";
        $output .= $row_2['customer_car'];
        $output .= "</option>";

  }
      $output .= "</select>";
      echo $output;
 ?>

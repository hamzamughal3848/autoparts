<?php
    include 'conn.php';
    $search_value = $_POST['value'];
    $sql =  "SELECT * FROM customers WHERE name LIKE '%{$search_value}%' ";
    $result = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
    $output = "";

    if($num_rows != 0){
      $id = 1;
      $output = '   <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"> Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Adress</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody >';
      while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td>".$id;
        $output .= "</td>";
        $output .= "<td>".$row['name'];
        $output .= "</td>";
        $output .= "<td>".$row['phone'];
        $output .= "</td>";
        $output .= "<td>".$row['adress'];
        $output .= "</td>";
        $output .= "<td>".'<a href="customer_pending.php?id='.$row['id'].'" class="btn btn-primary m-1"><i class="bi bi-file-plus"></i></a>'.'<a href="view_customer_recipt.php?id='.$row['id'].'" class="btn btn-primary m-1"><i class="bi bi-receipt"></i></a>'.'<a type="button" name="button" class="btn btn-success m-1" href="edit-customer.php?id='.$row['id'].'"><i class="bi bi-pencil"></i></a>'.'<a abb  name="button" class="btn btn-danger m-1" href="delete-customer-page.php?id='.$row['id'].'"><i class="bi bi-trash"></i></a>';
        $output .= "</td>";
        $output .= "</tr>";
        $id++;
      }
      $output.= '      </tbody></table>';
      echo $output;

    }else{
        $output = '<div class="not-found-text d-flex align-items-center justify-content-center">
             <h1 class="text-white  ">No Result Found</h1>
        </div>';
        echo $output;
    }
 ?>

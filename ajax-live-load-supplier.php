<?php
    include 'conn.php';
    $search_value = $_POST['value'];
    $sql =  "SELECT * FROM suppliers WHERE name LIKE '%{$search_value}%' ";
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
        $output .= "<td>".'<a type="button" name="button" class="btn btn-success m-1" href="edit-suppliers.php?id='.$row['id'].'"><i class="bi bi-pencil"></i></a>'.'<a abb  name="button" class="btn btn-danger m-1" href="delete-supplier-page.php?id='.$row['id'].'"><i class="bi bi-trash"></i></a>';
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

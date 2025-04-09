<?php
    include 'conn.php';
    $search_value = $_POST['value'];
    $sql =  "SELECT * FROM product WHERE name LIKE '%{$search_value}%' ";
    $result = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
    $output = "";

    if($num_rows != 0){
      $id = 1;
      $output = '   <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Name</th>
              <th scope="col">Categorie</th>
              <th scope="col">Purchace Price</th>
              <th scope="col">sale  Price</th>
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
        $output .= "<td>".$row['categorie'];
        $output .= "</td>";
        $output .= "<td>".$row['p_price'];
        $output .= "</td>";
        $output .= "<td>".$row['s_price'];
        $output .= "</td>";
        $output .= "<td>".'<a type="button" name="button" class="btn btn-success" href="edit-product.php?id='.$row['id'].'">Edit</a>'.'<a abb  name="button" class="btn btn-danger" href="delete-page.php?id='.$row['id'].'">Delete</a>';
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

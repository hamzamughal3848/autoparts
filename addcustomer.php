<?php
  $success = false;
  $alert = false;

  include('conn.php');
  if(isset($_POST['Active'])){
    $name =  $_POST['name'];
    $adress =  $_POST['adress'];
    $phone =  $_POST['phone'];
    $sql_1  = "SELECT * FROM customers WHERE name = '$name'";
    $result_1 = mysqli_query($conn,$sql_1);
    $num_rows = mysqli_num_rows($result_1);
    if($num_rows == 0){
      $sql = "INSERT INTO customers(name,adress,phone) values('$name','$adress','$phone')";
      $result = mysqli_query($conn,$sql);
      $success = true;
      header('location:customers.php');
    }else{
      $alert = true;
    }
  }
  $sql2 = "SELECT * FROM categories";
  $result2 = mysqli_query($conn,$sql2);

  include('header.php');
 ?>
  <div class="main-content text-white ">
      <div class="form-bg m-5 ms-auto me-auto">
        <?php if($success){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Customer</strong> Add successfully
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if($alert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Customer</strong> alredy Exists.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <h1 class="text-white p-3">Add Customer</h1>
        <form action="addcustomer.php" method="post">
          <div class="mb-3">
            <label  class="form-label">Customer Name</label>
            <input type="text" class="form-control" placeholder="Customer Name" name="name" required>
          </div>


          <div class="mb-3">
            <label  class="form-label">Address</label>
            <input type="text" class="form-control" placeholder="adress" name="adress" required>
          </div>
          <div class="mb-3">
            <label  class="form-label">Phone</label>
            <input type="number" class="form-control" placeholder="phone" name="phone" required>
          </div>
          <input type="submit" class="btn btn-success" name="Active" value="Submit">
        </form>
      </div>
  </div>

 <?php
   include('footer.php');
?>

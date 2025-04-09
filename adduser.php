<?php
$alert = false;
$success = false;

  include('header.php');
  include('conn.php');
  if (isset($_POST['Active'])) {
    $name = $_POST['name'];
    $f_name = $_POST['f-name'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);
    $sql_1 = "SELECT * FROM user WHERE name = '$name'";
    $result_1 = mysqli_query($conn,$sql_1);
    $num_rows = mysqli_num_rows($result_1);
    if($num_rows == 0){
      $sql = "INSERT INTO user(name,f_name,role,password) values('$name','$f_name','$role','$password')";
      $result = mysqli_query($conn,$sql);
      $success = true;
      header('location:user.php');

    }else{
      $alert = true;
    }
  }
 ?>
  <div class="main-content text-white ">
    <div class="form-bg m-5 ms-auto me-auto">
      <div class="">
        <?php
        if($success){
         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>User</strong> added successfully.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
       }
         if($alert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>User</strong> alredy Exists.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } ?>
        <h3>User</h3>
      </div>
      <form action="adduser.php" method="post">
        <div class="mb-3">
          <label  class="form-label">User Name</label>
          <input type="text" class="form-control" placeholder="Enter Your Product User Name" name="name" required>
        </div>
        <div class="mb-3">
          <label  class="form-label">Full Name</label>
          <input type="text" class="form-control" placeholder="Enter Your Product Full Name" name="f-name" required>
        </div>
        <div class="mb-3">
          <label  class="form-label">Full Name</label><br>
          <select class="" name="role">
            <option value="admin-1">admin-1</option>
            <option value="admin-2">admin-2</option>
            <option value="admin-3">admin-3</option>
          </select>
        </div>
        <div class="mb-3">
          <label  class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn btn-success" name="Active">Submit</button>
      </form>
    </div>
  </div>
 <?php
   include('footer.php');
?>

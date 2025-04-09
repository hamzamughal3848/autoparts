<?php
  $alert = false;

include('conn.php');
      if(isset($_POST['Active'])){
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        $sql_1 = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
        $result_1 = mysqli_query($conn,$sql_1);
        $num_rows = mysqli_num_rows($result_1);
        if($num_rows !== 0){
          session_start();
           $_SESSION['name'] = $name;
          $_SESSION['islogedin'] = true;
          header("Location: index.php");
        }else{
          $alert = true;
        }
      }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="login-bg">
        <div class="login-form">
          <div class="login-form-bg">
            <?php

             if($alert){
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Email/Password</strong> incorrect.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } ?>
            <form action="login.php" method="post">
              <div class="mb-3">
                <label  class="form-label text-white">User Name</label>
                <input type="text" class="form-control" placeholder="Enter Your UserName" name="name">
              </div>
              <div class="mb-3">
                <label  class="form-label text-white">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Passoword" name='password'>
              </div>
              <button type="submit" class="btn btn-success" name="Active">Login</button>
            </form>
          </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

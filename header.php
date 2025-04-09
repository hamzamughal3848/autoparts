<?php
  session_start();
  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    header('Location: login.php');
    exit;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <title>Chugtaiautos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="navbar text-white navbar_first bg-success">
      <div class="logo ">
        <h3 >Chugtai Autos</h3>
      </div>
        <div class="logout">
          <a type="button" name="button" class="btn btn-dark mx-4" href="logout.php">Logout</a>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar_second">
      <div class="container-fluid">
        <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link text-white" aria-current="page" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="user.php">Application User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="customer_recepit.php">Customer recepit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="addproduct.php">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="categories.php">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="customers.php">Customers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="suppliers.php">Suppliers</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

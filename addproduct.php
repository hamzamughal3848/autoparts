<?php
  $success = false;
  $alert = false;

  include('conn.php');
  if(isset($_POST['Active'])){
    $name =  $_POST['name'];
    $categorie =  $_POST['categorie'];
    list($categorie_id, $categorie_name) = explode('|', $categorie);
    $qty=  $_POST['qty'];
    $p_price =  $_POST['p-price'];
    $s_price =  $_POST['sale-price'];
    $sql_1  = "SELECT * FROM product WHERE name = '$name'";
    $result_1 = mysqli_query($conn,$sql_1);
    $num_rows = mysqli_num_rows($result_1);
    if($num_rows == 0){
      $sql = "INSERT INTO product(name,catagorie_id,categorie,qty,p_price,s_price) values('$name','$categorie_id','$categorie_name','$qty','$p_price','$s_price')";
      $result = mysqli_query($conn,$sql);
      $success = true;
      header('location:product.php');
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
              <strong>Product</strong> Add successfully
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if($alert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Product</strong> alredy Exists.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <h1 class="text-white p-3">Add Product</h1>
        <form action="addproduct.php" method="post">
          <div class="mb-3">
            <label  class="form-label">Product Name</label>
            <input type="text" class="form-control" placeholder="Enter Your Product Name" name="name" required>
          </div>
          <div class="mb-3">
            <label  class="form-label">Product Catagorie</label><br>
            <div class="">
              <select class="select_categorie" name="categorie">
                <?php While($row = mysqli_fetch_assoc($result2)){ ?>
                <option value="<?php echo $row['id']; ?>|<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
              </select>
              <br>
              <label  class="form-label my-3">Quantity</label><br>
              <input type="number" name="qty" value="" class="qty" placeholder="qty">
            </div>
          </div>

          <div class="mb-3">
            <label  class="form-label">Purchase Price</label>
            <input type="number" class="form-control" placeholder="Purchase Price" name="p-price" required>
          </div>
          <div class="mb-3">
            <label  class="form-label">Sale Price</label>
            <input type="number" class="form-control" placeholder="Sale Price" name="sale-price" required>
          </div>
          <input type="submit" class="btn btn-success" name="Active" value="Submit">
        </form>
      </div>
  </div>
  <script type="text/javascript">
      jQuery('.select_categorie').chosen();
  </script>
 <?php
   include('footer.php');
?>

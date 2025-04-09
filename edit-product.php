<?php
  $success = false;
  $alert = false;
  include('conn.php');

   $edit_id = $_GET['id'];
   $sql3 = "SELECT * FROM product WHERE id =  '$edit_id'";
   $result3 = mysqli_query($conn,$sql3);

  $sql2 = "SELECT * FROM categories";
  $result2 = mysqli_query($conn,$sql2);
  include('header.php');
 ?>
  <div class="main-content text-white ">
      <div class="form-bg m-5 ms-auto me-auto">

        <h1 class="text-white p-3">Add Product</h1>
        <form action="edit-product-data.php" method="post">
          <?php while ($row = mysqli_fetch_assoc($result3)) { ?>

            <?php $p_price = $row['p_price'];
                $s_price = $row['s_price'];
                $qty = $row['qty'];
            ?>

            <input type="hidden" class="form-control" placeholder="Enter Your Product Name" name="id" value="<?php echo $row['id']; ?>">

          <div class="mb-3">
            <label  class="form-label">Product Name</label>
            <input type="text" class="form-control" placeholder="Enter Your Product Name" name="name" value="<?php echo $row['name']; ?>" required>
          </div>
          <div class="mb-3">
            <label  class="form-label">Product Catagorie</label><br>
            <div class="">

              <select  class="my-2 select_categorie" name="option">
                <option value="<?php echo $row['categorie']; ?>"><?php echo $row['categorie']; ?></option>

                <?php While($row = mysqli_fetch_assoc($result2)){ ?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>

              </select>
              <br>
              <label  class="form-label my-3">Quantity</label><br>
              <input type="number" name="qty"  class="qty" placeholder="qty" value="<?php echo $qty; ?>">
            </div>
          </div>

          <div class="mb-3">
            <label  class="form-label">Purchase Price</label>
            <input type="text" class="form-control" placeholder="Purchase Price" name="p-price" value="<?php echo $p_price; ?>" required>
          </div>
          <div class="mb-3">
            <label  class="form-label">Sale Price</label>
            <input type="number" class="form-control" placeholder="Sale Price" name="sale-price" value="<?php echo $s_price; ?>" required>
          </div>
          <input type="submit" class="btn btn-primary" name="Active">
          <?php } ?>
        </form>
      </div>
  </div>
  <script type="text/javascript">
      jQuery('.select_categorie').chosen();
  </script>
 <?php
   include('footer.php');
?>

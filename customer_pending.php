<?php
  $success = false;
  $alert = false;
  $id =  $_GET['id'];
  include('conn.php');

  $sql2 = "SELECT * FROM customers WHERE id = '$id'";
  $result2 = mysqli_query($conn,$sql2);

  include('header.php');
 ?>
  <div class="main-content text-white ">
      <div class="form-bg m-5 ms-auto me-auto">
        <h1 class="text-white p-3">Add Car</h1>
        <form action="customer_pending_add.php" method="post">
          <?php while($row =  mysqli_fetch_assoc($result2)){ ?>
            <input type="hidden" class="form-control"  name="id" value="<?php echo $row['id']; ?>" required>

          <div class="mb-3">
            <input type="hidden" class="form-control" placeholder="Customer Name" name="name" value="<?php echo $row['name']; ?>" required>
          </div>


          <div class="mb-3">
            <label  class="form-label">customer car</label>
            <input type="text" class="form-control" placeholder="customer car" name="customer_car"  required>
          </div>
          <div class="mb-3">
            <label  class="form-label">pending payment</label>
            <input type="number" class="form-control" placeholder="pending payment" name="pending_payment"  required>
          </div>
          <input type="submit" class="btn btn-success" name="Active" value="Submit">
        <?php } ?>
        </form>
      </div>
  </div>

 <?php
   include('footer.php');
?>

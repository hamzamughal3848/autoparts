<?php
  $success = false;
  $alert = false;
  include('conn.php');

   $id = $_GET['id'];
   $sql = "SELECT * FROM product WHERE id =  '$id'";
   $result = mysqli_query($conn,$sql);

   // $sql_2 = "SELECT * FROM customers JOIN customers_pending customers.id = customers_pending.customer.id ";
   // $result_2 = mysqli_query($conn,$sql_2);

   $sql_2 = "SELECT * FROM customers";
   $result_2 = mysqli_query($conn,$sql_2);
  include('header.php');

    // code...

 ?>

  <div class="main-content text-white ">
      <div class="form-bg m-5 ms-auto me-auto">

        <h1 class="text-white p-3">Order</h1>
        <form action="add_order_data.php" method="post">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <?php $p_price = $row['p_price'];
                      $s_price = $row['s_price'];
                 ?>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>">

          <div class="mb-3">
            <label  class="form-label">Product Name</label> <br>
            <select class="" name="name">
              <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            </select>
          </div>
          <label  class="form-label">Select Customer</label><br>
          <select class="target" name="customer" >
            <option value="0">No value selected</option>
           <?php while ($row_2 = mysqli_fetch_assoc($result_2)) { ?>

               <option value="<?php echo  $row_2['id']; ?>"><?php echo  $row_2['name']; ?></option>

         <?php } ?>
         </select><br>
         <div class="select">

         </div>
          <div class="mb-3">
            <div class="">
              <label  class="form-label my-3">Quantity</label><br>
              <input type="number" name="qty"  class="qty" placeholder="qty" value="<?php echo $qty; ?>" required>
            </div>
          </div>

          <div class="mb-3">
            <label  class="form-label">Purchase Price</label><br>
            <select class="" name="p_price">
              <option value="<?php echo $p_price; ?>"><?php echo $p_price; ?></option>
            </select>
          </div>
          <div class="mb-3">
            <label  class="form-label">Sale Price</label><br>
            <select class="" name="s_price">
              <option value="<?php echo $s_price; ?>"><?php echo $s_price; ?></option>
            </select>
          </div>
          <input type="submit" class="btn btn-primary" name="Active">
          <?php } ?>
        </form>
      </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
    $( ".target" ).on( "change", function() {
        var this_id = $(this).val();
        $.ajax({
          url : "ajax-check-car.php",
          type : "POST",
          data : {id:this_id},
          success : function(data){
            $(".select").html(data);
          }
        })

          } );
      });

  </script>
 <?php
   include('footer.php');
?>

<?php
  $success = false;
  $alert = false;
  include('conn.php');

   $id = $_GET['id'];
   $sql = "SELECT * FROM product ";
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
        <label  class="form-label">Product Name</label><br>
         <select class="" name="">
           <?php while ($row = mysqli_fetch_assoc($result)) {
            ?>
           <option value=""><?php echo $row['name']; ?></option>
           <?php } ?>
         </select>


        <div class="my-3">
          <label  class="form-label">Product Name</label>
          <input type="text" class="form-control" placeholder="Enter Your Product Name" name="name" required>
        </div>

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

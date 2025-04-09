<?php
  include('conn.php');
  $success = false;
  $sql = "SELECT * FROM product ORDER BY id DESC";
  $result = mysqli_query($conn,$sql);
  $sql2 = "SELECT * FROM categories";
  $result2 = mysqli_query($conn,$sql2);

  if(isset($_POST['Active'])){
    $id = $_POST['id'];
      $name = $_POST['name'];
      $qty = $_POST['qty'];
      $p_price = $_POST['p_price'];
      $s_price = $_POST['s_price'];

    $sql_3 = "INSERT INTO cart(p_id,p_name,qty,p_price,s_price) values('$id','$name','$qty','$p_price','$s_price')";
    $result_3 = mysqli_query($conn,$sql_3);
    $success = true;
  }

  include('header.php');
 ?>

 <div class="main-content">
   <div class="hero ">
     <div class="container-fluid">
       <div class="navbar ">
         <div class="select p-3 ">
           <select  class="my-2 target select_categorie" name="option">
             <option value="0">Null</option>
             <?php While($row = mysqli_fetch_assoc($result2)){ ?>
             <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
             <?php } ?>
           </select>
         </div>
         <div class="search p-3 me-auto">
           <input type="text" name="" value="" placeholder="Product Name" class="input" id="search_value" >
         </div>
          <a href="check_order.php" name="button" class="btn-success btn" values=""><i class="bi bi-cart-dash"></i></a>
       </div>
     </div>
   </div>
    <?php
      if($success){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Prodcut</strong> Added Successfully....
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      }
    ?>
</div>
   <div class="table-data">
     <table class="table">
      <thead>
        <tr>
          <th  scope="col">#</th>
          <th  scope="col">Product Name</th>
          <th  scope="col">Categorie</th>
          <th  scope="col">Quantity</th>
          <th  scope="col">Sell Quantity</th>
          <th  scope="col">sale  Price</th>
          <th  scope="col">Discount</th>
          <th  scope="col">Action</th>
        </tr>
      </thead>
      <tbody >
        <?php $no = 1;
         while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['categorie']; ?></td>
          <td><?php echo $row['qty']; ?></td>
          <td><input type="number" class="qty" min="1" max="50" value="1"></td>
          <td><?php echo $row['s_price']; ?></td>
          <td><input type="number" class="discount" min="1" value="0"> </td>

          <td>
          <a href="order.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="bi bi-bag"></i></a>
        </td>
        </tr>

        <?php $no++; } ?>
      </tbody>
      <div class="select">

      </div>
    </table>
   </div>
 </div>

 <script type="text/javascript">
    $(document).ready(function(){
      $( "#search_value" ).on( "keyup", function() {
          var this_value = $(this).val();
          $.ajax({
            url : "ajax-live-load.php",
            type : "POST",
            data : {value:this_value},
            success : function(data){
              $(".table-data").html(data);
            }
          })

      } );

            jQuery('.select_categorie').chosen();


    })
 </script>
 <script type="text/javascript">
 $(document).ready(function(){
   $( ".target" ).on( "change", function() {
       var this_id = $(this).val();
       $.ajax({
         url : "ajax-search-categorie.php",
         type : "POST",
         data : {value:this_id},
         success : function(data){
           $(".table-data").html(data);
         }
       })

         } );
     });

 </script>

 <?php
   include('footer.php');
?>

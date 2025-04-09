<?php

include('conn.php');
$sql = "SELECT * FROM customers ORDER BY id DESC";
$result = mysqli_query($conn,$sql);


  include('header.php');
 ?>
 <div class="main-content">

   <div class="hero ">
     <div class="container-fluid">
       <div class="navbar ">

         <div class="search p-3 me-auto">
           <input type="text" name="" value="" placeholder="coustomer Name" class="input" id="search_value" >
         </div>
         <div class="add-btn">
           <a type="button" name="button" class="btn btn-success" href="addcustomer.php">Add Customer</a>
         </div>
       </div>
     </div>
   </div>


   <div class="table-data">
     <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Phone no</th>
          <th scope="col">Adress</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody >
        <?php $no = 1;
         while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['adress']; ?></td>
          <td><a href="customer_pending.php?id=<?php echo $row['id']; ?>" class="btn btn-primary m-1"><i class="bi bi-file-plus"></i></a>
            <a href="view_customer_recipt.php?id=<?php echo $row['id']; ?>" class="btn btn-primary m-1"><i class="bi bi-receipt"></i></a>
            <a type="button" name="button" class="btn btn-success m-1" href="edit-customer.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil"></i></a>
          <a abb  name="button" class="btn btn-danger m-1" href="delete-customer-page.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a>

        </td>
        </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
   </div>
 </div>

 <script type="text/javascript">
    $(document).ready(function(){
      $( "#search_value" ).on( "keyup", function() {
          var this_value = $(this).val();
          $.ajax({
            url : "ajax-live-load-customer.php",
            type : "POST",
            data : {value:this_value},
            success : function(data){
              $(".table-data").html(data);
            }
          })

      } );


    })
 </script>
 <?php
   include('footer.php');
?>

<?php

include('conn.php');
$sql = "SELECT * FROM suppliers ORDER BY id DESC";
$result = mysqli_query($conn,$sql);


  include('header.php');
 ?>
 <div class="main-content">

   <div class="hero ">
     <div class="container-fluid">
       <div class="navbar ">

         <div class="search p-3 me-auto">
           <input type="text" name="" value="" placeholder="Suppliers Name" class="input" id="search_value" >
         </div>
         <div class="add-btn">
           <a type="button" name="button" class="btn btn-success" href="addsupplier.php">Add Suppliers</a>
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
          <td><a type="button" name="button" class="btn btn-success m-1" href="edit-suppliers.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil"></i></a>
          <a abb  name="button" class="btn btn-danger m-1" href="delete-supplier-page.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a>
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
            url : "ajax-live-load-supplier.php",
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

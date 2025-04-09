<?php

include('conn.php');
$sql = "SELECT * FROM user ORDER BY id DESC";
$result = mysqli_query($conn,$sql);


  include('header.php');
 ?>
 <div class="main-content">

   <div class="hero ">
     <div class="container-fluid">
       <div class="navbar ">

         <div class="search p-3 me-auto">
           <input type="text" name="" value="" placeholder="User Name" class="input" id="search_value" >
         </div>
         <div class="add-btn">
           <a type="button" name="button" class="btn btn-success" href="adduser.php">Add User</a>
         </div>
       </div>
     </div>
   </div>


   <div class="table-data">
     <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">User Name</th>
          <th scope="col">Full Name</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody >
        <?php $no = 1;
         while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['f_name']; ?></td>
          <td><?php echo $row['role']; ?></td>
          <td>
          <a abb  name="button" class="btn btn-danger m-1" href="user-delete-page.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a>
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
            url : "ajax-live-load-user.php",
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

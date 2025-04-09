<?php
$id = $_GET['id'];
include('conn.php');
$sql = "SELECT * FROM customers_pending WHERE customer_id = '$id' ORDER BY id DESC";
$result = mysqli_query($conn,$sql);


  include('header.php');
 ?>
 <div class="main-content">

   <div class="hero ">
     <div class="container-fluid">
       <div class="navbar ">

         <div class="search p-3 me-auto">
           <input type="text" name="" value="" placeholder="search car" class="input" id="search_value" >
         </div>

       </div>
     </div>
   </div>


   <div class="table-data">
     <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Customer Car</th>
          <th scope="col">Pending Payment</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody >
        <?php $no = 1;
         while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['customer_name']; ?></td>
          <td><?php echo $row['customer_car']; ?></td>
          <td><?php echo $row['pending_payment']; ?></td>
          <td>
            <a type="button" name="button" class="btn btn-success m-1" href="view-recpit.php?id=<?php echo $row['customer_car']; ?>"><i class="bi bi-receipt"></i></a>
          <a   name="button" class="btn btn-danger m-1" href="delete-pending-page.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a>

        </td>
        </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
   </div>
 </div>


 <?php
   include('footer.php');
?>

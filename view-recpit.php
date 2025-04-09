<?php
  include('conn.php');
  $id = $_GET['id'];
  $sql = "SELECT * FROM cart WHERE customer_car = '$id'";
  $result = mysqli_query($conn,$sql);

  $num_rows = mysqli_num_rows($result);




  include('header.php');
  if($num_rows != 0){
 ?>
 <div class="table-data">
   <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Car</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody >
      <?php $no = 1;

       while($row = mysqli_fetch_assoc($result)){ ?>
      <tr>
        <form class="" action="product.php" method="post">
        <td><?php echo $no; ?></td>
        <td><?php echo $row['p_name']; ?></td>
        <?php

            $c_id = $row['customer'];

            $sqli = "SELECT * FROM customers WHERE id = '$c_id'";
            $resulti = mysqli_query($conn,$sqli);
            if(mysqli_num_rows($resulti) != 0){
            while($row_2 = mysqli_fetch_assoc($resulti)){
         ?>
        <td><?php echo $row_2['name']; ?></td>
      <?php } }else{ ?>
          <td></td>
          <?php } ?>
        <td><?php echo $row['customer_car']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <?php $price = $row['qty'] * $row['s_price']; ?>
        <td><?php echo $price; ?></td>
        <td><?php echo $row['date']; ?></td>


        <td>
        <a name="button" class="btn btn-danger" href="deleteonce.php?id=<?php echo $row['id']; ?>" ><i class="bi bi-trash"></i></a>
      </td>
      </form>
      </tr>

      <?php $no++; } ?>


      </tbody>

  </table>

 </div>
<?php }else{ ?>
<div class="not-found-text d-flex align-items-center justify-content-center">
     <h1 class="text-white  ">No Record Found</h1>
</div>
 <?php
 }
   include('footer.php');
?>

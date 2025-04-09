<?php
  include('conn.php');

  if(isset($_POST["submit"])){
  $catagorie = $_POST['catagorie'];
  $option = $_POST['option'];
  $sql = "INSERT INTO categories(name,parent_id) values('$catagorie','$option')";
  $query = mysqli_query($conn,$sql);
  }


  $sql2 = "SELECT * FROM categories";
  $result2 = mysqli_query($conn,$sql2);
  $id = $_GET['id'];
  $name = $_GET['name'];
  $sql3 = "SELECT * FROM categories WHERE parent_id = '$id'";
  $result3 = mysqli_query($conn,$sql3);

  include('header.php');
 ?>
  <div class="container-fluid">
    <div class="row d">
      <div class="col-md-5">
          <div class="categories-bg m-5">

          <form method="post" action="categories.php">
            <div class="mb-3">
              <label  class="form-label text-white"><h3 class="text-white">Add Categorie</h3></label>
              <input type="text" class="form-control" placeholder="Categoris" name="catagorie">
              <select  class="my-2" name="option">
                <option value="0">Null</option>
                <?php While($row = mysqli_fetch_assoc($result2)){ ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>

              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
      </div>
      <div class="col-md-5">
        <div class="categories_list">
          <h3 class="text-white"><?php echo $name; ?></h3>
          <?php while($row = mysqli_fetch_assoc($result3)){ ?>
          <p class="text-white"><?php echo $row['name'] ?></p>
          <a href="checkcategorie.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>">check</a>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
 <?php
   include('footer.php');
?>

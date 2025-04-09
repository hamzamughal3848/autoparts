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
  $sql3 = "SELECT * FROM categories WHERE parent_id = 0";
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
        <div class="">
          <h3 class="text-white">categories list</h3>
          <form>
            <input type="text" id="id">
            <button type="button" name="button" class="load-btn">Load</button>
          </form>
          <div class="list-data">

          </div>
        </div>
      </div>
    </div>
  </div>
    <script type="text/javascript">
        $(document).ready(function(){
          $(".load-btn").click(function(){
            $.ajax({

              url : "ajax-load.php",
              type : "POST",
              success : function(data){
                $(".list-data").html(data).show;
              }
            });
            });
        });

    </script>
 <?php
   include('footer.php');
?>

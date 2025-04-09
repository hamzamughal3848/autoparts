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
    <div class="row ">
      <div class="col-md-5">
          <div class="categories-bg m-5">

          <form method="post" action="categories.php">
            <div class="mb-3">
              <label  class="form-label text-white"><h3 class="text-white">Add Categorie</h3></label>
              <input type="text" class="form-control" placeholder="Categoris" name="catagorie" required>
              <select  class="my-2 select_categorie" name="option">
                <option value="0">Null</option>

                <?php While($row = mysqli_fetch_assoc($result2)){ ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>

              </select>

            </div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
          </form>
        </div>
      </div>
      <div class="col-md-5">
        <div class="categories_list">
          <h3 class="text-white">categories list</h3>
          <select  class="my-2 target" name="option">
            <option value="0">Null</option>
            <?php While($row = mysqli_fetch_assoc($result3)){ ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
          <div class="select">

          </div>
          <div class="select-2">

          </div>
          <div class="select-3">

          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
      jQuery('.select_categorie').chosen();
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $( ".target" ).on( "change", function() {
        var this_id = $(this).val();
        $.ajax({
          url : "ajax-load.php",
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

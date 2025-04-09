<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="navbar text-white">
      <div class="logo ">
        <h3 >Chugtais Autos</h3>
      </div>
        <div class="login">
        <h3>Logins</h3>
      </div>
    </div>
    <div class="side-bar ">
      <button id="hide" class="btn btn-success m-2"><i class="bi bi-caret-left"></i></button>
      <button id="show" class="btn btn-success m-2"><i class="bi bi-caret-right"></i></button>
        <ul>
          <a href=""><li><i class="bi bi-speedometer"></i><span class="hitem">Dash Board</span></li></a>
          <a href=""><li><i class="bi bi-bar-chart-steps"></i><span class="hitem">Prodct Catagorie</span></li></a>
          <a href=""><li><i class="bi bi-person-circle"></i><span class="hitem">Application User</span></li></a>
          <a href=""><li><i class="bi bi-box-seam"></i><span class="hitem">Product</span></li></a>
          <a href=""><li><i class="bi bi-person-vcard"></i><span class="hitem">Coustomers Details</span></li></a>
        </ul>
    </div>
    <div class="main-content">
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#hide").click(function(){
        $(".hitem").hide();
      });
      $("#show").click(function(){
        $(".hitem").show();
      });
    });
    </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
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



  function showcategorie($parentid){
        include('conn.php');
      $sql = "SELECT * FROM categories WHERE parent_id   = '$parentid'";
      $result = mysqli_query($conn,$sql);
      $output = '<ul class="list">';
      while($row = mysqli_fetch_array($result)){
        $output.= "<li>".$row['name'];
        $output.= '<a href="deletecategorie.php?id='.$row['id'].'"><i class="bi bi-x-circle mx-2 text-danger"></i></a>';
        $output.= showcategorie($row['id']);
        $output.= "</li>";

      }
      $output.= "</ul>";
      return $output;
    }
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
          <h3 class="text-white">categories list</h3>
          <div class="table-content ">
            <div class="sub-menu">
              <?php echo showcategorie(0); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php
   include('footer.php');
?>
<?php $no = 1;
 while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

  <td><?php echo $no; ?></td>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['categorie']; ?></td>
  <td><?php echo $row['p_price']; ?></td>
  <td><?php echo $row['s_price']; ?></td>

  <td><a type="button" name="button" class="btn btn-success" href="edit-product.php?id=<?php echo $row['id'] ; ?>">Edit</a>

  <a name="button" class="btn btn-danger show-btn" href="delete-page.php?id=<?php echo $row['id'] ?>">Delete</a>
</td>

</tr>

<?php $no++; } ?>

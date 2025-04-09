<?php
  include "conn.php";
  $id = $_POST['id'];
  $sql = "SELECT * FROM categories WHERE parent_id = '$id'";
  $result = mysqli_query($conn,$sql);
  if($id <= 0){
    echo "<h4 class='text-danger'>No more categorie found</h4>";

  }else{
    $output = "<select class='target-3 my-2' name='option'>";
    $output.= '<option value="0">Null</option>';

  while ($row = mysqli_fetch_assoc($result)) {

    $output.= "<option value='" .$row['id'].   " '>".$row['name'];
    $output.= "</option>";

  }
    $output.= "</select>";

    echo $output;

  }
?>

<script type="text/javascript">
$(document).ready(function(){
  $( ".target-3" ).on( "change", function() {
      var this_id = $(this).val();
      $.ajax({
        url : "ajax-new-load.php",
        type : "POST",
        data : {id:this_id},
        success : function(data){
          $(".select-3").html(data);
        }
      })

        } );
    });

</script>

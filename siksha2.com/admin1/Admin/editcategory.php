<?php
      include('./admininclude/header.php');
      include('../dbConnection.php');

//update
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['category_id'] == "") || ($_REQUEST['category_name'] == "") ){
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $caid = $_REQUEST['category_id'];
        $caname = $_REQUEST['category_name'];
        $caimg = '../image/categoryimg/'. $_FILES['category_img']['name'];
        
        $sql = "UPDATE category  SET cat_id = '$caid', cat_name = '$caname'
        , category_img = '$caimg' WHERE category_id = '$caid'";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Succesfully</div>';
        }else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
  }

?>

<div class="col-sm-6 mt-5 form-of-space jumbotron">
    <h3 class="text-center">Update Category Details</h3>

    <?php
      if(isset($_REQUEST['view'])){
          $sql = "SELECT * FROM category WHERE cat_id = {$_REQUEST['catid']}";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
      }
    ?>

      <form  action="" method="POST" enctype="multipart/form-data">
      <div class="mt-10 form-group">
            <label for="category_id">Category ID</label>
            <input type="text" class="form-control" id="category_id"
            name="category_id" value="<?php if(isset($row['cat_id']))
             { echo $row['cat_id']; } ?>" readonly>
        </div>  
      <div class="mt-10 form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name"
            name="category_name" value="<?php if(isset($row['cat_name']))
             { echo $row['cat_name']; } ?>">
        </div>
        <div class="mt-3 form-group">
            <label for="category_img">Category Image</label>
            <img style = "height:200px;width:200px;"src="<?php if(isset($row['cat_image']))
             { echo str_replace('..','../..',$row['cat_image']); } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="category_img"
            name="category_img">
        </div>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="requpdate" name="requpdate">Update</button>
            <a href="category.php" class="btn btn-secondary">Close</a>
     </div>
     <?php if(isset($msg)) {echo $msg;} ?>
   </form>
</div>

</div>
</div> 






<?php
      include('./admininclude/footer.php');
?>
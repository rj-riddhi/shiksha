<?php
      include('./admininclude/header.php');
       include('../dbConnection.php');

      if(isset($_REQUEST['categorySubmitBtn'])){
        if(($_REQUEST['category_name'] == "")){
           $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }else{
            $category_name = $_REQUEST['category_name'];
            $category_image = $_FILES['category_img']['name'];
            $category_image_temp = $_FILES['category_img']['tmp_name'];
            $img_folder = '../image/categoryimg/'.$category_image;
            move_uploaded_file($category_image_temp, $img_folder);

            $sql = "INSERT INTO category (category_name,category_img) VALUES ('$category_name', 
            '$img_folder')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Category Added Succesfully</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Category</div>';
            }
        }
      }
?>

<div class="col-sm-6 mt-5 form-of-space jumbotron">
    <h3 class="text-center">Add New Category</h3>
    <form  action="" method="POST" enctype="multipart/form-data">
        <div class="mt-10 form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name"
            name="category_name">
        </div>
        
        <div class="mt-3 form-group">
            <label for="category_img">Category Image</label>
            <input type="file" class="form-control-file" id="category_img"
            name="category_img">
        </div>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="categorySubmitBtn" name="categorySubmitBtn">Submit</button>
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
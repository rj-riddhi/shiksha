<?php
      include('./admininclude/header.php');
       include('../dbConnection.php');

      if(isset($_REQUEST['blogSubmitBtn'])){
        if(($_REQUEST['title'] == "") || ($_REQUEST['content'] == "")){
           $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }else{
            $title = $_REQUEST['title'];
            $content = $_REQUEST['content'];
            $images = $_FILES['images']['name'];
            $blog_image_temp = $_FILES['images']['tmp_name'];
            $img_folder = '../../image/stu/'.$images;
            move_uploaded_file($blog_image_temp, $img_folder);

            $sql = "INSERT INTO blogs (title,content,images) VALUES ('$title', '$content',
            '$img_folder')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Blog Added Succesfully</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Blog</div>';
            }
        }
      }
?>

<div class="col-sm-6 mt-5 form-of-space jumbotron">
    <h3 class="text-center">Add New Blog</h3>
    <form  action="" method="POST" enctype="multipart/form-data">
        <div class="mt-10 form-group">
            <label for="title">Blog Title</label>
            <input type="text" class="form-control" id="title"
            name="title">
        </div>
        <div class="mt-3 form-group" >
        <label  for="content">Blog Description</label>
        <textarea class="form-control " id="content"
            name="content" row=2></textarea>
         </div>
         <script src="ckeditor/ckeditor.js"> </script>
         <script>
              CKEDITOR.replace('content');
          </script>
        
        <div class="mt-3 form-group">
            <label for="images">Blog Image</label>
            <input type="file" class="form-control-file" id="images"
            name="images">
        </div>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="blogSubmitBtn" name="blogSubmitBtn">Submit</button>
            <!-- <a href="category.php" class="btn btn-secondary">Close</a> -->
     </div>
     <?php if(isset($msg)) {echo $msg;} ?>
   </form>
</div>

</div>
</div> 

<?php
      include('./admininclude/footer.php');
?>
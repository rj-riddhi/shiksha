<?php
if(!isset($_SESSION)){
  session_start();
}

      include('./admininclude/header.php');
      include('../dbConnection.php');

//update
if(isset($_REQUEST['requpdate'])){
  if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "")
  || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "")
  || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_level'] == "")
  || ($_REQUEST['course_status'] == "")  ){
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $oc = $_REQUEST['outcomes'];
        $rm = $_REQUEST['requirements'];
        $ca_id = $_POST['category_id'];
        $cl = $_POST['course_level'];
        $cs = $_POST['course_status'];
         $is_top = $_REQUEST['istop'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../../image/stu/'.$course_image;
        move_uploaded_file($course_image_temp, $img_folder);
        // $cimg = '../../image/stu/'. $_FILES['course_img']['name'];
        
        $sql = "UPDATE course SET course_id = '$cid', course_name = '$cname', course_desc = '$cdesc', outcomes = '$oc', 
        requirements = '$rm', cat_id = '$ca_id', is_top_course = '$is_top', course_level = '$cl', status = '$cs', course_duration = '$cduration', course_price = '$cprice',
        course_original_price = '$coriginalprice', course_img = '$img_folder' 
        WHERE course_id = '$cid'";

        if($conn->query($sql) == TRUE){
            // $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Succesfully</div>';
            echo ' <script>
                 alert("Updated Successfully");
                   window.location.replace("courses.php");
             </script>';
        }else{
            // $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
            echo ' <script>
                 alert("Not Updated Successfully");
                   window.location.replace("courses.php");
             </script>';
        }
    }
  }

?>

<div class="col-sm-6 mt-5  form-of-space jumbotron">
    <h3 class="text-center">Update Course Details</h3>

    <?php
      if(isset($_REQUEST['view'])){
          $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
      }
    ?>

      <form  action="" method="POST" enctype="multipart/form-data">
      <div class="mt-10 form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id"
            name="course_id" value="<?php if(isset($row['course_id']))
             { echo $row['course_id']; } ?>" readonly>
        </div>  
      <div class="mt-10 form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name" value="<?php if(isset($row['course_name']))
             { echo $row['course_name']; } ?>">
        </div>
        <div class="mt-3 form-group" >
        <label for="course_desc">Course Description</label>
        <textarea class="form-control" id="course_desc"
            name="course_desc" row=2> <?php if(isset($row['course_desc']))
             { echo $row['course_desc']; } ?> </textarea>
         </div>
         <script src="ckeditor/ckeditor.js"> </script>
         <script>
              CKEDITOR.replace('course_desc');
          </script>
         <div class="mt-3 form-group" >
        <label  for="outcomes">Outcomes</label>
        <textarea class="form-control" id="outcomes"
            name="outcomes" row=2> <?php if(isset($row['outcomes']))
             { echo $row['outcomes']; } ?></textarea>
         </div>
         <div class="mt-3 form-group" >
        <label  for="requirements">Requirements</label>
         <textarea class="form-control" id="requirements"
            name="requirements" row=2> <?php if(isset($row['requirements']))
             { echo $row['requirements']; } ?></textarea>
         </div>
         <div class="mt-3 form-group">
         
         <?php
         $cat_id = $row['cat_id'];
         $sql = "SELECT * FROM category where cat_id = '$cat_id'";
        //  print_r($sql);
           $result = $conn->query($sql);
          if($result->num_rows > 0)
          $row2 = $result->fetch_assoc();
          // print_r($row2);
          
            ?>
         <label class="float-left" for="course_desc">Course Category</label>
         <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id"> 
            <option value="<?php echo $row2['cat_id']; ?>"><?php echo $row2['cat_name']; ?></option>
        <?php
           $sql = "SELECT * FROM category";
           $res = $conn->query($sql);
          if($res->num_rows > 0){
         ?>
         <?php while($rows = $res->fetch_assoc()){
         ?>
          <option value="<?php echo $rows['cat_id']; ?>"><?php echo $rows['cat_name']; ?></option>
          <?php } ?>
          </select> 
         <?php } ?>
        </div>
         <div class="mt-3 row">
     <div class="col">
     <label for="course_level">Level</label> 
   <div class="dropdown">
   <select class="form-control select2" data-toggle="select2" name="course_level" id="course_level">
   <option value="<?php echo $row['course_level']; ?>"><?php echo $row['course_level']; ?></option>
    <option value="beginner">beginner</option>
    <option value="advanced">advanced</option>
    <option value="intermediate">intermediate</option>
    </select>
  </div>  
</div> 
<div class="col">
<label for="course_status">Status</label> 
  <div class="dropdown">
  <select class="form-control select2" data-toggle="select2" name="course_status" id="course_status">
  <option value="pending">pending</option>
    <option value="active">active</option>
  </select>
  </div> 
         </div>
<div class="col mt-4">
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="0" id="istop" name="istop" checked ?>
  <label class="form-check-label" for="flexCheckDefault">
    Top Course
  </label>
</div>
         </div>

        
      <!-- <div class="mt-3 form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author"
            name="course_author" value="<?php if(isset($row['course_author']))
             { echo $row['course_author']; } ?>">
        </div> -->
        <div class="mt-3 form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration"
            name="course_duration" value="<?php if(isset($row['course_duration']))
             { echo $row['course_duration']; } ?>">
        </div>
        <div class="mt-3 form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price"
            name="course_price" value="<?php if(isset($row['course_price']))
             { echo $row['course_price']; } ?>">
        </div>
        <div class="mt-3 form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price"
            name="course_original_price" value="<?php if(isset($row['course_original_price']))
             { echo $row['course_original_price']; } ?>">
        </div>
       
        <div class="mt-3 form-group">
            <label for="course_img">Course Image</label>
            <img style="height:200px; width:200px;"src="<?php if(isset($row['course_img']))
             { echo $row['course_img']; } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img"
            name="course_img">
        </div>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
     </div>
     <?php if(isset($msg)) {echo $msg;} ?>
   </form>
</div>

</div>
</div> 






<?php
      include('./admininclude/footer.php');
?>
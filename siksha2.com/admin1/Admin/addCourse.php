<?php
     include('./admininclude/header.php');
       include('../dbConnection.php');
      if(!isset($_SESSION)){
        session_start();
        $ins_id = $_SESSION['stu_id'];

    }

      if(isset($_REQUEST['courseSubmitBtn'])){
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") 
        || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "")
        || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_level'] == "")
        || ($_REQUEST['course_status'] == "")  ){
           $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }else{
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $outcomes = $_REQUEST['outcomes'];
            $requirements = $_REQUEST['requirements'];
            $ins_id = $_SESSION['stu_id'];
            $category_id = $_POST['category_id'];
            $course_level = $_POST['course_level'];
            $course_status = $_POST['course_status'];
            $is_top = $_REQUEST['istop'];
            $course_duration = $_REQUEST['course_duration'];
            $course_price = $_REQUEST['course_price'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_image = $_FILES['course_img']['name'];
            $course_image_temp = $_FILES['course_img']['tmp_name'];
            $img_folder = '../../image/stu/'.$course_image;
            move_uploaded_file($course_image_temp, $img_folder);

            $sql = "INSERT INTO course (course_name, course_desc, outcomes, requirements,ins_id, cat_id, course_level,is_top_course, status, course_img,
            course_duration, course_price, course_original_price) VALUES ('$course_name', '$course_desc','$outcomes', '$requirements','$ins_id','$category_id', '$course_level','$is_top',
            '$course_status', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Succesfully</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
            }
        }
      }
?>

<div class="col-sm-6 mt-5 form-of-space jumbotron">
<h3 class="text-center">Add New Course</h3>
   <form  action="" method="POST" enctype="multipart/form-data">
        <div class="mt-10 form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name">
        </div>
        <div class="mt-3 form-group" >
        <label  for="course_desc">Course Description</label>
        <textarea class="form-control " id="course_desc"
            name="course_desc" row=2></textarea>
         </div>
         <script src="ckeditor/ckeditor.js"> </script>
         <script>
              CKEDITOR.replace('course_desc');
          </script>
         <div class="mt-3 form-group" >
        <label  for="outcomes">Outcomes</label>
        <textarea class="form-control" id="outcomes"
            name="outcomes" row=2></textarea>
         </div>
         <div class="mt-3 form-group" >
        <label  for="requirements">Requirements</label>
         <textarea class="form-control" id="requirements"
            name="requirements" row=2></textarea>
         </div>
         <div class="mt-3 form-group">
         <?php
           $sql = "SELECT * FROM category";
           $result = $conn->query($sql);
          if($result->num_rows > 0){
        ?>
         <label for="course_desc">Course Category</label>
         <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id"> 
        
         <option value="0"><?php echo "Select a Category"; ?></option>
        
         <?php while($row = $result->fetch_assoc()){
         ?>
         <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
         <?php } ?>
          </select> 
          <?php } ?>
        </div>
    <div class="mt-3 row">
     <div class="col">
     <label for="course_level">Level</label> 
   <div class="dropdown">
   <select class="form-control select2" data-toggle="select2" name="course_level" id="course_level">
   <option value="0"><?php echo "---Select---"; ?></option>
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
  <option value="0"><?php echo "---Select---"; ?></option>
  <option value="Active">Active</option>
    <option value="Pending">Pending</option>
  </select>
  </div> 
</div>
<div class="col mt-4 pt-2">
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" id="istop" name="istop">
  <label class="form-check-label" for="flexCheckDefault">
    Top Course
  </label>
</div>
         </div>

    <!-- <div class="mt-3 form-group">
        <label for="course_author">Author</label>
        <input type="text" class="form-control" id="course_author"
            name="course_author">
     </div> -->
        <div class="mt-3 form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration"
            name="course_duration">
        </div>
        <div class="mt-3 form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price"
            name="course_original_price">
        </div>
        <div class="mt-3 form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price"
            name="course_price">
        </div>
        <div class="mt-3 form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img"
            name="course_img">
        </div>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
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
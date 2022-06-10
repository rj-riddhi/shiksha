<?php
      include('instructor_header.php');
      if(!isset($_SESSION)){
    session_start();
    $ins_id = $_SESSION['stu_id'];
}
       

      if(isset($_REQUEST['courseSubmitBtn'])){
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "")
        || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "")
        || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_level'] == "")
          ){
           $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }else{
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $outcomes = $_REQUEST['outcomes'];
            $requirements = $_REQUEST['requirements'];
            $category_id = $_POST['category_id'];
            $course_level = $_POST['course_level'];
            $course_status = 0;
            $ins_id = $_SESSION['stu_id'];
            $course_duration = $_REQUEST['course_duration'];
            $course_price = $_REQUEST['course_price'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_image = $_FILES['course_img']['name'];
            $course_image_temp = $_FILES['course_img']['tmp_name'];
            $img_folder = './image/stu/'.  $course_image;
            move_uploaded_file($course_image_temp, $img_folder);
            // $course_image = $_FILES['course_img']['name'];
            // $course_image_temp = $_FILES['course_img']['tmp_name'];
            // $img_folder = '../image/stu/'.$course_image;
            // move_uploaded_file($course_image_temp, $img_folder);

            $sql = "INSERT INTO course (course_name, course_desc, outcomes, requirements, cat_id, course_level, status, ins_id, course_img,
            course_duration, course_price, course_original_price) VALUES ('$course_name', '$course_desc','$outcomes', '$requirements','$category_id', '$course_level',
            '$course_status','$ins_id', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Succesfully</div>';
                // echo"<script>alert('Congartulation...Course added Successfully..Please Wait until Admin Approves it...')</script>";
                // echo"<script>window.open('./instructor_course.php')</script>";
               echo" <script>
                        alert('Congartulation...Course added Successfully..Please Wait until Admin Approves it...');
                        window.location.replace('instructor_course.php');
                        
                    </script>";
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
            }
        }
      }
?>
<center>
<div class="col-sm-6 mt-5 form-of-space jumbotron ">
<h3 class="text-center">Add New Course</h3>
   <form  action="" method="POST" enctype="multipart/form-data">
        <div class="mt-10 form-group">
            <label class="float-left" for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name">
        </div>
        <div class="mt-3 form-group" >
        <label  for="course_desc" style="margin-right:82.8%">Course Description</label>
        <textarea class="form-control " id="course_desc"
            name="course_desc" row=2></textarea>
         </div>
         <script src="ckeditor/ckeditor.js"> </script>
         <script>
              CKEDITOR.replace('course_desc');
          </script>
         <div class="mt-3 form-group" >
        <label class="float-left" for="outcomes">Outcomes</label>
        <textarea class="form-control" id="outcomes"
            name="outcomes" row=2></textarea>
         </div>
         <div class="mt-3 form-group" >
        <label class="float-left" for="requirements">Requirements</label>
         <textarea class="form-control" id="requirements"
            name="requirements" row=2></textarea>
         </div>
         <div class="mt-3 form-group">
         <?php
           $sql = "SELECT * FROM category";
           $result = $conn->query($sql);
          if($result->num_rows > 0){
        ?>
         <label class="float-left" for="course_desc">Course Category</label>
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
     <label class="float-left" for="course_level">Level</label> 
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
<!-- <label class="float-left" for="course_status">Status</label> 
  <div class="dropdown">
  <select class="form-control select2" data-toggle="select2" name="course_status" id="course_status">
  <option value="0"><?php echo "---Select---"; ?></option>
  <option value="Active">Active</option>
    <option value="Pending">Pending</option>
  </select>
  </div>  -->
</div>
    <!-- <div class="mt-3 form-group">
        <label class="float-left" for="course_author">Author</label>
        <input type="text" class="form-control" id="course_author"
            name="course_author">
     </div> -->
        <div class="mt-3 form-group">
            <label class="float-left" for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration"
            name="course_duration">
        </div>
        <div class="mt-3 form-group">
            <label class="float-left" for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price"
            name="course_original_price">
        </div>
        <div class="mt-3 form-group">
            <label class="float-left" for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price"
            name="course_price">
        </div>
        <div class="mt-3 form-group">
            <label class="float-left" for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img"
            name="course_img">
        </div>
         </div>
        
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="instructor_course.php" class="btn btn-secondary">Close</a>
     </div>
     <?php if(isset($msg)) {echo $msg;} ?>
   </form>
</div>

</div>
</div> 
         </center>
         

<?php
     include('./maininclude/footer.php');
?>
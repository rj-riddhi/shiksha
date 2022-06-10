<?php
if(!isset($_SESSION)){
         session_start();
     }
       include('instructor_header.php');
       if(isset($_GET['course_id'])){
             $course =$_GET['course_id'];
        }   

    

      if(isset($_REQUEST['lessonSubmitBtn'])){
        if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_name'] == "")){
           $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }else{
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            $lesson_duration = $_REQUEST['lesson_duration'];
            $course_name = $_REQUEST['course_name'];
            $lesson_link = $_FILES['lesson_link']['name'];
            $file = $_FILES['lesson_link']; 
            $target = "videos/".basename($lesson_link);
            move_uploaded_file($_FILES['lesson_link']['tmp_name'],$target);


            $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_duration, lesson_link, course_id,course_name)
             VALUES ('$lesson_name', '$lesson_desc', '$lesson_duration', '$lesson_link', '$course','$course_name')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Added Succesfully</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Lesson</div>';
            }
        }
      }
?>
<center>
<div class="col-sm-6 mt-5 form-of-space jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form  action="" method="POST" enctype="multipart/form-data">
        <!-- <div class="mt-10 form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id"
            name="course_id" value="<?php echo $course; ?>" readonly>
        </div> -->
        <?php
        if (isset($course)){
            $sql = "SELECT course_name from course where course_id = $course";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $course_name = $row['course_name'];

        }
        ?>
         <div class="mt-3 form-group">
            <label class="float-left" for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name" value="<?php echo $course_name; ?>" readonly>
        </div>
        <div class="mt-3 form-group">
            <label class="float-left" for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name"
            name="lesson_name">
        </div>
        <div class="mt-3 form-group">
            <label class="float-left" for="lesson_duration">Lesson Duration</label>
            <input type="text" class="form-control" id="lesson_duration"
            name="lesson_duration">
        </div>
        <div class="mt-3 form-group">
            <label style="margin-right:82.8%" for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc"
            name="lesson_desc" row=2></textarea>
        </div>
        <script src="ckeditor/ckeditor.js"> </script>
         <script>
              CKEDITOR.replace('lesson_desc');
          </script>
        <div class="mt-3 form-group">
            <label class="float-left" for="lesson_link">Lesson Video Link</label>
            <input type="file" class="form-control-file" id="lesson_link"
            name="lesson_link">
        </div>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="http://localhost/siksha2.com/instructor_course.php" class="btn btn-secondary">Close</a>
     
        </div>
     <?php if(isset($msg)) {echo $msg;} ?>
   </form>
</div>
    </center>
</div>
</div> 

<?php
     include('./maininclude/footer.php');
?>
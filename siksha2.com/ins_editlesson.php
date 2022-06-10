<?php
if(!isset($_SESSION)){
    session_start();
}
include('instructor_header.php');

//update
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "")
    || ($_REQUEST['course_name'] == "")){
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $lid = $_REQUEST['lesson_id'];
        $lname = $_REQUEST['lesson_name'];
        $ldesc = $_REQUEST['lesson_desc'];
        $ldu = $_REQUEST['lesson_duration'];
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $llink = 'lessonvid/'. $_FILES['lesson_link']['name'];
       
        
        $sql = "UPDATE lesson  SET lesson_id = '$lid', lesson_name = '$lname', lesson_desc = '$ldesc', lesson_duration = '$ldu',
        course_id = '$cid', course_name = '$cname', lesson_link = '$llink'
         WHERE lesson_id = '$lid'";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Succesfully</div>';
        }else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
  }

?>
<center>
<div class="col-sm-6 mt-5 form-of-space jumbotron">
    <h3 class="text-center">Update Lesson Details</h3>

    <?php
      if(isset($_REQUEST['view'])){
          $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
      }
    ?>

      <form  action="" method="POST" enctype="multipart/form-data">
      <div class="mt-10 form-group">
            <label class="float-left" for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id"
            name="lesson_id" value="<?php if(isset($row['lesson_id']))
             { echo $row['lesson_id']; } ?>" readonly>
        </div>  
      <div class="mt-3 form-group">
            <label class="float-left" for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name"
            name="lesson_name" value="<?php if(isset($row['lesson_name']))
             { echo $row['lesson_name']; } ?>">
        </div>
        <div class="mt-3 form-group">
            <label class="float-left" for="lesson_duration">Lesson Duration</label>
            <input type="text" class="form-control" id="lesson_duration"
            name="lesson_duration" value="<?php if(isset($row['lesson_duration']))
             { echo $row['lesson_duration']; } ?>">
        </div>
        <div class="mt-3 form-group" >
            <label for="lesson_desc">Lesson Description</label>
           <textarea class="form-control" id="lesson_desc"
            name="lesson_desc" row=2> <?php if(isset($row['lesson_desc']))
             { echo $row['lesson_desc']; } ?> </textarea>
              
         </div>
         <script src="ckeditor/ckeditor.js"> </script>
         <script>
              CKEDITOR.replace('lesson_desc');
          </script>
        <div class="mt-3 form-group">
            <label class="float-left" for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id"
            name="course_id" value="<?php if(isset($row['course_id']))
             { echo $row['course_id']; } ?>" readonly>
        </div>
        <div  class="mt-3 form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name" onkeypress="isInputNumber(event)" value="<?php if(isset($row['course_name']))
             { echo $row['course_name']; } ?>" readonly>
        </div>
        <div class="mt-3 form-group">
            <label for="course_price">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link']; }?>"
            allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" id="lesson_link"
            name="lesson_link">
        </div>
        
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger"
            id="requpdate" name="requpdate">Update</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
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


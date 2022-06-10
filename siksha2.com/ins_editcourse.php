<?php
if(!isset($_SESSION)){
  session_start();
}

      include('instructor_header.php');

//update
if(isset($_REQUEST['requpdate'])){
  if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "")
  || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "")
  || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_level'] == "")
    ){
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $oc = $_REQUEST['outcomes'];
        // $istop = $_REQUEST['istop'];
        $rm = $_REQUEST['requirements'];
        $ca_id = $_POST['category_id'];
        $cl = $_POST['course_level'];
        
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
        $cimg = '../image/courseimg/'. $_FILES['course_img']['name'];
        
        $sql = "UPDATE course SET  course_name = '$cname', course_desc = '$cdesc', outcomes = '$oc', 
        requirements = '$rm', cat_id = '$ca_id', course_level = '$cl', 
         course_duration = '$cduration', course_price = '$cprice', 
        course_original_price = '$coriginalprice', course_img = '$cimg' 
        WHERE course_id = '$cid'";

        if(mysqli_query($conn,$sql)){
          echo" <script>
                        alert('Course updated Successfully');
                        window.location.replace('instructor_course.php');
                        
                    </script>";
        }else{
          $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }

        // if($conn->query($sql) == TRUE){
        //     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Succesfully</div>';
        // }else{
        //     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        // }
    }
  }

?>
<center>
<div class="col-sm-6 mt-5 form-of-space jumbotron ">
<h3 class="text-center">Update course Detail</h3>
<?php
      if(isset($_REQUEST['view'])){
          $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
      }
    ?>

   <form  action="" method="POST" enctype="multipart/form-data">
     <input type="hidden" class="form-control" id="course_id"
            name="course_id" value="<?php if(isset($row['course_id']))
             { echo $row['course_id']; } ?>">
        <div class="mt-10 form-group">
            <label class="float-left" for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name"
            name="course_name" value="<?php if(isset($row['course_name']))
             { echo $row['course_name']; } ?>">
        </div>
        <div class="mt-3 form-group" >
        <label  for="course_desc" style="margin-right:82.8%">Course Description</label>
        <textarea class="form-control " id="course_desc"
            name="course_desc" row=2><?php if(isset($row['course_desc']))
             { echo $row['course_desc']; } ?></textarea>
         </div>
         <script src="ckeditor/ckeditor.js"> </script>
         <script>
              CKEDITOR.replace('course_desc');
          </script>
         <div class="mt-3 form-group" >
        <label class="float-left" for="outcomes">Outcomes</label>
        <textarea class="form-control" id="outcomes"
            name="outcomes" row=2><?php if(isset($row['outcomes']))
             { echo $row['outcomes']; } ?></textarea>
         </div>
         <div class="mt-3 form-group" >
        <label class="float-left" for="requirements">Requirements</label>
         <textarea class="form-control" id="requirements"
            name="requirements" row=2><?php if(isset($row['requirements']))
             { echo $row['requirements']; } ?></textarea>
         </div>
         <div class="mt-3 form-group">
           
         <?php
         $cat_id = $row['cat_id'];
         $sql = "SELECT * FROM category where cat_id = '$cat_id'";
           $result = $conn->query($sql);
          if($result->num_rows > 0)
          $row2 = $result->fetch_assoc();
            ?>
         <label class="float-left" for="course_desc">Course Category</label>
         <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id"> 
            <option value="<?php echo $row2['cat_id']; ?>"><?php echo $row2['cat_name']; ?></option>
        
        <?php
           $sql = "SELECT * FROM category";
           $result = $conn->query($sql);
          if($result->num_rows > 0){
        ?>
        
        <!-- echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>"; -->
         
        
         <?php while($row1 = $result->fetch_assoc()){
         ?>
        
         <option value="<?php echo $row1['cat_id']; ?>"><?php echo $row1['cat_name']; ?></option>
         <?php } ?>
          </select> 
          <?php } ?>
        </div>
        
    <div class="mt-3 row">
     <div class="col">
     <label class="float-left" for="course_level">Level</label> 
   <div class="dropdown">
   <select class="form-control select2" data-toggle="select2" name="course_level" id="course_level">
   <!-- <option value="0"><?php echo "---Select---"; ?></option> -->
    <option value="<?php echo $row['course_level']; ?>"><?php echo $row['course_level']; ?></option>

    <option value="beginner">beginner</option>
    <option value="advanced">advanced</option>
    <option value="intermediate">intermediate</option>
    </select>
  </div>  
</div> 
<!-- <div class="col mt-4 pt-2">
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" id="istop" name="istop">
  <label class="form-check-label" for="flexCheckDefault">
    Top Course
  </label>
</div> -->
    
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
            
            <input type="text" class="form-control" id="course_duration" placeholder="e.g. 1 hour"
            name="course_duration" value="<?php if(isset($row['course_duration']))
             { echo $row['course_duration']; } ?>">
        </div>
        <div class="form-row">
    <div class="mt-3 form-group">
            <label class="float-left" for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price"
            name="course_original_price"  value="<?php if(isset($row['course_original_price']))
             { echo $row['course_original_price']; } ?>">
        </div>
    <div class="mt-3 form-group">
            <label class="float-left" for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price" 
            value="<?php if(isset($row['course_price']))
             { echo $row['course_price']; } ?>"
            >
        </div>
  </div>
      
    
        <div class="mt-3 form-group">
            <label class="float-left" for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_img']))
             { echo str_replace('..','.',$row['course_img']); } ?>">
            <input type="file" class="form-control-file" id="course_img"
            name="course_img" >
        </div>
         
        
        <div class="mt-1 text-center">
            <button type="submit" class="btn btn-danger"
            id="requpdate" name="requpdate">Update</button>
            <a href="instructor_course.php" class="btn btn-secondary">Close</a>
     </div>
         </div>
     <?php if(isset($msg)) {echo $msg;} ?>
   </form>
</div>

</div>
</div> 
         </center>

         <br><br>
         <br><br>




<?php
    include('./maininclude/footer.php');
    ?>
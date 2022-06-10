<?php
if(!isset($_SESSION)){
    session_start();
    $ins_id = $_SESSION['stu_id'];
}

include('instructor_header.php');
?>

<?php
  @$course_status = $_GET['status'];
  @$course_id = $_GET['course_id'];

  $sql = "UPDATE course SET  status = '$course_status' WHERE course_id = '$course_id'";

  if($conn->query($sql)== TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
  }else{
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Enable to Update </div>';

  }
?>




<br>
<br>
<br>
<br>
<div class="float-right" style="margin-right:15%">
      <a title="add new course" class="btn btn-danger box" href="ins_addCourse.php">
          <i class="fas fa-plus fa-2x"></i>
      </a>
      </div>
  </div> 
  <br>   
  <br>   
  <br>   
<center>
<div class="col-sm-9 ">
    
    <!-- Table -->
    <p class="bg-secondary text-white p-2" style="background:#000;">List of Courses</p>
    <?php
      $sql = "SELECT c.course_id, c.course_name, a.cat_name, c.status FROM course AS c JOIN category AS a
      ON c.cat_id = a.cat_id WHERE ins_id = '$ins_id'" ;
      $result = $conn->query($sql);
      if($result->num_rows > 0){
          $i=1;
    ?>
     <table class="table table-success table-striped">
      <thead>
          <tr style="background:#fff;">
              <th scope="col">Course ID</th>
              <th scope="col">Name</th>
              <th scope="col">Course Category</th>
              <th scope="col">Course Status</th>
              <th scope="col" >Lesson</th>
              <th scope="col" >Action</th>
           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
          echo '<tr style="background:#fff;">';
           echo '<th scope="row">'.$i++.'</th>';
            echo '<td>'.$row['course_name'].'</td>';
            echo '<td>'.$row['cat_name'].'</td>';
            echo '<td>';
            if($row['status']== 1){
                echo '<p><a href="instructor_course.php" class="link link-success border-bottom border-success" style="color:#008000;">Active</a></p>';
                // echo '<td><div title="Active" class =" ml-5" style="height:16px;width:16px; background:green; cursor: pointer; border-radius:10px;"></div></td>';
            }elseif($row['status']== 0){
                echo '<p><a href="instructor_course.php?course_id='.$row['course_id'].'&status=2" class="link link-danger border-bottom border-danger" style="color:#dc3545;">Pending</a></p>';

                // echo '<td><div  title="pending" class =" ml-5" style="height:16px;width:16px; cursor: pointer; background:red; border-radius:10px;"></div></td>';
            }elseif($row['status']== 2){
                echo '<p><a href="instructor_course.php?course_id='.$row['course_id'].'&status=0" class="link link-secondary border-bottom border-secondary" style="color:#808080;">Draft</a></p>';
                
            }
            echo '</td>';

            // unset($_SESSION['course_id']);
            // $_SESSION['course_id'] = $row['course_id'];
            echo '<td><a href="ins_lesson.php?course_id='.$row["course_id"].'">Lesson</a></td>';
           
           echo '<td>';
            echo'
            <form action="ins_editcourse.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["course_id"].'>
              <button style="background:#fff" type="submit" class="btn btn-info mr-3" name="view" value="View">
              <i class="ti-pencil" style="color:#000;"></i></button>
            </form>

                  
            </td>
       </tr>';
         } 
         
         ?>
    </tbody>
    </table>
    <?php } else{
        echo "No Data Found!!";
    }
    
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    }else{
        echo "Unable to Delete Data";
    }
    }
    ?>
    </div>
   </div>
</center>




  <!-- </div> -->
  
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<?php
    include('./maininclude/footer.php');
    ?>
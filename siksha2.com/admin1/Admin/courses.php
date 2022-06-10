<?php
// if(!isset($_SESSION)){
//     session_start();
// }

      include('./admininclude/header.php');
      include('../dbConnection.php');

    //   if(isset($_SESSION['is_admin_login'])){
    //       $adminEmail = $_SESSION['adminLogEmail'];
    //   }else{
    //       echo "<script> location.href='../index.php'; </script>";
    //   }
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

<div class="col-sm-9 mt-5 list-of-course">
    <!-- Table -->
    <p class="bg-secondary text-white p-2">List of Courses</p>
    <?php
      $sql = "SELECT c.course_id, c.course_name, a.cat_name, c.status FROM course AS c JOIN category AS a
      ON c.cat_id = a.cat_id where c.status != 2";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    ?>
     <table class="table table-success ">
      <thead>
          <tr>
              <th style="background: #f5f7fd;" scope="col">Course ID</th>
              <th style="background: #f5f7fd;" scope="col">Name</th>
              <th style="background: #f5f7fd;" scope="col">Course Category</th>
              <th style="background: #f5f7fd;" scope="col">Course Status</th>
              <th style="background: #f5f7fd;" scope="col" >Lesson</th>
              <th style="background: #f5f7fd;" scope="col">Action</th>

           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
          echo '<tr style="background: #f5f7fd;">';
           echo '<th style="background: #f5f7fd;" scope="row">'.$row['course_id'].'</th>';
            echo '<td style="background: #f5f7fd;">'.$row['course_name'].'</td>';
            // echo '<td>'.$row['course_author'].'</td>';
            echo '<td style="background: #f5f7fd;">'.$row['cat_name'].'</td>';
            echo '<td style="background: #f5f7fd;">';
            if($row['status']== 1){
                echo '<p><a href="courses.php?course_id='.$row['course_id'].'&status=0" class="link link-success " >Active</a></p>';
                // echo '<td><div title="Active" class =" ml-5" style="height:16px;width:16px; background:green; cursor: pointer; border-radius:10px;"></div></td>';
            }else{
                echo '<p><a href="courses.php?course_id='.$row['course_id'].'&status=1" class="link link-danger " >Pending</a></p>';

                // echo '<td><div  title="pending" class =" ml-5" style="height:16px;width:16px; cursor: pointer; background:red; border-radius:10px;"></div></td>';
            }
            echo '</td>';
            echo '<td style="background: #f5f7fd;"><a href="lessons.php?course_id='.$row["course_id"].'">Lesson</a></td>';
            
           echo '<td style="background: #f5f7fd;">';
            echo'
            <form action="editcourse.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["course_id"].'>
              <button type="submit" class="btn btn-info mr-3" name="view" value="View">
              <i class="fas fa-pen"></i></button>
            </form>

                  <form action="" method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["course_id"].'>
                     <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i 
                      class="far fa-trash-alt"></i></button>
                  </form>
            </td>
       </tr>';
         } ?>
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



  <!-- </div> -->
  <div>
      <a class="btn btn-danger box" href="./addCourse.php">
          <i class="fas fa-plus fa-2x"></i>
      </a>
      </div>
  </div>



<?php
      include('./admininclude/footer.php');
?>
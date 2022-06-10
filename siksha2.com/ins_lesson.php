<?php
if(!isset($_SESSION)){
    session_start();
    // $course_id = $_SESSION['course_id'];
}
if(isset($_GET['course_id'])){
    $course =$_GET['course_id'];
}

      include('instructor_header.php');

?>

<br>
<br>
<br>
<div class="float-right" style="margin-right:15%">
<?php
    echo '<a title="add new Lesson" class="btn btn-danger box" href="ins_addlesson.php?course_id='.$course.'">';  
?>
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
    <p class="bg-secondary text-white p-2" style="background:#000;">List of Lessons</p>
    <?php
      $sql = "SELECT * FROM lesson WHERE course_id = $course";
    $result = $conn->query($sql);
      if($result->num_rows > 0){
          $i=1;
    ?>
     <table class="table table-success table-striped">
      <thead>
          <tr style="background:#fff;">
              <th scope="col">Lesson ID</th>
			  <th scope="col">Lesson Name</th>
			  <th scope="col">Lesson Link</th>
			  <th scope="col">Action</th>
           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
          echo '<tr style="background:#fff;">';
           echo '<th scope="row">'.$i++.'</th>';
            echo '<td>'.$row['lesson_name'].'</td>';
            echo '<td><a href="'.$row['lesson_link'].'?lesson_id='.$row['lesson_id'].'">'.$row['lesson_link'].'</td>';
            
           echo '<td>';
            echo'
           <form action="ins_editlesson.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["lesson_id"].'>
              <button style="background:#fff" type="submit" class="btn btn-info mr-3" name="view" value="View">
              <i class="ti-pencil" style="color:#000;"></i></button>
            </form>
            <form action="" method="POST" class="d-inline">
					<input type="hidden" name="id" value='.$row["lesson_id"].'>
					<a href="ins_del_lesson.php?lesson_id='.$row["lesson_id"].'" class="btn btn-secondary" style="background:#fff; color:#000;"
					name="delete" value="Delete"><i class="far fa-trash-alt"></i></a>
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
        $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
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


<br>
<br>
<br>
<br>




<?php
    include('./maininclude/footer.php');
    ?>
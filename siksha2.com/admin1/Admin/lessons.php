<?php
if(!isset($_SESSION)){
    session_start();
}

      include('./admininclude/header.php');
      include('../dbConnection.php');

    //   if(isset($_SESSION['is_admin_login'])){
    //       $adminEmail = $_SESSION['adminLogEmail'];
    //   }else{
    //       echo "<script> location.href='../index.php'; </script>";
    //   }

?>
<div class="col-sm-8 mt-5 form-of-space">
    
<!-- <form action="" class="mt-3 form-inline d-print-none">
<div class="form-group mr-3">
 <label for="ckeckid">Enter Course ID: </label>
 <input type="text" class="form-control ml-3" id="checkid" name="checkid">
</div>
<button type="submit" class="btn btn-danger">Search</button>
</form> -->
<?php 
if(isset($_GET['course_id'])){
	$course_id = $_GET['course_id'];

 $sql = "SELECT * FROM lesson WHERE course_id = $course_id";
 $result = $conn->query($sql);
 echo '<table class="table table-success">
	        <thead>
			  <tr>
			  <th style="background: #f5f7fd;" scope="col">Lesson ID</th>
			  <th style="background: #f5f7fd;" scope="col">Lesson Name</th>
			  <th style="background: #f5f7fd;" scope="col">Lesson Link</th>
			  <th style="background: #f5f7fd;" scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>';
			while($row = $result->fetch_assoc()){
				echo '<tr>';
				echo '<th style="background: #f5f7fd;" scope="row">'.$row["lesson_id"].'</th>';
				echo '<td style="background: #f5f7fd;">'.$row["lesson_name"].'</td>';
				echo '<td style="background: #f5f7fd;">'.$row["lesson_link"].'</td>';
				
				echo '<td style="background: #f5f7fd;">
				<form action="editlesson.php" method="POST"
				class="d-inline">
				<input type="hidden" name="id"
				value='.$row["lesson_id"].'>
				<button type="submit"
				class="btn btn-info mr-3" name="view" value="View"><i
				class="fas fa-pen"></i></button>
				</form>
				<form action="" method="POST" class="d-inline">
					<input type="hidden" name="id" value='.$row["lesson_id"].'>
					<button type="submit" class="btn btn-secondary"
					name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
					</form></td>
					</tr>';
				}
				echo '</tbody>
				</table>';
	}else{
		echo '<div class="alert alert-dark mt-4" role="alert">
		Course Not Found ! </div>';
	}
	if(isset($_REQUEST['delete'])){
		$sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
		if($conn->query($sql) === TRUE){
			echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
		}else{
			echo "Unable to Delete Data";
		}

	}


?> 
</div>

<?php
   if(isset($_GET['course_id'])){
	echo '<div>
	  <a class="btn btn-danger box" href="./addLesson.php"><i class="fas fa-plus fa-2x"></i></a>
     </div>';  
   }
?>

<?php
      include('./admininclude/footer.php');
?>
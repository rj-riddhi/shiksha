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

<div class="col-sm-9 mt-5  list-of-course">
    
    <p class="bg-secondary text-white p-2">List of Feedback</p>
        <?php
        // $sql = "SELECT s.stu_name,c.course_name,c.course_duration,c.course_price,c.course_original_price FROM student as s JOIN course as c ON s.stu_id = c.ins_id where c.course_id ='$course_id'";
           $sql = "SELECT f.f_id,f.f_content,f.stu_id,s.stu_email,s.stu_id  FROM feedback as f JOIN student as s ON s.stu_id = f.stu_id";
           $result = $conn->query($sql);
           if($result->num_rows > 0){
             echo '<table class="table table-success">
	        <thead>
			  <tr style="background:#f5f7fd;">
			  <th style="background:#f5f7fd;" scope="col">Feedback ID</th>
			  <th style="background:#f5f7fd;" scope="col">Content</th>
			  <th style="background:#f5f7fd;" scope="col">Student ID</th>
			  <th style="background:#f5f7fd;" scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>';
            while($row = $result->fetch_assoc()){
                echo '<tr style="background:#f5f7fd;">';
                echo '<th style="background:#f5f7fd;" scope="row">#'.$row["f_id"].'</th>';
                echo '<td style="background:#f5f7fd;">'.$row["f_content"].'</td>';
                echo '<td style="background:#f5f7fd;">'.$row["stu_email"].'</td>';
                echo '<td style="background:#f5f7fd;">
                <form action="" method="POST"
                class="d-inline">
                <input type="hidden" name="id"
                value='.$row["f_id"].'>
                <button type="submit"
                class="btn btn-secondary" name="delete" value="Delete"><i
                class="far fa-trash-alt"></i></button>
                </form>
                </td>
                </tr>';
            }
            echo '</tbody>
            </table>';
           }else{
                echo "0 Result";
           }
           if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
            if($conn->query($sql) === TRUE){
                echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
            }else{
                echo "Unable to Delete Data";
            }
        } 
      ?>
    </div>
    </div>
    </div>
    <?php
      include('./admininclude/footer.php');
   ?>
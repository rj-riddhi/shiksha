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

<div class="col-sm-9 mt-5 list-of-course">
    <!-- Table -->
    <p class="bg-secondary text-white p-2">List of Students</p>
    <?php
      $sql = "SELECT * FROM student";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    ?>
     <table class="table table-success">
       <thead>
          <tr>
              <th style="background: #f5f7fd;" scope="col">Student ID</th>
              <th style="background: #f5f7fd;" scope="col">Name</th>
              <th style="background: #f5f7fd;" scope="col">Email</th>
              <th style="background: #f5f7fd;" scope="col">Action</th>
           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
          echo '<tr>';
           echo '<th style="background: #f5f7fd;" scope="row">'.$row['stu_id'].'</th>';
            echo '<td style="background: #f5f7fd;">'.$row['stu_name'].'</td>';
            echo '<td style="background: #f5f7fd;">'.$row['stu_email'].'</td>';
            
           echo '<td style="background: #f5f7fd;">';
            echo'
            <form action="editstudent.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["stu_id"].'>
              <button type="submit" class="btn btn-info mr-3" name="view" value="View">
              <i class="fas fa-pen"></i></button>
            </form>

                  <form action="" method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["stu_id"].'>
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
        $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
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
      <a class="btn btn-danger box" href="./addnewstudent.php">
          <i class="fas fa-plus fa-2x"></i>
      </a>
      </div>
  </div>



<?php
      include('./admininclude/footer.php');
?>
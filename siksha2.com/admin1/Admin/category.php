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
    <p class="bg-secondary text-white p-2">List of Category</p>
    <?php
      $sql = "SELECT * FROM category";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    ?>
     <table class="table table-success ">
       <thead>
          <tr>
              <th style="background: #f5f7fd;" scope="col">Category ID</th>
              <th style="background: #f5f7fd;" scope="col">Category Name</th>
              <th style="background: #f5f7fd;" scope="col">Action</th>
           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
          echo '<tr>';
           echo '<th style="background: #f5f7fd;" scope="row">'.$row['cat_id'].'</th>';
            echo '<td style="background: #f5f7fd;">'.$row['cat_name'].'</td>';
            
           echo '<td style="background: #f5f7fd;">';
            echo'
            <form action="editcategory.php" method="POST" class="d-inline">
            <input type="hidden" name="catid" value='.$row["cat_id"].'>
              <button type="submit" class="btn btn-info mr-3" name="view" value="View">
              <i class="fas fa-pen"></i></button>
            </form>

                  <form action="" method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["cat_id"].'>
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
        $sql = "DELETE FROM category WHERE cat_id = {$_REQUEST['id']}";
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
      <a class="btn btn-danger box" href="./addcategory.php">
          <i class="fas fa-plus fa-2x"></i>
      </a>
      </div>
  </div>



<?php
      include('./admininclude/footer.php');
?>
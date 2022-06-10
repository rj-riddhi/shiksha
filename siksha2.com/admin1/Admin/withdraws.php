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
if(isset($_REQUEST['stupdate'])){
if(!empty($_POST['chk'])) {
  if(!$_REQUEST['status'] == ""){
  $status = $_POST['status'];

      $chk = implode(",",$_POST['chk']);

      // Insert and Update record
      // $checkEntries = mysqli_query($conn,"SELECT * FROM payout");
        mysqli_query($conn,"UPDATE payout SET status = '$status' where id = $chk ");
      }else{
        $msg = '<div class="alert alert-danger col-sm-6 mt-2" style="margin-left:22%;">Pleses Select Status</div>';
      }
    }else{
       $msg = '<div class="alert alert-danger col-sm-6 mt-2" style="margin-left:22%;">Pleses check chechkbox!</div>';
    }

}
  ?>



<?php if(isset($msg)){
    echo $msg;
}
?>

<nav class=" mt-3 "
   style="background-color: #f5f5fd; height: 60px; width:75%;border-radius:15px; margin-left:22%; margin-right:22%;">
      <h5 style="margin-top:14px;">witdraws
    
      <a href="withdraws.php?pending" style="margin-left:60%;"class="btn btn-dark">Pending</a>
      <a href="withdraws.php?success" style="background:#198754; border:#198754;" class="btn btn-success">Success</a>
        <a href="withdraws.php?rejected" style="background:#c82333; border:#c82333;" class="btn btn-danger">Rejected</a>

        </h5>
    </nav>
    <form method="post" action="">
    <div class="mt-3 row">
     <div class="col-md-3" style="margin-left:11%;">
     
   <div class="dropdown" style="width:200px;margin-left:45%;">
   <select class="form-control select2" data-toggle="select2" name="status" id="status">
   <option value="0"><?php echo "Set Status"; ?></option>
    <option value="pending">Pending</option>
    <option value="approved">Approved</option>
    <option value="rejected">Rejected</option>
    </select>
  </div> 
</div> 
<div class="col">
<button type="submit" name="stupdate" class="btn btn-dark">Update</button>
</div>
<form>
    
    <!-- <div class="row" >
        <div class="col">

    <div class=" dropdown mt-4" style="width:200px;margin-left:22%;">
   <select class="form-control select2" data-toggle="select2" name="course_level" id="course_level">
   <option value="0"><?php echo "---Select---"; ?></option>
    <option value="beginner">beginner</option>
    <option value="advanced">advanced</option>
    <option value="intermediate">intermediate</option>
    </select>
</div>
<div style="margin-left:22%;"class="col">
   jhgcf
</div>
  </div> 
  <div>  -->

    <?php
if(isset($_GET['pending'])){
    ?>
<div class="col-sm-9 mt-3 list-of-course">
    <!-- Table -->
    <p class="bg-secondary text-white p-2">List of Courses</p>

    <?php
    
    
      $sql = "SELECT * FROM payout where status = 'pending'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    ?>
     <table class="table">
      <thead>
          <tr>
              <th scope="col" style="background:#f5f5fd;"></th>
              <th scope="col" style="background:#f5f5fd;">Amount</th>
              <th scope="col" style="background:#f5f5fd;">Details</th>
              <th scope="col" style="background:#f5f5fd;">Status</th>
              <th scope="col" style="background:#f5f5fd;">Date & Time</th>
              

           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
// <input type="submit" value="chk" name="chk">
          echo '<tr style="background:#f5f5fd;">';
          echo '<td style="background:#f5f5fd;"><form method="post" action=""><input type="checkbox" name="chk[]" value="'.$row['id'].'" ></form></td>';
          
           echo '<td scope="row" style="background:#f5f5fd;">Amount : <b>'.$row['amount'].'</b><br/>
           Method : <b>'.$row['payment_type'].'</b>
           
           </td>';
            echo '<td style="background:#f5f5fd;">PayPal E-Mail Address : <b>'.$row['email_id'].'</b></td>';
            echo '<td style="background:#f5f5fd;"><div style="background:#000;border-radius: 10px; color:#fff"><center><i class="fas fa-clock"></i>&nbsp;'.$row['status'].'</div></td>';
            echo '<td style="background:#f5f5fd;">'.$row['date_added'].'</td>';
            // echo '<td style="background:#f5f5fd;">'.$row['status'].'</td>';
            
           echo '<td style="background:#f5f5fd;">';
            // echo'
            // <form action="editcourse.php" method="POST" class="d-inline">
            // <input type="hidden" name="id" value='.$row["course_id"].'>
            //   <button type="submit" class="btn btn-info mr-3" name="view" value="View">
            //   <i class="fas fa-pen"></i></button>
            // </form>

            //       <form action="" method="POST" class="d-inline">
            //       <input type="hidden" name="id" value='.$row["course_id"].'>
            //          <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i 
            //           class="far fa-trash-alt"></i></button>
            //       </form>
            // </td>
       
        }?>
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
<?php
}
?>
<?php
echo '</tr>';
    //    if(isset($_GET['pending'])){
    //        $id = $_POST['id'];
    //        echo $id;
    //        print_r('knjhgf');
    //     if(!empty($_POST['id'])) {
    //     echo'kjhgcf';
    //     foreach($_POST['id'] as $value){
    //         echo "value : ".$value.'<br/>';
    //     }

    // }
        //  } 
?>

<?php
if(isset($_GET['success'])){
    ?>
   <div class="col-sm-9 mt-5 list-of-course">
    <!-- Table -->
    <p class="bg-secondary text-white p-2">List of Courses</p>

    <?php
    
    
      $sql = "SELECT * FROM payout where status = 'success'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    ?>
     <table class="table">
      <thead>
          <tr>
              <th scope="col" style="background:#f5f5fd;"></th>
              <th scope="col" style="background:#f5f5fd;">Amount</th>
              <th scope="col" style="background:#f5f5fd;">Details</th>
              <th scope="col" style="background:#f5f5fd;">Status</th>
              <th scope="col" style="background:#f5f5fd;">Date & Time</th>
              

           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
          echo '<tr style="background:#f5f5fd;">';
          echo '<td style="background:#f5f5fd;"><input type="checkbox" aria-label="Checkbox for following text input"></td>';
           echo '<td scope="row" style="background:#f5f5fd;">Amount : <b>'.$row['amount'].'</b><br/>
           Method : <b>'.$row['payment_type'].'</b>
           </td>';
            echo '<td style="background:#f5f5fd;">PayPal E-Mail Address : <b>'.$row['email_id'].'</b></td>';
            echo '<td style="background:#f5f5fd;"><div style="background:#000;border-radius: 10px; color:#fff"><center><i class="fas fa-clock"></i>&nbsp;'.$row['status'].'</div></td>';
            echo '<td style="background:#f5f5fd;">'.$row['date_added'].'</td>';
            // echo '<td style="background:#f5f5fd;">'.$row['status'].'</td>';
            
           echo '<td style="background:#f5f5fd;">';
            // echo'
            // <form action="editcourse.php" method="POST" class="d-inline">
            // <input type="hidden" name="id" value='.$row["course_id"].'>
            //   <button type="submit" class="btn btn-info mr-3" name="view" value="View">
            //   <i class="fas fa-pen"></i></button>
            // </form>

            //       <form action="" method="POST" class="d-inline">
            //       <input type="hidden" name="id" value='.$row["course_id"].'>
            //          <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i 
            //           class="far fa-trash-alt"></i></button>
            //       </form>
            // </td>
       echo '</tr>';
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
   <?php
}
?>
<?php
  if(isset($_REQUEST['submit'])){
      echo"jhgfc";

    if(isset($_POST['id'])) {
        $id1 = $_POST['id'];

    //   $lang = implode(",",$_POST['lang']);

      // Insert and Update record
      $checkEntries = mysqli_query($conn,"SELECT * FROM payout where id = $id");
      print_r($checkEntries);
    //   if(mysqli_num_rows($checkEntries) == 0){
    //     mysqli_query($conn,"INSERT INTO payout(status) VALUES('".$lang."')");
    //   }else{
    //     mysqli_query($conn,"UPDATE payout SET status='".$lang."' ");
    //   }
 
    }

  }else{
      
  }
  ?>


<?php
if(isset($_GET['rejected'])){
    ?>
   <div class="col-sm-9 mt-5 list-of-course">
    <!-- Table -->
    <p class="bg-secondary text-white p-2">List of Courses</p>

    <?php
    
    
      $sql = "SELECT * FROM payout where status = 'rejected'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    ?>
     <table class="table">
      <thead>
          <tr>
              <th scope="col" style="background:#f5f5fd;"></th>
              <th scope="col" style="background:#f5f5fd;">Amount</th>
              <th scope="col" style="background:#f5f5fd;">Details</th>
              <th scope="col" style="background:#f5f5fd;">Status</th>
              <th scope="col" style="background:#f5f5fd;">Date & Time</th>
              

           </tr>
        </thead>
      <tbody>
         <?php  while($row = $result->fetch_assoc()){  
          echo '<tr style="background:#f5f5fd;">';
          echo '<td style="background:#f5f5fd;"><input type="checkbox" aria-label="Checkbox for following text input"></td>';
           echo '<td scope="row" style="background:#f5f5fd;">Amount : <b>'.$row['amount'].'</b><br/>
           Method : <b>'.$row['payment_type'].'</b>
           </td>';
            echo '<td style="background:#f5f5fd;">PayPal E-Mail Address : <b>'.$row['email_id'].'</b></td>';
            echo '<td style="background:#f5f5fd;"><div style="background:#000;border-radius: 10px; color:#fff"><center><i class="fas fa-clock"></i>&nbsp;'.$row['status'].'</div></td>';
            echo '<td style="background:#f5f5fd;">'.$row['date_added'].'</td>';
            // echo '<td style="background:#f5f5fd;">'.$row['status'].'</td>';
            
           echo '<td style="background:#f5f5fd;">';
            // echo'
            // <form action="editcourse.php" method="POST" class="d-inline">
            // <input type="hidden" name="id" value='.$row["course_id"].'>
            //   <button type="submit" class="btn btn-info mr-3" name="view" value="View">
            //   <i class="fas fa-pen"></i></button>
            // </form>

            //       <form action="" method="POST" class="d-inline">
            //       <input type="hidden" name="id" value='.$row["course_id"].'>
            //          <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i 
            //           class="far fa-trash-alt"></i></button>
            //       </form>
            // </td>
       echo '</tr>';
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
   <?php
}
?>
   



  <!-- </div> -->
  
<?php
      include('./admininclude/footer.php');
?>




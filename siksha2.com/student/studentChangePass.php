<?php

session_start();
include('./stuInclude/header.php');
include('../dbConnection.php');
if(!isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}else{
   // echo "<script> location.href='../index.php'</script>";
}

// if(!isset($_SESSION)){
//     session_start();
// }
//       if(isset($_SESSION['is_admin_login'])){
//           $adminEmail = $_SESSION['adminLogEmail'];
//       }else{
//           echo "<script> location.href='../index.php'; </script>";
//       }
//       include('./admininclude/header.php');
//       include('../dbConnection.php');


//     $adminEmail = $_SESSION['adminLogEmail'];
    
 ?>

<!-- // <div class="col-sm-9 mt-5">
//     <div class="row">
//     <div class="col-sm-6">-->
//     <?php 
if(isset($_REQUEST['stuPassUpdatebtn'])){
        if(($_REQUEST['stuNewPass'] == "")){
           $passmsg = '<div class="alert alert-Warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        }else{
           $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
           $result = $conn->query($sql);
            if($result->num_rows == 1){
                $stuPass = $_REQUEST['stuNewPass'];
                //$adminPass = $_REQUEST['inputnewpassword'];
                $sql=" UPDATE student set stu_pass = '$stuPass' WHERE stu_email='$stuEmail'";
               //$s = "update tbl_admin set admin_pass = '{$_POST["adminPass"]}' where admin_email =" .$_SESSION["adminLogemail"];
              // $conn->query($s);
							//echo "<p class='success'>Password Changed successfully</p>";
                 if($conn->query($sql) == TRUE){
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
                 }else{
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
                 }
            }
        }
   }
?>

<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
        <form class="mt-5 mx-5" method="POST">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuEmail ?>" readonly>
            </div>
            <div class="form-group">
                <label for="inputenewpassword">New Password</label>
                <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="stuNewPass">
            </div>
            <button type="submit" class="btn btn-primary mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
             <?php if(isset($passmsg)){echo $passmsg;}?> 
        </form>
        </div>
    </div>
</div>
</div>
<?php
include('./stuInclude/footer.php');
?>
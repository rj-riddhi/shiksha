<?php
session_start();

include('./admininclude/header.php');
include('../dbConnection.php');
$adminEmail = $_SESSION['stuLogEmail'];
// if(isset($_SESSION['is_admin_login'])){
//     $adminEmail = $_SESSION['adminLogEmail'];
// }else{
//     echo "<script> location.href='../index.php'; </script>";
// }
 

?>

<?php if(isset($_REQUEST['updatepass'])){
            $oldpass = $_REQUEST['oldpass'];
           $sql = "SELECT * FROM student WHERE stu_email = '$adminEmail' AND password='$oldpass'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
				$fetch = mysqli_fetch_assoc($result);
                // $hashpassword = $fetch["password"];
                // $sid = $fetch["stu_id"];
                // $stu_name=$fetch["stu_name"];
                $newpass = $_REQUEST['newpass'];
                $confpass = $_REQUEST['confpass'];
                if($newpass != $confpass){
                    $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Both Password must be same</div>';
                }else{
                // $password_hash = password_hash($newpass, PASSWORD_BCRYPT);
                    $sqlq = "UPDATE student SET password = '$newpass' WHERE stu_email = '$adminEmail' ";
                     if($conn->query($sqlq) == TRUE){
                        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">updated Successfully</div>';
                     }else{
                        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">not updated</div>';
                     }
                }
                }
			else{
				 $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">check Password</div>';
			}
} ?>

<div class="mt-5" style="width:80%;margin-left:22%;">
<form  method="POST" action="adminChangepass.php">

	<div class="form-group col-md-6 input-group-lg">
    	<label for="oldpass" style="color:#000;font-size:17px;">Old password</label>
    	<input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="oldpass" name="oldpass" placeholder="Old Password" required>
  	</div>
	  <div class="form-row">
    <div class="form-group col-md-6 input-group-lg" style="margin-top: 20px;">
      <label for="newpass" style="color:#000;font-size:17px;">New Password</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="newpass" name="newpass" placeholder="New Password" required>
    </div>
    <div class="form-group col-md-6 input-group-lg" style="margin-top: 20px;">
      <label for="confpass" style="color:#000;font-size:17px;">Confirm New Password</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="confpass" name="confpass" placeholder=" Confirm Password" required>
    </div>
  </div>
  <!-- <button type="submit" name="updatepass" id="updatepass" class="btn" style="border-radius:10px;">update Password</button> -->
  <button type="submit" class="btn btn-danger" style="margin-top: 25px;"
            id="updatepass" name="updatepass">Update</button>
  <?php if(isset($passmsg)) {echo $passmsg;} ?>
</form>
</div> 

<?php
      include('./admininclude/footer.php');
   ?>
<?php
    include('./admininclude/header.php');
    include('../dbConnection.php');
    if(isset($_SESSION['is_login'])){
  $adminEmail = $_SESSION['stuLogEmail'];
    $stu_name=$_SESSION['stu_name'];
}


$sql = "SELECT * FROM student where stu_email = '$adminEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	$admin_id = $row["stu_id"];
	$admin_name = $row["stu_name"];
	$email = $row["stu_email"];
	$admin_img = $row["stu_img"];
	
}

if(isset($_REQUEST['updateAdminBtn'])){
    if(($_REQUEST['admin_name'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    }else{
        $admin_name = $_REQUEST["admin_name"];
        $email = $_REQUEST['email'];
        $admin_img = $_FILES['admin_img']['name'];
        $admin_image_temp = $_FILES['admin_img']['tmp_name'];
        $img_folder = '../image/courseimg/'.$admin_img;
        move_uploaded_file($admin_img, $img_folder);
        $sql = "UPDATE student SET stu_name = '$admin_name', stu_email = '$email', stu_img = '$img_folder' WHERE stu_email = '$adminEmail'";
        if($conn->query($sql) == TRUE){
           $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
        }else{
           $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
    }
}
?>
<div class="col-sm-6 mt-5 form-of-space">
<form class="mx-5" method="POST" enctype="multipart/form-data">

 <div class="mt-5 form-group">
   <label for="admin_id">Admin ID</label>
   <input type="text" class="form-control" id="admin_id" name="admin_id" value=" <?php if(isset($admin_id)) {echo $admin_id;} ?>" readonly>
  </div>

  <div class="mt-3 form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value=" <?php if(isset($email)) {echo $email;} ?>" readonly>
  </div>

   <div class="mt-3 form-group">
    <label for="admin_name">Name</label>
    <input type="text" class="form-control" id="admin_name" name="admin_name" value=" <?php if(isset($admin_name)) {echo $admin_name;} ?>">
   <div class="mt-3 form-group">

     <label for="admin_img">Upload Image</label>
      <input type="file" class="form-control-file" id="admin_img" name="admin_img">
   </div>
   <button type="submit" class="mt-4 btn btn-danger"
            id="updateAdminBtn" name="updateAdminBtn">Update</button>
   <?php if(isset($passmsg)) {echo $passmsg; } ?>
  </form>
  </div>
  
  </div>



<?php
      include('./admininclude/footer.php');
?>
<?php

// session_start();
// include('./admininclude/header.php');
// include('../dbConnection.php');
// if(!isset($_SESSION['adminLogemail'])){
//     echo "<script> location.href='../index.php'</script>";
// }

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


    //$adminEmail = $_SESSION['adminLogEmail'];
    
// ?>

<!-- <div class="col-sm-9 mt-5">
    <div class="row">
    <div class="col-sm-6">
    <?php
//if(isset($_REQUEST['adminPassUpdatebtn'])){
        //if(($_REQUEST['adminPass'] == "")){
           // $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        //}else{
           // $sql = "SELECT * FROM tbl_admin WHERE admin_email = '{$_SESSION["adminLogemail"]}'";
           // $result = $conn->query($sql);
            //if($result->num_rows>0){
                // $adminEmail = $_REQUEST['inputEmail'];
                // $adminPass = $_REQUEST['inputnewpassword'];
                //$s="update student set PASS='{$_POST["npass"]}' where ID=".$_SESSION["ID"];
               // $s = "update tbl_admin set admin_pass = '{$_POST["adminPass"]}' where admin_email =" .$_SESSION["adminLogemail"];
               // $conn->query($s);
							//echo "<p class='success'>Password Changed successfully</p>";
                //  if($conn->query($sql) == TRUE){
                //     $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
                //  }else{
                //     $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
                //  }
            //}
        //}
   // }
?>
        <form class="mt-5 mx-5">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" >
            </div>
            <div class="form-group">
                <label for="inputenewpassword">New Password</label>
                <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="adminPass">
            </div>
            <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdatebtn" id="adminPassUpdatebtn">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
             <?php //if(isset($passmsg)){echo $passmsg;}?> 
        </form>
    </div>
    </div>
</div> -->


<?php
ob_start();
session_start();
include('./admininclude/header.php');
include('../dbConnection.php');

if(!isset($_SESSION["is_admin_login"]) && !isset($_SESSION["adminLogemail"]))
{
	header("location:index.php");
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>LIBRARY MANAGEMENT SYSTEM</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>E-Library Management System</h1>
			</div>
			<div id="wrapper">
				<h3 id="heading">Change Password</h3>
				<div id="center">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="select * from tbl_admin where admin_pass='{$_POST["opass"]}' and admin_email='{$_SESSION["adminLogemail"]}'";
						$res=$conn->query($sql);
						if($res->num_rows>0)
						{
							$s="update tbl_admin set admin_pass='{$_POST["npass"]}' where admin_email=".$_SESSION["adminLogemail"];
							$conn->query($s);
							echo "<p class='success'>Password Changed successfully</p>";
						}
						else
						{
							echo "<p class='error'>Invalid Password</p>";
						}
					}
				?>
					<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
						<label>Old Password</label>
						<input type="password" name="opass" required>
						<label>New Password</label>
						<input type="password" name="npass" required>
						<button type="submit" name="submit">Update Password</button>
					</form>
				</div>
			</div>
			<div id="navi">
				<?php
				    //include "usersidebar.php";
				?>
			</div>
			<div id="footer">
				<p>Copyright &copy; TMTBCA 2021</p>
			</div>
		</div>
	</body>
</html>

    
                
                
            
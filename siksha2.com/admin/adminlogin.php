
 <?php
	ob_start();
	session_start();
    include_once('../dbconnection.php');
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
				<h3 id="heading">Admin Login Here.</h3>
				<div id="center">
				<form action="adminlogin.php" method="post">
					<label>Name<label>
					<input type="text" name="admin_email" id = "admin_email" required>
					<label>Password<label>
					<input type="Password" name="admin_pass" id = "admin_pass" required>
					<button type="submit" name="submit">Login Now</button>
				</form>
				<?php
					if(isset($_POST["submit"]))
					{
						$adminemail = $_POST['admin_email'];
						$adminpass = $_POST['admin_pass'];
						$q="SELECT * FROM tbl_admin where admin_email ='$adminemail' and admin_pass='$adminpass'";
						//echo $q;
						$res= mysqli_query($conn,$q) or die ("Failed query".mysqli_error($conn));
						$nor = mysqli_num_rows($res);
						print_r($res);
						if($nor>=1)
						{
							$r=mysqli_fetch_array($res);
							$_SESSION['is_admin_login'] = true;
                            $_SESSION['adminLogemail'] = $adminemail;
							header("location:admindashboard.php");
						}
						else
						{
							echo "<p class='error'>Invalid User Details</p>";
						}
					}
				 ?>
				
				</div>
			</div>
			<div id="navi">
				<?php
				   // include "sidebar.php";
				?>
			</div>
			<div id="footer">
				<p>Copyright &copy; TMTBCA 2021</p>
			</div>
		</div>
	</body>
</html>
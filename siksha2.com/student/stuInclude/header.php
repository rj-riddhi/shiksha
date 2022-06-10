<!-- //student na folder ma stuInclude folder banavu aema header(this) file banavvi. -->
<?php
include_once('../dbConnection.php');
if(!isset($_SESSION)){
	session_start();
}
if(isset($_SESSION['is_login'])){
	$stuLogEmail = $_SESSION['stuLogEmail'];
}else{
  echo "<script> location.href='../index.php;'</script>";
}
if(isset($stuLogEmail)){
	$sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
  //echo "$sql";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$stu_img = $row['stu_img'];
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Shiksha.com</title>
  
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  
  <link rel="stylesheet" href="../css/all.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Ubuntu"
  rel="stylesheet">
  
   <!-- <link rel="stylesheet" href="../css/stustyle.css"> -->
   <link rel="stylesheet" href="../css/adminstyle.css">
  
  </head>
  
  <body>
  
  <!-- //Top navbar -->

  
  <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #181717;" >
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php" >Shiksha.com</a>
</nav>
<!-- <nav class="navbar navbar-dark fixed-top p-0 shadow"
   style="background-color: #225470;">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0"
      href="adminDashboard.php">E-Learning <small class="text-white">Admin Area</small></a>
</nav> -->
  
  <!-- //side bar -->
  
   <div class="container-fluid mb-5 " style="margin-top:40px;">
   <div class="row">
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
     <div class="sidebar-sticky">
      <ul class="nav flex-column">
       <li class="nav-item mb-3">
       <img src="<?php echo $stu_img ?>" alt="studentimage"
       class="img-thumbnail rounded-circle">
       </li>
       <li class="nav-item">
       <a class="nav-link"  style="color:#181717;" <?php //if(PAGE == 'profile') {echo 'active';} ?>" href="studentProfile.php">
       <i class="fas fa-user" style="color:#181717;"></i>
       Profile <span class="sr-only">(current)</span>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="myCourse.php" style="color:#181717;">
       <i class="fab fa-accessible-icon"></i>
       My Course
      </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="stufeedback.php" style="color:#181717;">
      <i class="fab fa-accessible-icon"></i>
      Feedback
     </a>
     </li>
     <li class="nav-item">
     <a class="nav-link" href="studentChangePass.php" style="color:#181717;">
     <i class="fas fa-key"></i>
     Change Password
     </a>
     </li>
     <li class="nav-item">
     <a class="nav-link" href="../logout.php" style="color:#181717;">
     <i class="fas fa-sign-out-alt"></i>
     Logout
     </a>
     </li>
    </ul>
   </div>
  </nav>
   
</head>
</html>
  
  
  
  
  
  
  
  
  
  
  
  
  
<?php
     if(!isset($_SESSION)){
    session_start();
     }
     include('../dbconnection.php');
     if(isset($_SESSION['is_login'])){
	$adminEmail = $_SESSION['stuLogEmail'];
    $stu_name=$_SESSION['stu_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" cpntent="ie=edge">
    <title>Shiksha.com</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="css/themify-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <link rel="stylesheet" href="../css/adminstyle.css">
    <link href="https://www.flaticon.com/free-icons/user" rel="stylesheet" >.
    <link rel="shortcut icon" type="image/x-icon" href="../../image/female.png"> 
    
    
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <?php
   
        $sql = "SELECT * FROM student WHERE stu_email='$adminEmail'";
        // print_r($sql);
        $result = $conn->query($sql);
        // print_r($result);
        // if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $stuId = $row["stu_id"];
            $stuName = $row["stu_name"];
            $stu_img = $row['stu_img'];

            
            
        // }
        ?>
    <!-- Top Navbar -->
    <div style=" margin-left:22%;margin-top:1%;">
    <ul class="nav nav-pills">
  <li class="nav-item">
     <a href="adminDashboard.php"><div title="Dashboard" style=" margin-left:20%;height: 50px; width: 50px; border-radius:10px;background:#f2f3f5;text-align: center; "><i class="fas fa-gauge" style="color:#000;padding-top:14px;height: 20px;width:20px;"></i></div></a>
  </li>
  <li class="nav-item">
     <a href="adminEarnings.php"><div title="View Site" style=" margin-left:40%;height: 50px; width: 50px; border-radius:10px;background:#f2f3f5;text-align: center; "><i class="fas fa-wallet" style="color:#000;padding-top:14px;height: 20px;width:20px;"></i></div></a>
  </li>
  <li class="nav-item">
     <a href="sellReport.php"><div title="Payments" style=" margin-left:60%;height: 50px; width: 50px; border-radius:10px;background:#f2f3f5;text-align: center; "><i class="fas fa-file-invoice" style="color:#000;padding-top:14px;height: 20px;width:20px;"></i></div></a>
  </li>
  <li class="nav-item">
    <a href="adminProfile.php" style="margin-left:2400%;"><img src="<?php echo $stu_img;?>" style="height: 40px; width: 40px;" alt="image"
       class="rounded-circle"></a>
  </li>
</ul>
</ul>
        </div>


 <!-- Side bar -->
 <div class="container-fluid mb-5 border-radius:20px; border:#f5f7fd;" style="">
    <div class="row">
        <nav class=" mb-2 border sidebar  side-nav" style="border-radius:30px; margin-top:1%;">
        <div style=" text-align: center; margin-top:5%;"><h1>Shiksha</h1></div>
            <div >
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="adminDashboard.php">
                          <i class="fas fa-tachometer-alt"></i>
                          Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="courses.php">
                    <i class="fab fa-accessible-icon"></i>
                        Courses
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="category.php">
                    <i class="fas fa-list-alt"></i>
                        Course Category
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="manage_quiz.php">
                    <i class="fa fa-question-circle"></i>
                        Manage Quiz
                     </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="students.php">
                    <i class="fas fa-users"></i>
                        Students
                     </a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="message.php">
                    <i class="fas fa-message"></i>
                        Message
                     </a>
                    </li> -->
                    <li class="nav-item">
                    <a class="nav-link" href="sellReport.php">
                    <i class="fa fa-line-chart"></i>
                        sell Report
                     </a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="adminPaymentStatus.php">
                    <i class="fas fa-table"></i>
                        Payment Status
                     </a>
                    </li> -->
                     <li class="nav-item">
                    <a class="nav-link" href="adminEarnings.php?thisyear">
                    <i class="fas fa-wallet"></i>
                        Earnings
                     </a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="feedback.php">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                        feedback
                     </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="adminChangePass.php">
                    <i class="fas fa-key"></i>
                        Change password
                     </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="adminProfile.php">
                    <i class="fas fa-user-circle"></i>
                        Manage Profile
                     </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="withdraws.php?pending">
                    <i class="fas fa-table"></i>
                        Withdraw
                     </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact.php">
                    <i class="fas fa-comments"></i>
                        contact
                     </a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="addblog.php">
                    <i class="fa fa-cube"></i>
                        Manage Blog
                     </a>
                    </li> -->
                   
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                        Logout
                     </a>
                    </li>

                </ul>
            </div>
        </nav>

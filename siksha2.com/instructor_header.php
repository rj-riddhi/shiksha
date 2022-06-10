<?php
     if(!isset($_SESSION)){
    session_start();
     }
     include('dbconnection.php');
     if(isset($_SESSION['is_login'])){
	$stuEmail = $_SESSION['stuLogEmail'];
    $stu_name=$_SESSION['stu_name'];
}
?>
<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shiksha.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/hover.css">
    <link rel="stylesheet" href="css/insstyle.css">
    <link rel="stylesheet" href="css/insstyle.css">
    <!-- <link rel="stylesheet" href="css/adminstyle.css"> --> 

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <header id="home">
        <div class="header-area">
            <!-- header-bottom -->
            <div class="header-bottom-area header-sticky" style="transition: .6s;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="logo">
                                <a href="index.php">
                                    <h2><b>Shiksha.com</b></h2>
                                </a>
                            </div>
                            
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                            <div class="main-menu f-right">
                                <nav id="mobile-menu" style="display: block;">
                                    <ul>
                                        <li>
                                            <!-- <a class="tooltip1" href="become_instructor.php">BECOME INSTRUCTOR</a> -->
                                            <a class="tooltip1" href="index.php">student
                                            <div class="tooltiptext" style="background:#fff; width: 250px;margin-left: -170px; padding: 10px;">
                                            <p>Switch to the student view here - get back to the courses you’re taking.</p>
                                            </div>
                                            </a>
                                        </li>
                                        <li>
                                        <?php
                                        $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
                                        $result = $conn->query($sql);
                                        if($result->num_rows == 1){
                                            $row = $result->fetch_assoc();
                                            $stuId = $row["stu_id"];
                                            $stuName = $row["stu_name"];
                                            
                                        }
                                        
                                            echo '<a href="student/studentProfile.php"><img src="'. str_replace('..','.',$row["stu_img"]).'" alt="bbhjbhjb" style="height: 40px; width: 40px;" alt="image" class="rounded-circle"></a>';
                                            ?>
                                            <!-- <div style="height: 40px; width: 40px; background:#000; color:#fff; padding:22%;" class="rounded-circle">SK</div> -->
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="header-top" style="background-color: #181717; height: 150px;">
                <div class="container">
                    <h1 style="color:#fff;">Welcome <?php echo $stu_name ?></h1>
                    <br><br>
                    <div class="row">
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-12"> -->
                            <div class="header-contact-info d-flex" >
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-layout-grid2" style="color:#ffffff; font-size:20px;"></span>
                                    <a class="phone-number" href="instructor_dashboard.php" style="color:#fff; font-size:20px;">Dashboard</a>
                                </div>
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-layout-media-overlay-alt-2" style="color:#ffffff; font-size:20px;"></span>
                                    <a class="phone-number" href="instructor_course.php" style="color:#fff; font-size:20px;">My Course</a>
                                </div>
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-control-shuffle" style="color:#ffffff; font-size:20px;"></span>
                                    <a class="phone-number" href="ins_earnings.php" style="color:#fff; font-size:20px;">Earnings</a>
                                </div>
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-export" style="color:#ffffff; font-size:20px;"></span>
                                    <a class="phone-number" href="logout.php" style="color:#fff; font-size:20px;">Logout</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>



            
            <!-- /end header-bottom -->
        </div>
    </header>
    <!-- header-end -->
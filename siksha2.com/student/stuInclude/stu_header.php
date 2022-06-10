<?php
     if(!isset($_SESSION)){
    session_start();
     }
     include('../dbconnection.php');
    
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

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header-start -->
    <header id="home">
        <div class="header-area">
            <!-- header-top -->
            <div class="header-top" style="background-color: #181717;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="header-contact-info d-flex" >
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-headphone" style="color:#ffffff;"></span>
                                    <p class="phone-number">+0123456789</p>
                                </div>
                                <div class="header-contact header-contact-email">
                                    <span class="ti-email" style="color:#ffffff;"></span>
                                    <p class="email-name">support@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="header-social-icon-list">
                                <ul>
                                    <li><a href="#"><span class="ti-facebook"style="color:#ffffff;"></span></a></li>
                                    <li><a href="#"><span class="ti-twitter-alt" style="color:#ffffff;"></span></a></li>
                                    <li><a href="#"><span class="ti-dribbble" style="color:#ffffff;"></span></a></li>
                                    <li><a href="#"><span class="ti-google" style="color:#ffffff;"></span></a></li>
                                    <li><a href="#"><span class="ti-pinterest" style="color:#ffffff;"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /end header-top -->
            <!-- header-bottom -->
            <div class="header-bottom-area header-sticky" style="transition: .6s;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="">
                                <a style="color:#313131"href="../index.php">
                                    <h2><b>Shiksha.com</b></h2>
                                    
                                    <!-- <img src="img/logo/logo.png" alt=""> -->
                                </a>
                            </div>
                            
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                            <div class="header-bottom-icon f-right">
                                <ul>
                                    <li class="toggle-search-icon"><a href="#"><span class="ti-search"></span>
                                            <div class="toggle-search-box">
                                                <form action="./course.php" method="GET" id="searchbox">
                                                    <input placeholder="Search" type="text" id="search" name="search">
                                                    <button class="button-search"><span class="ti-search"></span></button>
                                                </form>
                                            </div>
                                        </a>

                                    </li>
                                    <?php 
                                    

                                    ?>
                                    
                                    <li class="shopping-cart"><a class ="s-cart" href="../cart.php"><span class="ti-shopping-cart"></span>
                                             <span class="shopping-counter" style="background-color:#000000;color:#ffffff;"><?php 
                                             if(isset($_SESSION['cart'])){
                                             $cart=$_SESSION['cart'];
                                             echo count($cart);
                                            }else{
                                                echo 0;
                                    }?> 
                                       
                                           
                                        </span>
                                        </a>
                                     <?php
                                        if(isset($_SESSION['stuLogEmail'])){
                                        $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
                                        $result = $conn->query($sql);
                                        if($result->num_rows == 1){
                                            $row = $result->fetch_assoc();
                                            $stuId = $row["stu_id"];
                                            $stuName = $row["stu_name"];
                                            
                                        }
                                        
                                            echo '<a href="stu_dashboard.php" "><img title="My Profile" src="'. str_replace('.','.',$row["stu_img"]).'" alt="Image" style="height: 40px; width: 40px;" alt="image" class="rounded-circle"></a>';
                                    }
                                            ?>
                                    
                                    </li>
                                        
							<br>
							<br>
						
							
                                    
                                </ul>
                            </div>
                            <div class="main-menu f-right">
                                <nav id="mobile-menu" style="display: block;">
                                    <ul>
                                         <li>
                                            <a class=" dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Categories
                                                    </a>
                                                    <div class="dropdown-menu" style="width: 250px;" aria-labelledby="navbarDropdownMenuLink">
                                                    <?php
                                                        $sql = "SELECT * FROM category ";
                                                            $result = $conn->query($sql);
                                                            if($result->num_rows > 0){
                                                                while($row = $result->fetch_assoc()){
                                                                    $cat_id = $row['cat_id'];
                                                    echo '
                                                    
                                                    <a class="dropdown-item pt-2 pb-2 pr-1 pl-1" href="course.php?cat_id='.$cat_id.'" style="font-style: normal; font-weight:100;">'.$row["cat_name"].'<div class="f-right ti-angle-right"  style="height:15px; width: 15px;"></div></a>';
                                                                }
                                                                }
                                                            ?>
                                                    </div>
                                        </li>
                                        <li>
                                            <a href="../index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="../course_filter.php">COURSES</a>
                                        </li>
                                        <li>
                                            <a href="../contact_us.php">CONTACT</a>
                                        </li>
                                         <?php
                                        if(isset($_SESSION['stuLogEmail'])){
                                            $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
                                            $result = $conn->query($sql);
                                            if($result->num_rows == 1){
                                                $row = $result->fetch_assoc();
                                                $is_ins = $row["is_instructor"];
                                                
                                            }
                                                if($is_ins == 1){
                                                    echo ' <li>
                                                            <a href="../instructor_dashboard.php">INSTRUCTOR</a>
                                                        </li>';
                                                }
                                                else{
                                                    echo '<li>
                                                            <a href="become_instructor.php">BECOME INSTRUCTOR</a>
                                                        </li>';
                                                }
                                    }else{
                                    echo '<li>
                                                    <a href="become_instructor.php">BECOME INSTRUCTOR</a>
                                                  </li>';
                                    }

                                        ?>
                                       
                                        <?php
                                            //session_start();
                                            if(isset($_SESSION['is_login'])){
                                                echo '
                                                   
                                                    <li>
                                                        <a href="../logout.php">LOGOUT</a>
                                                    </li>'
                                                    // <li>
                                                    //     <a href="../Wishlist.php">MY WISHLIST</a>
                                                    // </li>
                                                    
                                                    // <li>
                                                    // <a href="paymentstatus.php">PAYMENT STATUS</a>
                                                    //  </li>
                                                    ;
                                            }else {
                                                echo'
                                                
                                                    <li> 
                                                         <a href="login.php" >login</a>
                                                     </li>
                                                     
                                                     <li> 
                                                         <a href="register.php" >Register</a>
                                                     </li>';
                                            }
                                            //     echo '
                                            //         <li> 
                                            //             <a href="#" data-toggle="modal" data-target="#loginModal">login</a>
                                            //         </li>
                                            //         <li>
                                            //             <a href="#" data-toggle="modal" data-target="#signupModal">register</a>
                                            //         </li>';
                                            // }
                                        ?>
                                        
                                        
                                        <!-- <li>
                                            <a href="#">FEEDBACK</a>
                                        </li> -->
                                        
                                       
                                        
                                       
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
            <!-- /end header-bottom -->
        </div>
    </header>
    <!-- header-end -->
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/meanmenu.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/hover.css">
    <link rel="stylesheet" href="../css/insstyle.css">
    <link rel="stylesheet" href="../css/insstyle.css">
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
            <!-- <div class="header-bottom-area header-sticky" style="transition: .6s;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="logo">
                                <a href="../index.php">
                                    <h2><b>Shiksha.com</b></h2>
                                </a>
                            </div>
                            
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                            <div class="main-menu f-right">
                                <nav id="mobile-menu" style="display: block;">
                                    <ul>
                                        <li>
                                            <a class="tooltip1" href="become_instructor.php">BECOME INSTRUCTOR</a>
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
                                            <div style="height: 40px; width: 40px; background:#000; color:#fff; padding:22%;" class="rounded-circle">SK</div>
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
            </div> -->



            <div class="header-top" style="background-color: #34363a; height: 150px;">
                <div class="container">
                    <div class="row">
                    <h1 style="color:#fff;">My Learning</h1>
                                    </div>
                    <br><br>
                    <div class="row">
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-12"> -->
                            <div class="header-contact-info d-flex" >
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-layout-grid2" style="color:#fff; font-size:20px;"></span>
                                    <a class="phone-number" href="stu_dashboard.php" style="color:#fff; font-size:20px;">Dashboard</a>
                                </div>
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-layout-media-overlay-alt-2" style="color:#fff; font-size:20px;"></span>
                                    <a class="phone-number" href="myCourse.php" style="color:#fff; font-size:20px;">Enrolled Course</a>
                                </div>
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-control-shuffle" style="color:#fff; font-size:20px;"></span>
                                    <a class="phone-number" href="review.php" style="color:#fff; font-size:20px;">Reviews</a>
                                </div>
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-widget" style="color:#fff; font-size:20px;"></span>
                                    <a class="phone-number" href="studentProfile.php?profilesettings" style="color:#fff; font-size:20px;">Account</a>
                                </div>
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-export" style="color:#fff; font-size:20px;"></span>
                                    <a class="phone-number" href="../logout.php" style="color:#fff; font-size:20px;">Logout</a>
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
<?php
     if(!isset($_SESSION)){
    session_start();
     }
     include('./dbconnection.php');
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
                            <div class="logo">
                                <a href="index.php">
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
                                                <form action="#" id="searchbox">
                                                    <input placeholder="Search" type="text">
                                                    <button class="button-search"><span class="ti-search"></span></button>
                                                </form>
                                            </div>
                                        </a>

                                    </li>
                                    <?php 
                                    

                                    ?>
                                    
                                    <li class="shopping-cart"><a class ="s-cart" href="cart.php"><span class="ti-shopping-cart"></span>
                                             <span class="shopping-counter" style="background-color:#000000;color:#ffffff;"><?php 
                                             if(isset($_SESSION['cart'])){
                                             $cart=$_SESSION['cart'];
                                             echo count($cart);
                                            }else{
                                                echo 0;
                                    }?> 
                                       
                                           
                                        </span>
                                        </a></li>
                                        
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
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="course_filter.php">COURSES</a>
                                        </li>
                                        
                                       
                                        <?php
                                            //session_start();
                                            if(isset($_SESSION['is_login'])){
                                                echo '
                                                    <li>
                                                        <a href="student/studentProfile.php">MY PROFILE</a>
                                                    </li>
                                                    <li>
                                                        <a href="logout.php">LOGOUT</a>
                                                    </li>
                                                    <li>
                                                        <a href="Wishlist.php">MY WISHLIST</a>
                                                    </li>
                                                    <li>
                                                    <a href="paymentstatus.php">PAYMENT STATUS</a>
                                        </li>'
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
                                        <li>
                                            <a href="contact_us.php">CONTACT</a>
                                        </li>
                                        <li>
                                            <a href="become_instructor.php">BECOME INSTRUCTOR</a>
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
            <!-- /end header-bottom -->
        </div>
    </header>
    <!-- header-end -->
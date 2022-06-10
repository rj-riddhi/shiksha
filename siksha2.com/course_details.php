<?php
    include('./dbconnection.php');
    include('./maininclude/header.php')
?>
    <!-- slider-start -->
    <div class="slider-area">
        <div class="pages-title">
            <div class="single-slider slider-height  d-flex align-items-center" style="background-image: url(img/slider/i_16.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Course Details</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <div class="course-details-area gray-bg pt-100">
        <div class="container">
            <?php
                if(isset($_GET['course_id'])){
                    $course_id = $_GET['course_id'];
                    $_SESSION['course_id'] = $course_id;
                    $sql = "SELECT * from course WHERE course_id = '$course_id'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                }
            ?>
            <div class="row">
                <div class="col-xl-8 col-lg-4">
                    <div class="single-course-details-area mb-30">
                        <div class="course-details-thumb">
                            <img <?php echo 'src ="'. str_replace('..','.',$row["course_img"]).'" '?> style="height: 450px; width:770px;" alt="">
                        </div>
                        <div class="white-bg" style=" padding-top: 38px;padding-left: 7px;padding-right: 5px;padding-bottom: 45px;">
                            <div class="course-details-title mb-20">
                                <h1><?php echo $row['course_name']?></h1>
                            </div>
                            <div class="course-details-tabs">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist" style="margin-left:0;">
                                    <li class="nav-item">
                                        <a class="nav-link active mr-3 text-primary" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mr-3 text-primary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Curriculum</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mr-3 text-primary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Advisor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mr-3 text-primary" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mr-3 text-primary" id="pills-outcome-tab" data-toggle="pill" href="#pills-outcome" role="tab" aria-controls="pills-contact" aria-selected="false">OutComes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mr-3 text-primary" id="pills-outcome1-tab" data-toggle="pill" href="#pills-outcome1" role="tab" aria-controls="pills-contact" aria-selected="false">Requirements</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="course-details-overview-top">
                                            <p class="course-details-overview-para"><?php echo $row['course_desc']?></p>
                                        </div>
                                        <!-- <div class="course-details-overview-bottom d-flex justify-content-between mt-25">
                                            <div class="course-overview-info-left">
                                                <div class="course-overview-info-advisor mt-10">
                                                    <span class="gray-color">Advisor : <span class="primary-color">Alexzender Alex</span></span>
                                                </div>
                                                <div class="course-overview-student-lecture mt-10">
                                                    <span class="gray-color">Students : <span class="primary-color">15</span></span>
                                                    <span class="student-lecture-number gray-color">Lectures: <span class="primary-color">35</span></span>
                                                </div>
                                                <div class="course-overview-time-delay mt-10">
                                                    <span class="gray-color">Time : <span class="primary-color">30 Hours</span></span>
                                                </div>
                                            </div>
                                            <div class="course-overview-info-right">
                                                <div class="course-overview-info-category mt-10">
                                                    <span class="gray-color">Category :<span class="primary-color"> Design,</span> UX/UI, Web, Print</span>
                                                </div>
                                                <div class="course-overview-info-tag mt-10">
                                                    <span class="gray-color">Tags : <span class="primary-color"> Web Development,</span> Layout</span>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <!-- <p class="course-details-curiculum-para">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system and expoune.</p> -->
                                        <div class="curiculum-lecture-details">
                                            <div class="single-curiculum-lecture table-responsive mt-10">
                                                <div class="container">
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                           Lesson No.
                                                        </div>
                                                        <div class="col">
                                                        Lesson Name
                                                        </div>
                                                        <div class="col">
                                                        Timing
                                                        </div>
                                                    </div>
                                                     <?php
                                                    $sql = "SELECT * FROM lesson";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0){
                                                        $num = 0;
                                                        while($row1 = $result->fetch_assoc()){
                                                            if($course_id == $row1['course_id']){
                                                                $num++;
                                                            echo '
                                                            <div class="row">
                                                        <div class="col">
                                                           <span class="ti-book"></span>
                                                            <span class="chapter-name">Lesson'.$num.'</span>
                                                        </div>
                                                        <div class="col">
                                                        
                                                                <span class="chapter-name">'.$row1['lesson_name'].'</span>
                                                        </div>
                                                        <div class="col">
                                                        <span class="ti-timer "></span>
                                                                <span class="chapter-name">'.$row1['lesson_duration'].'</span>
                                                        </div>
                                                        </div>';
                                                            }
                                                        }
                                                    }
                                                    ?> 
                                                    
                                                </div>
                                            </div>
                                            
                                           
                                            
                                            
                                            
                                            
                                            
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-outcome" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <!-- <p class="course-details-curiculum-para">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system and expoune.</p> -->
                                        <div class="curiculum-lecture-details">
                                            <div class="single-curiculum-lecture table-responsive mt-10">
                                                <div class="container">
                                                    
                                                     <?php
                                                    $sql = "SELECT * FROM course where course_id = $course_id";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0){
                                                        $num = 0;
                                                        while($row1 = $result->fetch_assoc()){
                                                            if($course_id == $row1['course_id']){
                                                                $num++;
                                                            echo '
                                                            <div class="row">
                                                        
                                                        <div class="col">
                                                        
                                                                <span class="chapter-name">'.$row1['outcomes'].'</span>
                                                        </div>
                                                        
                                                        </div>';
                                                            }
                                                        }
                                                    }
                                                    ?> 
                                                    
                                                </div>
                                            </div>
                                            

                                            
                                            
                                           
                                            
                                            
                                            
                                            
                                            
                                            
                                           
                                            
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-outcome1" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <!-- <p class="course-details-curiculum-para">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system and expoune.</p> -->
                                        <div class="curiculum-lecture-details">
                                            <div class="single-curiculum-lecture table-responsive mt-10">
                                                <div class="container">
                                                    
                                                     <?php
                                                    $sql = "SELECT * FROM course where course_id = $course_id";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0){
                                                        $num = 0;
                                                        while($row1 = $result->fetch_assoc()){
                                                            if($course_id == $row1['course_id']){
                                                                $num++;
                                                            echo '
                                                            <div class="row">
                                                        
                                                        <div class="col">
                                                        
                                                                <span class="chapter-name">'.$row1['requirements'].'</span>
                                                        </div>
                                                        
                                                        </div>';
                                                            }
                                                        }
                                                    }
                                                    ?> 
                                                    
                                                </div>
                                            </div>
                                                </div>
                                                </div>

                                    <?php
                                   $sql = "SELECT s.stu_name,s.stu_img,s.stu_occ,s.aboutme,s.facebook,s.linkedin,s.youtube,s.instagram,s.twitter,s.website FROM student as s JOIN course as c ON s.stu_id = c.ins_id where c.course_id ='$course_id'";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0){
                                                       
                                                        $row = $result->fetch_assoc();
                                                    }
                                                            
                                                               
                                                    
                                                        ?>

                                   
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="course-details-adivisor-info mt-30">
                                            <div class="course-details-adivisor-wrapper">
                                                <div class="course-details-adivisor-inner d-flex">
                                                    <div class="adivisor-thumb">
                                                        <!-- <img src="img/courses/advisors_thumb.jpg" alt=""> -->
                                                        <img <?php echo 'src ="'. str_replace('..','.',$row["stu_img"]).'" '?> style="height: 200px; width:200px;" alt="">

                                                    </div>
                                                    <div class="adivisor-text white-bg">
                                                        <div class="adivisor-text-heading d-flex mb-10">
                                                            <div class="adivisor-text-title">
                                                                <h4><?php echo $row['stu_name']; ?></h4>
                                                                <span><?php echo $row['stu_occ']; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="adivisor-para">
                                                            <p><?php echo $row['aboutme']; ?></p>
                                                            <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa dolore mque laudantium totam rem aperiam eaqipsa quae ab illo inventore veritatvolup tatem quia voluptas sit aspernatur aut odit aut fugit sed quia conseque.</p> -->
                                                        </div>
                                                        <div class="advisors-social-icon-list">
                                                            <ul>
                                                                <li><a href="<?php echo $row["linkedin"] ;?>"><span class="ti-linkedin"></span></a></li>
                                                                <li><a href="<?php echo $row["facebook"] ;?>"><span class="ti-facebook"></span></a></li>
                                                                <li><a href="<?php echo $row["twitter"] ;?>"><span class="ti-twitter-alt"></span></a></li>
                                                                <li><a href="<?php echo $row["instagram"] ;?>"><span class="ti-instagram"></span></a></li>
                                                                <li><a href="<?php echo $row["youtube"] ;?>"><span class="ti-youtube"></span></a></li>
                                                                <li><a href="<?php echo $row["website"] ;?>"><span class="ti-google"></span></a></li>
                                                                
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                            <?php
                                            $sql = "SELECT s.stu_name,s.stu_occ,s.stu_img, r.rating,r.comment,r.add_date FROM review AS r JOIN student AS s
                                                ON s.stu_email = r.stu_email " ;
                                                    // $sql = "SELECT c.course_name,c.course_id,r.course_id r.rating,r.comment,r.stuemail from review as r JOIN course as c ON r.course_id = c.course_id  WHERE stu_email = '$stuLogEmail'";
                                                                // print_r($sql);
                                                                $result = $conn->query($sql);
                                                                if($result->num_rows > 0){
                                                               
                                                                
                                            ?>
                                            



                                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel"   -labelledby="pills-reviews-tab">
                                        <div class="course-details-reviews mt-30">
                                            <?php   
                                             while($row = $result->fetch_assoc()){
                                                                    $rating= $row['rating'];?>
                                            <div class="cours-reviews-list mb-30">
                                                
                                                <div class="course-reviews-info d-flex justify-content-between align-items-center">
                                                   
                                                    <div class="reviews-author-info d-flex">
                                                        
                                                        <div class="reviews-author-thumb">

                                                        <?php
                                                        echo '<img title="My Profile" src="'. str_replace('..','.',$row["stu_img"]).'" alt="Image" style="height: 40px; width: 40px;" alt="image" class="rounded-circle">';
                                                        ?>
                                                            
                                                            <!-- <img src="<?php $row['stu_img']; ?>" alt=""> -->
                                                        </div>
                                                        <div class="reviews-author-title">
                                                            <h1><?php echo $row['stu_name'];?></h1>
                                                            <span><?php echo $row['stu_occ'];?></span>
                                                            <span><?php echo $row['comment'];?></span>
                                                        </div>
                                                    </div>
                                                    <div class="courses-reviews-author-rating">
                                                        <?php if($rating == 5){?>
                                                        <ul>
                                                            <!-- <li><span class="ti-star" style="color:#000;"></span></li> -->
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                           <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star_1.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star_1.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star_1.png" style="height: 15px;width: 15px;" >
                                                        </ul>
                                                        <?php }elseif($rating == 4){?>
                                                            <ul>
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star_1.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star_1.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                        </ul>
                                                        <?php }elseif($rating == 3){?>
                                                            <ul>
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star_1.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                        </ul>
                                                        <?php }elseif($rating == 2){?>
                                                            <ul>
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                        </ul>
                                                        <?php }elseif($rating == 1){?>
                                                            <ul>
                                                            <img src="image/star_1.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                        </ul>
                                                        <?php }else{?>
                                                            <ul>
                                                            <img src="image/star.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star.png" style="height: 16px;width: 16px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                            <img src="image/star.png" style="height: 15px;width: 15px;" >
                                                        </ul>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                                           <?php }
                                                            }
                                                            ?>
                                            
                                            <!-- <div class="cours-reviews-list mb-10">
                                                <div class="course-reviews-info d-flex justify-content-between align-items-center">
                                                    <div class="reviews-author-info d-flex">
                                                        <div class="reviews-author-thumb">
                                                            <img src="img/testimonials/testimonilas_author_thumb2.png" alt="">
                                                        </div>
                                                        <div class="reviews-author-title">
                                                            <h1>Latanya Kinard</h1>
                                                            <span>Web Designer</span>
                                                        </div>
                                                    </div>

                                                    <div class="courses-reviews-author-rating">
                                                        <ul>
                                                            <li><span class="ti-star" style="color:#000;"></span></li>
                                                            <li><img src="image/star_1.png" style="height: 16px;width: 16px;" ></li>
                                                            <li><img src="image/star_1.png" style="height: 16px;width: 16px;" ></li>
                                                            <li><img src="image/star.png" style="height: 15px;width: 15px;" ></li>
                                                            <li><img src="image/star.png" style="height: 15px;width: 15px;" ></li>
                                                            <li><img src="image/star.png" style="height: 15px;width: 15px;" ></li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $sql = "SELECT s.stu_name,c.course_name,c.course_duration,c.course_price,c.course_original_price FROM student as s JOIN course as c ON s.stu_id = c.ins_id where c.course_id ='$course_id'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    
                    $row = $result->fetch_assoc();
                }
                                                            
                                                               
                                                    
                ?>
                <div class="col-xl-4 col-lg-5">
                    <div class="courses-details-sidebar-area">
                        
                        <div class="widget mb-30 widget-padding white-bg">
                            <h4 class="widget-title">Information</h4>
                            <div class="widget-link">
                                <ul class="sidebar-link mb-10">
                                    <li>
                                        <a>Trainer's Name</a>
                                        <span><?php echo $row['stu_name']?></span>
                                    </li>
                                    <li>
                                        <a>duration</a>
                                        <span><?php echo $row['course_duration']?></span>
                                    </li>
                                    <li>
                                        <form action="checkout.php" method="Post">
                                        <a>Price</a>
                                        <span> &nbsp;₹<b><?php echo $row['course_price']?> </b></span>
                                        <span>₹<del><?php echo $row['course_original_price']?></del></span>
                                    </li>
                                    
                                </ul>
                                
                                    </div>

                                    <div class="widget  mt-40 mb-20 white-bg">
                                        <div class="courses-category-name">
                                        <span>
                                        <input type="hidden" name="id" value="'$row['course_price']'">
                                        <?php
                                        echo '<a href="checkout.php?course_id='.$course_id.'" type="submit" name ="buy" class="primary-btn text-uppercase" style="background-color:#181717; color:#ffffff;">Buy Now</a>';
                                        ?>
                                        
                                        </span>
                                        </div>
                                        
                                    </div>
                                    <!-- <input type="hidden" name="id" value="'$row['course_price']'"> -->
                                        </form>
                        
                        <!-- <div class="widget mb-40 widget-padding white-bg">
                            <h4 class="widget-title">Recent Course</h4>
                            <div class="sidebar-rc-post">
                                <ul>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex mb-20">
                                            <div class="rc-post-thumb">
                                                <a href="blog-details.html">
                                                    <img src="img/courses/rcourses_thumb01.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="blog-details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex mb-20">
                                            <div class="rc-post-thumb">
                                                <a href="blog-details.html">
                                                    <img src="img/courses/rcourses_thumb02.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="blog-details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex mb-20">
                                            <div class="rc-post-thumb">
                                                <a href="blog-details.html">
                                                    <img src="img/courses/rcourses_thumb03.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="blog-details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex">
                                            <div class="rc-post-thumb">
                                                <a href="blog-details.html">
                                                    <img src="img/courses/rcourses_thumb04.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="blog-details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- <div class="widget mb-40 widget-padding white-bg">
                            <h4 class="widget-title">Recent Course</h4>
                            <div class="widget-tags clearfix">
                                <ul class="sidebar-tad clearfix">
                                    <li>
                                        <a href="#">CSE</a>
                                    </li>
                                    <li>
                                        <a href="#">Business</a>
                                    </li>
                                    <li>
                                        <a href="#">Study</a>
                                    </li>
                                    <li>
                                        <a href="#">English</a>
                                    </li>
                                    <li>
                                        <a href="#">Education</a>
                                    </li>
                                    <li>
                                        <a href="#">Engineering</a>
                                    </li>
                                    <li>
                                        <a href="#">Advisor</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses start -->
    <!-- <div class="courses-area courses-bg-height gray-bg pt-60 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color">Our Latest Courses</h1>
                        </div>
                        <div class="section-title-para">
                            <p>Belis nisl adipiscing sapien sed malesu diame lacus eget erat Cras mollis scelerisqu Nullam arcu liquam here was consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="courses-list">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb">
                                <img src="img/courses/coursesthumb_home3_01.jpg" alt="">
                            </div>
                            <div class="courses-content courses-content-3 clearfix">
                                <div class="courses-heading mt-25 d-flex">
                                    <div class="course-title-3">
                                        <h1><a href="#">Business Studies</a></h1>
                                    </div>
                                    <div class="courses-pricing-3">
                                        <span>$24.99</span>
                                    </div>
                                </div>
                                <div class="courses-para mt-15">
                                    <p>Maecenas fermentum consequat mi fonec has fermentum ellentesque malesuada.</p>
                                </div>
                                <div class="courses-wrapper-bottom clearfix mt-35">
                                    <div class="courses-button">
                                        <a href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb">
                                <img src="img/courses/coursesthumb_home3_02.jpg" alt="">
                            </div>
                            <div class="courses-content courses-content-3 clearfix">
                                <div class="courses-heading mt-25 d-flex">
                                    <div class="course-title-3">
                                        <h1><a href="#">English Studies</a></h1>
                                    </div>
                                    <div class="courses-pricing-3">
                                        <span>$49.99</span>
                                    </div>
                                </div>
                                <div class="courses-para mt-15">
                                    <p>Maecenas fermentum consequat mi fonec has fermentum ellentesque malesuada.</p>
                                </div>
                                <div class="courses-wrapper-bottom clearfix mt-35">
                                    <div class="courses-button">
                                        <a href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb">
                                <img src="img/courses/coursesthumb_home3_03.jpg" alt="">
                            </div>
                            <div class="courses-content courses-content-3 clearfix">
                                <div class="courses-heading mt-25 d-flex">
                                    <div class="course-title-3">
                                        <h1><a href="#">CSE Engineering</a></h1>
                                    </div>
                                    <div class="courses-pricing-3">
                                        <span>$69.99</span>
                                    </div>
                                </div>
                                <div class="courses-para mt-15">
                                    <p>Maecenas fermentum consequat mi fonec has fermentum ellentesque malesuada.</p>
                                </div>
                                <div class="courses-wrapper-bottom clearfix mt-35">
                                    <div class="courses-button">
                                        <a href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-xl-none d-lg-none d-none d-md-block col-md-6">
                        <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb">
                                <img src="img/courses/coursesthumb_home3_03.jpg" alt="">
                            </div>
                            <div class="courses-content courses-content-3 clearfix">
                                <div class="courses-heading mt-25 d-flex">
                                    <div class="course-title-3">
                                        <h1><a href="#">CSE Engineering</a></h1>
                                    </div>
                                    <div class="courses-pricing-3">
                                        <span>$69.99</span>
                                    </div>
                                </div>
                                <div class="courses-para mt-15">
                                    <p>Maecenas fermentum consequat mi fonec has fermentum ellentesque malesuada.</p>
                                </div>
                                <div class="courses-wrapper-bottom clearfix mt-35">
                                    <div class="courses-button">
                                        <a href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="courses-view-more-area mt-20 mb-30 text-center">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="courses-view-more-btn">
                                <button class="btn gray-border-btn">view more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- courses end -->
    
    <!-- include footer start -->
    <?php
        include('./maininclude/footer.php')
    ?>
    <!--include footer end -->


    
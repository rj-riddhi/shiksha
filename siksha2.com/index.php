<!-- Start includeing header -->
<?php
    include('./maininclude/header.php');
    include('./dbconnection.php');
?>
<!-- End includeing header -->
    <!-- Registration Modal -->
    <?php
    include('./studentRegistration.php');
?>

<!-- End Registration Modal -->
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="row" id="stuLoginForm">
                    
                    <div class="col-12">
                        <input type="email" class="form-control mb-3" id="stuLogemial" name="stuLogemail" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control mb-3" id="stuLogPass" name="stuLogPass" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <input type="checkbox" name="rem" checked class="checkboxlogin"><span>Remember Me</span> 
                        <a href="otp" style="color:blue!important;margin-left:150px;">Forgot Password?</a>     <br><br>
                     </div>
                    
                </form>
                <div class="modal-footer">
                     <small id="statusLogMsg"></small>
                    <button style="" type="submit" class="btn btn-primary" onclick="checkStuLogin()" id="stuLogBtn">LOGIN</button>
                </div>
                <p style="margin-left:100px;">Don't have an account?<a href="signup" style="color:blue!important;">Sign Up</a></p>

            </div>
        </div>
    </div>
</div>
<!-- End Login Modal -->
<!-- admin Login Modal -->
<div class="modal fade" id="adminloginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Admin Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="row" id="adminLoginForm">
                    <!-- <div class="col-12">
                        <input type="text" class="form-control mb-3" id="loginPhone" name="loginPhone" placeholder="Phone">
                    </div> -->
                    <div class="col-12">
                        <input type="email" class="form-control mb-3" id="adminLogemail" name="adminLogemail" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control mb-3" id="adminLogPass" name="adminLogPass" placeholder="Password">
                    </div>
                    <!-- <div class="col-12">
                        <button type="submit" class="btn btn-primary" id="adminLoginBtn">LOGIN</button>
                    </div> -->
                </form>
                <div class="modal-footer">
                    <small id="statusAdminLogMsg"></small>
                    <button type="submit" class="btn btn-primary" onclick="checkAdminLogin()" id="adminLoginBtn">LOGIN</button>
                    <!-- <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End admin Login Modal -->

    <!-- slider-start -->
    <div class="slider-area pos-relative" >
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url(img/slider/bg1.jpg);">
                <div class="container">
                    <div class="row">
                            <div class=" col-md-12">
                            <div class="slider-content slider-content-2 text-right">
                                <p class="white-color f-700 ml-100" style="font-size:60px;" data-animation="fadeInUp" data-delay=".2s">Learning that gets you</p>
                                <p data-animation="fadeInUp" data-delay=".4s" style="font-size:20px;">Skills for your present (and your future). Get started with us.</p>

                                <?php
                                    if(!isset($_SESSION['is_login'])){
                                        echo '
                                        <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s" data-toggle="modal" data-target="#signupModal"><span class="btn-text" style="background-color: #181717;color:#ffffff;">admit now</span></button>
                                        ';
                                    }else{
                                        echo '<a class="theme-btn" data-animation="fadeInUp" data-delay=".6s" href="student/studentProfile.php"><span class="btn-text" style="background-color: #181717;color:#ffffff;">My Profile</span></a>';
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url(img/slider/i_1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-md-12 offset-xl-2">
                            <div class="slider-content slider-content-2 text-center">
                                <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><span>Learning Excellence</h1>
                                <p data-animation="fadeInUp" data-delay=".4s">Education is a commitment to excellence in Teaching and Learning.</p>
                                <?php
                                    if(!isset($_SESSION['is_login'])){
                                        echo '
                                        <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s" data-toggle="modal" data-target="#signupModal"><span class="btn-text" style="background-color: #181717;color:#ffffff;">admit now</span></button>';
                                    }else{
                                        echo '<a class="theme-btn" data-animation="fadeInUp" data-delay=".6s" href="student/studentProfile.php"><span class="btn-text" style="background-color: #181717;color:#ffffff;">My Profile</span></a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url(img/slider/i_10.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-md-12">
                            <div class="slider-content slider-content-2">
                                <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><span>Education – your door to the future</h1>
                                <p data-animation="fadeInUp" data-delay=".4s">Learn at the comfort of your own home</p>
                                <?php
                                    if(!isset($_SESSION['is_login'])){
                                        echo '
                                        <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s" data-toggle="modal" data-target="#signupModal"><span class="btn-text" style="background-color: #181717;color:#ffffff;">admit now</span></button>
                                        ';
                                    }else{
                                        echo '<a class="theme-btn" data-animation="fadeInUp" data-delay=".6s" href="student/studentProfile.php"><span class="btn-text" style="background-color: #181717;color:#ffffff;">My Profile</span></a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- about start -->
     <div id="about" class="about-area pt-100 pb-70">
        <div class="container">
            <!-- <div class="row"> -->
                <!-- <div class="col-xl-7 col-lg-7">
                     <div class="about-title-section mb-30">
                        <h1>Welcome To Our Sikkha</h1>
                        <p>Sorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temin cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure repreh nderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occcu idatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Horem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temin cididunt ut labore et dolore magna aliqua Ut enim ad minim veniam,quis nostrude</p>
                        <button class="theme-btn blue-bg-border mt-20"><span class="btn-text">admit now</span></button>
                    </div> 
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-right-img mb-30">
                        <img src="img/about/about-right.png" alt="">
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30" style=" border-left: 5px solid #000000;">
                        <div class="feature-title-heading">
                            <h3>Lifetime Access</h3>
                            <span>01</span>
                        </div>
                        <div class="feature-text">
                            <p>Sorem ipsum dolor sitcon sectet adipis icing elit sed do eiusmod tems. incididune.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30" style=" border-left: 5px solid #000000;">
                        <div class="feature-title-heading">
                            <h3>Expert Instructor</h3>
                            <span>02</span>
                        </div>
                        <div class="feature-text">
                            <p>Sorem ipsum dolor sitcon sectet adipis icing elit sed do eiusmod tems. incididune.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30" style=" border-left: 5px solid #000000;">
                        <div class="feature-title-heading">
                            <h3>Money Back Guarantee</h3>
                            <span>03</span>
                        </div>
                        <div class="feature-text">
                            <p>Sorem ipsum dolor sitcon sectet adipis icing elit sed do eiusmod tems. incididune.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- about end -->
    <!-- Course Start -->
    <div id="courses" class="courses-area courses-bg-height gray-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color">Top Courses</h1>
                        </div>
                        <div class="section-title-para">
                            <p>Discover our most popular courses for self learning</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="courses-list">
                <div class="row">
                    
                        <?php
                        // $sql = "SELECT * FROM course WHERE is_top_course = 1";
                        $sql = "SELECT s.stu_name,c.status,c.course_name,c.course_img,c.course_price,c.course_original_price,c.course_id FROM course as c JOIN student as s ON c.ins_id = s.stu_id where c.is_top_course = 1 AND c.status=1";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                $course_id = $row['course_id'];
                                echo '
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb" style="height: 200px;">
                                <a href="course_details.php?course_id='.$course_id.'">
                                
                                <img src="'. str_replace('..','.',$row["course_img"]).'" alt="'.$row["course_name"].'" style="height: 250px; border-radius:10px; background-image:img/team/teammember4.jpg;" ></a>
                            </div>
                            <div class="courses-content courses-content-3 clearfix">
                                <div class="mt-25 d-flex">
                                    
                                    <div class="mt-3">
                                        <h5><a href="course_details.php?course_id='.$course_id.'">'.$row["course_name"].'</a></h5>
                                    </div>
                                   
                                </div>
                                <div class="courses-para mt-0">
                                    <p>By '.$row["stu_name"].'</p>
                                </div>
                                <div class="courses-wrapper-bottom clearfix mt-0">
                                    <div class="courses-button">
                                    <div class="f-left">
                                    <span>Price</span>
                                    <span>₹<del>'.$row["course_original_price"].'</del></span>
                                    <span>₹'.$row["course_price"].'</span>
                                    </div>
                                    <div class="courses-pricing-3 f-right">
                                        <a href="course_details.php?course_id='.$course_id.'">Enroll</a>
                                    </div>
                                    
                                         
                                    </div>
                                    
                                     

                                </div>
                                 <div class=" mb-0">
                                    <div class="">
                                    <div class="f-left">
                                    <a href="addtocart.php?course_id='.$course_id.'">Add to cart</a>
                                    </div>
                                    
                                    <div class="f-right">
                                        <a href="addtowishlist.php?course_id='.$course_id.'">Add to wishlist</a>
                                    </div>
                                    
                                         
                                    </div>
                                    <hr>
                                     

                                </div>
                                 

                                
                            </div>
                            
                        </div>
                        </div>
                               
                                ';
                            }
                        }
                        ?>
                        <!-- <center>
                                    <div class=" ml-0"style=" border: 1px solid #000;
                                    width: 0.5px;
                                    height: 20px;"></div>
                                    </center> -->
                        <!-- <div>
                                         <span class=" shopping-cart f-center"><a href="addtocart.php?course_id='.$course_id.'"><span class="pl-10 ti-shopping-cart"></span></span>
                                         <span class=" wishlist f-center"><a href="addtowishlist.php?course_id='.$course_id.'"><span class=" ti-heart"></span></span>
                                        
                                     </div> -->



                                    <!-- <div>
                                        <span class=" wishlist f-right mr-5"><a href="addtowishlist.php?course_id='.$course_id.'">Add to wishlist</span>
                                        <span class=" shopping-cart  ml-5"><a href="addtocart.php?course_id='.$course_id.'">Add to cart</span></span>
                                        
                                        
                                    </div>  -->


                                    

                       

<?php
                        // $sql = "SELECT * FROM course LIMIT 3, 3";
                        // $result = $conn->query($sql);
                        // if($result->num_rows > 0){
                        //     while($row = $result->fetch_assoc()){
                        //         $course_id = $row['course_id'];
                        //         echo '
                        //         <div class="col-xl-4 col-lg-4 col-md-6">
                        //         <div class="courses-wrapper courses-wrapper-3 mb-30">
                        //     <div class="courses-thumb">
                        //         <a href="course_details.php?course_id='.$course_id.'"><img src="'. str_replace('..','.',$row["course_img"]).'" alt=""></a>
                        //     </div>
                        //     <div class="courses-content courses-content-3 clearfix">
                        //         <div class="courses-heading mt-25 d-flex">
                        //             <div class="course-title-3">
                        //                 <h1><a data-toggle="modal" data-target="#popup" $abc = href="#?course_id='.$course_id.'" class="hover">'.$row["course_name"].'</a></h1>
                        //             </div>
                                   
                        //         </div>
                        //         <div class="courses-para mt-15">
                        //             <p>'.$row["course_desc"].'</p>
                        //         </div>
                        //         <div class="courses-wrapper-bottom clearfix mt-35">
                        //             <div class="courses-button">
                        //             <div class="f-left">
                        //             <span>Price</span>
                        //             <span>₹<del>'.$row["course_original_price"].'</del></span>
                        //             <span>₹'.$row["course_price"].'</span>
                        //             </div>
                        //             <div class="courses-pricing-3 f-right">
                        //                 <a href="course_details.php?course_id='.$course_id.'">Enroll</a>
                                       
                        //             </div>
                        //                 <div>
                        //                 <div class=" shopping-cart"><a href="#"><span class="pl-10 ti-shopping-cart"></span></div>
                        //                 <div class=" wishlist"><a href="#"><span class=" ti-heart"></span></div>
                                        
                        //             </div> 
                        //             </div>
                                       
                        //         </div>
                        //     </div>
                        // </div>
                        // </div>
                                
                                
                        //         ';
                        //     }
                        // }
                        ?>
                        
                                    









<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 p-4">
           <?php 

                    if(isset($_GET['course_id'])){
                    $course_id = $_GET['course_id'];
                    $_SESSION['course_id'] = $course_id;
                    $sql = "SELECT * from course WHERE course_id = '$abc'";
                    $result = $conn->query($sql);
                    $row1 = $result->fetch_assoc();

                }




                //  $q = "SELECT * FROM course WHERE course_id = '".$course_id."'";
                //  $res = mysqli_query($conn,$q);
                //  if($result->num_rows > 0){
                //     while($row = $res->fetch_assoc()){
                        echo $row['course_name'];
                        echo "<img src='". str_replace('..','.',$row["course_img"])."' alt=''>";
                    
                 
           ?>
        </div>
    </div>
</div>
                </div>
                </div>
                <div class="courses-view-more-area mt-20 mb-30 text-center">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="">
                                <a href="course_filter.php"class="btn gray-border-btn">view more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="container-fluid">
    <div class="container-fluid mt-5" style=" padding-left:200px; ">
    <center>
  <h2>Top Categories</h2>
                </center>
  <div class="row">
      <?php
                        $sql = "SELECT * FROM category LIMIT 6";
                        
                        $result = $conn->query($sql);
                       
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                 $cat_id = $row['cat_id'];
                                echo '
                                    <div class="col">
                                        <a href="#">
                                        <figure class="figure" style="height: 300px;width: 300px;">
                                        <div style="padding-right: 30px;padding-left: 30px;padding-top: 30px;padding-bottom: 30px;background-color:#EAEDED;">
                                    <a href="course.php?cat_id='.$cat_id.'"><img src="'. str_replace('..','.',$row["cat_image"]).'" style="height: 150px;width: 300px;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."></a>
                                    </div>
                                    <center>
                                <figcaption class="figure-caption" >'.$row["cat_name"].'</figcaption>
                                <center>
                                </figure>
                                        </a>
                                    </div>';
                            }
                        }
                                    
        ?>
     <!-- <div class="col">
        <a href="#">
          <figure class="figure">
  <img src="img/courses/coursesthumb001.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption">A caption for the above image.</figcaption>
</figure>
        </a>
    </div>
     <div class="col">
        <a href="#">
          <figure class="figure">
  <img src="img/courses/coursesthumb001.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption">A caption for the above image.</figcaption>
</figure>
        </a>
    </div>
    <div class="col">
        <a href="#">
          <figure class="figure">
  <img src="img/courses/coursesthumb001.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption">A caption for the above image.</figcaption>
</figure>
        </a>
    </div> -->
    
</div>
</div>
</div>

<div class="container mt-6">
  <div class="row">
    <div class="col text-right">
      <figure class="figure">
  <img src="img/team/teammember4.jpg" class="figure-img img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
  
</figure>
    </div>
    <div class="col text-left mt-5">
    <div class="col-10   offset-1">
      <h2>Become an Instructor</h2>
      <p class="lead">Instructors from around the world teach millions of students on Udemy. We provide the tools and skills to teach what you love.</p>
      <a href="become_instructor.php" class="btn btn-lg btn-danger">Start Teaching</a>
    </div>
    </div>
  </div>  
</div>
<div style="background:#DCDCDC" class="mt-100">
<div class="container-fluid">
<div class="row pt-3 px-3" >
    <!-- courses end -->
    
        </div>
    </div>
    <!-- team end -->
    
    <!-- testimonials start -->
    <!-- <div class="testimonilas-area pt-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color">What Our Students Say</h1>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color">Belis nisl adipiscing sapien sed malesu diame lacus eget erat Cras mollis scelerisqu Nullam arcu liquam here was consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonilas-list">
                <div class="row testimonilas-active">
                <?php 
                                $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM `student` As s INNER JOIN `feedback` As f ON s.stu_id = f.stu_id";
                                $result = $conn->query($sql);
                                //echo $result;
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        $s_img = $row['stu_img']; 
                                        $n_img = str_replace('..','.', $s_img);
                                        $name = $row['stu_name'];
                                        $occ = $row['stu_occ'];
                                    ?>
                    <div class="col-xl-12">
                    
                        <div class="testimonilas-wrapper mb-110">
                           
                            <div class="testimonilas-heading d-flex">
                                <div class="testimonilas-author-thumb">
                                    <img style="height:200px;width:200px" src="<?php echo $n_img ?>" alt="">
                                </div>
                                <div class="testimonilas-author-title">
                                    <h1><?php echo $name ?></h1>
                                    <h2><?php echo $occ?></h2>
                                </div>
                            </div>
                            <div class="testimonilas-para">
                                <p><?php echo $row['f_content']; ?></p>
                            </div>
                            <div class="testimonilas-rating">
                                <ul>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                            </div>
                            </div>
                            </div>
                        <?php  }
                        }?>
                        
                            
                        
                    
                    
                </div>
            </div>
        </div>
    </div>
     -->

   



    <!-- Start including footer -->
    <?php
    include('./maininclude/footer.php');
    ?>
    <!--End including footer -->
    <script>
       $(document).ready(function(){
           $('.hover').popover({
                title:fetchdata,
                html:true,
                placement:'right'
           });

           function fetchData(){
               var fetch_data = '';
               var element = $(this);
               var id = element.attr("course_id");
               $.ajax({
                   url:"fetch.php",
                   method:"POST",
                   async:false,
                   data:{id.id},
                   success:function(data){
                       fetch_data = data;
                   }
               });
               return fetch_data;
           }
       });
    </script>

<!-- Start includeing header -->
<?php
include('./dbconnection.php');
include('./maininclude/header.php');


?>
<!-- End includeing header -->
<!-- slider-start -->
<div class="slider-area">
        <div class="page-title">
            <div class="single-slider  d-flex align-items-center" style="background-image: url(img/slider/i_14.jpg); height: 500px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Course</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <!-- <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                                    </ol> -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <!-- <div class="courses-area courses-bg-height gray-bg pt-100 pb-70">
        <div class="container">
            <h1 class="text-center">All Course</h1>
            <div class="row mt-4"> -->
            <?php
                // $sql="SELECT * FROM course";
                // $result = $conn->query($sql);
                // if($result->num_rows > 0){
                //     while($row = $result->fetch_assoc()){
                //         $course_id = $row['course_id'];
                //         echo '
                //         <div class="col-sm-4 mb-4">
                //             <a href="coursedetails.php?course_id='.$course_id.'"
                //             class="btn" style="text-align: left pading:0px;">
                //             <div class="card">
                //             <img src="'.str_replace('..','.',$row['course_img']).'" class="card-img-top" alt="Guiter"/>
                //             <div class="card-body">
                //                 <h5 class="card-title">'.$row['course_name'].'</h5>
                //                 <p class="card-text">'.$row['course_desc'].'</p>
                //             </div>
                //             <div class="card-footer">
                //             <p class="card-text d-inline">Price: <small><del>&#8377
                //             '.$row['course_original_price'].' </del></small><span
                //             class="font-weight-bolder">&#8377 '.$row['course_price'].'</span></p>
                //             <a class="btn btn-primary text-white font-weight-bolder float-right"
                //             href="coursedetails.php"?course_id='.$course_id.'">Enroll</a>
                //             </div>
                //             </div></a> 
                //         </div>
                //         ';
                //     }
                // }
            ?>


<?php if(isset($_GET['cat_id'])){
    $cat = $_GET['cat_id'];
    $sql = "SELECT * from category where cat_id = $cat";
     $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row1 = $result->fetch_assoc();
    }
    $cat_name = $row1['cat_name'];
    
    echo '<div class="mt-5"><center><h1> '.$cat_name.'</h1></center></div>';
}
?>

<div class="container mt-5" style="height: 500px;">
    <!-- <h1 class="text-center mt-5 mb-5">All Course</h1> -->
<div class="courses-list" style="height: 500px;">
                <div class="row">
                    
                        <?php


                    if(isset($_GET['cat_id'])){
                    $cat_id = $_GET['cat_id'];
                    // $_SESSION['course_id'] = $course_id;
                    // $sql = "SELECT * from course WHERE cat_id = '$cat_id'";
                    $sql = "SELECT s.stu_name,c.status,c.course_name,c.course_img,c.course_price,c.course_original_price,c.course_id FROM course as c JOIN student as s ON c.ins_id = s.stu_id where c.status=1 AND c.cat_id = '$cat_id'";
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
            
            else {

                    echo '<img src = "img/slider/no_st.png" style=" height: 500px; width:800px; margin-left:20%;"><br><h2 style="margin-left:29%;">There is nothing to show you right now.</h2>';
                    // echo'<h2>No data found</h2>';
            }
        }

                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    // $_SESSION['course_id'] = $course_id;
                    $sql = "SELECT * from course WHERE status=1 AND course_name LIKE '%$search%'";
                    // print_r($sql);
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                         $course_id = $row['course_id'];
                                echo '
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb" style="height: 200px;">
                                <a href="course_details.php?course_id='.$course_id.'"><img src="'.str_replace('..','.',$row["course_img"]).'" alt="'.$row["course_name"].'" style="height: 250px;"></a>
                            </div>
                            <div class="courses-content courses-content-3 clearfix">
                                <div class="mt-25 d-flex">
                                    
                                    <div class="mt-3">
                                        <h5><a href="course_details.php?course_id='.$course_id.'">'.$row["course_name"].'</a></h5>
                                    </div>
                                   
                                </div>
                                <div class="courses-para mt-0">
                                    <p>'.$row["course_desc"].'</p>
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
                }else {

                    echo '<img src = "img/slider/no_st.png" style=" height: 500px; width:800px; margin-left:20%;"><br><h2 style="margin-left:29%;">There is nothing to show you right now.</h2>';
                    // echo'<h2>No data found</h2>';
            }
            }

            // }
            
                





                        // $sql = "SELECT * FROM course";
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
                        //                 <h1><a href="course_details.php?course_id='.$course_id.'">'.$row["course_name"].'</a></h1>
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
                        //                 <!-- <a href="course_details.html">View Details</a> -->
                        //             </div>
                        //         </div>
                        //     </div>
                        // </div>
                        // </div>
                                
                                
                        //         ';
                        //     }
                        
                        // }

                        ?>
                        



                
            </div>
        </div>
    </div>
                    </div>
    <!-- courses end -->

<br>
<br>
<br>
<br>
<br>
<!-- Start includeing footer -->
<?php
include('./maininclude/footer.php');
?>

<!-- End includeing footer -->
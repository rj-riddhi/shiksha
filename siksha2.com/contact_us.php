<!-- Start include header -->
<?php session_start(); ?>
<?php
    include('./maininclude/header.php');
    include('./dbconnection.php');


    if(isset($_REQUEST['contactSubmitBtn'])){
        if(($_REQUEST['stu_name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['subject'] == "")
        || ($_REQUEST['message'] == "")){
            ?>
            <script>
                alert("Fill All Fields");
            </script>
            <?php
        }else{
            $stu_name = $_REQUEST['stu_name'];
            $email = $_REQUEST['email'];
            $subject = $_REQUEST['subject'];
            $message = $_REQUEST['message'];
           
            
            $sql = "INSERT INTO contact_us (stu_name,email,subject,message) VALUES ('$stu_name', 
            '$email','$subject','$message')";

            if($conn->query($sql) == TRUE){
                ?>
                <script>
                    alert("Send Successfully");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Unable to Send");
                </script>
                <?php
            }
            
            
            
        }
    } 
?>
<!-- End include header -->
    <!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/slider/bg1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Contact Us</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
    <!-- contact start -->
    <div class="advisors-area gray-bg pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="contact-info-text">
                        <div class="section-title mb-20">
                            <div class="section-title-heading mb-10">
                                <h1>Contact Info</h1>
                            </div>
                            <div class="section-title-para">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-info mb-50 wow fadeInRight" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                        <ul>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-headphone" style="background-color:#181717; color:#ffffff;"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Call Us</h5>
                                    <span>+91 7016843278</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-email" style="background-color:#181717; color:#ffffff;"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Email Us</h5>
                                    <span>shiksha@gmail.com</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-location-pin" style="background-color:#181717; color:#ffffff;"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Location</h5>
                                    <span>No 12/9, Santhosh Raj Plaza, 3rd Floor, Subburaman Street,surat-395001 India.</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="events-details-form faq-area-form mb-30 p-0">
                        <form>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="events-form-title mb-25">
                                        <h2>Do You Have Any Questions</h2>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Name :" type="text" id="stu_name"
                                        name="stu_name">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Email :" type="text" id="email"
                                             name="email">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Subject :" type="text" id="subject"
                                         name="subject">
                                </div>
                                <!-- <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Experience :" type="text">
                                </div> -->
                                <div class="col-xl-12">
                                    <textarea cols="30" rows="10" placeholder="Message :" id="message"
                                    name="message"></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <div class="faq-form-btn events-form-btn">
                                        <button class="btn m-0" style="background-color:#181717; color:#ffffff;" id="contactSubmitBtn" name="contactSubmitBtn">submit now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact end -->
    <!-- map start -->
    <div class="map-area" style="background-image: url(img/map/contact_us_map.jpg); height: 700px;">
        
    </div>
    <!-- map end -->
    
    <!-- footer start -->
    <?php
    include('./maininclude/footer.php');
    ?>
    <!-- End footer -->
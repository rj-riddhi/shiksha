<?php
    include('./maininclude/header.php');
    
    include('./dbconnection.php');
    
    
?>
<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
	$stuEmail = $_SESSION['stuLogEmail'];
}
?>

        
           <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url(img/slider/i_9.jpg);">
                <div class="container">
                    <div class="row">
                            <div class="col-xl-4 col-md-12">
                            <div class="slider-content slider-content-2 text-left">
                                <p class="white-color f-700 white-color f-700" data-animation="fadeInUp" data-delay=".2s" style="font-size:50px; color:#181717"><span>Come teach</span><br><br>with us</p>
                                <p data-animation="fadeInUp" data-delay=".4s" style="color:#181717; font-size: 18px;">Become an instructor and change <br>lives - including your own</p>
                                <?php
                                if(isset($_SESSION['is_login'])){
                                echo '<a class="theme-btn" data-animation="fadeInUp" data-delay=".6s" href="instructor_dashboard.php"><span class="btn-text" style="background-color: #181717;color:#ffffff; width: 300px;text-align:center;">Get Started</span></a>';
                                $is_ins = 1;
                                $sql = "UPDATE student  SET is_instructor = '$is_ins' WHERE stu_email = '$stuEmail'";

                                if($conn->query($sql) == TRUE){
                                  ?>
                                    <!-- <script>
                                        alert("<?php //echo "updated successfully "?>");
                                    </script> -->
                                    <?php
                                }else{
                                  ?>
                                    <!-- <script>
                                        alert("<?php echo "Not updated successfully "?>");
                                    </script> -->
                                    <?php
                                }

                                //  $_SESSION['i_login'] = true;
                                //  $check_query = mysqli_query($conn, "SELECT * FROM insrtructor where i_email ='$stuEmail'");
                                //  $rowCount = mysqli_num_rows($check_query);
                                //     if($rowCount > 0){
                                // ?>
                                 <?php
                                //     }else{
                                //       $sql = "INSERT INTO insrtructor (i_id, i_email, i_password) VALUES ('', '$stuEmail', '')";

                                //     if($conn->query($sql) == TRUE){
                                  
                                //     }else{
                                       
                                //     }
                                //   }
                              }else{
                              echo '<a class="theme-btn" data-animation="fadeInUp" data-delay=".6s" href="Login.php"><span class="btn-text" style="background-color: #181717;color:#ffffff; width: 300px;text-align:center;">Get Started</span></a>';
                              }
                                ?>
                            
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- about start -->
     <div id="about" class="about-area pt-100 pb-70">
        <div class="container">
            <h1 class="mb-5"style="text-align:center; color:#181717;">So many resons to start</h1>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30" style=" border-left: 5px solid #000000;">
                        <div class="feature-title-heading">
                            <h3>Teach your way</h3>
                            <span>01</span>
                        </div>
                        <div class="feature-text">
                            <p>Publish the course you want, in the way you want, and always have of control your own content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30" style=" border-left: 5px solid #000000;">
                        <div class="feature-title-heading">
                            <h3>Inspire learners</h3>
                            <span>02</span>
                        </div>
                        <div class="feature-text">
                            <p>Teach what you know and help learners explore their interests, gain new skills, and advance their careers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30" style=" border-left: 5px solid #000000;">
                        <div class="feature-title-heading">
                            <h3>Get rewarded</h3>
                            <span>03</span>
                        </div>
                        <div class="feature-text">
                            <p>Expand your professional network, build your expertise, and earn money on each paid enrollment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
<h1 class="mb-5"style="text-align:center; color:#181717;">How to begin</h1>
    <ul class="nav justify-content-center mb-3">
  <li class="nav-item">
    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Plan your curriculum
        </button>
  </li>
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  <li class="nav-item">
    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Record your video
        </button>
  </li>
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;
  &nbsp;

  <li class="nav-item">
   <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Launch your course
        </button>
  </li>
  
</ul> 


<div id="accordion">
   

  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
    <div  style=" padding-left: 20%; padding-right: 20%;">
      
      <div class="row">
        <div class="col " style="width: 500px; margin-top:20%; font-size :22px;">
        
          You start with your passion and knowledge. Then choose a promising topic with the help of our Marketplace Insights tool.
          The way that you teach — what you bring to it — is up to you.
        </div>
        <div class="col">
         <img src="img/instructor/hb_1.png" style="width: 500px; height: 500px;" class="rounded float-right" alt="...">
        </div>
      </div>
    </div>
      
  </div>
  
    
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
    <div  style=" padding-left: 20%; padding-right: 20%;">
      <div class="row">
        <div class="col " style="width: 500px; margin-top:20%; font-size :22px;">
        
          You start with your passion and knowledge. Then choose a promising topic with the help of our Marketplace Insights tool.
          The way that you teach — what you bring to it — is up to you.
        </div>
        <div class="col">
         <img src="img/instructor/hb_2.png" style="width: 500px; height: 500px;" class="rounded float-right" alt="...">
        </div>
      </div>
    </div>
  </div>
  
    
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
    <div  style=" padding-left: 20%; padding-right: 20%;">
      <div class="row">
        <div class="col " style="width: 500px; margin-top:20%; font-size :22px;">
        
          You start with your passion and knowledge. Then choose a promising topic with the help of our Marketplace Insights tool.
          The way that you teach — what you bring to it — is up to you.
        </div>
        <div class="col">
          <img src="img/instructor/hb_3.png" style="width: 500px; height: 500px;" class="rounded float-right" alt="...">
        </div>
      </div>
  </div>
  </div>
</div>
</div>
</div>

<!-- <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
  Tooltip on bottom
</button>

<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
  <button class="btn btn-primary" style="pointer-events: none; cursor:pointer" type="button" disabled>Disabled button</button>
</span>
<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>


<div class="tooltip1">Hover over me
  <div class="tooltiptext" style="background:#fff">
<h3>lmjbvgv bhxjbh bxzhjcbhg hjxbhcb bxzhjbchj bhjxbzchj</h3>
<button type="button" class="btn btn-secondary">
  Tooltip on bottom
</button> -->
</div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>




    <!-- about end -->

    <?php
    include('./maininclude/footer.php');
    ?>
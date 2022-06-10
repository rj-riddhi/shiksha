<?php
if(!isset($_SESSION)){
    session_start();
}

include_once('../dbConnection.php');
include('./stuInclude/stu_header.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Watch Course</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/custom.css">

  
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>
    

    <div class="container-fluid mt-4">
         <!-- <a class="btn btn-danger" href="./mycourse.php">MY Courses</a> -->
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                        
                        if(isset($_GET['course_id'])){
                            $course_id = $_GET['course_id'];
                            $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $videoname = $row['lesson_link'];
                                     echo  '
                                     <li class="nav-item border-bottom py-2" movieurl = "../videos/'.$videoname.'" style="cursor:pointer"> Lesson '.$row['lesson_name'] .'</li>';
                                     
                                }
                            }
                        }
                         echo'<a class="mt-5" href="../online_quize/question_show.php?course_id='.$course_id.'" >attend Quiz</a>';
                    ?>
                    
                    </ul>
            </div>
            <div class="col-sm-9" style="height:100%;width:200%;">

            <video id="videoarea"  style="height:90%;width:94%;"  class="w-65 ml-2" preload  controls  autoplay   muted >
        <source src="../videos/<?php echo $videoname ?>"  type="video/mp4" />
        </video>
            </div>
        </div>
    </div>

 


    <?php
        if(isset($_POST['r_submit'])){
            // if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']){
            //     $uemail = $_SESSION['stuLogEmail'];
            //     $sql = mysqli_query($conn, "SELECT * FROM student where stu_email = '$email'");
            //     $count = mysqli_num_rows($sql);

            //      if($count > 0){
            //     // $db->select('user_data','uname',null,"uemail = '$uemail'");
            //     // $unamea = $db->getResult();
            //     // if(count($unamea) != 0){
            //         $name = $unamea['0']['uname'];
                    if(isset($_POST['star']) && isset($_POST['ucomment'])){
                        $star = $_POST['star'];
                        $cmmt = $_POST['ucomment'];
                        $sql = "INSERT INTO review (course_id,rating,comment,stu_email) VALUES ('$course_id', '$star', '$cmmt', '$stuLogEmail')";

                        if($conn->query($sql) == TRUE){
                            echo'
                            <script>
                        alert("feedback send Successfuly");
                        
                            </script>';
                            // $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Succesfully</div>';
                        }else{
                            // $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
                        }
                        // $db->insert('review',['name'=>$name,'ratings'=>$star,'comment'=>$cmmt,'stu_email'=>$uemail,'crs_token'=>$crs_token,'creator_email'=>$crs_creator]);
                    // }else{
                    //     echo "<script>location.href='index.php'</script>";
                    // }
                // }else{
                //     echo "<script>location.href='login.php'</script>";
                // }
            // }else{
            //     echo "<script>location.href='login.php'</script>";
            }    
        }
     ?>
     <!-- Section 9 Start  -->
     <p class="crs_cmmt_sec">Comment Section</p>
     <div class="crs_sec9 crs_cmm_sec" style="width: 700px;">
            <form action="" id="comment_sec" class="comment_sec" method="POSt">
                <div class="rating-h">Rating</div>
                <div class="stars">
                    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                    <label class="star star-1" for="star-1"></label>
                </div>

                <div class="comment_div">
                    <label for="ucomment" class="rating-h">Comment</label>
                    <textarea name="ucomment" id="ucomment" cols="30" rows="10"></textarea>
                </div>
                <input class="submit_btn_sec9" style="background-color:#000000;" type="submit" value="Comment" name="r_submit">
            </form>
        </div>
     <!-- Section 9 End  -->


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/all.min.js"></script>

    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>
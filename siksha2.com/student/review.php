<?php
if(!isset($_SESSION)){
    session_start();
}
// include_once('./stuInclude/header.php');
include('./stuInclude/stu_header.php');
include_once('../dbConnection.php');

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
     <!-- <p class="crs_cmmt_sec">Comment Section</p> -->

     <?php
     $sql = "SELECT c.course_name, r.rating,r.comment,r.add_date FROM review AS r JOIN course AS c
      ON c.course_id = r.course_id WHERE r.stu_email = '$stuLogEmail'" ;
        // $sql = "SELECT c.course_name,c.course_id,r.course_id r.rating,r.comment,r.stuemail from review as r JOIN course as c ON r.course_id = c.course_id  WHERE stu_email = '$stuLogEmail'";
                    // print_r($sql);
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                         $rating= $row['rating'];
                        
                         echo ' <div class="crs_sec9 crs_cmm_sec" style="width: 80%; margin-left:10%;">
            <form action="" id="comment_sec" class="comment_sec" method="POSt">
            <p>'.$row['add_date'].'</p>
            <div class="rating-h">'.$row['course_name'].'</div>
                
                <div class="stars" >';
                if($rating == 5){
                    echo '<!-- <input class="star star-5" id="star-5" type="radio" name="star" value="5" /> -->
                    <label style="color:#ffdd44;" class="star star-5" for="star-5"></label>
                    <!-- <input class="star star-4" id="star-4" type="radio" name="star" value="4" /> -->
                    <label style="color:#ffdd44;" class="star star-4" for="star-4"></label>
                    <!-- <input class="star star-3" id="star-3" type="radio" name="star" value="3" /> -->
                    <label style="color:#ffdd44;" class="star star-3" for="star-3"></label>
                    <!-- <input class="star star-2" id="star-2" type="radio" name="star" value="2" /> -->
                    <label style="color:#ffdd44;" class="star star-2" for="star-2"></label>
                    <!-- <input class="star star-1" id="star-1" type="radio" name="star" value="1" /> -->
                    <label style="color:#ffdd44;" class="star star-1" for="star-1"></label>';}
                    elseif($rating == 4){
                       echo '<!-- <input class="star star-5" id="star-5" type="radio" name="star" value="5" /> -->
                    <label style="" class="star star-5" for="star-5"></label>
                    <!-- <input class="star star-4" id="star-4" type="radio" name="star" value="4" /> -->
                    <label style="color:#ffdd44;" class="star star-4" for="star-4"></label>
                    <!-- <input class="star star-3" id="star-3" type="radio" name="star" value="3" /> -->
                    <label style="color:#ffdd44;" class="star star-3" for="star-3"></label>
                    <!-- <input class="star star-2" id="star-2" type="radio" name="star" value="2" /> -->
                    <label style="color:#ffdd44;" class="star star-2" for="star-2"></label>
                    <!-- <input class="star star-1" id="star-1" type="radio" name="star" value="1" /> -->
                    <label style="color:#ffdd44;" class="star star-1" for="star-1"></label>'; 
                    }
                    elseif($rating == 3){
                       echo '<!-- <input class="star star-5" id="star-5" type="radio" name="star" value="5" /> -->
                    <label style="" class="star star-5" for="star-5"></label>
                    <!-- <input class="star star-4" id="star-4" type="radio" name="star" value="4" /> -->
                    <label style="" class="star star-4" for="star-4"></label>
                    <!-- <input class="star star-3" id="star-3" type="radio" name="star" value="3" /> -->
                    <label style="color:#ffdd44;" class="star star-3" for="star-3"></label>
                    <!-- <input class="star star-2" id="star-2" type="radio" name="star" value="2" /> -->
                    <label style="color:#ffdd44;" class="star star-2" for="star-2"></label>
                    <!-- <input class="star star-1" id="star-1" type="radio" name="star" value="1" /> -->
                    <label style="color:#ffdd44;" class="star star-1" for="star-1"></label>'; 
                    }
                    elseif($rating == 2){
                       echo '<!-- <input class="star star-5" id="star-5" type="radio" name="star" value="5" /> -->
                    <label style="" class="star star-5" for="star-5"></label>
                    <!-- <input class="star star-4" id="star-4" type="radio" name="star" value="4" /> -->
                    <label style="" class="star star-4" for="star-4"></label>
                    <!-- <input class="star star-3" id="star-3" type="radio" name="star" value="3" /> -->
                    <label style="" class="star star-3" for="star-3"></label>
                    <!-- <input class="star star-2" id="star-2" type="radio" name="star" value="2" /> -->
                    <label style="color:#ffdd44;" class="star star-2" for="star-2"></label>
                    <!-- <input class="star star-1" id="star-1" type="radio" name="star" value="1" /> -->
                    <label style="color:#ffdd44;" class="star star-1" for="star-1"></label>'; 
                    }
                     elseif($rating == 1){
                       echo '<!-- <input class="star star-5" id="star-5" type="radio" name="star" value="5" /> -->
                    <label style="" class="star star-5" for="star-5"></label>
                    <!-- <input class="star star-4" id="star-4" type="radio" name="star" value="4" /> -->
                    <label style="" class="star star-4" for="star-4"></label>
                    <!-- <input class="star star-3" id="star-3" type="radio" name="star" value="3" /> -->
                    <label style="" class="star star-3" for="star-3"></label>
                    <!-- <input class="star star-2" id="star-2" type="radio" name="star" value="2" /> -->
                    <label style="" class="star star-2" for="star-2"></label>
                    <!-- <input class="star star-1" id="star-1" type="radio" name="star" value="1" /> -->
                    <label style="color:#ffdd44;" class="star star-1" for="star-1"></label>'; 
                    }
                    else{
                       echo '<!-- <input class="star star-5" id="star-5" type="radio" name="star" value="5" /> -->
                    <label style="" class="star star-5" for="star-5"></label>
                    <!-- <input class="star star-4" id="star-4" type="radio" name="star" value="4" /> -->
                    <label style="" class="star star-4" for="star-4"></label>
                    <!-- <input class="star star-3" id="star-3" type="radio" name="star" value="3" /> -->
                    <label style="" class="star star-3" for="star-3"></label>
                    <!-- <input class="star star-2" id="star-2" type="radio" name="star" value="2" /> -->
                    <label style="" class="star star-2" for="star-2"></label>
                    <!-- <input class="star star-1" id="star-1" type="radio" name="star" value="1" /> -->
                    <label style="" class="star star-1" for="star-1"></label>'; 
                    }


                echo'</div>

                <div class="comment_div">
                
                    <label for="ucomment" class="rating-h">'.$row['comment'].'</label>
                    <!-- <textarea name="ucomment" id="ucomment" ></textarea> -->
                </div>
                <!-- <input class="submit_btn_sec9" style="background-color:#000000;" type="submit" value="Comment" name="r_submit"> -->
            </form>
        </div>';
                    }
                }
                

     ?>
    
     <!-- Section 9 End  -->


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/all.min.js"></script>

    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>
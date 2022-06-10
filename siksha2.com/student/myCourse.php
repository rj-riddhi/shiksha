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

<div class="topnav rounded mt-3  border border-secondary" style="ml-5 background:#fff; margin-left:13%; margin-right:8%;">
<a  href="ins_earnings.php" class="active">Enrolled Courses</a>
  
  <a style="" href="wishlist.php">Wishlist</a>
   <!-- <a style="" href="ins_withdraw.php">My Quiz Attempts</a> -->
   
</div>


<div class="container " style="margin-left:17%;">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center">All Course</h4>
            <?php
            if(isset($stuLogEmail)){
                // $sql = "SELECT co.order_id,c.course_id,c.course_name,c.course_duration,c.course_desc,c.course_img,c.ins_id,
                // c.course_original_price,c.course_price FROM course_order AS co JOIN course AS c ON c.course_id = co.course_id WHERE
                // co.stu_email = '$stuLogEmail'";
                $sql = "SELECT co.order_id,c.course_id,c.course_name,c.course_duration,c.course_desc,c.course_img,c.ins_id,c.course_original_price,
                c.course_price,s.stu_name FROM((course_order As co JOIN course As c ON c.course_id = co.course_id)JOIN student as s ON c.ins_id = s.stu_id)";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){ ?>
                    <div class="bg-light mb-3">
                        <h5 class="card-header"><?php echo $row['course_name'];
                        ?></h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <?php
                                echo '<img src="'. str_replace('../..','..',$row["course_img"]).'" alt="'.$row["course_name"].'" style="height: 250px; width:260px;">';
                                //  echo '<img src="'.$row["course_img"].'" alt="'.$row["course_name"].'" style="height: 250px;">';
                                ?>
                            
                                
                                <!-- <img src="<?php echo $row['course_img']; ?>" -->
                                <!-- class="card-img-top mt-4" alt="pic"> -->
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card-body">
                                    <p class="card-title"><?php echo $row['course_desc']; ?></p>
                                    <small class="card-text">Duration: <?php echo $row['course_duration']; ?></small><br />
                                    <small class="card-text">Instructor: <?php echo $row['stu_name']; ?></small><br />
                                    <p class="card-text d-inline">Price:<small><del>₹<?php echo $row['course_original_price']?></del></small>
                                    <span class="font-weight-bolder">₹<?php echo $row['course_price']?> <span></p>
                                    <a href="watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="btn btn-primary mt-5 float-right" style="background-color:#181717;">Watch Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            }
            ?>
        </div>
    </div>
</div>
</div>
<?php
include('./stuInclude/footer.php');

?>
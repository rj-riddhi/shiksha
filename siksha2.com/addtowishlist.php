<?php
ob_start();
session_start();
include('./dbconnection.php');
$sid = $_SESSION['stu_id'];
if(!isset($_SESSION['is_login']) & empty($_SESSION['is_login'])){
		header('location: login.php');
	}
if(isset($_GET['course_id']) & !empty($_GET['course_id'])){
	$cid = $_GET['course_id'];
	 $check_query = mysqli_query($conn, "SELECT * FROM wishlist where course_id ='$cid'");
     $rowCount = mysqli_num_rows($check_query);
	
	 if($rowCount > 0){
                ?>
				<script>
                        alert("Course already in wishlist");
                        window.location.replace('student/wishlist.php');
                        
                    </script>
                <!-- <script>
                    alert("Product already in wishlist!");
                </script>
                <?php
				//header('location: wishlist.php'); -->

    }else{
	
	echo $sql = "INSERT INTO wishlist (course_id, stu_id) VALUES ($cid, $sid)";
	$res = mysqli_query($conn, $sql);
	
	if($res){
		header('location: index.php');
		//echo "redirect to wish list page";
	}else{
		?>
	 <!-- <script>
                    alert("Product already in wishlist!");
                </script>-->
				<?php
	// header('location: wishlist.php');
	}
	}
}

?>
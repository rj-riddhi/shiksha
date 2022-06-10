<?php
ob_start();
session_start();
include('./dbconnection.php');
// $uid = $_SESSION['stu_id'];
if(!isset($_SESSION['is_login']) & empty($_SESSION['is_login'])){
		header('location: login.php');
	}
if(isset($_GET['id']) & !empty($_GET['id'])){
	$id = $_GET['id'];
	echo $sql = "DELETE FROM wishlist WHERE w_id=$id";
	$res = mysqli_query($conn, $sql);
	if($res){
		header('location: student/wishlist.php');
		//echo "redirect to wish list page";
	}
}else{
	header('location: student/wishlist.php');
}

?>
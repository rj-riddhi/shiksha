<?php
session_start();
if(isset($_GET) & !empty($_GET)){
	$course_id = $_GET['course_id'];
	if(isset($_GET['quant']) & !empty($_GET['quant'])){ $quant = $_GET['quant']; }else{ $quant = 1;}
	$_SESSION['cart'][$course_id] = array("quantity" => $quant); 
	header('location: index.php');

}else{
	 header('location: index.php');
	 
}
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
?>
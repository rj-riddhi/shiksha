<?php
if(!isset($_SESSION)){
    session_start();
}
// include_once('./stuInclude/header.php');
include('./dbconnection.php');
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}

if(isset($_POST['pay_id']) && isset($_POST['amount'] && isset($_POST['name'])){
    $pay_id = $_POST['pay_id'];
    $amount = $_POST['amount'];
    $name = $_POST['name'];

    $query = "INSERT INTO course_order (`stu_email`,`order_id`,`amount`) VALUEs ('$name','$pay_id','$amount')";
    mysqli_query($con,$query);

    
}
?>

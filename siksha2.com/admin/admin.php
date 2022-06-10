<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');

// Admin Login verification
if(!isset($_SESSION['is_admin_login'])){
if(isset($_POST['checkLogemail']) && isset($_POST['adminLogemail']) && isset($_POST['adminLogPass'])){
    $adminLogemail = $_POST['adminLogemail'];
    $adminLogPass = $_POST['adminLogPass'];

    $sql = "SELECT admin_email, admin_pass FROM tbl_admin WHERE admin_email = '".$adminLogemail."' AND admin_pass = '".$adminLogPass."'";

    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row === 1){
        echo json_encode("$sql");
        $_SESSION['is_admin_login'] = true;
        $_SESSION['adminLogemail'] = $adminLogemail;
        echo json_encode($row);
    }else if($row === 0){
        echo json_encode($row);
    }

}
}




// if(!isset($_SESSION['is_login'])){
//     if(isset($_POST['checkLogemail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])){
//         $stuLogEmail = $_POST['stuLogEmail'];
//         $stuLogPass = $_POST['stuLogPass'];
    
//         $sql = "SELECT stu_email, stu_pass FROM student WHERE stu_email = '".$stuLogEmail."' AND stu_pass = '".$stuLogPass."'";
//         $result = $conn->query($sql);
//         $row = $result->num_rows;
//         if($row === 1){
//             $_SESSION['is_login'] = true;
//             $_SESSION['stuLogEmail'] = $stuLogEmail;
//             echo json_encode($row);
//         }else if($row === 0){
//             echo json_encode($row);
//         }
    
//     }
//     }

?>

<?php
//$conn = new mysqli($db_host,$db_user,$db_password,$db_name);

$conn = new mysqli('localhost','root','','testingdb');
    if($conn->connect_error){
    die('Error : ('.$conn->connect_errno.')'.$conn->connect_error);
}
?>
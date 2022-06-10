<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "shiksha_db";

//create Connection
$conn = new mysqli($db_host,$db_user,$db_password,$db_name);

//check Connection
if($conn->connect_error){
    die("connection failed");
}

?>
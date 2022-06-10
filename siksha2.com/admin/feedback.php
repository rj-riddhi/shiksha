<?php
if(!isset($_SESSION)){
    session_start();
}

include('./admininclude/header.php');
include('../dbConnection.php');
      if(isset($_SESSION['is_admin_login'])){
          $adminEmail = $_SESSION['adminLogEmail'];
      }else{
          echo "<script> location.href='../index.php'; </script>";
      }
     
?>
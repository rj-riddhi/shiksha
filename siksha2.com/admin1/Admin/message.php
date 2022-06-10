<?php

if(!isset($_SESSION)){
    session_start();
}
 include('./admininclude/header.php');
       include('../dbConnection.php');
    ?>
  


<?php
      include('./admininclude/footer.php');
?>
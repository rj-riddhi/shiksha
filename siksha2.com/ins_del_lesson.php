<?php
include_once('./dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_GET['lesson_id'])){
    $lesson =$_GET['lesson_id'];

    
}

    $sql = "DELETE FROM lesson WHERE lesson_id = $lesson";
    if($conn->query($sql) == TRUE){
        echo" <script>
                        alert('Lesson Deleted Successfuly');
                        window.location.replace('instructor_course.php');
                        
                    </script>";
    }else{
       echo" <script>
                        alert('Lesson not deleted,Please try again');
                        window.location.replace('ins_course.php');
                        
                    </script>";
    }

?>
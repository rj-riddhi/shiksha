<?php
    include('./dbconnection.php');

    if(isset($_POST["course_id"]))
    {
        $output = '';
        $q = "SELECT * FROM course WHERE course_id='".$_POST["course_id"]."'";
        $res = mysqli_query($conn,$q);
        while($row = mysqli_Fetch_array($res)){
            $output = '
                <p><img src="image/courseimg/'.$row["course_img"].'"/></p>
                <p><label>Couese name :'.row['course_name'].'</label></p>
            ';

        }
        echo $output;
    }
?>
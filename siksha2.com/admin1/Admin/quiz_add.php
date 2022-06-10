<?php 
 include('../dbConnection.php');
include './manage_quiz_class.php';

	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'lms_db');
	if (!$con)
	 {
		die('unable to coonect to database');
	 }


// add a new question code from manage_quiz.php  from tab 3 (add questions) 

 
extract($_POST);

$quiz=new manage_quiz_class;;
$ques=htmlentities($question);
$option1=htmlentities($opt1);
$option2=htmlentities($opt2);
$option3=htmlentities($opt3);
$option4=htmlentities($opt4);

echo "$ques";
echo "$option1";
echo "$option2";
echo "$option3";
echo "$option4";

echo $course_id."<br>"; 

$array=[$option1,$option2,$option3,$option4];
$matchedanswer=array_search($answer,$array);
echo "answer is".$matchedanswer;
$query="insert into question_test values('','$ques','$option1','$option2','$option3','$option4','$matchedanswer','$course_id')"; 

// mysqli_query($con,$query);
if ($quiz->add_quize($query)) 
{
	header("location:addquestion.php?run=success");
}

 ?>
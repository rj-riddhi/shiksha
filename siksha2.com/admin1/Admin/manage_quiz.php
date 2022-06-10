<?php 
include('./admininclude/header.php');
include('../dbConnection.php');

include("./manage_quiz_class.php");
$quiz=new manage_quiz_class;			
?>

<div class="col-sm-9 mt-5 container-fluid" style="margin-top: 50px;" >
      <div class="row">
<div class="col-md-12">


 <!-- ========================================================================================================================== -->
     <!-- Nav tabs strats -->

<!-- <ul class="nav nav-tabs"> -->
  <!-- <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
  </li> -->
 
<!-- </ul> -->
   <!-- Nav tabs ends -->
<!-- ========================================================================================================================== -->

<div class="tab-content">





			<!-- home panes starts -->

			<div class="tab-pane container active" id="home">
<div class="list-of-course card-header mt-5 bg-white border-0 shadow card1 text-center" style="width: 1050px; marginLeft: 100px; box-shadow: 1px 1px 1px 1px #ccc"><b class="text-center">Online Quiz Courses</b></div><br>
<div class="row justify-content-center">

<div class="col-md-3 list-of-course">
 <center><label>select Course</label><br>
    <form method="POST" action="./question_show.php">
	<?php
           $sql = "SELECT * FROM course";
           $result = $conn->query($sql);
          if($result->num_rows > 0)
        ?>
        
         <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id"> 
        
         
        
         <?php while($row = $result->fetch_assoc()){
         ?>
         <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
         <?php } ?>
		 </select>
    
      <button type="submit" class="btn btn-danger mt-3 ">Start Quiz</button>
  </form></center>
</div>


</div>

</div>

  		
</div>

</div>

</div>
</div>



<script type="text/javascript">
	

	$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
});
// =============================================================================================================
					// javascript validation function

	function validation()
	{
		var name=document.getElementById('c_name').value;
		var desc=document.getElementById('c_desc').value;
		var img=document.getElementById('c_img').value;
		if (name=="")
		{ 
			document.getElementById('name_error').innerHTML="** please enter the course name";
			return false;

		}

		if (desc=="")
		{ 
			document.getElementById('desc_error').innerHTML="** please enter the course descsription";
			return false;

		}
		if (img=="")
		{ 
			document.getElementById('image_error').innerHTML="** please choose an image";
			return false;

		}
	}
					// javascript validation function
// =============================================================================================================


// =============================================================================================================
				
					// javascript modal function called on page load

    	function display_modal()
    	{

    		

    	}

// =============================================================================================================


    				
// =============================================================================================================
				
					// javascript modal function called on page load

    	 $(window).on('load',function(){
        $('#myModal').modal('show');
    });


    	 	      // javascript validation function
// =============================================================================================================

</script>


 </body>
 </html>
 <div>
      <a class="btn btn-danger box" href="./addquestion.php">
          <i class="fas fa-plus fa-2x"></i>
      </a>
      </div>
 <?php
      include('./admininclude/footer.php');
?>
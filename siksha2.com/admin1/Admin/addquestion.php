<?php
      include('./admininclude/header.php');
       include('../dbConnection.php');
       include("./manage_quiz_class.php");
       ?>
     <div class="col-sm-6 mt-5 form-of-space jumbotron">
   

       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <h3 class="text-center">Add New Quiz</h3>   


          <?php 
                if (isset($_GET['run'])&& !empty($_GET['run']))
                 {
                  // echo "<p>Question added successfully</p>";
                  $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Question Added Succesfully</div>';
                }
           ?> 

         <form method="POST" action="quiz_add.php">
		  <div class="mt-3 form-group">
              
      <option  class="active">choose course</option>
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
			  
		  </div>
            <div class="mt-3 form-group">
              <label for="text">Question :</label>
              <input type="text" class="form-control" name="question" placeholder="Enter Question">
              <!-- <small id="emailHelp" class="form-text text-muted">please enter the question.</small> -->
            </div>

            <div class="mt-3 form-group">
              <label for="text">Option 1 :</label>
              <input type="text" class="form-control"  name="opt1" placeholder="Enter option 1">
            </div>

            <div class="mt-3 form-group">
              <label for="text">Option 2 :</label>
              <input type="text" class="form-control"   name="opt2" placeholder="Enter option 2">
            </div>


            <div class="mt-3 form-group">
              <label for="text">Option 3 :</label>
              <input type="text" class="form-control"  name="opt3" placeholder="Enter option 3">
            </div>

               <div class="mt-3 form-group">
              <label for="text">Option 4 :</label>
              <input type="text" class="form-control"  name="opt4" placeholder="Enter option 4">
            </div>

               <div class="mt-3 form-group">
              <label for="text">Answer :</label>
              <input type="text" class="form-control"  name="answer" placeholder="Enter the correct answer">
            </div>
            <div class="mt-3 text-center">
		        <button type="submit" class="mt-3 btn btn-danger ">Submit</button>
            <a href="manage_quiz.php" class="mt-3 btn btn-secondary">Close</a>
     </div>
            <?php if(isset($msg)) {echo $msg;} ?>
        </form>
       </div>
    </div>
    <?php
      include('./admininclude/footer.php');
?>

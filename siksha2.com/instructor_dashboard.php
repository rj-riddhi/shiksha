<?php
if(!isset($_SESSION)){
    session_start();
    $ins_id = $_SESSION['stu_id'];
}

include('instructor_header.php');
 $sql = "SELECT * FROM course where ins_id = $ins_id";
      $result = $conn->query($sql);
      $totalcourse = $result->num_rows;

     $sql = "SELECT c.*, o.* FROM course AS c JOIN course_order AS o
      ON c.course_id = o.course_id WHERE c.ins_id = '$ins_id'" ;
      $result = $conn->query($sql);
      $totalstu = $result->num_rows;

      $sql = "SELECT * FROM course_order where ins_id=$ins_id";
      $result = $conn->query($sql);
      $totalsold = $result->num_rows;
     
      $sql = "SELECT * FROM course where ins_id = $ins_id and status = 1";
      $result = $conn->query($sql);
      $activecourse = $result->num_rows;

      $sql = "SELECT * FROM course where ins_id = $ins_id and status = 0";
      $result = $conn->query($sql);
      $pendingcourse = $result->num_rows;

      $sql = "SELECT * FROM course where ins_id = $ins_id and status = 2";
      $result = $conn->query($sql);
      $draftcourse = $result->num_rows;


      $sql = "SELECT * FROM course_order where ins_id = $ins_id Group BY stu_email HAVING COUNT(stu_email)>=1 ";
      $result = $conn->query($sql);
      $stu = $result->num_rows;

      $sql = "SELECT SUM(ins_revenue) FROM course_order where ins_id = $ins_id";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
        $ins_revenue = $row['SUM(ins_revenue)'];
        // echo "Total revenue:".$row['SUM(ins_revenue)'];
      }

?>

  <div class="col-md-10 mt-5" style="margin-left:12%">
      
              <div class="row  text-center">
              <div class="col-md-4 mt-3 ">
              <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">
                  <img class="mt-2 img-fluid" src="./img/ins/e-learning-outline.png" alt="Card" width="60" height="40">
                
                <div class="card-body">
                <h4 class="card-title">
                          <?php echo $totalcourse; ?>
                      </h4>
                  <p class="card-text"><a  style="text-decoration: none;">Courses</a></p>
                </div>
              </div>
              </div>
              
      <div class="col-md-4 mt-3 ">
        <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">
                <img class="mt-2 img-fluid" src="./img/ins/user.png" alt="Card" width="60" height="40">
                <div class="card-body">
                <h4 class="card-title">
                <?php echo $stu; ?>
                      </h4>
                  <p class="card-text"><a style="text-decoration: none;">Students</a></p>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 mt-3 ">
              <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd"">

              <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40">
                <div class="card-body">
                <h4 class="card-title">
                <?php echo $totalsold; ?>
                      </h4>
                  <p class="card-text"><a  style="text-decoration: none;">Sold Courses</a></p>
                </div>
              </div>
              </div>
  </div>

  </div>

<div class="col-md-10" style="margin-left:12%">
    
            <div class="row  text-center">
            <div class="col-md-4 mt-3 ">
            <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">
                <img class="mt-2 img-fluid" src="./img/ins/checkbox.png" alt="Card" width="60" height="40">
              
              <div class="card-body">
              <h4 class="card-title">
                         <?php echo $activecourse; ?>
                     </h4>
                <p class="card-text"><a  style="text-decoration: none;">Active Courses</a></p>
              </div>
            </div>
             </div>
            
    <div class="col-md-4 mt-3 ">
      <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">
              <img class="mt-2 img-fluid" src="./img/ins/sticker.png" alt="Card" width="60" height="40">
              <div class="card-body">
              <h4 class="card-title">
              <?php echo $pendingcourse; ?>
                     </h4>
                <p class="card-text"><a style="text-decoration: none;">Pending</a></p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 mt-3 ">
            <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd"">

            <img class="mt-2 img-fluid" src="./img/ins/notebook.png" alt="Card" width="60" height="40">
              <div class="card-body">
              <h4 class="card-title">
              <?php echo $draftcourse; ?>
                     </h4>
                <p class="card-text"><a  style="text-decoration: none;">Draft Course</a></p>
              </div>
            </div>
             </div>

             
</div>

</div>


            
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<?php
    include('./maininclude/footer.php');
    ?>


      <?php
      if(!isset($_SESSION)){
        session_start();
        $admin_id = $_SESSION['stu_id'];

    }
      include('./admininclude/header.php');
      include('../dbConnection.php');

       $sql = "SELECT * FROM student";
      $result = $conn->query($sql);
      $user = $result->num_rows;

       $sql = "SELECT * FROM student where is_instructor = 1";
      $result = $conn->query($sql);
      $ins = $result->num_rows;

      $sql = "SELECT * FROM course_order Group BY stu_email HAVING COUNT(stu_email)>=1";
      $result = $conn->query($sql);
      $stu = $result->num_rows;

      $sql = "SELECT * FROM course";
      $result = $conn->query($sql);
      $totalcourse = $result->num_rows;

      $sql = "SELECT * FROM lesson";
      $result = $conn->query($sql);
      $lesson = $result->num_rows;
      
      $sql = "SELECT * FROM question_test Group BY course_id HAVING COUNT(course_id)>=1";
      $result = $conn->query($sql);
      $quize = $result->num_rows;

      $sql = "SELECT * FROM course where status=1";
      $result = $conn->query($sql);
      $activecourse = $result->num_rows;

      $sql = "SELECT * FROM course where status=0";
      $result = $conn->query($sql);
      $pendingcourse = $result->num_rows;

      $sql = "SELECT * FROM course_order";
      $result = $conn->query($sql);
      $totalsold = $result->num_rows;

      $sql = "SELECT SUM(amount) FROM course_order";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
      $payment = $row['SUM(amount)'];
      }

      $sql = "SELECT SUM(amount) FROM payout where status='approved'";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
      $withdraw = $row['SUM(amount)'];
      }
      
      $sql = "SELECT SUM(amount) FROM course_order where ins_id != $admin_id ";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
      $pay = $row['SUM(amount)'];
      }

      $sql = "SELECT SUM(amount) FROM course_order where ins_id = $admin_id ";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
      $my = $row['SUM(amount)'];
      }

      $total = $pay*0.3+$my;


      $limit = 4;

      $query = "SELECT COUNT(*) FROM course";  

      $result = mysqli_query($conn, $query);  

      $row = mysqli_fetch_row($result);  

      $total_rows = $row[0];  

      $total_pages = ceil($total_rows / $limit); 
    



      

      ?>

      <div class="col-md-9 mt-5" style="margin-left:22%">
    
            <div class="row text-center">
            <div class="col mt-3 ">
      <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd;align-items: center;  cursor:pointer; background:#f5f7fd">
              <!-- <img class="mt-2 img-fluid" src="./img/ins/user.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/user_4.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a style="text-decoration: none;font-size:15px; color:#6c777d">Users</a></p>
              <h3 class="card-title">
              <?php echo $user; ?>
                     </h3>
                
        </div>
      </div>
    </div>
            
    <div class="col mt-3 ">
      <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd;align-items: center;  cursor:pointer; background:#f5f7fd">
              <!-- <img class="mt-2 img-fluid" src="./img/ins/user.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/female.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a style="text-decoration: none;font-size:15px; color:#6c777d">Instructors</a></p>
              <h3 class="card-title">
              <?php echo $ins; ?>
                     </h3>
                
        </div>
      </div>
    </div>
    
    <div class="col mt-3 ">
            <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd">

            <!-- <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/graduated.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">Students</a></p>
              <h4 class="card-title">
              <?php echo $stu; ?>
                     </h4>
                
              </div>
            </div>
             </div>
             <div class="col mt-3 ">
            <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd">

            <!-- <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/cap.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">Courses</a></p>
              <h3 class="card-title">
              <?php echo $totalcourse; ?>
                     </h3>
                
              </div>
            </div>
             </div>
             
             
</div>
  </div>

 <div class="col-md-9 mt-5" style="margin-left:22%">
    
            <div class="row text-center">
            <div class="col mt-3 ">
            <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">
                <!-- <img class="mt-2 img-fluid" src="./img/ins/e-learning-outline.png" alt="Card" width="60" height="40"> -->
              
              <div class="card-body">
                <img src="image/play.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">Lectures</a></p>
              <h3 class="card-title">
                         <?php echo $lesson; ?>
                     </h3>
                
              </div>
            </div>
             </div>
            
    <div class="col mt-3 ">
      <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; align-items: center; cursor:pointer; background:#f5f7fd">
              <!-- <img class="mt-2 img-fluid" src="./img/ins/user.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/quiz.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a style="text-decoration: none;font-size:15px; color:#6c777d">Quiz</a></p>
              <h3 class="card-title">
              <?php echo $quize; ?>
                     </h3>
                
        </div>
      </div>
    </div>
    
    <div class="col mt-3 ">
            <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; align-items: center;cursor:pointer; background:#f5f7fd">

            <!-- <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/active.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">Active Courses</a></p>
              <h3 class="card-title">
              <?php echo $activecourse; ?>
                     </h3>
                
              </div>
            </div>
             </div>
             <div class="col mt-3 ">
            <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; align-items: center;cursor:pointer; background:#f5f7fd">

            <!-- <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/pending.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">Pending Courses</a></p>
              <h3 class="card-title">
              <?php echo $pendingcourse; ?>
                     </h3>
                
              </div>
            </div>
             </div>
  </div>
  </div>




             <div class="col-md-9 mt-5" style="margin-left:22%">
    
            <div class="row text-center">
            <div class="col mt-3 ">
      <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd;align-items: center;  cursor:pointer; background:#f5f7fd">
              <!-- <img class="mt-2 img-fluid" src="./img/ins/user.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/user_4.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a style="text-decoration: none;font-size:15px; color:#6c777d">Sold Courses</a></p>
              <h3 class="card-title">
              <?php echo $totalsold; ?>
                     </h3>
                
        </div>
      </div>
    </div>
            
    <div class="col mt-3 ">
      <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd;align-items: center;  cursor:pointer; background:#f5f7fd">
              <!-- <img class="mt-2 img-fluid" src="./img/ins/user.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/money_1.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a style="text-decoration: none;font-size:15px; color:#6c777d">Payment Total</a></p>
              <h3 class="card-title">
              ₹<?php echo $payment; ?>
                     </h3>
                
        </div>
      </div>
    </div>
    
    <div class="col mt-3 ">
            <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd">

            <!-- <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/withdraw.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">Withdraws Total</a></p>
              <h3 class="card-title">
              ₹<?php echo $withdraw; ?>
                     </h3>
                
              </div>
            </div>
             </div>
             <div class="col mt-3 ">
            <div class="card shadow " style="width: 16rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd">

            <!-- <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                <img src="image/cash-payment.png" style="height: 80px;width: 80px;">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">Total Earnings</a></p>
              <h3 class="card-title">
              ₹<?php echo $total; ?>
                     </h3>
                
              </div>
            </div>
             </div>
             
             
</div>

             
             



      
      <!-- <div class="col-sm-9 mt-5 card-item">
            <div class="row text-center mx-2">
            <div class="col-md-4 mt-3 ml-5">
            <div class="card shadow " style="margin-left:20%;width: 18rem; box-shadow: 1px 1px 1px 1px #e1dbdb; border-radius:0px; border-top-left-radius: 0px; cursor:pointer;align-items: center;">
                <img class="mt-3 img-fluid" src="./uploadimg/course.png" alt="Card" width="110" height="90">
              
              <div class="card-body">
              <h4 class="card-title">
                         <?php //echo $totalcourse; ?>
                     </h4>
                <p class="card-text"><a  style="text-decoration: none;">Courses</a></p>
              </div>
            </div>
             </div>
                            </div>
                            </div> -->
            
    <!-- <div class="col-md-4 mt-3">
      <div class="card shadow " style="width: 18rem; box-shadow: 1px 1px 1px 1px #e1dbdb; border-radius:0px; border-top-left-radius: 0px; cursor:pointer;align-items: center;">
              <img class="mt-3 img-fluid" src="./uploadimg/student1.png" alt="Card" width="60" height="50">
              <div class="card-body">
              <h4 class="card-title">
              <?php echo $totalstu; ?>
                     </h4>
                <p class="card-text"><a style="text-decoration: none;">Students</a></p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 mt-3 ml-5">
            <div class="card shadow " style="width: 18rem; box-shadow: 1px 1px 1px 1px #e1dbdb; border-radius:0px; border-top-left-radius: 0px; cursor:pointer;align-items: center;">

            <img class="mt-3 img-fluid" src="./uploadimg/sold.png" alt="Card" width="70" height="90">
              <div class="card-body">
              <h4 class="card-title">
              <?php echo $totalsold; ?>
                     </h4>
                <p class="card-text"><a  style="text-decoration: none;">Sold</a></p>
              </div>
            </div>
             </div>-->
  
    <div class="  mt-5 text-center" style="width:1101px;"> 
        <!-- Table -->
    <p class="bg-secondary text-white p-2">Course Ordered</p>
    <?php
           $sql = "SELECT * FROM course_order";
           $result = $conn->query($sql);
           if($result->num_rows > 0){
    echo  '<table class="table table-success " style="width:1100px;">
       <thead>
          <tr style="background: #f5f7fd;">
              <th style="background: #f5f7fd;" scope="col">Order ID</th>
              <th style="background: #f5f7fd;" scope="col">Course ID</th>
              <th style="background: #f5f7fd;" scope="col">Student Email</th>
              
              <th style="background: #f5f7fd;" scope="col">Amount</th>
              <th style="background: #f5f7fd;" scope="col">Action</th>
           </tr>
        </thead>
      <tbody>';
      while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<th style="background: #f5f7fd;" scope="row">#'.$row["co_id"].'</th>';
        echo '<td style="background: #f5f7fd;">'.$row["course_id"].'</td>';
        echo '<td style="background: #f5f7fd;">'.$row["stu_email"].'</td>';
        echo '<td style="background: #f5f7fd;">'.$row["amount"].'</td>';
        echo '</td>';
       echo '<td style="background: #f5f7fd;"><form action="" method="POST"
                class="d-inline">
                <input type="hidden" name="id"
                value='.$row["co_id"].'>
                <button type="submit"
                class="btn btn-secondary" name="delete" value="Delete"><i
                class="far fa-trash-alt"></i></button>
                </form>
                </td>
              </tr>';

      }

     echo '</tbody>
    </table>';
           }else{
             echo "o result";
           }

           if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM course_order WHERE co_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }else{
            echo "Unable to Delete Data";
        }
        }
        ?>
    </div>
   </div>
  </div>
</div>

</div>
</div>

<?php
      include('./admininclude/footer.php');
?>


</body>
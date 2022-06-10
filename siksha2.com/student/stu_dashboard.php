<?php 
 
 if(!isset($_SESSION)){
    session_start();
    $stu_id = $_SESSION['stu_id'];
}
 
 include('./stuInclude/stu_header.php');
//  include('./stuInclude/header.php');

include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
	$stuEmail = $_SESSION['stuLogEmail'];
}else{
	echo "<script> location.href='../index.php'; </script>";
}


     $sql = "SELECT * FROM course_order where stu_email='$stuEmail'";
      $result = $conn->query($sql);
      $enrollcourse = $result->num_rows;

     $sql = "SELECT *  FROM wishlist WHERE stu_id = '$stu_id'" ;
      $result = $conn->query($sql);
      $wishlist = $result->num_rows;

      $sql = "SELECT * FROM review where stu_email='$stuEmail'";
      $result = $conn->query($sql);
      $review = $result->num_rows;
?>

<div class="col-md-10 mt-5" style="margin-left:12%">
    
            <div class="row  text-center">
            <div class="col-md-4 mt-3 ">
            <a href="mycourse.php">
            <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">
                <img class="mt-2 img-fluid" src="../image/stu/user_4.png" alt="Card" width="60" height="40">
              
              <div class="card-body">
              <h4 class="card-title">
                         <?php echo $enrollcourse; ?>
                     </h4>
                <h4 class="card-text"><a  style="text-decoration: none;">Enrolled Courses</a></h4>
              </div>
            </div>
            </a>
             </div>
            
    <div class="col-md-4 mt-3 ">
        <a href="wishlist.php">
      <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">
              <img class="mt-2 img-fluid" src="../image/stu/love.png" alt="Card" width="60" height="40">
              <div class="card-body">
              <h4 class="card-title">
              <?php echo $wishlist; ?>
                     </h4>
                <h4 class="card-text"><a style="text-decoration: none;">In Wishlist</a></h4>
        </div>
      </div>
</a>
    </div>
    
    <div class="col-md-4 mt-3 ">
        <a href="review.php">
            <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;align-items: center; background:#f5f7fd">

            <img class="mt-2 img-fluid" src="../image/stu/review.png" alt="Card" width="60" height="40">
              <div class="card-body">
              <h4 class="card-title">
              <?php echo $review; ?>
                     </h4>
                <h4 class="card-text"><a  style="text-decoration: none;">My Reviews</a></h4>
              </div>
            </div>
</a>
             </div>
</div>

</div>
<br><br>
<h3 class="mb-3" style="margin-left:14%;">My purchase history</h3>
<center>
<?php
//  $sql = "SELECT c.course_name, r.rating,r.comment,r.add_date FROM review AS r JOIN course AS c
//       ON c.course_id = r.course_id WHERE r.stu_email = '$stuLogEmail'" ;
           $sql = "SELECT co.amount,co.order_date,co.co_id,c.course_name,co.method FROM course_order AS co JOIN course As c ON c.course_id = co.course_id where co.stu_email = '$stuEmail'";
           $result = $conn->query($sql);
           if($result->num_rows > 0){
    echo  '<table class="table table-success " style="width:1100px;">
       <thead>
          <tr style="background: #f5f7fd;">
              <th style="background: #f5f7fd;" scope="col">Order ID</th>
              <th style="background: #f5f7fd;" scope="col">Amount</th>
              <th style="background: #f5f7fd;" scope="col">Method</th>
              
              <th style="background: #f5f7fd;" scope="col">Time</th>
              <th style="background: #f5f7fd;" scope="col">course_name</th>
           </tr>
        </thead>
      <tbody>';
      while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<th style="background: #f5f7fd;" scope="row">#'.$row["co_id"].'</th>';
        echo '<td style="background: #f5f7fd;">'.$row["amount"].'</td>';
        echo '<td style="background: #f5f7fd;">'.$row["method"].'</td>';
        echo '<td style="background: #f5f7fd;">'.$row["order_date"].'</td>';
         echo '<td style="background: #f5f7fd;">'.$row["course_name"].'</td>';
       

      }

     echo '</tbody>
    </table>';
           }else{
             echo "o result";
           }
           ?>
           </center>
<br><br>
<br><br>
<br><br>
<br><br>


<?php
     include('../maininclude/footer.php');
   ?>
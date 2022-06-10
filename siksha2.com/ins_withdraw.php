<?php
if(!isset($_SESSION)){
    session_start();
    $ins_id = $_SESSION['stu_id'];
    $stuEmail = $_SESSION['stuLogEmail'];
}
if(isset($_SESSION['pref_email'])){
    $pref_email = $_SESSION['pref_email'];
}
include('instructor_header.php');
 
      $sql = "SELECT SUM(ins_revenue) FROM course_order where ins_id = $ins_id";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){  
        $ins_revenue = $row['SUM(ins_revenue)'];
        
        // echo "Total revenue:".$row['SUM(ins_revenue)'];
      }
      $sql = "SELECT SUM(amount) FROM course_order where ins_id = $ins_id";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
        $totalsale = $row['SUM(amount)'];
       
        // echo "Total revenue:".$row['SUM(ins_revenue)'];
      }
      $sql = "SELECT SUM(amount) FROM course_order where ins_id = $ins_id";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
        $totalsale = $row['SUM(amount)'];
        $commision = $totalsale * 0.3;
      }
      $sql = "SELECT SUM(amount) FROM payout where ins_id = $ins_id and status='approved'";
    
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
        $withdraw = $row['SUM(amount)'];
      }
      $sql = "SELECT SUM(amount) FROM payout where ins_id = $ins_id ";
      $result = $conn->query($sql);
      while($row = mysqli_fetch_array($result)){
        $bal = $row['SUM(amount)'];
      }

      $balance = $ins_revenue - $bal;
    
     
$payment_type = 'paypal';
      if(isset($_REQUEST["withdraw"])){
        $amount = $_REQUEST['amount'];
         $desc = $_REQUEST['desc'];
         $sql = "INSERT INTO payout (id, ins_id, email_id, payment_type, amount, last_modified,status,description) VALUES ('', '$ins_id','$pref_email', '$payment_type',
         '$amount','','pending','$desc')";

            if($conn->query($sql) == TRUE){
                echo" <script>
                        alert(' Your withdraw has been received and waiting for approval');
                        window.location.replace('ins_withdraw.php');

                    </script>";
                //  $msg = '<div class="alert alert-success col-sm-6 mt-2" style="margin-left:13%;"><span class="ti-check" style="color:#155724; font-size:20px;"></span>Your withdraw has been received and waiting for approval</div>';
                //  $bal = $ins_revenue-$amount;
                
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" style="margin-left:13%;">Your withdraw has not been received..Please try again!</div>';
            }
        }


      

?>
<div class="topnav rounded mt-3  border border-secondary" style="ml-5 background:#fff; margin-left:13%; margin-right:8%;">
<a  href="ins_earnings.php" >Earnings</a>
  
  <a style="" href="ins_withdraw.php" class="active">Withdraw</a>
</div>
<?php if(isset($msg)){
    echo $msg;
}
?>
<div class="topnav2 rounded mt-3" style="ml-5 background:#fff; margin-left:13%; margin-right:8%;">
<a  href="ins_withdraw.php" class="active" >Withdraw</a>
  
  <a style="" href="ins_preference.php" >Withdraw Preference</a>
</div>

<div class="col-md-10 mt-5" style="margin-left:12%">
    
            <div class="row">
            <div class="col-md-4 mt-3 ">
            <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd">
                <!-- <img class="mt-2 img-fluid" src="./img/ins/e-learning-outline.png" alt="Card" width="60" height="40"> -->
              
              <div class="card-body">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">LIFETIME SALES</a></p>
              <h4 class="card-title">
                         ₹<?php echo $totalsale; ?>
                     </h4>
                
              </div>
            </div>
             </div>
            
    <div class="col-md-4 mt-3 ">
      <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd">
              <!-- <img class="mt-2 img-fluid" src="./img/ins/user.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                  <p class="card-text"><a style="text-decoration: none;font-size:15px; color:#6c777d">LIFETIME EARNINGS</a></p>
              <h4 class="card-title">
              ₹<?php echo $ins_revenue; ?>
                     </h4>
                
        </div>
      </div>
    </div>
    
    <div class="col-md-4 mt-3 ">
            <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd"">

            <!-- <img class="mt-2 img-fluid" src="./img/ins/euro_outline.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">COMMISSION DEDUCTED</a></p>
              <h4 class="card-title">
              ₹<?php echo $commision; ?>
                     </h4>
                
              </div>
            </div>
             </div>
</div>

</div>

<div class="col-md-10" style="margin-left:12%">
    
            <div class="row">
            <div class="col-md-4 mt-3 ">
            <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer; background:#f5f7fd">
                <!-- <img class="mt-2 img-fluid" src="./img/ins/checkbox.png" alt="Card" width="60" height="40"> -->
              
              <div class="card-body">
                  <p class="card-text"><a  style="text-decoration: none; font-size:15px; color:#6c777d">LIFETIME WITHDRAWALS</a></p>
              <h4 class="card-title">
                         ₹<?php if(isset($withdraw)){
                             echo $withdraw;
                             }else{
                                 echo '0';
                             } ?>
                     </h4>
                
              </div>
            </div>
             </div>
            
    <div class="col-md-4 mt-3 ">
      <div class="card shadow " style="width: 22rem; box-shadow: 1px 1px 1px 1px 1px; border-radius:20px; border:#f5f7fd; cursor:pointer;background:#f5f7fd">
              <!-- <img class="mt-2 img-fluid" src="./img/ins/sticker.png" alt="Card" width="60" height="40"> -->
              <div class="card-body">
                  <p class="card-text"><a style="text-decoration: none; font-size:15px; color:#6c777d">BALANCE</a></p>
              <h4 class="card-title">
              ₹<?php echo $balance; ?>
              
                     </h4>
                
                
        </div>
      </div>
    </div>
    
    
</div>
<h5 class="mt-4" >Enter withdrawal details</h5>
<div class="ml-5 mt-5">
    <h6>Withdrawal Method : <b> PayPal</b></h6>
    <h6>Min Withdraw amount : <b> ₹100.00</b></h6><br>
    <h6>PayPal E-Mail Address : <b><?php 
    if(isset($pref_email)){
    echo $pref_email;  
    }
    else
    { 
      echo $stuEmail ; 
    }
    
    ?></b></h6>
    <div class="rounded " style="height: 300px; border: 1px solid #a2a2a2;">
    
<form>
  <div class="form-group row mt-4 pl-4 pt-4">
    <label for="inputPassword" class="col-sm-2 col-form-label"><h6>Amount</h6></label>
    <div class="col-sm-10">
      <input style="width: 600px; background:#f5f7fd" type="number" min="100" <?php echo 'max="'.$balance.'"';?> class="form-control form-control-lg border  border-secondary" id="amount" name="amount">
      <p>Min withdraw amount <b> ₹100.00</b>, Max : <b>₹<?php echo $balance;?>.00</b></p>
    </div>
  </div>
  <div class="form-group row mt-4 pl-4">
    <label for="inputPassword" class="col-sm-2 col-form-label"><h6>Descrption<p>(optional)</p></h6></label>
    <div class="col-sm-10">
      <input style="width: 600px; background:#f5f7fd" type="text" class="form-control form-control-lg border  border-secondary" id="desc" name="desc">
      <button type="submit" name="withdraw" id="withdraw" class="mt-2"style="width: 150px; height: 40px;border-radius:10px; background:#5022c3; border:0px; color:#fff;" >Withdraw</button>
    </div>
  </div>

</form>

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

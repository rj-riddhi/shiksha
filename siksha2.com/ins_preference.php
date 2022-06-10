<?php
if(!isset($_SESSION)){
    session_start();
    $ins_id = $_SESSION['stu_id'];
    
}

include('instructor_header.php');
 ?>
<br><br/>
<?php
if(isset($_REQUEST["savepref"])){
        $pref_email = $_REQUEST['pref_email'];
        //  $pref_email = $_SESSION['pref_email'];
         $msg = '<div class="alert alert-success col-sm-6 mt-2" style="margin-left:13%;"><span class="ti-check" style="color:#155724; font-size:20px;"></span>Your withdraw preference has been saved</div>';
         $_SESSION['pref_email'] = $pref_email;
        $res= $_SESSION['pref_email'];
         $abc = $msg;
        //  echo $abc;
}
        
    

?>

<div class="topnav rounded mt-3  border border-secondary" style="ml-5 background:#fff; margin-left:13%; margin-right:8%;">
<a  href="ins_earnings.php" >Earnings</a>
  
  <a style="" href="ins_withdraw.php" class="active">Withdraw</a>
</div>
<div class="topnav2 rounded mt-3" style="ml-5 background:#fff; margin-left:13%; margin-right:8%;">
<a  href="ins_withdraw.php"  >Withdraw</a>
  
  <a style="" href="ins_preference.php" class="active">Withdraw Preference</a>
</div>
<?php if(isset($abc)){
  echo $msg;
}
  ?>
<div class="mt-5 rounded" style="margin-left:13%; cursor:pointer;" >
<h4>Select a withdraw method</h4>
<div class="pl-4 pt-4"style="width: 400px; height:100px; background:#e5ffe8;">
  <h6>Paypal</h6>
  <p>Minimum withdraw amount: ₹100.00</p>
</div>
<div class="mt-4"><h6>PayPal E-Mail Address</h6></div>
<form>
  <div style="margin-right:50%;">
  <input type="email" class="form-control form-control-lg" id="pref_email" name="pref_email" type="text" value=<?php 
  if(isset($_SESSION['pref_email'])){
    echo $_SESSION['pref_email'];
  } else{
     echo $row['stu_email']; 
  } ?>>
</div>
<p>Your earning will be send to this PayPal Account</p>
<button type="submit" name="savepref" id="savepref" class="mt-5"style="width: 300px; height: 40px;border-radius:10px; background:#5022c3; border:0px; color:#fff;" >Save Withdraw Preference</button>
</form>

</div>
 <?php
  $sql = "SELECT * FROM student WHERE stu_id =$ins_id";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();

 

?>      

<br><br>

<?php
    include('./maininclude/footer.php');
    ?>

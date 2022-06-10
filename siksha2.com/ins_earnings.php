<?php
if(!isset($_SESSION)){
    session_start();
    $ins_id = $_SESSION['stu_id'];
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

?>
<div class="topnav rounded mt-3  border border-secondary" style="ml-5 background:#fff; margin-left:13%; margin-right:8%;">
<a  href="ins_earnings.php" class="active">Earnings</a>
  
  <a style="" href="ins_withdraw.php">Withdraw</a>
</div>
<div class="topnav2 rounded mt-3" style="ml-5 background:#fff; margin-left:13%; margin-right:8%;">
<a  href="ins_earnings.php" class="active" >Earnings</a>
  
  <a style="" href="ins_report.php?thismonth" >Report & Statements</a>
</div>


<div class="col-md-10 mt-2" style="margin-left:12%">
    
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
              <a href="ins_withdraw.php" style="font-size:15px; color:#8a22c3; padding-left:58%;">Withdrow</a>
                     </h4>
                
                
        </div>
      </div>
    </div>
    
    
</div>

</div>

<?php
echo'<h3 class="mt-5" style="margin-left:8%;">This Year Earnings</h3>';
$trans=$conn->query("select sum(amount),order_date from course_order where YEAR(order_date) = YEAR(CURRENT_DATE()) AND ins_id = $ins_id");
$rtrans=mysqli_fetch_array($trans);
// $date=$con->query("select sum(amount) from bill where date<='$_REQUEST[stdate]' and date>='$_REQUEST[stdate]' ");
// $rdate=mysqli_fetch_array($profileg);

$cjan=0;
$cfeb=0;
$cmarch=0;
$capril=0;
$cmay=0;
$cjune=0;
$cjuly=0;
$caug=0;
$csep=0;
$coct=0;
$cnov=0;
$cdec=0;
$profiledate=$conn->query("select * from course_order where  YEAR(order_date) = YEAR(CURRENT_DATE()) AND ins_id = $ins_id");
// $rprofiledate=mysqli_fetch_array($profiledate);
while($rprofiledate=mysqli_fetch_array($profiledate))
{
 $d2 = date('F',strtotime($rprofiledate[5]));
 if($d2=="January")
 {
    $cjan=$cjan+$rprofiledate[4];
 }
 if($d2=="February")
 {
    $cfeb=$cfeb+$rprofiledate[4];
    
 }
 if($d2=="March")
 {
    $cmarch=$cmarch+$rprofiledate[4];
 }
 if($d2=="April")
 {
    $capril=$capril+$rprofiledate[4];
 }
 if($d2=="May")
 {
    $cmay=$cmay+$rprofiledate[4];
 }
 if($d2=="June")
 {
    $cjune=$cjune+$rprofiledate[4];
 }
 if($d2=="July")
 {
    $cjuly=$cjuly+$rprofiledate[4];
 }
 if($d2=="August")
 {
    $caug=$caug+$rprofiledate[4];
 }
 if($d2=="September")
 {
    $csep=$csep+$rprofiledate[4];
 }
 if($d2=="October")
 {
    // $coct++;
    $coct=$coct+$rprofiledate[4];
 }
 if($d2=="November"){
 
    $cnov=$cnov+$rprofiledate[4];
 }
 if($d2=="December")
 {
    $cdec==$cdec+$rprofiledate[4];
 }
}
//  echo $d2;


?>
<center>
<table  class="table table-hover " style="background-color:#f8f8f8;margin-top:1 %; width:85%;">
        <tr style="background-color: #000 !important;color:#f8f8f8;">
        <td>January </td>
        <td>February </td>
        <td>March </td>
        <td>April </td>
        <td>May </td>
        <td>June </td>
        <td>July </td>
        <td>August </td>
        <td>September </td>
        <td>October </td>
        <td>November </td>
        <td>December </td>
        <td>Total</td>
        </tr>
 <tr>
 <td><?php echo $cjan;?></td>
   <td><?php echo $cfeb;?></td>
   <td><?php echo $cmarch;?></td>
   <td><?php echo $capril;?></td>
   <td><?php echo $cmay;?></td>
   <td><?php echo $cjune;?></td>
   <td><?php echo $cjuly;?></td>
   <td><?php echo $caug;?></td>
   <td><?php echo $csep;?></td>
   <td><?php echo $coct;?></td>
   <td><?php echo $cnov;?></td>
   <td><?php echo $cdec;?></td>
   <td><?php echo $rtrans[0];?></td>

 </tr>
</table>
</center>
<center>
<div style="height=70%;width:80%">
<canvas id="myChart"></canvas>
</div>
<script src="js/chart.js"></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January ','February ','March ','April ','May ','June ','July ','August ','September ','October ','Nevember ','December'],
        datasets: [{
            label: 'Earnings',
            fill: false,
           borderColor: "#0359a0",
            backgroundColor: "#0359a0",
            pointBackgroundColor: "#0359a0",
            pointBorderColor: "#0359a0",
            pointHoverBackgroundColor: "#0359a0",
            pointHoverBorderColor: "#0359a0",
            data: [<?php echo $cjan; ?>,<?php echo $cfeb; ?>,<?php echo $cmarch; ?>,<?php echo $capril; ?>,<?php echo $cmay; ?>,<?php echo $cjune; ?>,<?php echo $cjuly; ?>,<?php echo $caug; ?>,<?php echo $csep; ?>,<?php echo $coct; ?>,<?php echo $cnov; ?>,<?php echo $cdec; ?>],
            
            // backgroundColor: [
            //     'rgba(255, 99, 132, 0.2)',
            //     'rgba(54, 162, 235, 0.2)',
            //     'rgba(255, 206, 86, 0.2)',
            //     'rgba(75, 192, 192, 0.2)',
            //     'rgba(153, 102, 255, 0.2)',
            //     'rgba(255, 159, 64, 0.2)'
            // ],
            // borderColor: [
            //     'rgba(255, 99, 132, 1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)',
            //     'rgba(75, 192, 192, 1)',
            //     'rgba(153, 102, 255, 1)',
            //     'rgba(255, 159, 64, 1)'
            // ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>
</center>





            
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<?php
    include('./maininclude/footer.php');
    ?>

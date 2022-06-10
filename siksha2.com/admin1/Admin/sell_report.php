<?php
      include('./admininclude/header.php');
      include('../dbConnection.php');
?>

<center>
<div class="btn-group mt-5" style="background:#fff;" role="group" aria-label="Basic example" >
  <a href="sell_report.php?lastyear" type="submit" name="lastyear" id="lastyear" class="btn btn-primary border" style="background:#f5f7fd; color:#495057; font-weight:normal; width:200px;" >Last Year</a>
  <a href="sell_report.php?thisyear" type="submit" name="thisyear" id="thisyear" class="btn btn-primary border" style="background:#f5f7fd; color:#495057; font-weight:normal; width:200px;">This Year</a>
  <a href="sell_report.php?lastmonth" type="submit" name="lastmonth" id="lastmonth" class="btn btn-primary border" style="background:#f5f7fd; color:#495057; font-weight:normal; width:200px;">Last Month</a>
  <a href="sell_report.php?thismonth" type="submit" name="thismonth" id="thismonth" class="btn btn-primary border active" style="background:#f5f7fd; color:#495057; font-weight:normal; width:200px;">This Month</a>
  <!-- <a href="ins_report.php?lastweek" type="submit" name="lastweek"  id="lastweek"class="btn btn-primary border" style="background:#f5f7fd; color:#495057; font-weight:normal; width:200px;">Last week</a> -->
  <!-- <a href="ins_report.php?thisweek" type="submit" name="thisweek" id="thisweek" class="btn btn-primary border" style="background:#f5f7fd; color:#495057; font-weight:normal; width:200px;">This week</a> -->
  </div>
   <center>


    <center>
    <div class="btn-group mt-1" role="group" aria-label="Basic example" >
<form method="post" action="sell_report.php">
  <label for="fromdate" class="col-sm-2 col-form-label"><h6></h6></label>
    <div class="col-sm-10">
      <input style="width: 300px; background:#f5f7fd" type="date" min="0" class="form-control form-control-lg border  border-secondary" id="fromdate" name="fromdate">
    </div>


  <label for="fromdate" class="col-sm-2 col-form-label"><h6></h6></label>
    <div class="col-sm-10">
      <input style="width: 300px; background:#f5f7fd" type="date" min="0"class="form-control form-control-lg border  border-secondary" id="todate" name="todate">
    </div>
    


<button type="submit" name="result" id="result" class=""style="width: 130px; height: 40px;margin-top:35px;border-radius:10px; margin-left:25%; background:#5022c3; border:0px; color:#fff;" >filter result</button>
    </form>
  </div>
   </center>
</div>


   <?php if(isset($_REQUEST['thisyear'])){
   echo'<h3 style="margin-left:22%;">This year Selling</h3>';
$trans=$conn->query("select sum(amount),order_date from course_order where YEAR(order_date) = YEAR(CURRENT_DATE())");

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
$profiledate=$conn->query("select * from course_order where YEAR(order_date) = YEAR(CURRENT_DATE()) ");
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
 if($d2=="November")
 
    $cnov=$cnov+$rprofiledate[4];;
 }
//  if($d2=="December")
//  {
//     $cdec==$cdec+$rprofiledate[4];
//  }

//  echo $d2;


?>

<table  class="table " style="background:#f5f7fd !important;margin-top:1%; margin-left:22%;width:75%;">
        <tr style="background: #f5f7fd !important;color:#000;">
        <td style="background:#f5f7fd; font-weight:bold">January </td>
        <td style="background:#f5f7fd; font-weight:bold">February </td>
        <td style="background:#f5f7fd; font-weight:bold">March </td>
        <td style="background:#f5f7fd; font-weight:bold">April </td>
        <td style="background:#f5f7fd; font-weight:bold">May </td>
        <td style="background:#f5f7fd; font-weight:bold">June </td>
        <td style="background:#f5f7fd; font-weight:bold">July </td>
        <td style="background:#f5f7fd; font-weight:bold">August </td>
        <td style="background:#f5f7fd; font-weight:bold">September </td>
        <td style="background:#f5f7fd; font-weight:bold">October </td>
        <td style="background:#f5f7fd; font-weight:bold">November </td>
        <td style="background:#f5f7fd; font-weight:bold">December </td>
        <td style="background:#f5f7fd; font-weight:bold">Total</td>
        </tr>
 <tr>
 <td style="background:#f5f7fd;"><?php echo $cjan;?></td>
   <td style="background:#f5f7fd;"><?php echo $cfeb;?></td>
   <td style="background:#f5f7fd;"><?php echo $cmarch;?></td>
   <td style="background:#f5f7fd;"><?php echo $capril;?></td>
   <td style="background:#f5f7fd;"><?php echo $cmay;?></td>
   <td style="background:#f5f7fd;"><?php echo $cjune;?></td>
   <td style="background:#f5f7fd;"><?php echo $cjuly;?></td>
   <td style="background:#f5f7fd;"><?php echo $caug;?></td>
   <td style="background:#f5f7fd;"><?php echo $csep;?></td>
   <td style="background:#f5f7fd;"><?php echo $coct;?></td>
   <td style="background:#f5f7fd;"><?php echo $cnov;?></td>
   <td style="background:#f5f7fd;"><?php echo $cdec;?></td>
   <td style="background:#f5f7fd;"><?php echo $rtrans[0];?></td>

 </tr>
</table>
<center>
<div style="height:70%;width:78%; margin-left:22%;">
<canvas id="myChart"></canvas>
</div>
<script src="../js/chart.js"></script>
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
<?php
}
?>


<!-- LAST YEAR -->

<?php if(isset($_REQUEST['lastyear'])){
   echo'<h3 style="margin-left:22%;">Last year Selling</h3>';
   $lyear = date("Y",strtotime("-1 year"));
$trans=$conn->query("select sum(amount),order_date from course_order where YEAR(order_date) = $lyear");
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
$profiledate=$conn->query("select * from course_order where  YEAR(order_date) = $lyear");
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
 if($d2=="November")
 
    $cnov=$cnov+$rprofiledate[4];;
 }
//  if($d2=="December")
//  {
//     $cdec==$cdec+$rprofiledate[4];
//  }

//  echo $d2;


?>

<table  class="table " style="background:#f5f7fd !important;margin-top:1%; margin-left:22%;width:75%;">
        <tr style="background: #f5f7fd !important;color:#000;">
        <td style="background:#f5f7fd; font-weight:bold">January </td>
        <td style="background:#f5f7fd; font-weight:bold">February </td>
        <td style="background:#f5f7fd; font-weight:bold">March </td>
        <td style="background:#f5f7fd; font-weight:bold">April </td>
        <td style="background:#f5f7fd; font-weight:bold">May </td>
        <td style="background:#f5f7fd; font-weight:bold">June </td>
        <td style="background:#f5f7fd; font-weight:bold">July </td>
        <td style="background:#f5f7fd; font-weight:bold">August </td>
        <td style="background:#f5f7fd; font-weight:bold">September </td>
        <td style="background:#f5f7fd; font-weight:bold">October </td>
        <td style="background:#f5f7fd; font-weight:bold">November </td>
        <td style="background:#f5f7fd; font-weight:bold">December </td>
        <td style="background:#f5f7fd; font-weight:bold">Total</td>
        </tr>
 <tr>
 <td style="background:#f5f7fd;"><?php echo $cjan;?></td>
   <td style="background:#f5f7fd;"><?php echo $cfeb;?></td>
   <td style="background:#f5f7fd;"><?php echo $cmarch;?></td>
   <td style="background:#f5f7fd;"><?php echo $capril;?></td>
   <td style="background:#f5f7fd;"><?php echo $cmay;?></td>
   <td style="background:#f5f7fd;"><?php echo $cjune;?></td>
   <td style="background:#f5f7fd;"><?php echo $cjuly;?></td>
   <td style="background:#f5f7fd;"><?php echo $caug;?></td>
   <td style="background:#f5f7fd;"><?php echo $csep;?></td>
   <td style="background:#f5f7fd;"><?php echo $coct;?></td>
   <td style="background:#f5f7fd;"><?php echo $cnov;?></td>
   <td style="background:#f5f7fd;"><?php echo $cdec;?></td>
   <td style="background:#f5f7fd;"><?php echo $rtrans[0];?></td>

 </tr>
</table>
<center>
<div style="height:70%;width:78%; margin-left:22%;">
<canvas id="myChart"></canvas>
</div>
<script src="../js/chart.js"></script>
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
<?php
}
?>


<!-- THISMONTH -->

<?php if(isset($_GET['thismonth'])){
echo'<h3 style="margin-left:22%;">Current Month Selling</h3>';
 
$trans=$conn->query("select sum(amount),order_date from course_order where MONTH(order_date) = MONTH(CURRENT_DATE()) AND YEAR(order_date) = YEAR(CURRENT_DATE())");
$rtrans=mysqli_fetch_array($trans);
// $date=$con->query("select sum(amount) from bill where date<='$_REQUEST[stdate]' and date>='$_REQUEST[stdate]' ");
// $rdate=mysqli_fetch_array($profileg);

$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$c6=0;
$c7=0;
$c8=0;
$c9=0;
$c10=0;
$c11=0;
$c12=0;
$c13=0;
$c14=0;
$c15=0;
$c16=0;
$c17=0;
$c18=0;
$c19=0;
$c20=0;
$c21=0;
$c22=0;
$c23=0;
$c24=0;
$c25=0;
$c26=0;
$c27=0;
$c28=0;
$c29=0;
$c30=0;
$c31=0;

$profiledate=$conn->query("select * from course_order where MONTH(order_date) = MONTH(CURRENT_DATE()) AND YEAR(order_date) = YEAR(CURRENT_DATE())");
// $rprofiledate=mysqli_fetch_array($profiledate);
// $string = "2010-11-02";
// $timestamp = strtotime($string);
// echo date("d", $timestamp);
while($rprofiledate=mysqli_fetch_array($profiledate))
{
 $d2 = date('d',strtotime($rprofiledate[5]));
//  print_r($d2);


 if($d2=="1")
 {
    $c1=$c1+$rprofiledate[4];
    //  print_r($c1);
 }
 if($d2=="2")
 {
    $c2=$c2+$rprofiledate[4];
    //  print_r($c2);
 }
 if($d2=="3")
 {
    $c3=$c3+$rprofiledate[4];
    // print_r($c3);
 }
 if($d2=="4")
 {
    $c4=$c4+$rprofiledate[4];
    // print_r($c4);
 }
 if($d2=="5")
 {
    $c5=$c5+$rprofiledate[4];
    // print_r($c5);
 }
 if($d2=="6")
 {
    $c6=$c6+$rprofiledate[8];
    // print_r($c6);
 }
 if($d2=="7")
 {
    $c7=$c7+$rprofiledate[4];
    // print_r($c7);
 }
 if($d2=="8")
 {
    $c8=$c8+$rprofiledate[4];
    // print_r($c8);
 }
 if($d2=="9")
 {
    $c9=$c9+$rprofiledate[4];
    // print_r($c9);
 }
 if($d2=="10")
 {
    $c10=$c10+$rprofiledate[4];
    // print_r($c10);
 }
 if($d2=="11")
 {
    $c11=$c11+$rprofiledate[4];
 }
 if($d2=="12")
 {
    $c12=$c12+$rprofiledate[4];
 }
 if($d2=="13")
 {
  $c13=$c13+$rprofiledate[4];
 }
 if($d2=="14")
 {
    $c14=$c14+$rprofiledate[4];
 }
 if($d2=="15")
 {
    $c15=$c15+$rprofiledate[4];
 }
 if($d2=="16")
 {
    $c16=$c16+$rprofiledate[4];
 }
 if($d2=="17")
 {
    $c17=$c17+$rprofiledate[4];
 }
 if($d2=="18")
 {
    $c18=$c18+$rprofiledate[4];
 }
 if($d2=="19")
 {
    $c19=$c19+$rprofiledate[4];
 }
 if($d2=="20")
 {
    $c20=$c20+$rprofiledate[4];
 }
 if($d2=="21")
 {
    $c21=$c21+$rprofiledate[4];
 }
 if($d2=="22")
 {
    $c22=$c22+$rprofiledate[4];
 }
 if($d2=="23")
 {
    $c23=$c23+$rprofiledate[4];
 }
 if($d2=="23")
 {
    $c24=$c24+$rprofiledate[4];
 }
 if($d2=="25")
 {
    $c25=$c25+$rprofiledate[4];
 }
 if($d2=="26")
 {
    $c26=$c26+$rprofiledate[4];
 }
 if($d2=="27")
 {
    $c27=$c27+$rprofiledate[4];
 }
 if($d2=="28")
 {
    $c28=$c28+$rprofiledate[4];
 }
 if($d2=="29")
 {
    $c29=$c29+$rprofiledate[4];
 }
 if($d2=="30")
 {
    $c30=$c30+$rprofiledate[4];
 }
 if($d2=="31")
 {
    $c31=$c31+$rprofiledate[4];
 }
}

//  echo $d2;


?>
<table  class="table " style="background:#f5f7fd !important;margin-top:1%; margin-left:22%;width:75%;">
<!-- <table  class="table table-success" style="background-color:#f8f8f8;margin-top:3%; width:50%; border-radius:10px;"> -->
<thead>
        <tr style="background: #f5f7fd !important;color:#000;">
        <td style="background:#f5f7fd; font-weight:bold">01 </td>
        <td style="background:#f5f7fd; font-weight:bold">02 </td>
        <td style="background:#f5f7fd; font-weight:bold">03 </td>
        <td style="background:#f5f7fd; font-weight:bold">04 </td>
        <td style="background:#f5f7fd; font-weight:bold">05 </td>
        <td style="background:#f5f7fd; font-weight:bold">06 </td>
        <td style="background:#f5f7fd; font-weight:bold">07 </td>
        <td style="background:#f5f7fd; font-weight:bold">08 </td>
        <td style="background:#f5f7fd; font-weight:bold">09 </td>
        <td style="background:#f5f7fd; font-weight:bold">10 </td>
        <td style="background:#f5f7fd; font-weight:bold">11 </td>
        <td style="background:#f5f7fd; font-weight:bold">12 </td>
        <td style="background:#f5f7fd; font-weight:bold">13 </td>
        <td style="background:#f5f7fd; font-weight:bold">14 </td>
        <td style="background:#f5f7fd; font-weight:bold">15 </td>
        <td style="background:#f5f7fd; font-weight:bold">16 </td>
        <td style="background:#f5f7fd; font-weight:bold">17 </td>
        <td style="background:#f5f7fd; font-weight:bold">18 </td>
        <td style="background:#f5f7fd; font-weight:bold">19 </td>
        <td style="background:#f5f7fd; font-weight:bold">20 </td>
        <td style="background:#f5f7fd; font-weight:bold">21 </td>
        <td style="background:#f5f7fd; font-weight:bold">22 </td>
        <td style="background:#f5f7fd; font-weight:bold">23 </td>
        <td style="background:#f5f7fd; font-weight:bold">24 </td>
        <td style="background:#f5f7fd; font-weight:bold">25 </td>
        <td style="background:#f5f7fd; font-weight:bold">26 </td>
        <td style="background:#f5f7fd; font-weight:bold">27 </td>
        <td style="background:#f5f7fd; font-weight:bold">28 </td>
        <td style="background:#f5f7fd; font-weight:bold">29 </td>
        <td style="background:#f5f7fd; font-weight:bold">30 </td>
        <td style="background:#f5f7fd; font-weight:bold">31 </td>
        <td style="background:#f5f7fd; font-weight:bold">Total</td>
        </tr>
</thead>
 <tr style="background-color: #f5f7fd !important;color:#000;">
 <td style="background:#f5f7fd;"><?php echo $c1;?></td>
   <td style="background:#f5f7fd;"><?php echo $c2;?></td>
   <td style="background:#f5f7fd;"><?php echo $c3;?></td>
   <td style="background:#f5f7fd;"><?php echo $c4;?></td>
   <td style="background:#f5f7fd;"><?php echo $c5;?></td>
   <td style="background:#f5f7fd;"><?php echo $c6;?></td>
   <td style="background:#f5f7fd;"><?php echo $c7;?></td>
   <td style="background:#f5f7fd;"><?php echo $c8;?></td>
   <td style="background:#f5f7fd;"><?php echo $c9;?></td>
   <td style="background:#f5f7fd;"><?php echo $c10;?></td>
   <td style="background:#f5f7fd;"><?php echo $c11;?></td>
   <td style="background:#f5f7fd;"><?php echo $c12;?></td>
   <td style="background:#f5f7fd;"><?php echo $c13;?></td>
   <td style="background:#f5f7fd;"><?php echo $c14;?></td>
   <td style="background:#f5f7fd;"><?php echo $c15;?></td>
   <td style="background:#f5f7fd;"><?php echo $c16;?></td>
   <td style="background:#f5f7fd;"><?php echo $c17;?></td>
   <td style="background:#f5f7fd;"><?php echo $c18;?></td>
   <td style="background:#f5f7fd;"><?php echo $c19;?></td>
   <td style="background:#f5f7fd;"><?php echo $c20;?></td>
   <td style="background:#f5f7fd;"><?php echo $c21;?></td>
   <td style="background:#f5f7fd;"><?php echo $c22;?></td>
   <td style="background:#f5f7fd;"><?php echo $c23;?></td>
   <td style="background:#f5f7fd;"><?php echo $c24;?></td>
   <td style="background:#f5f7fd;"><?php echo $c25;?></td>
   <td style="background:#f5f7fd;"><?php echo $c26;?></td>
   <td style="background:#f5f7fd;"><?php echo $c27;?></td>
   <td style="background:#f5f7fd;"><?php echo $c28;?></td>
   <td style="background:#f5f7fd;"><?php echo $c29;?></td>
   <td style="background:#f5f7fd;"><?php echo $c30;?></td>
   <td style="background:#f5f7fd;"><?php echo $c31;?></td>
   <td style="background:#f5f7fd;"><?php echo $rtrans[0];?></td>

 </tr>
</table>

<div style="height:70%;width:78%; margin-left:22%;">
<canvas id="myChart"></canvas>
</div>
<script src="../js/chart.js"></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['1 ','2 ','3 ','4 ','5 ','6 ','7 ','8 ','9 ','10 ','11 ','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
        datasets: [{
            label: 'Earnings',
            fill: false,
           borderColor: "#0359a0",
            backgroundColor: "#0359a0",
            pointBackgroundColor: "#0359a0",
            pointBorderColor: "#0359a0",
            pointHoverBackgroundColor: "#0359a0",
            pointHoverBorderColor: "#0359a0",
            data: [<?php echo $c1; ?>,<?php echo $c2; ?>,<?php echo $c3; ?>,<?php echo $c4; ?>,<?php echo $c5; ?>,<?php echo $c6; ?>,<?php echo $c7; ?>,<?php echo $c8; ?>,<?php echo $c9; ?>,<?php echo $c10; ?>,<?php echo $c11; ?>,<?php echo $c12; ?>,<?php echo $c13; ?>,<?php echo $c14; ?>,<?php echo $c15; ?>,<?php echo $c16; ?>,<?php echo $c17; ?>,<?php echo $c18; ?>,<?php echo $c19; ?>,<?php echo $c20; ?>,<?php echo $c21; ?>,<?php echo $c22; ?>,<?php echo $c23; ?>,<?php echo $c24; ?>,<?php echo $c25; ?>,<?php echo $c26; ?>,<?php echo $c27; ?>,<?php echo $c28; ?>,<?php echo $c29; ?>,<?php echo $c30; ?>,<?php echo $c31; ?>],
            
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

<?php
}
?>


<!-- Last Month -->
<?php if(isset($_GET['lastmonth'])){
echo'<h3 style="margin-left:22%;">Last Month Selling</h3>';
 $lmonth = date("m",strtotime("-1 month"));
$trans=$conn->query("select sum(amount),order_date from course_order where MONTH(order_date) = $lmonth");
$rtrans=mysqli_fetch_array($trans);
// $date=$con->query("select sum(amount) from bill where date<='$_REQUEST[stdate]' and date>='$_REQUEST[stdate]' ");
// $rdate=mysqli_fetch_array($profileg);

$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$c6=0;
$c7=0;
$c8=0;
$c9=0;
$c10=0;
$c11=0;
$c12=0;
$c13=0;
$c14=0;
$c15=0;
$c16=0;
$c17=0;
$c18=0;
$c19=0;
$c20=0;
$c21=0;
$c22=0;
$c23=0;
$c24=0;
$c25=0;
$c26=0;
$c27=0;
$c28=0;
$c29=0;
$c30=0;
$c31=0;


$profiledate=$conn->query("select * from course_order where MONTH(order_date) = $lmonth");
// $rprofiledate=mysqli_fetch_array($profiledate);
// $string = "2010-11-02";
// $timestamp = strtotime($string);
// echo date("d", $timestamp);
while($rprofiledate=mysqli_fetch_array($profiledate))
{
 $d2 = date('d',strtotime($rprofiledate[5]));
//  print_r($d2);


 if($d2=="1")
 {
    $c1=$c1+$rprofiledate[4];
    //  print_r($c1);
 }
 if($d2=="2")
 {
    $c2=$c2+$rprofiledate[4];
    //  print_r($c2);
 }
 if($d2=="3")
 {
    $c3=$c3+$rprofiledate[4];
    // print_r($c3);
 }
 if($d2=="4")
 {
    $c4=$c4+$rprofiledate[4];
    // print_r($c4);
 }
 if($d2=="5")
 {
    $c5=$c5+$rprofiledate[4];
    // print_r($c5);
 }
 if($d2=="6")
 {
    $c6=$c6+$rprofiledate[4];
    // print_r($c6);
 }
 if($d2=="7")
 {
    $c7=$c7+$rprofiledate[4];
    // print_r($c7);
 }
 if($d2=="8")
 {
    $c8=$c8+$rprofiledate[4];
    // print_r($c8);
 }
 if($d2=="9")
 {
    $c9=$c9+$rprofiledate[4];
    // print_r($c9);
 }
 if($d2=="10")
 {
    $c10=$c10+$rprofiledate[4];
    // print_r($c10);
 }
 if($d2=="11")
 {
    $c11=$c11+$rprofiledate[4];
 }
 if($d2=="12")
 {
    $c12=$c12+$rprofiledate[4];
 }
 if($d2=="13")
 {
  $c13=$c13+$rprofiledate[4];
 }
 if($d2=="14")
 {
    $c14=$c14+$rprofiledate[4];
 }
 if($d2=="15")
 {
    $c15=$c15+$rprofiledate[4];
 }
 if($d2=="16")
 {
    $c16=$c16+$rprofiledate[4];
 }
 if($d2=="17")
 {
    $c17=$c17+$rprofiledate[4];
 }
 if($d2=="18")
 {
    $c18=$c18+$rprofiledate[4];
 }
 if($d2=="19")
 {
    $c19=$c19+$rprofiledate[4];
 }
 if($d2=="20")
 {
    $c20=$c20+$rprofiledate[4];
 }
 if($d2=="21")
 {
    $c21=$c21+$rprofiledate[4];
 }
 if($d2=="22")
 {
    $c22=$c22+$rprofiledate[4];
 }
 if($d2=="23")
 {
    $c23=$c23+$rprofiledate[4];
 }
 if($d2=="23")
 {
    $c24=$c24+$rprofiledate[4];
 }
 if($d2=="25")
 {
    $c25=$c25+$rprofiledate[4];
 }
 if($d2=="26")
 {
    $c26=$c26+$rprofiledate[4];
 }
 if($d2=="27")
 {
    $c27=$c27+$rprofiledate[4];
 }
 if($d2=="28")
 {
    $c28=$c28+$rprofiledate[4];
 }
 if($d2=="29")
 {
    $c29=$c29+$rprofiledate[4];
 }
 if($d2=="30")
 {
    $c30=$c30+$rprofiledate[4];
 }
 if($d2=="31")
 {
    $c31=$c31+$rprofiledate[4];
 }
}

//  echo $d2;


?>
<table  class="table " style="background:#f5f7fd !important;margin-top:1%; margin-left:22%;width:75%;">
<!-- <table  class="table table-success" style="background-color:#f8f8f8;margin-top:3%; width:50%; border-radius:10px;"> -->
<thead>
        <tr style="background: #f5f7fd !important;color:#000;">
        <td style="background:#f5f7fd; font-weight:bold">01 </td>
        <td style="background:#f5f7fd; font-weight:bold">02 </td>
        <td style="background:#f5f7fd; font-weight:bold">03 </td>
        <td style="background:#f5f7fd; font-weight:bold">04 </td>
        <td style="background:#f5f7fd; font-weight:bold">05 </td>
        <td style="background:#f5f7fd; font-weight:bold">06 </td>
        <td style="background:#f5f7fd; font-weight:bold">07 </td>
        <td style="background:#f5f7fd; font-weight:bold">08 </td>
        <td style="background:#f5f7fd; font-weight:bold">09 </td>
        <td style="background:#f5f7fd; font-weight:bold">10 </td>
        <td style="background:#f5f7fd; font-weight:bold">11 </td>
        <td style="background:#f5f7fd; font-weight:bold">12 </td>
        <td style="background:#f5f7fd; font-weight:bold">13 </td>
        <td style="background:#f5f7fd; font-weight:bold">14 </td>
        <td style="background:#f5f7fd; font-weight:bold">15 </td>
        <td style="background:#f5f7fd; font-weight:bold">16 </td>
        <td style="background:#f5f7fd; font-weight:bold">17 </td>
        <td style="background:#f5f7fd; font-weight:bold">18 </td>
        <td style="background:#f5f7fd; font-weight:bold">19 </td>
        <td style="background:#f5f7fd; font-weight:bold">20 </td>
        <td style="background:#f5f7fd; font-weight:bold">21 </td>
        <td style="background:#f5f7fd; font-weight:bold">22 </td>
        <td style="background:#f5f7fd; font-weight:bold">23 </td>
        <td style="background:#f5f7fd; font-weight:bold">24 </td>
        <td style="background:#f5f7fd; font-weight:bold">25 </td>
        <td style="background:#f5f7fd; font-weight:bold">26 </td>
        <td style="background:#f5f7fd; font-weight:bold">27 </td>
        <td style="background:#f5f7fd; font-weight:bold">28 </td>
        <td style="background:#f5f7fd; font-weight:bold">29 </td>
        <td style="background:#f5f7fd; font-weight:bold">30 </td>
        <td style="background:#f5f7fd; font-weight:bold">31 </td>
        <td style="background:#f5f7fd; font-weight:bold">Total</td>
        </tr>
</thead>
 <tr style="background-color: #f5f7fd !important;color:#000;">
 <td style="background:#f5f7fd;"><?php echo $c1;?></td>
   <td style="background:#f5f7fd;"><?php echo $c2;?></td>
   <td style="background:#f5f7fd;"><?php echo $c3;?></td>
   <td style="background:#f5f7fd;"><?php echo $c4;?></td>
   <td style="background:#f5f7fd;"><?php echo $c5;?></td>
   <td style="background:#f5f7fd;"><?php echo $c6;?></td>
   <td style="background:#f5f7fd;"><?php echo $c7;?></td>
   <td style="background:#f5f7fd;"><?php echo $c8;?></td>
   <td style="background:#f5f7fd;"><?php echo $c9;?></td>
   <td style="background:#f5f7fd;"><?php echo $c10;?></td>
   <td style="background:#f5f7fd;"><?php echo $c11;?></td>
   <td style="background:#f5f7fd;"><?php echo $c12;?></td>
   <td style="background:#f5f7fd;"><?php echo $c13;?></td>
   <td style="background:#f5f7fd;"><?php echo $c14;?></td>
   <td style="background:#f5f7fd;"><?php echo $c15;?></td>
   <td style="background:#f5f7fd;"><?php echo $c16;?></td>
   <td style="background:#f5f7fd;"><?php echo $c17;?></td>
   <td style="background:#f5f7fd;"><?php echo $c18;?></td>
   <td style="background:#f5f7fd;"><?php echo $c19;?></td>
   <td style="background:#f5f7fd;"><?php echo $c20;?></td>
   <td style="background:#f5f7fd;"><?php echo $c21;?></td>
   <td style="background:#f5f7fd;"><?php echo $c22;?></td>
   <td style="background:#f5f7fd;"><?php echo $c23;?></td>
   <td style="background:#f5f7fd;"><?php echo $c24;?></td>
   <td style="background:#f5f7fd;"><?php echo $c25;?></td>
   <td style="background:#f5f7fd;"><?php echo $c26;?></td>
   <td style="background:#f5f7fd;"><?php echo $c27;?></td>
   <td style="background:#f5f7fd;"><?php echo $c28;?></td>
   <td style="background:#f5f7fd;"><?php echo $c29;?></td>
   <td style="background:#f5f7fd;"><?php echo $c30;?></td>
   <td style="background:#f5f7fd;"><?php echo $c31;?></td>
   <td style="background:#f5f7fd;"><?php echo $rtrans[0];?></td>

 </tr>
</table>

<div style="height:70%;width:78%; margin-left:22%;">
<canvas id="myChart"></canvas>
</div>
<script src="../js/chart.js"></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['1 ','2 ','3 ','4 ','5 ','6 ','7 ','8 ','9 ','10 ','11 ','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
        datasets: [{
            label: 'Earnings',
            fill: false,
           borderColor: "#0359a0",
            backgroundColor: "#0359a0",
            pointBackgroundColor: "#0359a0",
            pointBorderColor: "#0359a0",
            pointHoverBackgroundColor: "#0359a0",
            pointHoverBorderColor: "#0359a0",
            data: [<?php echo $c1; ?>,<?php echo $c2; ?>,<?php echo $c3; ?>,<?php echo $c4; ?>,<?php echo $c5; ?>,<?php echo $c6; ?>,<?php echo $c7; ?>,<?php echo $c8; ?>,<?php echo $c9; ?>,<?php echo $c10; ?>,<?php echo $c11; ?>,<?php echo $c12; ?>,<?php echo $c13; ?>,<?php echo $c14; ?>,<?php echo $c15; ?>,<?php echo $c16; ?>,<?php echo $c17; ?>,<?php echo $c18; ?>,<?php echo $c19; ?>,<?php echo $c20; ?>,<?php echo $c21; ?>,<?php echo $c22; ?>,<?php echo $c23; ?>,<?php echo $c24; ?>,<?php echo $c25; ?>,<?php echo $c26; ?>,<?php echo $c27; ?>,<?php echo $c28; ?>,<?php echo $c29; ?>,<?php echo $c30; ?>,<?php echo $c31; ?>],
            
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

<?php
}
?>


<!-- DATEWISE REPORT -->

<?php if(isset($_REQUEST['result'])){
   $fromdate = $_POST['fromdate']; 
$todate = $_POST['todate'];
   echo'<h3 style="margin-left:22%;">Selling from "'.$fromdate.'" to "'.$todate.'"</h3>';
$fromdate = $_POST['fromdate']; 
$todate = $_POST['todate'];
 
 $trans=$conn->query("select sum(amount),order_date from course_order where order_date BETWEEN '$fromdate' AND '$todate'");
  $rtrans=mysqli_fetch_array($trans);

$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$c6=0;
$c7=0;
$c8=0;
$c9=0;
$c10=0;
$c11=0;
$c12=0;
$c13=0;
$c14=0;
$c15=0;
$c16=0;
$c17=0;
$c18=0;
$c19=0;
$c20=0;
$c21=0;
$c22=0;
$c23=0;
$c24=0;
$c25=0;
$c26=0;
$c27=0;
$c28=0;
$c29=0;
$c30=0;
$c31=0;

$profiledate=$conn->query("select * from course_order where order_date BETWEEN '$fromdate' AND '$todate'");
 $count = mysqli_num_rows($profiledate);{
// $rprofiledate=mysqli_fetch_array($profiledate);
// $string = "2010-11-02";
// $timestamp = strtotime($string);
// echo date("d", $timestamp);
if($count > 0){
while($rprofiledate=mysqli_fetch_array($profiledate))
{
 $d2 = date('d',strtotime($rprofiledate[5]));
//  print_r($d2);


 if($d2=="1")
 {
    $c1=$c1+$rprofiledate[4];
    //  print_r($c1);
 }
 if($d2=="2")
 {
    $c2=$c2+$rprofiledate[4];
    //  print_r($c2);
 }
 if($d2=="3")
 {
    $c3=$c3+$rprofiledate[4];
    // print_r($c3);
 }
 if($d2=="4")
 {
    $c4=$c4+$rprofiledate[4];
    // print_r($c4);
 }
 if($d2=="5")
 {
    $c5=$c5+$rprofiledate[4];
    // print_r($c5);
 }
 if($d2=="6")
 {
    $c6=$c6+$rprofiledate[4];
    // print_r($c6);
 }
 if($d2=="7")
 {
    $c7=$c7+$rprofiledate[4];
    // print_r($c7);
 }
 if($d2=="8")
 {
    $c8=$c8+$rprofiledate[4];
    // print_r($c8);
 }
 if($d2=="9")
 {
    $c9=$c9+$rprofiledate[4];
    // print_r($c9);
 }
 if($d2=="10")
 {
    $c10=$c10+$rprofiledat[4];
    // print_r($c10);
 }
 if($d2=="11")
 {
    $c11=$c11+$rprofiledate[4];
 }
 if($d2=="12")
 {
    $c12=$c12+$rprofiledate[4];
 }
 if($d2=="13")
 {
  $c13=$c13+$rprofiledate[4];
 }
 if($d2=="14")
 {
    $c14=$c14+$rprofiledate[4];
 }
 if($d2=="15")
 {
    $c15=$c15+$rprofiledate[4];
 }
 if($d2=="16")
 {
    $c16=$c16+$rprofiledate[4];
 }
 if($d2=="17")
 {
    $c17=$c17+$rprofiledate[4];
 }
 if($d2=="18")
 {
    $c18=$c18+$rprofiledate[4];
 }
 if($d2=="19")
 {
    $c19=$c19+$rprofiledate[4];
 }
 if($d2=="20")
 {
    $c20=$c20+$rprofiledate[4];
 }
 if($d2=="21")
 {
    $c21=$c21+$rprofiledate[4];
 }
 if($d2=="22")
 {
    $c22=$c22+$rprofiledate[4];
 }
 if($d2=="23")
 {
    $c23=$c23+$rprofiledate[4];
 }
 if($d2=="23")
 {
    $c24=$c24+$rprofiledate[4];
 }
 if($d2=="25")
 {
    $c25=$c25+$rprofiledate[4];
 }
 if($d2=="26")
 {
    $c26=$c26+$rprofiledate[4];
 }
 if($d2=="27")
 {
    $c27=$c27+$rprofiledate[4];
 }
 if($d2=="28")
 {
    $c28=$c28+$rprofiledate[4];
 }
 if($d2=="29")
 {
    $c29=$c29+$rprofiledate[4];
 }
 if($d2=="30")
 {
    $c30=$c30+$rprofiledate[4];
 }
 if($d2=="31")
 {
    $c31=$c31+$rprofiledate[4];
 }
}
}
else{
  print_r('No data found');
}

//  echo $d2;


?>
<center>
<table  class="table table-success" style="background:#f5f7fd !important;margin-top:1%; margin-left:20%;width:20px;">
<thead>
        <tr style="background: #f5f7fd !important;color:#000;">
        <td style="background:#f5f7fd; font-weight:bold">01 </td>
        <td style="background:#f5f7fd; font-weight:bold">02 </td>
        <td style="background:#f5f7fd; font-weight:bold">03 </td>
        <td style="background:#f5f7fd; font-weight:bold">04 </td>
        <td style="background:#f5f7fd; font-weight:bold">05 </td>
        <td style="background:#f5f7fd; font-weight:bold">06 </td>
        <td style="background:#f5f7fd; font-weight:bold">07 </td>
        <td style="background:#f5f7fd; font-weight:bold">08 </td>
        <td style="background:#f5f7fd; font-weight:bold">09 </td>
        <td style="background:#f5f7fd; font-weight:bold">10 </td>
        <td style="background:#f5f7fd; font-weight:bold">11 </td>
        <td style="background:#f5f7fd; font-weight:bold">12 </td>
        <td style="background:#f5f7fd; font-weight:bold">13 </td>
        <td style="background:#f5f7fd; font-weight:bold">14 </td>
        <td style="background:#f5f7fd; font-weight:bold">15 </td>
        <td style="background:#f5f7fd; font-weight:bold">16 </td>
        <td style="background:#f5f7fd; font-weight:bold">17 </td>
        <td style="background:#f5f7fd; font-weight:bold">18 </td>
        <td style="background:#f5f7fd; font-weight:bold">19 </td>
        <td style="background:#f5f7fd; font-weight:bold">20 </td>
        <td style="background:#f5f7fd; font-weight:bold">21 </td>
        <td style="background:#f5f7fd; font-weight:bold">22 </td>
        <td style="background:#f5f7fd; font-weight:bold">23 </td>
        <td style="background:#f5f7fd; font-weight:bold">24 </td>
        <td style="background:#f5f7fd; font-weight:bold">25 </td>
        <td style="background:#f5f7fd; font-weight:bold">26 </td>
        <td style="background:#f5f7fd; font-weight:bold">27 </td>
        <td style="background:#f5f7fd; font-weight:bold">28 </td>
        <td style="background:#f5f7fd; font-weight:bold">29 </td>
        <td style="background:#f5f7fd; font-weight:bold">30 </td>
        <td style="background:#f5f7fd; font-weight:bold">31 </td>
        <td style="background:#f5f7fd; font-weight:bold">Total</td>
        </tr>
</thead>
 <tr style="background-color: #f5f7fd !important;color:#000;">
 <td style="background:#f5f7fd;"><?php echo $c1;?></td>
   <td style="background:#f5f7fd;"><?php echo $c2;?></td>
   <td style="background:#f5f7fd;"><?php echo $c3;?></td>
   <td style="background:#f5f7fd;"><?php echo $c4;?></td>
   <td style="background:#f5f7fd;"><?php echo $c5;?></td>
   <td style="background:#f5f7fd;"><?php echo $c6;?></td>
   <td style="background:#f5f7fd;"><?php echo $c7;?></td>
   <td style="background:#f5f7fd;"><?php echo $c8;?></td>
   <td style="background:#f5f7fd;"><?php echo $c9;?></td>
   <td style="background:#f5f7fd;"><?php echo $c10;?></td>
   <td style="background:#f5f7fd;"><?php echo $c11;?></td>
   <td style="background:#f5f7fd;"><?php echo $c12;?></td>
   <td style="background:#f5f7fd;"><?php echo $c13;?></td>
   <td style="background:#f5f7fd;"><?php echo $c14;?></td>
   <td style="background:#f5f7fd;"><?php echo $c15;?></td>
   <td style="background:#f5f7fd;"><?php echo $c16;?></td>
   <td style="background:#f5f7fd;"><?php echo $c17;?></td>
   <td style="background:#f5f7fd;"><?php echo $c18;?></td>
   <td style="background:#f5f7fd;"><?php echo $c19;?></td>
   <td style="background:#f5f7fd;"><?php echo $c20;?></td>
   <td style="background:#f5f7fd;"><?php echo $c21;?></td>
   <td style="background:#f5f7fd;"><?php echo $c22;?></td>
   <td style="background:#f5f7fd;"><?php echo $c23;?></td>
   <td style="background:#f5f7fd;"><?php echo $c24;?></td>
   <td style="background:#f5f7fd;"><?php echo $c25;?></td>
   <td style="background:#f5f7fd;"><?php echo $c26;?></td>
   <td style="background:#f5f7fd;"><?php echo $c27;?></td>
   <td style="background:#f5f7fd;"><?php echo $c28;?></td>
   <td style="background:#f5f7fd;"><?php echo $c29;?></td>
   <td style="background:#f5f7fd;"><?php echo $c30;?></td>
   <td style="background:#f5f7fd;"><?php echo $c31;?></td>
   <td style="background:#f5f7fd;"><?php echo $rtrans[0];?></td>

 </tr>
</table>
</center>
<center>
<div style="height:70%;width:78%; margin-left:22%;">
<canvas id="myChart"></canvas>
</div>
<script src="../js/chart.js"></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['1 ','2 ','3 ','4 ','5 ','6 ','7 ','8 ','9 ','10 ','11 ','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
        datasets: [{
            label: 'Earnings',
            fill: false,
           borderColor: "#0359a0",
            backgroundColor: "#0359a0",
            pointBackgroundColor: "#0359a0",
            pointBorderColor: "#0359a0",
            pointHoverBackgroundColor: "#0359a0",
            pointHoverBorderColor: "#0359a0",
            data: [<?php echo $c1; ?>,<?php echo $c2; ?>,<?php echo $c3; ?>,<?php echo $c4; ?>,<?php echo $c5; ?>,<?php echo $c6; ?>,<?php echo $c7; ?>,<?php echo $c8; ?>,<?php echo $c9; ?>,<?php echo $c10; ?>,<?php echo $c11; ?>,<?php echo $c12; ?>,<?php echo $c13; ?>,<?php echo $c14; ?>,<?php echo $c15; ?>,<?php echo $c16; ?>,<?php echo $c17; ?>,<?php echo $c18; ?>,<?php echo $c19; ?>,<?php echo $c20; ?>,<?php echo $c21; ?>,<?php echo $c22; ?>,<?php echo $c23; ?>,<?php echo $c24; ?>,<?php echo $c25; ?>,<?php echo $c26; ?>,<?php echo $c27; ?>,<?php echo $c28; ?>,<?php echo $c29; ?>,<?php echo $c30; ?>,<?php echo $c31; ?>],
            
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

<?php

}
}
?>



<?php
      include('./admininclude/footer.php');
   ?>
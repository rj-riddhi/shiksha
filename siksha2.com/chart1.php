<!DOCTYPE html>
<html>
    <head>
        <title>Chart js</title>
    </head>
<body>
<?php
include('./dbConnection.php');
?>
<?php
$trans=$conn->query("select sum(amount),date_added from payout where YEAR(date_added) = '2021' ");
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
$profiledate=$conn->query("select * from payout where YEAR(date_added) = '2021'");
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
 if($d2=="December")
 {
    $cdec==$cdec+$rprofiledate[4];
 }

//  echo $d2;


?>

<table  class="table table-hover " style="background-color:#f8f8f8;margin-top:3%;">
        <tr style="background-color: #CD6686 !important;color:#f8f8f8;">
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
<div style="height=70%;width:80%">
<canvas id="myChart"></canvas>
</div>
<script src="js/chart.js"></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January ','February ','March ','April ','May ','June ','July ','August ','September ','October ','Nevember ','December','Total Transaction'],
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
</body>
</html>
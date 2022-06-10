<!DOCTYPE html>
<html>
    <head>
        <title>Chart js</title>
    </head>
<body>
<?php
include('./dbConnection.php');
?>

<button class="pdf1" onclick="PdfDownload('Date Wise Total Transaction')" style="">Convert to PDF</button>
<div id="tblinfo6">

<style>

    .chart-container {
  position: relative;
  /* margin: auto; */
  height: 90vh;
  width: 90vw;
}
</style>
<?php
//  if(isset($_REQUEST['search1'])){
//      echo "hellloooo";
     ?>
     <h2 style="margin-left: 353px;margin-top: 49px;">Total Transaction and Month wise Transaction</h2>
     <?php
$trans=$conn->query("select sum(amount) from payout where ");
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
$profiledate=$conn->query("select * from payout ");
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
    $coct++;
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
<canvas id="mychart"></canvas>
     <script src="js/chart.js"></script>
     <div style="height=70%;width:80%">
     <canvas id="myChart"></canvas>
 </div>
 <script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January ','February ','March ','April ','May ','June ','July ','August ','September ','October ','Nevember ','December','Total Transaction'],
        datasets: [{
            label: '# of amounts',
            data: [10,12,24,35] ,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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

<!-- <div class="chart-container" style="width:1280px;height:600px;">
    <canvas id="myChart" style="margin-left: -8px;    margin-top: 9px;height: 548px!important; width: 1290px!important;"></canvas>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January ','February ','March ','April ','May ','June ','July ','August ','September ','October ','Nevember ','December','Total Transaction'],
        datasets: [{
            label: 'Month Wise Transaction',
            data: [<?php echo $cjan;?>,<?php echo $cfeb;?>,<?php echo $cmarch;?>,<?php echo $capril;?>,<?php echo $cmay;?>,<?php echo $cjune;?>,<?php echo $cjuly;?>,<?php echo $aug;?>,<?php echo $csep;?>,<?php echo $coct;?>,<?php echo $cnov;?>,<?php echo $cdec;?>,<?php echo $rtrans[0];?>],
            backgroundColor: [
                
                
               
            ],
            borderColor: [
                                       
               
            ],
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
}); -->







































<?php

// $query = $conn->query("SELECT MONTHNAME(date_added) as month,SUM(amount) as amount from payout GROUP BY month");
// $query = $conn->query("SELECT year(date_added) as year, monthname(date_added) as month , sum(amount) as amount,ins_id,date_added  from payout GROUP BY month Order BY year,month"); 
// foreach($query as $data)
// {
//     $month[] = $data['month'];
//     $amount[] = $data['amount'];
// }
// $cjan=0;
// $cfeb=0;
// $cmarch=0;
// $capril=0;
// $cmay=0;
// $cjune=0;
// $cjuly=0;
// $caug=0;
// $csep=0;
// $coct=0;
// $cnov=0;
// $cdec=0;
// $sql=$conn->query("select * from payout");
// while($res=mysqli_fetch_array($sql)){
//     $d2 = date('F',strtotime($res[5]));
//  if($d2=="January")
//  {
//     $cjan=$cjan+$res[4];
//  }
//  if($d2=="February")
//  {
//     $cfeb=$cfeb+$res[4];
    
//  }
//  if($d2=="March")
//  {
//     $cmarch=$cmarch+$res[4];
//  }
//  if($d2=="April")
//  {
//     $capril=$capril+$res[4];
//  }
//  if($d2=="May")
//  {
//     $cmay=$cmay+$res[4];
//  }
//  if($d2=="June")
//  {
//     $cjune=$cjune+$res[4];
//  }
//  if($d2=="July")
//  {
//     $cjuly=$cjuly+$res[4];
//  }
//  if($d2=="August")
//  {
//     $caug=$caug+$res[4];
//  }
//  if($d2=="September")
//  {
//     $csep=$csep+$res[4];
//  }
//  if($d2=="October")
//  {
//     $coct++;
//  }
//  if($d2=="November")
//  {
//     $cnov=$cnov+$res[4];;
//  }
//  if($d2=="December")
//  {
//     $cdec==$cdec+$res[4];
//  }

// }
// ?>
     <canvas id="mychart"></canvas>
     <script src="js/chart.js"></script>
     <div style="height=70%;width:80%">
     <canvas id="myChart"></canvas>
 </div>
 <script>
// const ctx = document.getElementById('myChart').getContext('2d');
// const myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: ['January ','February ','March ','April ','May ','June ','July ','August ','September ','October ','Nevember ','December','Total Transaction'],
//         datasets: [{
//             label: '# of amounts',
//             data: [<?php echo $cjan;?>,<?php echo $cfeb;?>,<?php echo $cmarch;?>,<?php echo $capril;?>,<?php echo $cmay;?>,<?php echo $cjune;?>,<?php echo $cjuly;?>,<?php echo $aug;?>,<?php echo $csep;?>,<?php echo $coct;?>,<?php echo $cnov;?>,<?php echo $cdec;?>] ,
//             backgroundColor: [
//                 // 'rgba(255, 99, 132, 0.2)',
//                 // 'rgba(54, 162, 235, 0.2)',
//                 // 'rgba(255, 206, 86, 0.2)',
//                 // 'rgba(75, 192, 192, 0.2)',
//                 // 'rgba(153, 102, 255, 0.2)',
//                 // 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 // 'rgba(255, 99, 132, 1)',
//                 // 'rgba(54, 162, 235, 1)',
//                 // 'rgba(255, 206, 86, 1)',
//                 // 'rgba(75, 192, 192, 1)',
//                 // 'rgba(153, 102, 255, 1)',
//                 // 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//      options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
//     options: {
//         scales: {
//             // y: {
//             //     beginAtZero: true
//             // }
            
//             xAxes: [{
//     type: 'time',
//     time: {
//       unit: 'month'
//     }
//   }],
//         }
//     }
// });
</script>
 
</body>
</html>
<!-- ['Jan','FEB','MAR','April','MAy','Jun','July','Aug','Sep'] -->
<?php //echo json_encode($month)?>
<?php //echo json_encode($amount)?>
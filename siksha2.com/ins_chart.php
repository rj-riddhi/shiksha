<?php 
//index.php
require('dbconnection.php');
// $sql = "SELECT COUNT(*), DAY(date_added), WEEK(date_added), MONTH(date_added), YEAR(date_added) FROM payout GROUP BY YEAR(date_added), MONTH(date_added), WEEK(date_added), DAY(date_added)";

$sql = "SELECT year(date_added) as year, month(date_added) as month , sum(amount) as amount,ins_id,date_added  from payout GROUP BY year(date_added),month(date_added)"; 
print_r($sql);
$res = mysqli_query($conn, $sql);
print_r($res);
$chart_data1 = '';
while($row = mysqli_fetch_array($res))
{
 $chart_data1 .= "{ date_added:'".$row["date_added"]."',year:'".$row["date_added"]."',ins_id:".$row["month"].", amount:".$row["amount"]."}, ";
}
$chart_data1 = substr($chart_data1, 0, -2);
print_r($chart_data1);
$query = "SELECT * FROM payout where ins_id=22";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date_added:'".$row["date_added"]."',ins_id:".$row["ins_id"].", amount:".$row["amount"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
// print_r($chart_data);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Graphs</title>
  
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 class="text-center">Fetch your real world data from database</h2>
   <h3 class="text-center">Dynamic Values of Graph</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "index.php" style = "text-decoration: none; color: #333;">Back to Results</a></button>
</div>

 </body>
</html>

<script>
Morris.Line({

 element : 'chart',
 data:[<?php echo $chart_data1; ?>],
 xkey:'date_added',
 ykeys:['amount'],
 labels:['amount', 'ins_id'],
 hideHover:'auto',
 fillOpacity: 0.2,
 stacked:true
});
</script>
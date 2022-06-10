<?php
      include('./admininclude/header.php');
      include('../dbConnection.php');
?>

<div class="col-sm-9 mt-5  list-of-course">
    <a href="sell_report.php?thisyear" class="mt-5"><h6>Report & Statment</h6> </a>
    <div class="mt-3">
    <p class="bg-secondary text-white p-2">Details</p>
        <?php
           $sql = "SELECT * FROM course_order";
           $result = $conn->query($sql);
           if($result->num_rows > 0){
             echo '<table class="table table-success ">
	        <thead>
			  <tr>
			  <th style="background: #f5f7fd;" scope="col">Order ID</th>
			  <th style="background: #f5f7fd;" scope="col">Course ID</th>
			  <th style="background: #f5f7fd;" scope="col">Student Email</th>
              <th style="background: #f5f7fd;" scope="col">Date</th>
			  <th style="background: #f5f7fd;" scope="col">Amount</th>
			  </tr>
			</thead>
			<tbody>';
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<th style="background: #f5f7fd;" scope="row">#'.$row["co_id"].'</th>';
                echo '<td style="background: #f5f7fd;">'.$row["course_id"].'</td>';
                echo '<td style="background: #f5f7fd;">'.$row["stu_email"].'</td>';
                echo '<td style="background: #f5f7fd;">'.$row["order_date"].'</td>';
                echo '<td style="background: #f5f7fd;">'.$row["amount"].'</td>';
                echo '</tr>';
            }
            echo '
                </tbody>
            </table>';
             }else{
                echo "No Records Found !";
           }
     ?>
      <div><input 
                class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></div>
        </div>
    </div>
    </div>
    </div>




<?php
      include('./admininclude/footer.php');
   ?>
<?php
   include('./admininclude/header.php');
   include('../dbConnection.php');

?>

<div class="col-sm-9 mt-5  list-of-course" style="width:1120px;">
        <!-- Table -->
    <p class="bg-secondary text-white p-2">ContactUs</p>
    <?php
           $sql = "SELECT * FROM contact_us";
           $result = $conn->query($sql);
           if($result->num_rows > 0){
    echo  '<table class="table table-success " style="width:1100px;">
       <thead>
          <tr style="background: #f5f7fd;">
              <th style="background: #f5f7fd;" scope="col">ID</th>
              <th style="background: #f5f7fd;" scope="col">Name</th>
              <th style="background: #f5f7fd;" scope="col">Email</th>
              
              <th style="background: #f5f7fd;" scope="col">Subject</th>
              <th style="background: #f5f7fd;" scope="col">Message</th>
           </tr>
        </thead>
      <tbody>';
      while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td style="background: #f5f7fd;">'.$row["id"].'</td>';
        echo '<td style="background: #f5f7fd;">'.$row["stu_name"].'</td>';
        echo '<td style="background: #f5f7fd;">'.$row["email"].'</td>';
        echo '<td style="background: #f5f7fd;">'.$row["subject"].'</td>';
        echo '<td style="background: #f5f7fd;width:200px;">'.$row["message"].'</td>';
        echo '</td>';
       
           echo   '</tr>';

      }

     echo '</tbody>
    </table>';
           }else{
             echo "o result";
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
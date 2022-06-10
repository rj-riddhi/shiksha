<?php
include('./dbconnection.php');

?>


<div style="background-color: #181717; height:150px">
<div class="container" style="margin-top: 90px;">
   <center><h1 style="color:#fff; padding-top: 50px;font: 2em sans-serif;">Blog</h1></center>
</div>
</div>

    <?php
		$sql = "SELECT * FROM blogs";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
					$id = $row['id'];
                    $string = strip_tags($row['content']);	
                      if (strlen($string) > 10) {
					  $stringCut = substr($string, 0,150);
                        $endPoint = strrpos($stringCut,'');
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string.= '<a href="viewblog.php?id='.$id.'">Read More</a>';
						echo $string; }    
					echo '
					<div class = "container mt-10" style="margin-left: 100px">
	                <div class="row" style="display: flex;flex: 1 1 auto;">
                 
				 <div class="col card-img-top d-flex bg-light" >
				 
					<img style="border-radius:15px;margin-top: 10px;" src="'. str_replace('..','.',$row["images"]).'" width="300" height="300" />
					</div>	
				        <div class="card-body">
                          <h5 class="card-title" style="font: 1.4em sans-serif;font-weight: bold;margin-left: 10px;">'.$row['title'].'</h5>
                            <p class="card-text" style="width:900px;margin-left: 10px;font: 1em sans-serif;">'.$string['content'].''; 
							
           echo	' </p>
                     </div>
           
           </div>
           </div>
			</div>';
			}
				}
                
				
		?>
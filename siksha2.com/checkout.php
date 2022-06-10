<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
	$stuLogEmail = $_SESSION['stuLogEmail'];
}else{
  echo "<script> location.href='../index.php;'</script>";
}
?>
<?php
    if(!isset($_SESSION['is_login'])){
        echo "<script>location.href='login.php'</script>";
    }
    else{
         $stuEmail = $_SESSION['stuLogEmail'];
    }
    include('./dbconnection.php');
    include('./maininclude/header.php');
    if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    }
    
    ?>
<div class="slider-area ">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center"
            style="background-color:black;">
            <section style=" position: relative;height:400px;width:100%;overflow: hidden;text-align:center; ">
            <img src="img/slider/bg1.jpg">
                <!-- <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
                    <source src="assets/img/hero/video2.mp4" type="video/mp4">
                </video> -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- <div class="hero-cap text-center">
                                <h2 style="margin-top:15%;">Success Stories</h2>
                                <h4 style="color:#f8f8f8;">As our numerous success stories prove, marriages are really made at Mr&Mrs.com</h4>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div><br><br>
    <main class="login-form mb-100" >
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header text-center"><h2>CheckOut</h2></div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            
                            <div class="form-group row">
                                <!-- <label for="email_address" class="col-md-4 col-form-label text-md-right">ORDER_ID
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="ORDER_ID" class="form-control" name="ORDER_ID" autocomplete="off"
                                    value="<?php echo $order_id = "ORDS".rand(10000,99999999)?>"> -->
                                    <?php

                                    $sql = "SELECT * From student where stu_email = '$stuLogEmail' ";
                                    $r1=mysqli_query($conn,$sql);
                                    $r = mysqli_fetch_assoc($r1);

                                     if(isset ($_POST['ok'])){
                                    if(isset($_GET['course_id'])){
                                    $course_id = $_GET['course_id'];
                                    $sql = "SELECT * FROM course WHERE course_id=$course_id";
                                    $result=mysqli_query($conn,$sql);
                                    $res = mysqli_fetch_assoc($result);
                                    $price = $res['course_price'];
                                    $ins_id = $res['ins_id'];
                                    $ins_revenue = $price * 0.7;
                                    $admin_revenue = $price * 0.3;
                                    $bank_name = $_POST['bank_name'];
                                    $ifsc_code = $_POST['ifsc'];
                                    mysqli_query($conn,"insert into `course_order`(order_id,stu_email,course_id,amount,ins_revenue,admin_revenue,ins_id) values ('$order_id','$stuEmail','$course_id','$price','$ins_revenue','$admin_revenue','$ins_id')");
                                    //  mysqli_query($conn,"insert into `course_order`(order_id,stu_email,course_id,amount,ins_revenue,admin_revenue,ins_id,,status,resmsg) values('$order_id','$stuEmail','$course_id','$price','$ins_revenue','$admin_revenue',$ins_id)");
                                    }else{


                                    foreach($cart as $key => $value){
                                    $cartsql = "SELECT * FROM course WHERE course_id=$key";
                                    $cartres = mysqli_query($conn, $cartsql);
						            $cartr = mysqli_fetch_assoc($cartres);
                                    $price = $cartr['course_price'];
                                    $ins_id = $cartr['ins_id'];
                                    $ins_revenue = $price * 0.7;
                                    $admin_revenue = $price * 0.3;
                                    $bank_name = $_POST['bank_name'];
                                    $ifsc_code = $_POST['ifsc'];
                                
                                    
                                    mysqli_query($conn,"insert into `course_order`(order_id,stu_email,course_id,amount,ins_revenue,admin_revenue,ins_id,bank_name,ifsc_code) values('$order_id','$stuEmail','$key',$price,'$ins_revenue','$admin_revenue','$ins_id','$bank_name','$ifsc_code')");
                                    
                                   
                                   
                                }
                             

                            }
                        }
                            ?>
                            
                            </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" autocomplete="off"
                                    value="<?php echo $r['stu_name'];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="Email" class="form-control" name="Email" autocomplete="off"
                                    value="<?php echo $stuEmail?>">
                                </div>
                            </div>
                            <div class="cart_totals">
				        <div class="form-groum row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Total</label>
                                <div class="col-md-6">
                                    <?php if(isset($_GET['course_id'])){
                                       $course_id = $_GET['course_id'];
                                       $sql = "SELECT * FROM course WHERE course_id=$course_id"; 
                                       $result=mysqli_query($conn,$sql);
                                       $res = mysqli_fetch_assoc($result);
                                       $price = $res['course_price'];
                                       $desc_price = $res['course_original_price'];
                                    ?>
                                    <h3 style="color:#ec5252;">₹<?php echo $res['course_price'];?></h3>
                                    <!-- <input type="hidden" name = "total" id="name" value = <?php echo $res['course_price'] ?> > -->
                                     <h5 style="color:#7e7e7e;">₹<del><?php echo $res['course_original_price']; ?></del></h5>
                                     <?php }else { ?>
                                        <!-- <input type="hidden" name = "total" id="name" value = <?php echo $res['course_price'] ?> > -->
                                       <h3 style="color:#ec5252;">₹<?php echo $_SESSION['total'] ?></h3>
                                     <h5 style="color:#7e7e7e;">₹<del><?php echo $_SESSION['disctotal'] ?></del></h5> 
                                     <?php } ?>
                                </div>
					
                    </div>
                    <div class="form-groum row">
           
         <?php
        
         $sql = "SELECT * FROM bank";
           $result = $conn->query($sql);
          if($result->num_rows > 0)
          $row2 = $result->fetch_assoc();
          ?>
          <label for="bank" class="col-md-4 col-form-label text-md-right">Select Bank</label>
          <div class="col-md-6">
         <select class="form-control select2" data-toggle="select2" name="bank_name" id="bank_name"> 
            
        
        <?php
           $sql = "SELECT * FROM bank";
           $result = $conn->query($sql);
          if($result->num_rows > 0){
        ?>
        
        <!-- echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>"; -->
         
        
         <?php while($row1 = $result->fetch_assoc()){
         ?>
        
         <option value="<?php echo $row1['bank_id']; ?>"><?php echo $row1['bank_name']; ?></option>
         <?php } ?>
          </select> 
          <?php } ?>
        </div>
         </div>
         </div>
         <div class="form-groum row mt-3">
                     <label for="ifsc code" class="col-md-4 col-form-label text-md-right">IFSC code</label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text"  pattern="[A-Z0-9]{11}" maxlength="11" name="ifsc" required></input>
                                </div>
					
                    </div>
         
                            
                            <!-- <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-md-6 offset-md-4">
                                 <button type="submit" name ="ok" class="primary-btn text-uppercase" style="background-color:#181717; color:#ffffff;" >OK</button>
                                <!-- <input type="submit" value="OK" name="login" class="btbn-text"> -->
                                <!-- <a href="recover_psw.php" class=" btn-link">
                                    Forgot Your Password?
                                </a> -->
                                <br><br>
                            </div>
                    </div>
                    
                    </form>
                    <form>
                        <br>
                        <input style="height:50px; width:150px; background:#000000; color:#ffffff; border-radius:10px; margin-left:43%;" type="button" name = "button" value = "Pay With Razorpay" onclick="MakePayment()">
                        <input type="hidden" name = "name" placeholder = "Enter Name" id="name" value = <?php echo $r['stu_name']; ?> ><br><br>
                         <?php if(isset($_GET['course_id'])){
                                       $course_id = $_GET['course_id'];
                                       $sql = "SELECT * FROM course WHERE course_id=$course_id"; 
                                       $result=mysqli_query($conn,$sql);
                                       $res = mysqli_fetch_assoc($result);
                                       $price = $res['course_price'];
                                       $desc_price = $res['course_original_price'];
                                    ?>
                                     <input type="hidden" name = "amount" id="amount" value = <?php echo $res['course_price'] ?> >
                                     <?php }
                                     else if(isset($_SESSION['total'])) { 
                                    ?>
                                     <input type="hidden" name = "amount" id="amount" value = <?php echo$_SESSION['total']; ?> > 
                                     <?php } ?>
                        
                        <br><br>
                    
                        <br><br>
                        
                    </form>
                    <?php
                    if(isset ($_POST['ok'])){
                    unset($_SESSION['cart']);
                    echo "<script>location.href='student/mycourse.php'</script>";


                    }
                    ?>
                    
                    <script>
                        function MakePayment(){
                            var name = $("#name").val();
                            var amount = $("#amount").val();
                            var options = {
                            "key": "rzp_test_jDcRLEBQlvjFIG", // Enter the Key ID generated from the Dashboard
                            "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": name,
                            "description": "Test Transaction",
                            "image": "https://example.com/your_logo",
                            // "order_id": "order_Ef80WJDPBmAeNt", //Pass the `id` obtained in the previous step
                            // "account_id": "acc_Ef7ArAsdU5t0XL",
                            "handler": 
                            function (response){
                                jQuery.ajax({
                                    type:"POST",
                                    url:"payment.php",
                                    data:"pay_id=" + response.razorpay_payment_id+"&amount="+amoount+"&name="+name,sucess:function(result){
                                        window.location.href = "success.php";
                                    }
                                })
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                         }
                    </script>
                </div> 
            </div>
        </div>
    </div>
    </div>


      
      


</main>

<?php 

?>
<?php
include('./maininclude/footer.php');
?>


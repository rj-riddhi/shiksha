<?php 
if(!isset($_SESSION)){
    session_start();
}
include('./dbconnection.php');
include('./maininclude/header.php');
// $cart = $_SESSION['cart'];
?>
<?php
if(isset($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					 
					<div class="col-md-12">
                        <h4><?php
								echo count($cart); ?> Courses in Cart</h4>
                               
<div class="row">
<div class="col-xl-8 col-lg-4">
                                    

                <table class="cart-table table table-bordered" style="width: 800px;">
				<thead>
					<!-- <tr>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>Product</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr> -->
				</thead>
				<tbody>
				<?php
					//print_r($cart);
				$total = 0;
                $disctotal = 0;
					foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
						$cartsql = "SELECT * FROM course WHERE course_id=$key";
						$cartres = mysqli_query($conn, $cartsql);
						$cartr = mysqli_fetch_assoc($cartres);

					
				 ?>
                 
					<tr>
						<td style="width: 5px;">
							<a class="remove" href="delcart.php?id=<?php echo $key; ?>"><i class="ti-trash" style="color:#000000;"></i></a>
						</td>
						<td style="width: 50px;">
							<a href="#"><img style="height: 100px; width: 150px;"src="<?php echo  str_replace('..','.',$cartr["course_img"]) ?>" alt="" height="90" width="90"></a>					
						</td>
						<td style="width: 400px;">
							<a style="color:#000000;"href="single.php?id=<?php echo $cartr['course_id']; ?>"><?php echo substr($cartr['course_name'], 0 , 30); ?></a>					
						</td>
						<td style="width: 200px;">
                            <div class="f-right">
                                
							<span class="amount " style="color:#ec5252;">₹<?php echo $cartr['course_price']; ?></span>	
                            <span class="coupon-tag fas fa-tag" styel="color:#ec5252;"></span>
                            <br/>
                            <span class="amount" style="color:#7e7e7e;">₹<del><?php echo $cartr['course_original_price']; ?></del></span>	
                            
                    </div>					
						</td>
						<!-- <td>
							<div class="quantity"><?php //echo $value['quantity']; ?></div>
						</td> -->
						<!-- <td>
							<span class="amount">INR<?php //echo ($cartr['cporse_price']*$value['quantity']); ?>.00/-</span>					
						</td> -->
					</tr>
                    
				<?php 
                    
					$total = $total + ($cartr['course_price']*$value['quantity']);
					$_SESSION['total'] = $total;
                    $disctotal = $disctotal + ($cartr['course_original_price']*$value['quantity']);
					$_SESSION['disctotal'] = $disctotal;
				} ?>
					<tr>
						<td colspan="6" class="actions">
							<div class="col-md-6">
							<!--	<div class="coupon">
									<label>Coupon:</label><br>
									<input placeholder="Coupon code" type="text"> <button type="submit">Apply</button>
								</div> -->
							</div>
							<div class="col-md-6">
								<!-- <div class="cart-btn">
									<button class="button btn-md" type="submit">Update Cart</button> 
									<a href="checkout.php" class="button btn-md" >Checkout</a>
								</div> -->
							</div>
						</td>
					</tr>
				</tbody>
			</table>
            </div>	
            <div class="col-xl-4 col-lg-4 pl-4">	

			<div class="cart_totals">
				<div class="">
					<h4 class="heading" >Total :</h4>
                    <div>
                        <h2 style="color:#ec5252;">₹<?php echo $total; ?></h2>
                    </div>
                    <div >
                        <h5 style="color:#7e7e7e;">₹<del><?php echo $disctotal; ?></del></h5>
                    </div>
                    <!-- <div class="cart-btn"> -->
									<!-- <button class="button btn-md" type="submit">Update Cart</button> -->
									<!-- <a href="checkout.php" style="width: 230px;" class="button btn-md text-center pt-3 pb-3." >Checkout</a> -->
					<!-- </div> -->
					<!-- <table class="table table-bordered ">
						<tbody>
							<tr>
								<th>Cart Subtotal</th>
								<td><span class="amount">INR <?php echo $total; ?>.00/-</span></td>
							</tr>
							<tr>
								<th>Shipping and Handling</th>
								<td>
									Free Shipping				
								</td>
							</tr>
							<tr>
								<th>Order Total</th>
								<td><strong><span class="amount">INR <?php echo $total; ?>.00/-</span></strong> </td>
							</tr>
						</tbody>
					</table> -->
				</div>
			</div>
            </div>			
							
					</div>
				</div>
			</div>
		</div>
            </div>
	</section>
	<?php
}else{
	echo '<div class="mt-5 mb-5"><center><h3>Your Cart is Empty</h3></center></div>';
}
?>
<?php include('./maininclude/footer.php'); ?>

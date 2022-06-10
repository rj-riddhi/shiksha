<?php 
	ob_start();
	session_start();
	//include('./dbconnection.php');
	if(!isset($_SESSION['is_login']) & empty($_SESSION['is_login'])){
		header('location: login.php');
	}

// include('./maininclude/header.php');
include('./stuInclude/stu_header.php');
// include 'inc/nav.php'; 
$uid = $_SESSION['stu_id'];
// $cart = $_SESSION['cart'];
?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						
					</div>
					<div class="col-md-12">

			<h2 class="mt-5">My Wish List</h2>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<!-- <th>Added On</th> -->
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$wishsql = "SELECT c.course_name, c.course_price, c.course_id,w.w_id FROM wishlist w JOIN course c WHERE w.course_id=c.course_id AND w.stu_id='$uid'";
					$wishres = mysqli_query($conn, $wishsql);
					while($wishr = mysqli_fetch_assoc($wishres)){
						$w_id=$wishr['w_id'];
				?>
					<tr>
						<!-- <td>
							<?php //echo $wishr['course_img']; ?>			
						</td> -->
						<td>
							<a href="../course_details.php?course_id=<?php echo $wishr['course_id']; ?>"><?php echo $wishr['course_name']; ?></a>
						</td>
						<td>
							INR <?php echo $wishr['course_price']; ?> /-
						</td>
						
						<td>
							<a href="../delwishlist.php?id=<?php echo $wishr['w_id']; ?>">Delete</a>
						</td>
						<td>
							<form>

							</form>
							<input type="hidden" value="<a href='addtocart.php?course_id=<?php echo $wishr['course_id']; ?>'add to cart">
							
							<?php
							// echo $sql = "DELETE FROM wishlist WHERE w_id=$w_id";
							// $res = mysqli_query($conn, $sql);
							// if($res){
							// 	header('location: wishlist.php');
							// 	//echo "redirect to wish list page";
							// }	
							?>		
						</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>		

			<br>
			<br>
			<br>


					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php
include('../maininclude/footer.php');
?>

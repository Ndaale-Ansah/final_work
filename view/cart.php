<?php
//connect to the cart controller
require("../controllers/cart_controller.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
    <link href="../css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />


</head> 
<body>
	<?php
	if(isset($_SESSION['customer_id'])){
		$cid = $_SESSION['customer_id'];
		$carts = view_cart_controller($cid);
	}
	?> 

	<br>
	<br>
    <br>

	<div class="container">
		<h4 class="text-center px-5" style="font-size: 60px">My Cart</h4>
	
	<?php
	if(empty($carts)){
		?>
	<br>
	<center>
	<h4>Your Cart is Empty</h4>
	<br>
	<br>
	<br>
	<a href="../menu.php" class="btn0 mb-2">Continue Ordering</a>
	</center>
	<?php
	}else{
		?>

	<?php
	foreach ($carts as $cart){ 
	?> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-11 mx-auto">
				<div class="row mt-5 gx-3">
					<!-- left side div -->
					<div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
						<div class="row">
						<!-- cart images div -->
						<div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
							<img src="../images/product_images/<?php echo $cart['product_image']?>" class="img-fluid" alt="cart img">
						</div> 
						<div class="col-md-7 col-11 mx-auto px-4 mt-2">
							<div class="row"> 
								<div class="col-6 card-title">
									<h5 class="product_name"><?php echo $cart['product_title']; ?></h5>
									<p>GHc<?php echo $cart['product_price']; ?></p> 
								</div>  
								<form class="form-inline" method="GET" action="../actions/manage_quantity_cart.php">
									<div class="form-group">
        								<input type="number" class="form-control mb-3" name="qty" min="1" value="<?php echo $cart['qty']; ?>">
        								<input type="hidden" name="p_id" value="<?php echo $cart['p_id'] ?>">
        							</div> 
						        	<div>
										<button type="submit" name="submit1" class="btn0 mb-2">Change quantity</button>
									</div>
								</form>
									<div>
										<a href="<?php echo "../actions/remove_from_cart.php?p_id=".$cart['p_id']; ?>"><button type="submit" class="btn0 mb-2">Remove</button></a>
									</div>
							</div> 
						</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<?php }?> 
	<br>
	<br>
	<center>
	<a href="../menu.php" class="btn0 mb-2">Continue shopping</a>
	<!-- TODO: Implement payment -->
    <a href="payment.php" class="btn0 mb-2">Check-Out</a>
    </center>

<?php }?>

    <?php 
    
     ?> 

    </div>
    </div>

    

    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

    <!-- Footer -->
    
  <div class="underlay-photo"></div>
<div class="underlay-black"></div>
    </body>
</body>
</html>	




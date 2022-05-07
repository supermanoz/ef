<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart - Everest Fashion Hub</title>	
	<link rel="icon" href="image/logo.png" type="image/icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<link href="css/style.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body oncontextmenu="return true">

<?php
	if(!isset($_SESSION['user_id'])){
		header('location:index.php');
	}
	include 'php/conn.php';
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-sm navbar-dark shadow-5-strong gradient-navbar sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php"> <img class="logo" src="image/logo.png"> </a>
		<h1 class="logo-text"><a href="index.php">Everest Fashion<span>.</span></a></h1>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"> </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<?php if(isset($_SESSION['user_id'])){ ?>
				<li class="nav-active"><a class="nav-link" href="cart.php"> Track Order </a></li>
				<li class="nav-active dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="navbarDropdown"><?php echo $_SESSION['fname']; ?><img src="image/user.png" class="img-fluid admin-pic"></a>
	       			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	       				<a class="dropdown-item" href="signup.php">Edit Details</a>
	      				<a class="dropdown-item" href="php/logout.php">Logout</a>
	       			</div>
         		</li>
         		<?php } else{ ?>	
				<li class="nav-active"><a class="nav-link" href="signup.php"> Sign Up  </a></li>
				<li class="nav-active"><a class="nav-link" href="login.php"> Login </a></li>
				<?php } ?>
				<li class="nav-item">
					<form action="php/search.php" method="post">
						<input type="text" name="search_item" class="search-form-alt" placeholder=" Search...">
						<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- Cart -->

<div class="container">
	<div class="row">
		<div class="col-12">
 			<h5 class="keyword">My Cart</h5>
 			<hr class="light-100">
 		</div>
 	</div>
 </div>

 <!-- Cart -->
 <div class="container padding">
 	<div class="row padding">
 			<div class="col-lg-8">
 				<div class="card text-white bg-dark mb-3">
 					<h5 class="card-header info-color text-center white-text py-4">
 						<?php echo $_SESSION['fname']; ?>'s Cart
 					</h5>
 					<div class="card-body px-lg-5 pt-0">
 						<div class="container-fluid">
 							<?php
 								$sql="select orders.order_id,(products.offer_price*orders.qty)as total,products.prod_name,orders.prod_code,products.offer_price,products.color,orders.size,orders.qty,products.description from orders join products on orders.prod_code=products.prod_code where orders.is_delivered=0 and orders.is_ordered=0 and user_id=".$_SESSION['user_id'];
 								$res=mysqli_query($conn,$sql);
 								if(mysqli_num_rows($res)>0)
 								{
 									while($row=mysqli_fetch_assoc($res))
 									{
 							?>

 							<div class="row">
 								<div class="col-3">
 									<img src="image/products/<?php echo $row['prod_code']; ?>.jpg" class="img-fluid">
 								</div>
 								<div class="col-9 lil-space">
 									<h5><?php echo $row['prod_name']; ?><span class="keyword">.</span></h5>
 									<p>Color: <em><?php echo $row['color']; ?></em></p>
 									<p>Size: <em><?php echo $row['size']; ?></em></p>
 									<p><em><?php echo "Rs. ".$row['offer_price']; ?></em></p>
 									<p>Quantity: <em><?php echo $row['qty']; ?></em></p>
 									<p>Total: <em><?php echo "Rs. ".$row['total']; ?></em></p>
 									<p><?php echo $row['description']; ?></p>
 									<a href="php/remove_cart.php?order_id=<?php echo $row['order_id']; ?>"><button type='button' class='btn btn-outline-light btn-sm' style="float:right"> Remove </button></a>
 								</div>
 							</div>

 							<?php
 									}
 								}
 								else echo "<p><span class='keyword'>Nothing in cart!</span> <em>Please add something in the cart before veiwing it.</em></p>";
 							?>
 							<hr class='my-4 light-100'>
 							<div class="row">
 								<div class="col-3">
 									<p style="text-align:right"><b>Sub-total</b></p>
 								</div>
 								<div class="col-9">
 									<p style='text-align:right'>
 										<?php 
 											$sql1="select sum(total)as subtotal from (select (products.offer_price*orders.qty)as total from orders join products on orders.prod_code=products.prod_code where orders.is_delivered=0 and is_ordered=0 and orders.user_id=".$_SESSION['user_id'].")A;";
 											$res1=mysqli_query($conn,$sql1);
 											$row=mysqli_fetch_assoc($res1);
 											$subtotal=$row['subtotal'];
 											echo "Rs. ".$subtotal;
 										?>
 									</p>
 								</div>
 							</div>
 							<div class="row padding">
 								<div class="col">
 									<a href="index.php"><button type='button' class='btn btn-dark btn-sm' style="float:right"> <i class="fas fa-arrow-left"></i> Shop More </button></a>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="col-lg-4">
 				<div class="card text-white bg-dark mb-3">
 					<h5 class="card-header info-color white-text py-4">
 						Total
 					</h5>
 					<div class="card-body px-lg-5">
 						<div class="row">
 							<div class="col-6">
 								<p style='text-align:left'><b>Sub-total</b></p>
 							</div>
 							<div class="col-6">
 								<p style='text-align:right'><?php echo "Rs. ".$subtotal; ?></p>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-6">
 								<p><b>Delivery</b></p>
 								<p style="font-size:10px"> (Standard Delivery) </p>
 							</div>
 							<div class="col-6">
 								<p style='text-align:right'> Rs. 100 </p>
 							</div>
 						</div>
 						<hr class="my-4 light-100">
 						<div class="row">
 							<div class="col-6">
 								<a href="php/place_order.php"><button type='button' class='btn btn-dark btn-sm'> Order Now </button></a>
 							</div>
 							<div class="col-6">
 								<p style='text-align:right'> <?php echo "Rs. ".$subtotal+100; ?></p>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col">
 								<center><p> We accept <em> Cash On Delivery! </em> </p></center>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

<!--- Footer -->

<footer class="bot">
 	<div class="container padding">
 		<div class="row text-center">
 			<div class="col-md-4">
 				<hr class="light">
 				<h6> Service / Hours </h6>
 				<hr class="light">
 				<p> Sunday - Saturday </p>
 				<p> 7am - 9pm </p>
 				<p>All Over Kathmandu</p>
 			</div>
 			<div class="col-md-4">
 				<a href="index.php" class="logo"><img src="image/logo.png" class="logo"></a>
 				<hr class="light">
 				<p> +977 986-008-1869 </p>
 				<p> info@efhub.com.np </p>
 				<p> Kathmandu-05, Nepal </p>		
 			</div>
 			<div class="col-md-4">
 				<div class="container-fluid">
 					<div class="row text-center social">
 						<div class="col-12">
			 				<a href="https://www.facebook.com/weverestfc"><i class="fab fa-facebook"></i></a>
							<a href="https://www.instagram.com/weverestfc/"><i class="fab fa-instagram"></i></a>
							<a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
							<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
						<a href="login.php?user=admin" class="bot-link"><p>Admin</p></a>
						<a href="others.php?show=chart" class="bot-link"><p>Size Chart</p></a>
						<a href="others.php?show=terms" class="bot-link"><p>Policies & Terms</p></a>
						<a href="others.php?show=shipment" class="bot-link"><p>Shipping Information</p></a>
						</div>
					</div>
				</div>
 			</div>
 			<div class="col-12">
 				<hr class="light-100">
 				<h6> Everest Fashion Hub &copy; 2022. All Rights Reserved. </h6>
 			</div>
 		</div>
 	</div>
 </footer>

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-arrow-up"></i></a>

</body>
	<script>
		document.onkeydown=function(e)
		{
			if(event.keyCode==123)
			{
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode=='I'.charCodeAt(0))
			{
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode=='J'.charCodeAt(0))
			{
				return false;
			}
			if(e.ctrlKey && e.keyCode=='U'.charCodeAt(0))
			{
				return false;
			}
		}
	</script>
</html>


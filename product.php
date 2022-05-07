<?php session_start(); 
	include 'php/conn.php';	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product - Everest Fashion Hub</title>	
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
	if(!isset($_GET['prod_code'])){
		header('location:index.php');
	}
  if(isset($_GET['task']))
  {
    if($_GET['task']=="report")
    {
?>
  <script language="javascript">
      swal({
        title: "Reported Successfully!",
        text: "The review won't be visible for now.",
        icon: "success",
        button: "Okay",
        timer:3000
      });
  </script>
<?php
 	 }
	}
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
				<li class="nav-active"><a class="nav-link" href="cart.php?user=<?php echo $_SESSION['user_id']; ?>"> Track Order </a></li>
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

<!-- Product's Detail -->

<div class="container">
	<div class="row">
		<div class="col-12">
 			<h5 class="keyword">Product's Detail</h5>
 			<hr class="light-100">
 		</div>
 	</div>
 </div>

<?php
	$prod_code=$_GET['prod_code'];
	$sql="select * from products where is_deleted=0 and prod_code=".$prod_code;
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)==1){
		$row=mysqli_fetch_assoc($res);
?>
<div class="container padding">
	<div class="row">
		<div class="col-lg-6">
			<img src="image/products/<?php echo $row['prod_code']; ?>.jpg" class="img-fluid">
		</div>
		<div class="col-lg-5">
			<div class="container-fluid prod_detail">
				<h4><?php echo $row['prod_name'];?></h4>
				<p>
				<?php 
				$sql1="select * from (select prod_code,round(avg(rating)) as rating, count(user_id) as number from reviews where is_deleted=0 group by prod_code)A where prod_code=".$row['prod_code'];
				$res1=mysqli_query($conn,$sql1);
				if(mysqli_num_rows($res1)>0){
					$row1=mysqli_fetch_assoc($res1);
					for($i=0;$i<$row1['rating'];$i++){
						echo "<i class='fa fa-star star'></i>";
					}
					echo " ".$row1['number']." reviews";
				}
				else echo "<em>No reviews</em>";
				?>
				</p>
				<p><em style="text-decoration: line-through;"><?php echo "Rs. ".$row['marked_price'];?></em> <?php echo "Rs. ".$row['offer_price'];?></p>		
				<p> Color: <?php echo $row['color']; ?></p>
				<form method="post" action="php/add_cart.php">
					<input type="text" value="<?php echo $row['prod_code']; ?>" name="prod_code" hidden>
					Qty: <input type="number" name="qty" value=1 class="qty" min="1">
					<select name="size" required>
						<option value="">Size</option>
						<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
						<option value="XL">XXL</option>
					</select>
					<br>
					<?php if($row['out_of_stock']==true){
						echo '<p class="padding mt-2"><i class="fa fa-exclamation-triangle"></i> <em>Out of Stock</em></p>';
					}
					else {
						echo '<button class="btn btn-outline-light btn-sm btn-rounded my-4 waves-effect z-depth-0" type="submit">Add to cart</button>';
					}?>
				</form>
					<div class="row">
						<button class="dtoggle" data-toggle="collapse" data-target="#desc"> Description </button>
							<div id="desc" class="collapse">
								<div class="container-fluid padding">
									<div class="row text-center">
										<p><?php echo $row['description']; ?></p>
									</div>
								</div>
							</div>
						<button class="dtoggle" data-toggle="collapse" data-target="#size"> Size Chart </button>
							<div id="size" class="collapse">
								<div class="container-fluid padding">
									<div class="row text-center">
										<table class="table table-striped">
											<thead class="thead-dark">
												<tr>
													<td><b>SIZE</b></td>
													<td><b>CHEST</b></td>
													<td><b>LENGTH</b></td>
													<td><b>SLEEVE (SHORT/LONG)</b></td>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>S</td>
													<td>
														<span>36"</span>
													</td>
													<td>28"</td>
													<td>
														<span>7.25" / 26"</span>
													</td>
												</tr>
												<tr>
													<td>M</td>
													<td>
														<span>40"</span>
													</td>
													<td>29"</td>
													<td>
														<span><span>7.75"</span></span>
														<span> / 26"</span>
													</td>
												</tr>
												<tr>
													<td>L</td>
													<td>42"</td>
													<td>30"</td>
													<td>
														<span><span>8.25"</span></span>
														<span> / 26"</span>
													</td>
												</tr>
												<tr>
													<td>XL</td>
													<td>48"</td>
													<td>31"</td>
													<td>
														<span><span>8.75"</span></span>
														<span> / 26"</span>
													</td>
												</tr>
												<tr>
													<td>XXL</td>
													<td>52"</td>
													<td>32"</td>
													<td>
														<span>9.25"</span> 
														<span> / 26"</span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<button class="dtoggle" data-toggle="collapse" data-target="#question1"> Shipping &amp; Returns </button>
							<div id="question1" class="collapse">
								<div class="container-fluid padding">
									<div class="row text-center">
										<h6> Shipping </h6>
										<p>Everest Fashion Hub aims to deliver your order as quickly as possible. Due to some technical issues, it may take 2-3 business days to deliver your order. We appreciate your patience and always do our best to deliver quickly. </p>
										<p> Exclusive pieces, limited drops, and other one-off collections may take longer than 2-3 days to deliver, however this is rare. We appreciate your patience! We have an extremely high overall customer service and satisfaction rating for a reason. :) </p>

										<h6> Returns </h6>
										<p> Returns are offered within 7 days after product delivery on items that are unworn, unaltered and in new condition with all tags attached.  With the exception of items marked FINAL SALE such as sale items and brown bag items. All sale items are marked as final sale. We can accommodate size exchanges on these items, but we are not able to process any refunds. </p>

										<p> Please allow 2-3 business days from the date your package arrives to us for your return or exchange to be processed. </p>

										<p>Please note that return delivery charges are the responsibility of the customer. If a product is defective or received incorrectly, we will be happy to provide a return delivery label.</p>

										<p>If you wish to exchange items to a different size, we will be happy to process the exchange, so long as the new item is in stock. Customers will need to deliver the exchange back to us to process any exchanges. Once we receive the product, the exchange will be sent free of charge back out to the customer. </p>
									</div>
								</div>
							</div>
					</div>
				</div>
		</div>
	</div>
</div>

<?php 
	$str=$row["tags"];
	$pos=stripos($str,',');
	$tag=substr($str,0,$pos);
	/* to be used for related products */
}
?>

<!--Owl Carousel-->
<div class="container">
	<div class="col-12">
 		<h5 class="keyword">Related Products</h5>
		<hr class="light-100">
	</div>
	<div class="owl-carousel owl-theme">
		<?php
			
			$sql="select * from products where is_deleted=0 and tags like '%".$tag."%' limit 10;";
			$res=mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0){
				while($row=mysqli_fetch_assoc($res))
				{
		?>
		<div class="item">
			<a href="<?php echo "product.php?prod_code=".$row['prod_code']; ?>">
				<div class="card card-alt card-product">
					<img class="card-img-top img-fluid" src="image/products/<?php echo $row['prod_code'];?>.jpg" alt="Card image cap">
					<div class="card-body card-body-alt">
						<a href="php/card_add.php?prod_code=<?php echo $row['prod_code'];?>"><i class="fa fa-cart-plus card-icon"></i></a>
						<a href="<?php echo "product.php?prod_code=".$row['prod_code']; ?>"><i class="fa fa-ellipsis-h card-icon"></i></a>
						<h6><?php echo $row["prod_name"]; ?></h6>
						<p class="card-text card-text-alt"><?php echo "Rs. ".$row["marked_price"]; ?></p>
						<p><span style="text-decoration: line-through;"><?php echo "Rs. ".$row["offer_price"]; ?></span>
							<?php
								$mp=$row['marked_price'];
								$op=$row['offer_price'];
								$off=($mp-$op)*100/$mp;
								echo " -".ceil($off)."%";
							?>
						 </p>
					</div>
				</div>
			</a>
		</div>		
		<?php
				}
			}
		?>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    autoplay:true,
    autoplayTimeout:4000,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

<div class="container">
	<div class="row">
			<?php 
				echo"<div class='col-lg-12'><h4> Customer Reviews </h4><hr class='light-100'>";
				$sql2="select * from (select prod_code,round(avg(rating)) as rating, count(user_id) as number from reviews where is_deleted=0 group by prod_code)A where prod_code=".$prod_code;
				$res2=mysqli_query($conn,$sql2);
				if(mysqli_num_rows($res2)>0){
					$row2=mysqli_fetch_assoc($res2);
					for($i=0;$i<$row2['rating'];$i++){
						echo "<i class='fa fa-star star'></i>";
					}
					echo "<p>Based on ".$row2['number']." reviews</p>";
				}
				else echo "<p>No reviews</p>";
				if(isset($_SESSION['user_id']))
				{
			?>

			<button class="btn btn-dark btn-sm" data-toggle="collapse" data-target="#review"> Write a review </button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<form class="collapse" id="review" method="get" action="">
				<div class="rating">
					<input type="radio" name="rate" id="rate1">
					<label for="rate1"><i class="fa fa-star"></i></label>
					<input type="radio" name="rate" id="rate2">
					<label for="rate2"><i class="fa fa-star"></i></label>
					<input type="radio" name="rate" id="rate3">
					<label for="rate3"><i class="fa fa-star"></i></label>
					<input type="radio" name="rate" id="rate4">
					<label for="rate4"><i class="fa fa-star"></i></label>
					<input type="radio" name="rate" id="rate5">
					<label for="rate5"><i class="fa fa-star"></i></label>
				</div>
				<textarea placeholder="Review..." class="form-control review"></textarea>
				<button type="submit" class="btn btn-sm btn-rounded btn-outline-light" value="submit"> Post </button>
			</form>
		</div>
			<?php } else { echo "<p><em>Login to write a review!</em></p></div>"; } ?>
	</div>
</div>


<!--Owl Carousel-->
	<div class="container padding">
			<?php 
				$sql3="select reviews.review_id,reviews.review,reviews.rating,concat_ws(' ',users.fname,users.lname) as name from reviews join users on reviews.user_id=users.user_id where reviews.is_deleted=0 and reviews.prod_code=".$prod_code;
				$res3=mysqli_query($conn,$sql3);
				if(mysqli_num_rows($res3)>0){
					echo "<div class='owl-carousel owl-theme padding'>";
					while($row3=mysqli_fetch_assoc($res3)){
			?>

			<div class="item">
				<div class="card card-review text-center">
					<div class="card-body">
						<?php for($i=0;$i<$row3['rating'];$i++) { echo "<i class='fa fa-star star'></i>"; } ?>
						<h6 class="card-title name"> by <?php echo $row3['name']; ?> </h6>
						<p class="card-text"> <?php echo $row3['review']; ?> </p>
						<a href="php/delete_review.php?review_id=<?php echo $row3['review_id']; ?>&prod_code=<?php echo $prod_code;?>" class="report"><p>Report as Inappropriate</p></a>
					</div>
				</div>
			</div>			

			<?php
				}
				echo "</div>";
			}
			?>
		<div class="row">
			<div class="col">
				<a href="index.php" style="float:right"><button class="btn btn-rounded btn-sm btn-outline-light"> <i class="fas fa-arrow-left"></i> Back To Shop</button></a>
			</div>
		</div>
	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:70,
    nav:false,
    autoplay:true,
    autoplayTimeout:4000,
    dots:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
</script>

<!--- Footer -->

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


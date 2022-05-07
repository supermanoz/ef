<?php session_start(); 
		include 'php/conn.php';		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home - Everest Fashion Hub</title>	
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
  if(isset($_GET['task']))
  {
    if($_GET['task']=="successful_order")
    {
?>
  <script language="javascript">
      swal({
        title: "Ordered Successfully!",
        text: "We'll reach out to you soon.",
        icon: "success",
        button: "Okay",
        timer:3000
      });
  </script>
<?php
 	 }
 	 else if($_GET['task']=="successful_signup")
 	 {
?>
  <script language="javascript">
      swal({
        title: "Signed Up Successfully!",
        text: "Please check your email to verify your account.",
        icon: "success",
        button: "Okay",
        timer:10000
      });
  </script>
<?php
 	 }
	}
?>

<!-- Navigation-->
<div class="wrapper padding">
 <div class="page-header clear-filter">
 <div class="rellax-header rellax-header-sky" data-rellax-speed="-8">
	<div class="page-header-image" style="">


	<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"> <img class="logo" src="image/logo.png"> </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"> </span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="navbarDropdown">Shop</a>
		            	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		            		<a class="dropdown-item" href="search.php?keyword=tops">Tops</a>
				            <a class="dropdown-item" href="search.php?keyword=shirt">Shirt</a>
				            <a class="dropdown-item" href="search.php?keyword=t-shirt">T-shirt</a>
				            <a class="dropdown-item" href="search.php?keyword=hoodie">Hoodie</a>
				            <a class="dropdown-item" href="search.php?keyword=sweatshirt">Sweatshirt</a>
		            	</div>
          			</li>
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
			</ul>
		</div>
		</div>
	</nav>

		<div class="md-form mt-0">
			<center class="white">
				<div class="padding caption">
					<h1 class="display-2"> Everest Fashion Hub </h1>
					<h5> Kathmandu, Nepal </h5>
					<a href="tel:9860081869" style="color:white"><i class="fas fa-phone-alt"></i> +977 986-008-1869</a>
				</div>
				<div class="padding">
					<form action="php/search.php" method="post">
					<input type="text" name="search_item" class="search-form" placeholder=" Search...">
					<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
					</form>
				</div>
				<div class="padding caption">
					<p> Customized printed t-shirts, delivery all over Nepal, all sizes available, affordable prices. </p>
				</div>
			</center>
			<br>
		</div>

		</div> <!-- background -->
	</div>
	</div>
</div>


<!--- Jumbotron -->
	<div class="container padding">
		<div class="row jumbotron">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 facility">
				<h2>Get Upto</h2>
				<h1 class="padding">20% Off</h1>
				<p>For everything above Rs. 1000</p>
			</div>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 facility">
				<img src="image/img-3.png" class="img-fluid zoom">
			</div>
		</div>
	</div>

<!--Owl Carousel-->
<div class="container-fluid">
	<div class="col-12">
 		<h5 class="keyword">New Drops</h5>
		<hr class="light-100">
	</div>
	<div class="owl-carousel owl-theme">
				<?php
			$sql="select * from products where is_deleted=0 order by added_date desc limit 10;";
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
						<a href="<?php if($row['out_of_stock']==0) echo "php/add_cart.php?prod_code=".$row['prod_code']; else echo "product.php?prod_code=".$row['prod_code']; ?>"><i class="fa fa-cart-plus card-icon"></i></a>
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

<div class="container-fluid padding">
	<div class="col-12">
 		<h5 class="keyword">Most Popular</h5>
 		<hr class="light-100">
 	</div>
	<div class="owl-carousel owl-theme">
				<?php
			$sql="select products.out_of_stock,orders.prod_code,sum(orders.qty)as qty, products.prod_name,products.marked_price,products.offer_price,products.color,products.description from orders join products on products.prod_code=orders.prod_code where products.is_deleted=0 group by orders.prod_code limit 10;";
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
						<a href="<?php if($row['out_of_stock']==0){ echo "php/add_cart.php?prod_code=".$row['prod_code'];} else { echo "product.php?prod_code=".$row['prod_code'];} ?>"><i class="fa fa-cart-plus card-icon"></i></a>
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

<!--- Fixed background -->
	<figure>
		<div class="fixed-wrap">
			<div id="fixed">
				<img src="image/banner-2.jpg">
			</div>
		</div>
	</figure>

<!--Owl Carousel-->
<div class="container-fluid">
	<div class="col-12">
 		<h5 class="keyword">For Women</h5>
		<hr class="light-100">
	</div>
	<div class="owl-carousel owl-theme">
		<?php
			$sql="select * from products where is_deleted=0 and tags like '%women%' limit 10;";
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
						<a href="<?php if($row['out_of_stock']==0){ echo "php/add_cart.php?prod_code=".$row['prod_code'];} else { echo "product.php?prod_code=".$row['prod_code'];} ?>"><i class="fa fa-cart-plus card-icon"></i></a>
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

<!--Owl Carousel-->
<div class="container-fluid">
	<div class="col-12">
 		<h5 class="keyword">Men's Fashion</h5>
		<hr class="light-100">
	</div>
	<div class="owl-carousel owl-theme">
		<?php
			$sql="select * from products where is_deleted=0 and tags like 'men,%' limit 10;";
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
						<a href="<?php if($row['out_of_stock']==0) echo "php/add_cart.php?prod_code=".$row['prod_code']; else echo "product.php?prod_code=".$row['prod_code']; ?>"><i class="fa fa-cart-plus card-icon"></i></a>
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
            items:5
        }
    }
})
</script>

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


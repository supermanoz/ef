<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Everest Fashion Hub</title>	
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
    if($_GET['task']=="reenter_email")
    {
?>
  <script language="javascript">
      swal({
        title: "Email ALready Registered",
        text: "Please use a different email address.",
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

<?php if(isset($_SESSION['user_id'])){
	include 'php/conn.php';
	$sql='select * from users where is_blocked=0 and user_id='.$_SESSION['user_id'];
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
?>
<section class="form my-4 mx-5">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-6 px-5 pt-5">
				<h4 class="font-weight-bold py-2" style="text-align:right">Update personal details<span class="keyword">.</span></h4>
				<form id="form" method="post" action="php/insert_user.php">
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="fname" name="fname" placeholder="First Name" class="form-control my-1" required value="<?php echo $row['fname']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control my-1" required value="<?php echo $row['lname']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control my-1" required value="<?php echo $row['phone']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="address" name="address" placeholder="Address" class="form-control my-1" required value="<?php echo $row['address']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
						<div class="verify-form">
							<input type="email" class="form-control my-1" disabled value="<?php echo $row['email']; ?>">
							<input type="email" id="email" name="email" hidden value="<?php echo $row['email']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
						</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="password" name="password" placeholder="Enter Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="repassword" name="repassword" placeholder="Confirm Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-5"></div>
						<div class="col-lg-7">
							<button type="submit" class="button login-btn mt-2">Sign Up</button>
						</div>
					</div>
					<div style="text-align:right">
						<p>By signing in, you agree to our
						<a href="others.php?show=terms" class="bot-link">terms and policies</a>.</p>
					</div>
				</form>
            	<script src="js/form.js"></script>
			</div>
			<div class="col-lg-5">
				<img src="image/signup-model.jpg" class="img-fluid login-img-alt">
			</div>
		</div>
	</div>
</section>

<?php } else{ ?>
<section class="form my-4 mx-5">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-6 px-5 pt-5">
				<h4 class="font-weight-bold py-2" style="text-align:right">Register yourself<span class="keyword">.</span></h4>
				<form id="form" method="post" action="php/insert_user.php">
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="fname" name="fname" placeholder="First Name" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="address" name="address" placeholder="Address" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
						<div class="verify-form">
							<input type="email" id="email" name="email" placeholder="Email" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
						</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="password" name="password" placeholder="Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="repassword" name="repassword" placeholder="Confirm Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-5"></div>
						<div class="col-lg-7">
							<button type="submit" class="button login-btn mt-2">Sign Up</button>
						</div>
					</div>
					<div style="text-align:right">
						<p>By signing in, you agree to our
						<a href="others.php?show=terms" class="bot-link">terms and policies</a>.</p>
					</div>
				</form>
            	<script src="js/form.js"></script>
			</div>
			<div class="col-lg-5">
				<img src="image/signup-model.jpg" class="img-fluid login-img-alt">
			</div>
		</div>
	</div>
</section>

<?php } ?>
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


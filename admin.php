<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search - Everest Fashion Hub</title>	
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
	if($_SESSION['role']!="admin"){
		header('location:index.php');
	}
	$display='orders';
	if(isset($_GET['display']))
	{
		$display=$_GET['display'];
	}
	include "php/conn.php";

	if(isset($_GET['task']))
  {
    if($_GET['task']=="successful_insertion")
    {
?>
  <script language="javascript">
      swal({
        title: "Product Added!",
        text: "You can edit the details later, if necessary.",
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
		<h1 class="logo-text"><a href="">Everest Fashion<span>.</span></a></h1>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"> </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="navbarDropdown">Admin <img src="image/user.png" class="img-fluid admin-pic"> </a>
	       	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	      		<a class="dropdown-item" href="php/logout.php">Logout</a>
	       	</div>
         </li>
			</ul>
		</div>
	</div>
</nav>

<!-- Search Result -->

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2 col-md-3 col-sm-4">
 			<div class="container-fluid admin-side">
 				<div class="row">
 						<div class="col"><i class="icon fa fa-calendar"></i> Dashboard</div>
 						<hr class="light-100">
 				</div>
 				<div class="row">
 					<a href="admin.php?display=orders" class="bot-link">
 						<div class="col"><i class="icon fa fa-eye"></i> View Orders</div>
 					</a>
 				</div>
 				<div class="row">
 					<a href="admin.php?display=add" class="bot-link">
 						<div class="col"><i class="icon fa fa-plus"></i> Add Products</div>
 					</a>
 				</div>
 				<div class="row">
 					<a href="admin.php?display=edit" class="bot-link">
 						<div class="col"><i class="icon fa fa-pen"></i> Edit Products</div>
 					</a>
 				</div>
 			</div>
 		</div>
 		<div class="col-lg-10 col-md-9 col-sm-8">

 		<?php if($display=="orders"){

 		?>
 <!-- Order Details-->
 			<h5 class="keyword">Orders</h5>
 			<hr class="light-100">
 			<div style="float:right">
 				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 					<input type="text" name="search_input" placeholder=" Search Input" class="search-form my-1">
 					<select name="filter">
						<option value="prod_name">Filter</option>
						<option value="order_id">Order No.</option>
						<option value="fname">First Name</option>
						<option value="lname">Last Name</option>
						<option value="email">Email</option>
						<option value="phone">Phone</option>
						<option value="address">Address</option>
						<option value="prod_name">Product</option>
						<option value="order_date">Date</option>
					</select>
					<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
 				</form>
 			</div>
 			<table class="table table-striped text-center admin-table"><thead class="thead-dark"><tr><th scope="col">Order No.</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Phone</th><th scope="col">Address</th><th>Product</th><th>Delivered</th><th scope="col">Details</th></tr></thead>
 		<?php
 			$concat=" order by orders.order_date desc";
 			$filter="prod_name";
 			if($_SERVER['REQUEST_METHOD']=='POST'){
 				$text=$_POST['search_input'];
 				$filter=$_POST['filter'];
 				$concat=" and ".$filter." like '%".$text."%' order by orders.order_date desc";
 			}
 			$sql="select orders.order_id,products.prod_name,orders.is_delivered,concat_ws(' ',users.fname,users.lname) as name, users.email,users.phone,users.address from orders join users on orders.user_id=users.user_id join products on orders.prod_code=products.prod_code where orders.is_ordered=1".$concat;
 			$res=mysqli_query($conn,$sql);
 			if(mysqli_num_rows($res)>0)
 			{
				echo "<tbody>";
 				while($row=mysqli_fetch_assoc($res))
 				{

 			?>
          <tr><td><?php echo $row['order_id']; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['phone']; ?></td><td><?php echo $row['address']; ?></td><td><?php echo $row['prod_name']; ?></td><td>
          	<?php if($row['is_delivered']==1) echo '<i class="far fa-check-circle"></i>'; else echo '<i class="far fa-times-circle"></i>'; ?></td><td><a href="admin.php?display=order_details&order_id=<?php echo $row['order_id']; ?>" class="bot-link">...</a></td></tr>

        <?php
         		}
         		echo "</tbody>";
 					}
 					echo "</table>";
      	}
      	?>


		<?php
		if($display=="order_details"){
			$order_id=$_GET['order_id'];
			$sql="select orders.remarks,orders.size,orders.qty,date_format(orders.order_date,'%M %d %Y')as order_date,orders.order_id,products.prod_name,products.offer_price,orders.is_delivered,concat_ws(' ',users.fname,users.lname) as name, users.email,users.phone,users.address from orders join users on orders.user_id=users.user_id join products on orders.prod_code=products.prod_code where orders.is_ordered=1 and order_id=".$order_id;
 			$res=mysqli_query($conn,$sql);
 			if(mysqli_num_rows($res)>0)
 			{
 				$row=mysqli_fetch_assoc($res);
 		?>
        <!-- Detail -->
          <div class="card bg-dark">
          <img class="card-img-top card-image" src="image/admin-panel.png" alt="">
          <div class="card-body">
            <h5 class="keyword">Quotation Detail</h5>
            <hr class="light-100">
            <p class="card-text"><strong>Name:</strong> <?php echo $row['name']; ?> </p>
            <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?> <p>
            <p class="card-text"><strong>Phone:</strong> <?php echo $row['phone']; ?> </p>
            <p class="card-text"><strong>Address:</strong> <?php echo $row['address']; ?> </p>
            <p class="card-text"><strong>Product:</strong> <?php echo $row['prod_name']; ?> </p>
            <p class="card-text"><strong>Size:</strong> <?php echo $row['size']; ?> </p>
            <p class="card-text"><strong>Quantity:</strong> <?php echo $row['qty']; ?> </p>
            <p class="card-text"><strong>Date:</strong> <?php echo $row['order_date']; ?> </p>
            <p class="card-text"><strong>Due:</strong> <?php echo $row['qty']*$row['offer_price']; ?> </p>
          </div>
          <ul type="none">
          	<?php if($row['is_delivered']==1){?>
          	<li class=""><i class="far fa-check-circle"></i> Already Delivered</li>
            <li class=""><strong>Remarks:</strong> <?php echo $row['remarks']; ?> </li>
          	<?php } else{ ?>
            <li class=""><i class="far fa-times-circle"></i> Not Delivered Yet!</li>
          	<?php } ?>
          </ul>
          <div class="card-body">
            <form method="post" action="php/update_orders.php">
              <div class="form-row">
                <div class="col-lg-4">
                	<input type="text" name="order_id" value="<?php echo $order_id; ?>" hidden>
                  <textarea class="form-control" name="remarks" placeholder="Remarks"></textarea>
                  <br>
                  <button class="btn btn-outline-light btn-rounded btn-sm" type="submit">Delivered</button>
                  <a href="admin.php?display=orders" class="bot-link"><small> Back to Quotations</small></a>
                </div>
              </div>
            </form>
          </div>
        </div>
      <?php }} ?>


      <?php if($display=='add'){ ?>
        <!-- Add Product -->
        <div class="container">
        	<div class="row no-gutters">
        		<div class="col-lg-7">
        			<img src="image/add-product.jpg" class="img-fluid login-img">
        		</div>
        		<div class="col-lg-5 px-5 pt-3">
        			<h4 class="font-weight-bold py-2">Add new product<span class="keyword">.</span></h4>
        			<form id="form" method="post" action="php/insert_product.php">
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        							<?php
        								$sql="select * from products";
        								$res=mysqli_query($conn,$sql);
        								$num=mysqli_num_rows($res);
        								mysqli_close($conn);
        							?>
        						<input type="text" name="prod_code" id="prod_code" placeholder="Product Code: <?php echo $num+1; ?>" class="form-control my-1" disabled>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<input type="text" name="prod_name" id="prod_name" placeholder="Product Name" class="form-control my-1" required>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<input type="text" name="color" id="color" placeholder="Color" class="form-control my-1" required>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-5">
        						<div class="verify-form">
        						<input type="text" name="marked_price" id="marked_price" placeholder="Marked Price" class="form-control my-1" required>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        					<div class="col-lg-5">
        						<div class="verify-form">
        						<input type="text" name="offer_price" id="offer_price" placeholder="Offer Price" class="form-control my-1" required>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<textarea name="description" id="description" placeholder="Description" class="form-control my-1"></textarea>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<textarea name="tags" id="tags" placeholder="Tags" class="form-control my-1"></textarea>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        						<small>Use commas (,) to separate tags.</small>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
								<label class="switch">
								  <input type="checkbox" name="out_of_stock">
								  <span class="slider round"></span>
								</label>
        						<label><h6><em>Out of Stock</em></h6></label>
        					</div>
        				</div>
        				<div class="file-field">
										<a class="btn-floating peach-gradient mt-0 multiple">
											<label>Product Picture </label><br>
											<i class="fas fa-paperclip" aria-hidden="true"></i>
											<input type="file" name="image" required>
										</a>
									</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<button type="submit" class="button login-btn mt-1 mb-5"><i class="fa fa-plus"></i> ADD</button>
        					</div>
        				</div>
        			</form>
        			<script src="js/product.js"></script>
        		</div>
        	</div>
        </div>
      <?php }?>

      <?php if($display=='edit_details'){ $prod_code=1; if(isset($_GET['prod_code'])){$prod_code=$_GET['prod_code'];} ?>
        <!-- Edit Product -->
        <div class="container">
        	<div class="row no-gutters">
        		<div class="col-lg-7">
        			<img src="image/add-product.jpg" class="img-fluid login-img">
        		</div>
        		<div class="col-lg-5 px-5 pt-3">
        			<h4 class="font-weight-bold py-2">Edit product<span class="keyword">.</span></h4>
        			<form id="form" method="post" action="php/edit_product.php">
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        							<?php
        								$sql="select * from products where is_deleted=0 and prod_code=".$prod_code;
        								$res=mysqli_query($conn,$sql);
        								$row=mysqli_fetch_assoc($res);
        							?>
        						<input type="text" placeholder="Product Code: <?php echo $prod_code; ?>" class="form-control my-1" disabled>
        						<input type="text" name="prod_code" value="<?php echo $prod_code; ?>" hidden>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<input type="text" name="prod_name" id="prod_name" placeholder="Product Name" class="form-control my-1" required value="<?php echo $row['prod_name']; ?>">
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<input type="text" name="color" id="color" placeholder="Color" class="form-control my-1" required value="<?php echo $row['color']; ?>">
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-5">
        						<div class="verify-form">
        						<input type="text" name="marked_price" id="marked_price" placeholder="Marked Price" class="form-control my-1" required value="<?php echo $row['marked_price']; ?>">
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        					<div class="col-lg-5">
        						<div class="verify-form">
        						<input type="text" name="offer_price" id="offer_price" placeholder="Offer Price" class="form-control my-1" required value="<?php echo $row['offer_price']; ?>">
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<textarea name="description" id="description" placeholder="Description" class="form-control my-1"><?php echo $row['description']; ?></textarea>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<div class="verify-form">
        						<textarea name="tags" id="tags" placeholder="Tags" class="form-control my-1"><?php echo $row['tags']; ?></textarea>
        						 <i class="fas fa-check-circle"></i>
		                 <i class="fas fa-exclamation-circle"></i>
		                 <small>Error Message</small>
        						</div>
        						<small>Use commas (,) to separate tags.</small>
        					</div>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
								<label class="switch">
								  <input type="checkbox" name="out_of_stock" <?php if($row['out_of_stock']==1){ echo "checked"; }?>>
								  <span class="slider round"></span>
								</label>
        						<label><h6><em>Out of Stock</em></h6></label>
        					</div>
        				</div>
        				<div class="file-field">
										<a class="btn-floating peach-gradient mt-0 multiple">
											<label>Product Picture </label><br>
											<i class="fas fa-paperclip" aria-hidden="true"></i>
											<input type="file" name="image">
										</a>
									</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<button type="submit" class="button login-btn mt-1 mb-5"><i class="fa fa-pen"></i> EDIT</button>
        					</div>
        				</div>
        			</form>
        			<script src="js/product.js"></script>
        		</div>
        	</div>
        </div>
      <?php mysqli_close($conn); }?>

      <?php if($display=="edit"){

      ?>
        <!-- Product Details-->
 			<h5 class="keyword">Products</h5>
 			<hr class="light-100">
 			<div style="float:right">
 				<form method="post" action="admin.php?display=edit">
 					<input type="text" name="search_input1" placeholder=" Search Input" class="search-form my-1">
 					<select name="filter1">
						<option value="prod_name">Filter</option>
						<option value="prod_code">Product No.</option>
						<option value="prod_name">Name</option>
						<option value="color">Color</option>
						<option value="offer_price">Price</option>
						<option value="added_date">Date</option>
					</select>
					<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
 				</form>
 			</div>
 			<table class="table table-striped text-center admin-table"><thead class="thead-dark"><tr><th scope="col">Product Code</th><th scope="col">Name</th><th scope="col">Color</th><th scope="col">Price</th><th scope="col">Out of Stock</th><th scope="col">Operation</th></tr></thead>
 <?php
 			$concat=" where is_deleted=0";
 			$filter="prod_name";
 			if($_SERVER['REQUEST_METHOD']=='POST'){
 				$text=$_POST['search_input1'];
 				$filter=$_POST['filter1'];
 				$concat=" where is_deleted=0 and ".$filter." like '%".$text."%'";
 			}
 			$sql="select * from products".$concat;
 			$res=mysqli_query($conn,$sql);
 			if(mysqli_num_rows($res)>0)
 			{
				echo "<tbody>";
 				while($row=mysqli_fetch_assoc($res))
 				{
 					?>
                <tr><td><?php echo $row['prod_code']; ?></td><td><?php echo $row['prod_name']; ?></td><td><?php echo $row['color']; ?></td><td><?php echo $row['offer_price']; ?></td><td><?php if($row['out_of_stock']==true){ echo '<i class="fa fa-exclamation-triangle"></i> <em>Out of stock!</em>'; } else echo "<em>In stock</em>" ?></td><td>
					<a href="admin.php?display=edit_details&prod_code=<?php echo $row['prod_code']; ?>"><button class="btn btn-outline-light btn-sm btn-rounded" style="background-color: #455A71;">Edit</button></a>
					<a href="php/delete_product.php?prod_code=<?php echo $row['prod_code']; ?>"><button class="btn btn-outline-light btn-sm btn-rounded" style="background-color: #b30000;">Delete</button></a></td></tr>

      <?php } 
      	echo "</tbody>";
       }?>
     </table>
   <?php } ?>
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


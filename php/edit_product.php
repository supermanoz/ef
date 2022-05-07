<?php
	include 'conn.php';
	$prod_code=$_POST['prod_code'];
	$prod_name=$_POST['prod_name'];
	$color=$_POST['color'];
	$marked_price=$_POST['marked_price'];
	$offer_price=$_POST['offer_price'];
	$description=$_POST['description'];
	$tags=$_POST['tags'];
	if($_POST['out_of_stock']=="on"){
		$out_of_stock=1;
	}
	else{
		$out_of_stock=0;
	}
	$sql="update products set prod_name='$prod_name',color='$color',marked_price=$marked_price,offer_price=$offer_price,description='$description',tags='$tags',out_of_stock=$out_of_stock where prod_code=".$prod_code;
	$res=mysqli_query($conn,$sql);
	if($res){
		if(isset($_FILES['image'])){
			if($_FILES['image']['type']=="image/jpeg" || $_FILES['image']['type']=="image/jpg"){
				move_uploaded_file($_FILES['image']['tmp_name'],"../image/products/".$prod_code.".jpg");
			}
		}
		mysqli_close($conn);
		header('location:../admin.php?display=edit&task=successful_insertion');
	}
	else echo $prod_code." ".$prod_name." ".$color." ".$marked_price." ".$offer_price." ".$description." ".$tags." ".$out_of_stock;
?>
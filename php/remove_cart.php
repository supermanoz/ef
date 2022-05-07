<?php
	include 'conn.php';
	$order_id=$_GET['order_id'];
	$sql="delete from orders where order_id=".$order_id;
	$res=mysqli_query($conn,$sql);
	header('location:../cart.php');
?>
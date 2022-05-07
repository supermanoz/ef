<?php
	include 'conn.php';
	$remarks=$_POST['remarks'];
	$order_id=$_POST['order_id'];
	$sql="update orders set remarks='".$remarks."', is_delivered=1 where is_ordered=1 and order_id=".$order_id;
	$res=mysqli_query($conn,$sql);
	header('location:../admin.php?display=orders');
?>
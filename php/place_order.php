<?php
	session_start();
	include 'conn.php';
	$sql1="select max(bill_no) as maxbill from orders";
	$res1=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_assoc($res1);
	$billno=$row['maxbill']+1;
	$user_id=$_SESSION['user_id'];
	$sql="update orders set is_ordered=1, order_date=current_timestamp,bill_no=$billno where user_id=$user_id and is_delivered=0;";
	$res=mysqli_query($conn,$sql);
	if($res)
	{
		header('location:../index.php?task=successful_order');
	}
?>
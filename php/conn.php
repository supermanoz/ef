<?php
	$db="ef";
	$server="localhost";
	$pass="";
	$user="root";
	$conn=mysqli_connect($server,$user,$pass,$db);
	if(!$conn)
	{
		die("Connection Failed!".mysqli_connect_error());
	}
?>
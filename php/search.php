<?php
	include "conn.php";
	$keyword=$_POST['search_item'];
	header('location:../search.php?keyword='.$keyword);
?>
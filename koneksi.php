<?php
	$host = "localhost";
	$user = "u531566310_kedawung1";
	$password = "finalIESI1";
	$database = "u531566310_sekolah";
	
	$connect = mysqli_connect($host,$user,$password,$database) or die (mysqli_error($connect));
	//mysql_select_db($database) or die (mysql_error());
?>
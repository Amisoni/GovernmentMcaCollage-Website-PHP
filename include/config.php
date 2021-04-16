<?php
	ob_start();
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="gmca";
	$con=mysqli_connect($hostname,$username,$password,$dbname);
	if(!$con)
	{
		echo "Not";
	}

 ?>
<?php
		$email=$_POST['email'];
		$password=$_POST['password'];
		//echo "okok";
		$sel="SELECT * FROM `registration` WHERE  `email`='".$email."' AND `password`='".$password."' ";
		$qry=mysqli_query($con,$sel);
		if(mysqli_num_rows($qry) > 0) {
		$row = mysqli_fetch_assoc($qry);
		$_SESSION['reg_id']=$row["reg_id"];	
		$_SESSION['no']=$row['no'];
		$_SESSION['status']=$row['status'];
		$_SESSION['name']=$row['name'];
		$var1=$row['status'];
		$var=$row['no'];
			if ($var == 0 && $var1 == 0){
			header("location:home.php");
		}elseif ($var == 1 && $var1 == 0){
			header("location:home2.php");
		}
		}else
		{
			$_SESSION['login_errmsg']="Email & Password Not Match";
			header("location:index.php");
		}

 ?>
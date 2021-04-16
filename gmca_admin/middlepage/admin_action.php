
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['reg_id'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$phone=$_REQUEST['phone'];
	$gender=$_REQUEST['gender'];
	$no=$_REQUEST['no'];
	$status=$_REQUEST['status'];
	$profile=$_FILES['profile']['name'];
	$temp_name=$_FILES['profile']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			$check_email=mysqli_query($con,"SELECT * FROM `registration` WHERE `email`='".$email."' ");
			$count=mysqli_num_rows($check_email);
			//echo $count;
			if($count > 0)
			{
				echo "<script>
					alert('Email id already exist');
					window.location.href='home.php?page=admin_list';
					</script>";
				
			}else
			{

			 $ext = strtolower(pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION));
				if ($ext == "jpg" || $ext == "jpeg" || $ext == "png")
				{
					$path2="assets/img/registration/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
					move_uploaded_file($temp_name,$final_path2);
					$insert="INSERT INTO `registration` (`Name`,`Email`,`Password`,`profile`,`gender`,`phone`,`no`,`status`)VALUES('".$name."','".$email."','".$password."','".$final_path."','".$gender."','".$phone."','".$no."','".$status."')";
				}else{
					$insert="INSERT INTO `registration` (`Name`,`Email`,`Password`,`gender`,`phone`,`no`,`status`)VALUES('".$name."','".$email."','".$password."','".$gender."','".$phone."','".$no."','".$status."')";
				}
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=admin_list");
				}else
				{
					echo "not";
				}
			}
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `registration` SET `name`='".$name."',`email`='".$email."',`password`='".$password."',`gender`='".$gender."',`phone`='".$phone."',`no`='".$no."',`status`='".$status."' WHERE `reg_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($profile!='')
						{
							$sel_img="SELECT * FROM `registration` WHERE `reg_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/registration/".$row_img['profile']);
							
							move_uploaded_file($temp_name,"assets/img/registration/".$profile);
							$img_update="UPDATE `registration` SET `profile`='".$profile."' WHERE `reg_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=admin_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

			echo "update";
			break;
			
			case 'delete':
					$id=$_REQUEST['id'];
					$profile=$_REQUEST['profile'];
						$del="DELETE FROM `registration` WHERE `reg_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($profile!='')
						{
							echo $image="assets/img/registration/".$profile;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=faculties_list');
							//echo "Delete okok";
						}
						else{
							echo "Delete Not";
						}
			break;
		
		default:
			echo "Error ";
			break;
     }


 ?>

<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['reg_id'];
	$reg_id=$_REQUEST['reg_id'];
	$password=$_REQUEST['password'];
	$designation=$_REQUEST['designation'];
	$area_intrest=$_REQUEST['area_intrest'];
	$qualification=$_REQUEST['qualification'];
	$experience=$_REQUEST['experience'];
	$profile=$_FILES['profile']['name'];
	$temp_name=$_FILES['profile']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			 $insert="INSERT INTO `personal_dtls` (`designation`,`area_intrest`,`qualification`,`experience`,`reg_id`)VALUES('".$designation."','".$area_intrest."','".$qualification."','".$experience."','".$reg_id."')";
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home2.php?page=faculties_profile_list");
				}else
				{
					echo "not";
				}
			break;

			case 'update':
					$update="UPDATE registration SET `password`='".$password."' WHERE  `reg_id`='".$id."'";
					$qry=mysqli_query($con,$update);

					$update_p="UPDATE personal_dtls SET `designation`='".$designation."',`area_intrest`='".$area_intrest."',`qualification`='".$qualification."',`experience`='".$experience."' WHERE `reg_id`='".$id."'";
					$qry_p=mysqli_query($con,$update_p);

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

					if($qry || $qry_p || $img_qry)
					{
						header("location:home2.php?page=faculties_profile_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

			break;
		
		default:
			echo "Error ";
			break;
     }


 ?>
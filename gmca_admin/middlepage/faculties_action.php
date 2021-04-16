
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
					window.location.href='home.php?page=faculties_list';
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
					header("location:home.php?page=faculties_list");
				}else
				{
					echo "not";
				}
			}
			break;

			case 'update':
					$update="UPDATE `registration` SET `name`='".$name."',`email`='".$email."',`gender`='".$gender."',`phone`='".$phone."',`status`='".$status."' WHERE `reg_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home.php?page=faculties_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

			break;

			case 'delete':
					$id=$_REQUEST['id'];
					$profile=$_REQUEST['profile'];
						$del="DELETE FROM `registration` WHERE `reg_id`='".$id."' ";
						$qry=mysqli_query($con,$del);

						$del_p="DELETE FROM `personal_dtls` WHERE `reg_id`='".$id."' ";
						$qry_p=mysqli_query($con,$del_p);

						$del_w="DELETE FROM `work_exp` WHERE `reg_id`='".$id."' ";
						$qry_w=mysqli_query($con,$del_w);

						$del_s="DELETE FROM `skills_knowledge` WHERE `reg_id`='".$id."' ";
						$qry_s=mysqli_query($con,$del_s);

						$del_e="DELETE FROM `edu_qualification` WHERE `reg_id`='".$id."' ";
						$qry_e=mysqli_query($con,$del_e);

						$del_c="DELETE FROM `course_taught` WHERE `reg_id`='".$id."' ";
						$qry_c=mysqli_query($con,$del_c);

						$del_t="DELETE FROM `training_workshop` WHERE `reg_id`='".$id."' ";
						$qry_t=mysqli_query($con,$del_t);

						$del_pf="DELETE FROM `portfolio` WHERE `reg_id`='".$id."' ";
						$qry_pf=mysqli_query($con,$del_pf);

						$del_r="DELETE FROM `research_project` WHERE `reg_id`='".$id."' ";
						$qry_r=mysqli_query($con,$del_r);

						$del_pb="DELETE FROM `publication` WHERE `reg_id`='".$id."' ";
						$qry_pb=mysqli_query($con,$del_pb);

						$del_a="DELETE FROM `academic_project` WHERE `reg_id`='".$id."' ";
						$qry_a=mysqli_query($con,$del_a);

						$del_pt="DELETE FROM `patent_filed` WHERE `reg_id`='".$id."' ";
						$qry_pt=mysqli_query($con,$del_pt);

						$del_pi="DELETE FROM `professional_institution_membership` WHERE `reg_id`='".$id."' ";
						$qry_pi=mysqli_query($con,$del_pi);

						$del_el="DELETE FROM `expert_lecture` WHERE `reg_id`='".$id."' ";
						$qry_el=mysqli_query($con,$del_el);

						$del_aw="DELETE FROM `award` WHERE `reg_id`='".$id."' ";
						$qry_aw=mysqli_query($con,$del_aw);

						if($profile!='')
						{
							echo $image="assets/img/registration/".$profile;
							unlink($image);
						}
						if($qry || $qry_p || $qry_w || $qry_s || $qry_e || $qry_c || $qry_t || $qry_pf || $qry_r || $qry_pb || $qry_a || $qry_pt || $qry_pi || $qry_el || $qry_aw)
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
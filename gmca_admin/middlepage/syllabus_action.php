
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['s_id'];
	$name=$_REQUEST['name'];
	$sem=$_REQUEST['sem'];
	$status=$_REQUEST['status'];
	$file=$_FILES['file']['name'];
	$temp_name=$_FILES['file']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			$ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "doc" || $ext == "docx" || $ext == "pdf" || $ext == "odt")
				{
					$path2="assets/img/syllabus/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
			 move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `syllabus` (`name`,`sem`,`file`,`status`)VALUES('".$name."','".$sem."','".$final_path."','".$status."')";
			 }else{
			 $insert="INSERT INTO `syllabus` (`name`,`sem`,`status`)VALUES('".$name."','".$sem."','".$status."')";
			 }
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=syllabus_list");
				}else
				{
					echo "not";
				}
			
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `syllabus` SET `name`='".$name."',`sem`='".$sem."',`status`='".$status."' WHERE `s_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($file!='')
						{
							$sel_img="SELECT * FROM `syllabus` WHERE `s_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/syllabus/".$row_img['file']);
							
							move_uploaded_file($temp_name,"assets/img/syllabus/".$file);
							$img_update="UPDATE `syllabus` SET `file`='".$file."' WHERE `s_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=syllabus_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

			echo "update";
			break;
			
			case 'delete':
					$id=$_REQUEST['id'];
					$file=$_REQUEST['file'];
						$del="DELETE FROM `syllabus` WHERE `s_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($file!='')
						{
							echo $image="assets/img/syllabus/".$file;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=syllabus_list');
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
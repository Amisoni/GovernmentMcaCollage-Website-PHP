
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['r_id'];
	$name=$_REQUEST['name'];
	$rank=$_REQUEST['rank'];
	$sem=$_REQUEST['sem'];
	$file=$_FILES['file']['name'];
	$status=$_REQUEST['status'];
	$temp_name=$_FILES['file']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			$ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "doc" || $ext == "docx" || $ext == "pdf" || $ext == "odt")
				{
					$path2="assets/img/result/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
			 move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `result` (`name`,`sem`,`rank`,`file`,`status`)VALUES('".$name."','".$sem."','".$rank."','".$final_path."','".$status."')";
			 }else{
			 $insert="INSERT INTO `result` (`name`,`sem`,`rank`,`status`)VALUES('".$name."','".$sem."','".$rank."','".$status."')";
			 }
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=result_list");
				}else
				{
					echo "not";
				}
			
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `result` SET `name`='".$name."',`rank`='".$rank."',`sem`='".$sem."',`status`='".$status."' WHERE `r_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($file!='')
						{
							$sel_img="SELECT * FROM `result` WHERE `r_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/result/".$row_img['file']);
							
							move_uploaded_file($temp_name,"assets/img/result/".$file);
							$img_update="UPDATE `result` SET `file`='".$file."' WHERE `r_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=result_list");
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
						$del="DELETE FROM `result` WHERE `r_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($file!='')
						{
							echo $file="assets/img/result/".$file;
							unlink($file);
						}
						if($qry)
						{
							header('location:home.php?page=result_list');
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
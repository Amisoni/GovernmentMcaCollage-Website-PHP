
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['f_id'];
	$name=$_REQUEST['name'];
	$details=$_REQUEST['details'];
	$file=$_FILES['file']['name'];
	$status=$_REQUEST['status'];
	$temp_name=$_FILES['file']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			$ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png")
				{
					$path2="assets/img/facilities/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
			 move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `facilities` (`name`,`details`,`file`,`status`)VALUES('".$name."','".$details."','".$final_path."','".$status."')";
			 }else{
			 $insert="INSERT INTO `facilities` (`name`,`details`,`status`)VALUES('".$name."','".$details."','".$status."')";
			 }
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=facilities_list");
				}else
				{
					echo "not";
				}
			
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `facilities` SET `name`='".$name."',`details`='".$details."',`status`='".$status."' WHERE `f_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($file!='')
						{
							$sel_img="SELECT * FROM `facilities` WHERE `f_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/facilities/".$row_img['file']);
							
							move_uploaded_file($temp_name,"assets/img/facilities/".$file);
							$img_update="UPDATE `facilities` SET `file`='".$file."' WHERE `f_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=facilities_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

			echo "update";
			break;
			
			case 'delete':
					echo $id=$_REQUEST['id'];
					$file=$_REQUEST['file'];
			//echo "delete action run";
						$del="DELETE FROM `facilities` WHERE `f_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($file!='')
						{
							$image="assets/img/facilities/".$file;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=facilities_list');
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
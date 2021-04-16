
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['c_id'];
	$name=$_REQUEST['name'];
	$details=$_REQUEST['details'];
	$status=$_REQUEST['status'];
	$file=$_FILES['file']['name'];
	$temp_name=$_FILES['file']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			 $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png")
				{
					$path2="assets/img/course/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
			 move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `course` (`name`,`details`,`file`,`status`)VALUES('".$name."','".$details."','".$final_path."','".$status."')";
			 }else{
					$insert="INSERT INTO `course` (`name`,`details`,`status`)VALUES('".$name."','".$details."','".$status."')";
			 }
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=course_list");
				}else
				{
					echo "not";
				}
			
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `course` SET `name`='".$name."',`details`='".$details."',`status`='".$status."' WHERE `c_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($file!='')
						{
							$sel_img="SELECT * FROM `course` WHERE `c_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/course/".$row_img['file']);
							
							move_uploaded_file($temp_name,"assets/img/course/".$file);
							$img_update="UPDATE `course` SET `file`='".$file."' WHERE `c_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=course_list");
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
						echo $del="DELETE FROM `course` WHERE `c_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($file!='')
						{
							$image="assets/img/course/".$file;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=course_list');
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
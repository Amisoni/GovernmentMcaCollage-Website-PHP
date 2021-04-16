
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['n_id'];
	$title=$_REQUEST['title'];
	$date=$_REQUEST['date'];
	$status=$_REQUEST['status'];
	$file=$_FILES['file']['name'];
	$temp_name=$_FILES['file']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			$ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "doc" || $ext == "docx" || $ext == "pdf" || $ext == "odt")
				{
					$path2="assets/img/news/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
			 move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `news` (`title`,`date`,`file`,`status`)VALUES('".$title."','".$date."','".$final_path."','".$status."')";
			 }else{
			 $insert="INSERT INTO `news` (`title`,`date`,`status`)VALUES('".$title."','".$date."','".$status."')";
			 }
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=news_list");
				}else
				{
					echo "not";
				}
			
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `news` SET `title`='".$title."',`date`='".$date."',`status`='".$status."' WHERE `n_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($file!='')
						{
							$sel_img="SELECT * FROM `news` WHERE `n_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/news/".$row_img['file']);
							
							move_uploaded_file($temp_name,"assets/img/news/".$file);
							$img_update="UPDATE `news` SET `file`='".$file."' WHERE `n_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=news_list");
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
						echo $del="DELETE FROM `news` WHERE `n_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($file!='')
						{
							echo $image="assets/img/news/".$file;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=news_list');
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
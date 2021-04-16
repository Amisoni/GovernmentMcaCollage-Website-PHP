
<?php
// print_r($_FILES);

if(isset($_POST['submit'])){	

	for($i=0; $i<count($image=$_FILES['image']['name']); $i++)
	{	
	
	$action=$_REQUEST['action'];
	$id=$_REQUEST['g_id'];
	$event_id=$_REQUEST['event_id'];
	$event_name=$_REQUEST['event_name'];
	$status=$_REQUEST['status'];
	$image=$_FILES['image']['name'][$i];
	$temp_name=$_FILES['image']['tmp_name'][$i];
	switch ($action)
	 {
		case 'insert':
			
			 $ext = strtolower(pathinfo($_FILES["image"]["name"][$i], PATHINFO_EXTENSION));
				if ($ext == "jpg" || $ext == "jpeg" || $ext == "png")
				{
					$path2="assets/img/gallery/";
					$imgname = "GMCA" . uniqid(microtime(),true).".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
			 		move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `gallery` (`event_id`,`event_name`,`image`,`status`)VALUES('".$event_id."','".$event_name."','".$final_path."','".$status."')";
			 }else{
			 $insert="INSERT INTO `gallery` (`event_id`,`event_name`,`status`)VALUES('".$event_id."','".$event_name."','".$status."')";
				}
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=gallery_list");
				}else
				{
					echo "not";
				}


			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `gallery` SET `event_id`='".$event_id."',`event_name`='".$event_name."',`status`='".$status."' WHERE `g_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($image!='')
						{
							$sel_img="SELECT * FROM `gallery` WHERE `g_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/gallery/".$row_img['image']);
							
							move_uploaded_file($temp_name,"assets/img/gallery/".$image);
							$img_update="UPDATE `gallery` SET `image`='".$image."' WHERE `g_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=gallery_list");
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

	}
}


 ?>
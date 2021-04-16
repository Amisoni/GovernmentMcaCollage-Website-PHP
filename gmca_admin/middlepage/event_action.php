
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['event_id'];
	$name=$_REQUEST['name'];
	$details=$_REQUEST['details'];
	$status=$_REQUEST['status'];
	$image=$_FILES['image']['name'];
	$temp_name=$_FILES['image']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			//echo "insert";
	//	echo "SELECT * FROM `admin` WHERE `email`='".$email."' ";
			$check_event=mysqli_query($con,"SELECT * FROM `event` WHERE `name`='".$name."' ");
			$count=mysqli_num_rows($check_event);
			//echo $count;
			if($count > 0)
			{
				echo "<script>
					alert('Event Name already exist');
					window.location.href='home.php?page=event_form';
					</script>";
				
			}else
			{
			$ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png")
				{
					$path2="assets/img/event/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;	
			 move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `event` (`name`,`date`,`details`,`image`,`status`)VALUES('".$name."','".$date."','".$details."','".$final_path."','".$status."')";
			 }else{
					$insert="INSERT INTO `event` (`name`,`date`,`details`,`status`)VALUES('".$name."','".$date."','".$details."','".$status."')";
			 }
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=event_list");
				}else
				{
					echo "not";
				}
			}
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `event` SET `name`='".$name."',`details`='".$details."',`status`='".$status."' WHERE `event_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($image!='')
						{
							$sel_img="SELECT * FROM `event` WHERE `event_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/event/".$row_img['image']);
							
							move_uploaded_file($temp_name,"assets/img/event/".$image);
							$img_update="UPDATE `event` SET `image`='".$image."' WHERE `event_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=event_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

			echo "update";
			break;
			
			case 'delete':
					echo $id=$_REQUEST['id'];
					$image=$_REQUEST['image'];
			//echo "delete action run";
						echo $del="DELETE FROM `event` WHERE `event_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($image!='')
						{
							echo $image="assets/img/event/".$image;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=event_list');
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
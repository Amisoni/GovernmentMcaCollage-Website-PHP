
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['b_id'];
	$name=$_REQUEST['name'];
	$status=$_REQUEST['status'];
	$image=$_FILES['image']['name'];
	$temp_name=$_FILES['image']['tmp_name'];
	switch ($action)
	 {
		case 'insert':
			 $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
			if ($ext == "jpg" || $ext == "jpeg" || $ext == "png")
				{
					$path2="assets/img/banner/";
					$imgname = "GMCA" . time().".".$ext;
					$final_path =$imgname;
					$final_path2 = $path2 . $imgname;
			 move_uploaded_file($temp_name,$final_path2);
			 $insert="INSERT INTO `banner` (`name`,`image`,`status`)VALUES('".$name."','".$final_path."','".$status."')";
			 }else{
					$insert="INSERT INTO `banner` (`name`,`status`)VALUES('".$name."','".$status."')";
			}
			$qry=mysqli_query($con,$insert);
				if($qry)
				{
					//echo "okok";
					header("location:home.php?page=banner_list");
				}else
				{
					echo "not";
				}
			
			break;
			
			case 'update':
						//echo "update qry";
					$update="UPDATE `banner` SET `name`='".$name."',`image`='".$image."',`status`='".$status."' WHERE `b_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);

						if($image!='')
						{
							$sel_img="SELECT * FROM `banner` WHERE `b_id`='".$id."' ";
							$sel_qry=mysqli_query($con,$sel_img);
							$row_img=mysqli_fetch_assoc($sel_qry);
							unlink("assets/img/banner/".$row_img['image']);
							
							move_uploaded_file($temp_name,"assets/img/banner/".$image);
							$img_update="UPDATE `banner` SET `image`='".$image."' WHERE `b_id`='".$id."' ";
							$img_qry=mysqli_query($con,$img_update);
						}

					if($qry || $img_qry)
					{
						header("location:home.php?page=banner_list");
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
						echo $del="DELETE FROM `banner` WHERE `b_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($image!='')
						{
							echo $image="assets/img/banner/".$image;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=banner_list');
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

<?php
print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['training_id'];
	$title=$_REQUEST['title'];
	$organizer=$_REQUEST['organizer'];
	$duration=$_REQUEST['duration'];
	$status=$_REQUEST['status'];
	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `training_workshop` SET `title`='".$title."',`organizer`='".$organizer."',`duration`='".$duration."',`status`='".$status."' WHERE `training_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=training_workshop_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}
					break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `training_workshop` WHERE `training_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=training_workshop_list');
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
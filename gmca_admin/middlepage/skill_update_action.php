
<?php
print_r($_REQUEST);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['skill_id'];
	$skill_dtls=$_REQUEST['skill_dtls'];
	$status=$_REQUEST['status'];

	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `skills_knowledge` SET `skill_dtls`='".$skill_dtls."',`status`='".$status."' WHERE `skill_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=skill_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

	                break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `skills_knowledge` WHERE `skill_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=skill_list');
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
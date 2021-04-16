
<?php
print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['academic_id'];
	$details=$_REQUEST['details'];
	$status=$_REQUEST['status'];

	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `academic_project` SET `details`='".$details."',`status`='".$status."' WHERE `academic_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=academic_project_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}
					break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `academic_project` WHERE `academic_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=academic_project_list');
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
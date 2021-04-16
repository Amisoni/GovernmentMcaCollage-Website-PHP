
<?php
print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['expert_id'];
	$title=$_REQUEST['title'];
	$details=$_REQUEST['details'];
	$date=$_REQUEST['date'];
	$status=$_REQUEST['status'];
	$location=$_REQUEST['location'];
	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `expert_lecture` SET `title`='".$title."',`details`='".$details."',`date`='".$date."',`location`='".$location."',`status`='".$status."' WHERE `expert_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=expert_lecture_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}
					break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `expert_lecture` WHERE `expert_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=expert_lecture_list');
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
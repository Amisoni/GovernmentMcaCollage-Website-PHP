
<?php
print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['award_id'];
	$title=$_REQUEST['title'];
	$year=$_REQUEST['year'];
	$details=$_REQUEST['details'];
	$status=$_REQUEST['status'];
	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `award` SET `title`='".$title."',`year`='".$year."',`details`='".$details."',`status`='".$status."' WHERE `award_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=award_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}
					break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `award` WHERE `award_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=award_list');
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
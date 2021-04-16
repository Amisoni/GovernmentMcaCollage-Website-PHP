
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['course_id'];
	$course_type=$_REQUEST['course_type'];
	$details=$_REQUEST['details'];
	$status=$_REQUEST['status'];
	switch ($action)
	{
					case 'update':
					$update="UPDATE `course_taught` SET `course_type`='".$course_type."',`details`='".$details."',`status`='".$status."' WHERE `course_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=course_taught_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}
					break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `course_taught` WHERE `course_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=course_taught_list');
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
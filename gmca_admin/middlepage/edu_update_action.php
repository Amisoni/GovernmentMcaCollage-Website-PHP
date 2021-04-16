
<?php
print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['edu_id'];
	$degree=$_REQUEST['degree'];
	$university=$_REQUEST['university'];
	$cgpi=$_REQUEST['cgpi'];
	$year=$_REQUEST['year'];
	$status=$_REQUEST['status'];
	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `edu_qualification` SET `degree`='".$degree."',`university`='".$university."',`cgpi`='".$cgpi."',`year`='".$year."',`status`='".$status."' WHERE `edu_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=edu_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}
					break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `edu_qualification` WHERE `edu_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=edu_list');
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
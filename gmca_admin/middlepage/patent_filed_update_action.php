
<?php
print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['patent_id'];
	$details=$_REQUEST['details'];
	$status=$_REQUEST['status'];

	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `patent_filed` SET `details`='".$details."',`status`='".$status."' WHERE `patent_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=patent_filed_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}
					break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `patent_filed` WHERE `patent_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=patent_filed_list');
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
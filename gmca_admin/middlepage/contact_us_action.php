
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['contact_id'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$message=$_REQUEST['message'];
	$contact_no=$_REQUEST['contact_no'];
	switch ($action)
	 {
			
			case 'delete':
					echo $id=$_REQUEST['id'];
			//echo "delete action run";
						echo $del="DELETE FROM `contact_us` WHERE `contact_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home.php?page=contact_us_list');
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
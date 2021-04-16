
<?php
// print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['feedback_id'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$message=$_REQUEST['message'];
	switch ($action)
	 {
			
			case 'delete':
					echo $id=$_REQUEST['id'];
			//echo "delete action run";
						echo $del="DELETE FROM `feedback` WHERE `feedback_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home.php?page=feedback_list');
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
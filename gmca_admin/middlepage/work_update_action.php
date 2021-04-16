
<?php
print_r($_FILES);

	$action=$_REQUEST['action'];
	$id=$_REQUEST['w_id'];
	$work=$_REQUEST['work'];
	$from=$_REQUEST['from'];
	$to=$_REQUEST['to'];
	$status=$_REQUEST['status'];

	switch ($action)
	{
					case 'update':
					echo $update="UPDATE `work_exp` SET `work`='".$work."',`from`='".$from."',`to`='".$to."',`status`='".$status."' WHERE `w_id`='".$id."'  ";
					$qry=mysqli_query($con,$update);
					if($qry)
					{
						header("location:home2.php?page=work_list");
						//echo "Update okko";
					}else
					{
						echo "Update Not";	
					}

	                break;

	                case 'delete':
					$id=$_REQUEST['id'];
						$del="DELETE FROM `work_exp` WHERE `w_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($qry)
						{
							header('location:home2.php?page=work_list');
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
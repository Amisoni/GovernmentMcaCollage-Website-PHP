
<?php
// print_r($_FILES);

		$action=$_REQUEST['action'];
		$id=$_REQUEST['id'];
		$image=$_REQUEST['image'];
		switch ($action)
	 {
			case 'delete':
						$del="DELETE FROM `gallery` WHERE `g_id`='".$id."' ";
						$qry=mysqli_query($con,$del);
						if($image!='')
						{
							$image="assets/img/gallery/".$image;
							unlink($image);
						}
						if($qry)
						{
							header('location:home.php?page=gallery_list');
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
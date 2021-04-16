<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
        include('includes/config1.php');

        $action=$_REQUEST['action'];
        $reg_id = $_REQUEST['reg_id'];
        $title = $_POST['title'];
        $organizer = $_POST['organizer'];
        $duration = $_POST['duration'];



    foreach($title AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `training_workshop` (`reg_id`,`title`,`organizer`,`duration`)
            VALUES ('".$mysqli->real_escape_string($reg_id [$key])."',
            '".$mysqli->real_escape_string($value)."',
            '".$mysqli->real_escape_string($organizer [$key])."',
            '".$mysqli->real_escape_string($duration [$key])."')
            ";

            $insert = $mysqli->query($query);

            if(!$insert)
            {
            	echo "not";
            }else
            {
            	//echo "okok";
                header("location:home2.php?page=training_workshop_list");
           	}

                break;
            
        default:
            echo "Error ";
            break;
     }
        }


        $mysqli->close();
 }
 ?>
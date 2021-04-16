<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
        include('includes/config1.php');

        $action=$_REQUEST['action'];
        $reg_id = $_REQUEST['reg_id'];
        $title = $_POST['title'];
        $details = $_POST['details'];
        $date = $_POST['date'];
        $location = $_POST['location'];



    foreach($title AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `expert_lecture` (`reg_id`,`title`,`details`,`date`,`location`)
            VALUES ('".$mysqli->real_escape_string($reg_id [$key])."',
            '".$mysqli->real_escape_string($value)."',
            '".$mysqli->real_escape_string($details [$key])."',
            '".$mysqli->real_escape_string($date [$key])."',
            '".$mysqli->real_escape_string($location [$key])."')
            ";

            $insert = $mysqli->query($query);

            if(!$insert)
            {
            	echo "not";
            }else
            {
            	//echo "okok";
                header("location:home2.php?page=expert_lecture_list");
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
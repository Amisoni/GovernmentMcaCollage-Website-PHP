<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
        include('includes/config1.php');

        $action=$_REQUEST['action'];
        $reg_id = $_REQUEST['reg_id'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $details = $_POST['details'];



    foreach($title AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `award` (`reg_id`,`title`,`year`,`details`)
            VALUES ('".$mysqli->real_escape_string($reg_id [$key])."',
            '".$mysqli->real_escape_string($value)."',
            '".$mysqli->real_escape_string($year [$key])."',
            '".$mysqli->real_escape_string($details [$key])."')
            ";

            $insert = $mysqli->query($query);

            if(!$insert)
            {
            	echo "not";
            }else
            {
            	//echo "okok";
                header("location:home2.php?page=award_list");
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
<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
        include('includes/config1.php');

        $action=$_REQUEST['action'];
        $reg_id = $_REQUEST['reg_id'];
        $skill_dtls = $_POST['skill_dtls'];



    foreach($skill_dtls AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `skills_knowledge` (`reg_id`,`skill_dtls`)
            VALUES ('".$mysqli->real_escape_string($reg_id [$key])."',
            '".$mysqli->real_escape_string($value)."')
            ";

            $insert = $mysqli->query($query);

            if(!$insert)
            {
            	echo "not";
            }else
            {
            	//echo "okok";
                header("location:home2.php?page=skill_list");
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
<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
        include('includes/config1.php');

        $action=$_REQUEST['action'];
        $reg_id = $_REQUEST['reg_id'];
        $course_type = $_POST['course_type'];
        $details = $_POST['details'];



    foreach($details AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `course_taught` (`reg_id`,`course_type`,`details`)
            VALUES ('".$mysqli->real_escape_string($reg_id [$key])."',
            '".$mysqli->real_escape_string($course_type [$key])."',
            '".$mysqli->real_escape_string($value)."')
            ";

            $insert = $mysqli->query($query);

            if(!$insert)
            {
            	echo "not";
            }else
            {
            	//echo "okok";
                header("location:home2.php?page=course_taught_list");
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
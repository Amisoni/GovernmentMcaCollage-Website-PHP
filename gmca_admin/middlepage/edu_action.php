<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
        include('includes/config1.php');

        $action=$_REQUEST['action'];
        $reg_id = $_REQUEST['reg_id'];
        $degree = $_REQUEST['degree'];
        $university = $_REQUEST['university'];
        $cgpi = $_REQUEST['cgpi'];
        $year = $_REQUEST['year'];



    foreach($degree AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `edu_qualification` (`reg_id`,`degree`,`university`,`cgpi`,`year`)
            VALUES ('".$mysqli->real_escape_string($reg_id [$key])."',
            '".$mysqli->real_escape_string($value)."',
            '".$mysqli->real_escape_string($university [$key])."',
            '".$mysqli->real_escape_string($cgpi [$key])."',
            '".$mysqli->real_escape_string($year [$key])."')
            ";

            $insert = $mysqli->query($query);

            if(!$insert)
            {
                echo "not";
            }else
            {
                //echo "okok";
                header("location:home2.php?page=edu_list");
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
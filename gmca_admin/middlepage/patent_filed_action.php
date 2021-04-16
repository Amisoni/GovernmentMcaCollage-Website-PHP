<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
        include('includes/config1.php');

        $action=$_REQUEST['action'];
        $reg_id = $_REQUEST['reg_id'];
        $details = $_POST['details'];



    foreach($details AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `patent_filed` (`reg_id`,`details`)
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
                header("location:home2.php?page=patent_filed_list");
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
<?php
//placeholder
 $output = NULL;

 if(isset($_POST['submit'])){
        //connect db
    include('includes/config1.php');
        $action=$_REQUEST['action'];
        $id=$_REQUEST['w_id'];
        $reg_id = $_REQUEST['reg_id'];
        $work = $_POST['work'];
        $from = $_POST['from'];
        $to = $_POST['to'];



    foreach($work AS $key => $value){
    switch ($action)
     {
        case 'insert':
            $query ="INSERT INTO `work_exp` (`reg_id`,`work`,`from`,`to`)
            VALUES ('".$mysqli->real_escape_string($reg_id [$key])."',
            '".$mysqli->real_escape_string($value)."',
            '".$mysqli->real_escape_string($from [$key])."',
            '".$mysqli->real_escape_string($to [$key])."')
            ";

            $insert = $mysqli->query($query);

            if(!$insert)
            {
            	echo "not";
            }else
            {
            	//echo "okok";
                header("location:home2.php?page=work_list");
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
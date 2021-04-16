<?php

include 'config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$contact_no = $_POST['contact_no'];
$query = "INSERT INTO `contact_us`(`name`, `message`, `email`, `contact_no`) VALUES ('" . $name . "','" . $message . "','" . $email . "','" . $contact_no . "')";

$result = mysqli_query($con, $query);
//echo $query;  
if (!$result) {
    $flag = FALSE;
die('invalid query');
} else {
    
}
mysqli_close($con);
?>


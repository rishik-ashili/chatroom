<?php
// this will take all parameters and post them on server
// connecting to the database
include 'db_connect.php';

// $msg = $_POST['text'];
$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];
// post variable is used to post it onto the database 
$sql ="INSERT INTO `msgs` ( `msg`, `room`, `ip`, `stime`) VALUES ( '$msg', '$room', '$ip', current_timestamp());";
mysqli_query($conn,$sql);
//this will start our jquery

//closes the connection

?>
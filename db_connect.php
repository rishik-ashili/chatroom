<?php
$servername ="localhost";
$username = "root";  // replace with your username
$password = "";   // replace with your password
$database="chatroom";       // replace with your database name
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
#this will return true or false on basis of connection request
// Check connection
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
    //this will display if connection is failed
 }
 // now we will check if similar name room exists or not then allot room


?>
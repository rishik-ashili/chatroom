<?php
$room = $_POST['room'];
#the variable whih we have created here room , this is used from the form input
if (strlen($room)>20 or strlen($room)<2) {
    $message = 'Please choose a name between 2 to 20 characters';
    #this code is used to check the length of the room name entered
    echo '<script language="javascript">';
    #this specifies that we are using js 
    echo 'alert(" '.$message.'");';
    #we use this dot that is catenation operator to use php variables inside js 
    #we are alerting the defined message
    #now we wil specify where to alert
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
    #script tag closed

}
else if (!ctype_alnum($room)) {
    #this case is that if ctype_alnum that is if the type of room is not alphanumeric then this case
    $message = 'Please choose a alphanumeric room name';
    echo '<script language="javascript">';
    echo 'alert(" '.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
    
}

else {
    #when both problems are met then we will come to this case
    #then we will connect  with database
    include 'db_connect.php';
    #everything from this page will be forwarded to the above  file db_connect.php
}




$sql = "SELECT * FROM `rooms` WHERE roomname ='$room'";
// this will select values from our database table rooms and check with room variable   
$result = mysqli_query($conn, $sql);
// this variable stores the name of current room
if ($result) {
    if (mysqli_num_rows($result)> 0) {
        // this checks if number of rows are present or not
        $message = 'Please choose a different room name. This name is already claimed ';
        echo '<script language="javascript">';
        echo 'alert(" '.$message.'");';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
        
    } 
    else {
        #if no such room found in the database then it will go inside here
        $sql= "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ( '$room', current_timestamp());";
        // we have removed sno as it would be auto updated
        if (mysqli_query($conn,$sql)) {
            $message = 'Your room is ready and you can now chat ';
        echo '<script language="javascript">';
        echo 'alert(" '.$message.'");';
        echo 'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
        // in this last url we have used room variabble to take the room name and keep the link dynamic , so that different 
        //rooms can be made 
        echo '</script>';
        }
    }

}
else{
    echo "Error : ".mysqli_error($conn);
}


?>


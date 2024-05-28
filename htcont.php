<?php
//connecting to database
include 'db_connect.php';
$room =$_POST['room'];
$sql ="SELECT msg, stime, ip FROM msgs WHERE room='$room'";
$res =" ";
$result=mysqli_query($conn,$sql);
// this stores the query created
if (mysqli_num_rows($result)>0) {
    // if query exists then number of rows >0
    while($row = mysqli_fetch_assoc( $result))  {
        // $row becomes an array and helps to access all rows of database
        $res =  $res.'<div class ="container1">';
        $res =  $res.$row['ip'];
        $res =  $res." says <p>".$row['msg'];

// TO GIVE USER NAME , TAKE INPUT FROM USER THEN  STORE IT INTO DATABASE
// REPLACE IT IN ABOVE CODE AT says.



        $res =  $res.'</p> <span class ="time-right">'.$row["stime"].'</span></div>';
        //we have generated a big html file inside our res in above lines and we fit this inside rooms 
    }
    # code...
}
echo $res;

?>
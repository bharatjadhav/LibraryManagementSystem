<?php 
include "connection.php";
//include "allmember.php";
  echo $id = $_GET['l_id'];
$sql = ("UPDATE `libsineup` SET `status` = 'no' WHERE `l_id` = $id;");
if(!mysqli_query($conn,$sql)) {
    echo "Error: Could not save the data to mysql database. Please try again.";

die(mysqli_error());
}
else
{ 
    header('Location: alllibribrian.php');    
}
?>
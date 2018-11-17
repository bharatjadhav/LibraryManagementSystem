<?php 
include "connection.php";
//include "allmember.php";
  echo $id = $_GET['id'];
$sql = ("UPDATE `sineup` SET `status` = 'no' WHERE `id` = $id;");
if(!mysqli_query($conn,$sql)) {
    echo "Error: Could not save the data to mysql database. Please try again.";

die(mysqli_error());
}
else
{ 
    header('Location: allmember.php');    
}
?>
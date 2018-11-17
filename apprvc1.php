<?php session_start();
include "connection.php";
//include "allmember.php";
  echo $id = $_GET['c_id'];
$sql = ("UPDATE `ctagery` SET `status` = 'yes' WHERE `id` = $id;");
if(!mysqli_query($conn,$sql)) {
    echo "Error: Could not save the data to mysql database. Please try again.";

die(mysqli_error());
}
else
{ 
    header('Location: addcategery.php');    
}
?>
<?php 
include "connection.php";
//include "allmember.php";
  echo $id = $_GET['l_id'];
  echo  $mid = $_GET['mid'];
   echo $issueid = $_GET['issueid'];
  echo  $cal2 = $_GET['cal2'];
   



   $sql2 ="SELECT * FROM `add_book` WHERE `bookid` ='$id' "; 
   $result2= mysqli_query($conn, $sql2);
   $row1 = mysqli_fetch_array ($result2);
   $availablebook = $row1["availablebook"];
   //echo $availablebook =  $availablebook - 1;

   $availablebook1 =  $availablebook + 1;
   $tdate = date("Y-m-d");
 
  echo $availablebook1;//UPDATE `add_book` SET `availablebook` = '36254' WHERE `add_book`.`bookid` = 22;
$sql1 = "UPDATE `add_book` SET `availablebook` = '$availablebook1 '  WHERE `bookid` = '$id' ";
if(!mysqli_query($conn,$sql1)) { echo "Error: Could not save the data to mysql database. Please try again.";

 die(mysqli_error());
   }  $sql = ("UPDATE `issuebook` SET `returndate` = '$tdate', `status` = 'return',`fine` = ' $cal2' WHERE `id` = '$issueid'  AND `memberid` = '$mid'  AND `bookid` = '$id';");
if(!mysqli_query($conn,$sql)) {
    echo "Error: Could not save the data to mysql database. Please try again.";

die(mysqli_error());
}
else
{ 
header('Location:issuebook.php');    
}
?>
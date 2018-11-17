<?php
 require_once("connection.php") ;
 session_start();
if(isset($_POST['submit']))
 { //password is equal
   if ($_POST['Password']==$_POST['ConfirmPassword'])
   {
    $libranid = $_SESSION["ls"]; 
    $Password = md5($_POST['Password']);   
$sql="UPDATE `libsineup` SET `password` = '$Password' WHERE md5(`l_id`) = '$libranid'";


if(!mysqli_query($conn,$sql)) {
    echo "Error: Could not save the data to mysql database. Please try again.";

die(mysqli_error());
}
else
{ 
 echo "<script>alert('password is change Sucessfully')</script>";
 ?>
 <script> window.location="homepa.html"; </script>
 
 <?php       
}

   }
   }





   ?>
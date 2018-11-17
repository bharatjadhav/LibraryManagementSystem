<?php 
session_start();

require_once("connection.php"); 
if(!isset($_SESSION["lsineup"] ))
{
    ?>
    <script> window.location="homepa.html"; </script>
    
    <?php
}
        
?>
<html>
  <link rel="stylesheet" href="style\index.css">
<title>Change password
</title>

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}
</script>

        <div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>
        
</div>


<?php 
 $libranid = $_SESSION['lsineup']; 
$sql = "SELECT * FROM `libsineup` WHERE `username` = '$libranid' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
    echo $row["l_id"];
    echo $row["lname"];

?>

<div id="navbar">

   <div class="dropdown">
    <button class="dropbtn">book
    
    </button>
    <div class="dropdown-content">
    <a href="addbook.php">Add Book</a>

<a href="addcategery.php">category</a>
<a href="issuebook.php">Issue Book</a>
<a href="allbook.php">All Book</a>

    </div>
  </div> 
  
  <div class="dropdown">
    <button class="dropbtn">member
    
    </button>
    <div class="dropdown-content">
    <a href="allmember.php">All Member profile</a>
    
    <a href="allissuedbook.php">All Issue book</a>
    <a href="allreturnbook.php">All Return Book</a>
    </div>
  </div> 


  <div class="dropdown">
  <button class="dropbtn">
  <?php    
  
    echo $row["lname"]; ?>  </button>
    <div class="dropdown-content">
    <a href="changepasslibrian.php">change password</a>
    <a href="librianprofile.php">My profile 
    <div class="grid">
    
    
<?php echo '<img style=" border-radius: 90px;" height=50px; width=80px; src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/>';  ?>    


        </div></a>
        <button onclick="window.location.href='logoutl.php'" class="re" style="float:right; width:25%">Logout</button>
    

    </div>
  </div> 








  <div   style="float:right; color:#cfcfcf;">
  <script   language="javascript">
     
    
        var date=new Date();
      document.write(date);
 
</script>  


</div>
</div>
<div class="main">

<body>
<div class="back">
            <video height="100%" width="100%" autoplay="true" loop="loop" muted>
                <source src="" type="video/mp4">

            </video>
        </div>

    



<div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>   

    <center>
        <font>       
        <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
 <div class="bg">Change password</div>
                <label>Current Password<sup>*</sup></label>
                <input type="password" placeholder="Enter Current  Password" name="Password"required><br>

                <label>New Password<sup>*</sup></label>
                <input type="password" placeholder="Enter New Password" name="NPassword"required><br>
                <label>Confirm New Password<sup>*</sup></label>
                <input type="password" placeholder="Confirm new Password" name="ConfirmPassword"required><br>


        <button name="submit" style="width:auto;" type="submit"><font>Change password</font></button>
    </center>
</form>





</body>

</html>
<?php

if(isset($_POST['submit']))
 { //password is equal
   if ($_POST['NPassword']==$_POST['ConfirmPassword'])
   {
    echo $libranid = $_SESSION["lsineup"]; 
    $cPassword = md5($_POST['Password']); 
    $Password = md5($_POST['ConfirmPassword']); 

$sql="UPDATE `libsineup` SET `password` = '$Password' WHERE `username` = '$libranid' AND `password` = '$cPassword'";


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
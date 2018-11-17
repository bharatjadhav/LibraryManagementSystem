
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
    <title>librian profile</title>
  <link rel="stylesheet" href="style\index.css">



        <div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>

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

  

<?php 
 $libranid = $_SESSION['lsineup']; 
$sql = "SELECT * FROM `libsineup` WHERE `username` = '$libranid' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
     $row["l_id"];
   $row["lname"];

?>




<div class="bg">Personal Details</div>
 
<div class="grid">
<?php echo '<img  class="imgprofil" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/>';  ?>    


        </div>
<table class="poftd">
                <tr> <th class="the">Member ID*</th>
                    <td class="tde" ><?php  echo $row["l_id"]; ?></td>
                   </tr>
               
                   <tr> <th class="the">Name</th>
                    <td class="tde"><?php  echo $row["lname"]; ?></td>
                   </tr>
               
                   <tr> <th class="the" >Date of Birth</th>
                    <td class="tde"><?php  echo $row["date of birth"]; ?></td>
                   </tr>
               
                   <tr> <th class="the">Gender</th>
                    <td class="tde"><?php  echo $row["gender"]; ?></td>
                   </tr>
                   <tr> <th class="the">Mobile Number</th>
                    <td class="tde"><?php  echo $row["phoneno"]; ?></td>
                   </tr>
               
                   <tr> <th class="the">Email</th>
                    <td class="tde"><?php  echo $row["email"]; ?></td>
                   </tr>
               
                   <tr> <th class="the">Address</th>
                    <td class="tde"><?php  echo $row["address"]; ?></td>
                   </tr>
               
                   <tr> <th class="the">City</th>
                    <td class="tde"><?php  echo $row["city"]; ?></td>
                   </tr>
               
                   <tr> <th class="the">State</th>
                    <td class="tde"><?php  echo $row["state"]; ?></td>
                   </tr>
               
                   <tr> <th class="the">Country</th>
                    <td class="tde"><?php  echo $row["country"]; ?></td>
                   </tr>
               
               </table>
        </div>
       
        <div class="clear">
        </div>
    
      
    </center>

</form>

 </font>
</body>

</html>
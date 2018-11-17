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
    <title>category Add</title>
  <link rel="stylesheet" href="style\index.css">
  <link rel="icon" href="book.jpg" type="image/x-icon">

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

<div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>   
 <font>   
    <center>             <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

            
            <div class="bg"> Add Book Category  </div>
        <label>Book Category</label>
        <input type="text" placeholder="Enter Category" name="Category" style=" text-transform :uppercase" required>
       
        <br><button type="submit" name="submit">Add</button>
    <?php
$sql = "SELECT * FROM `ctagery`";
$result = mysqli_query($conn, $sql);
    
      echo "          
 <table style='width:100%' >
       <tr class='tbl-header'>         
           
            <th>Categoryr Name</th>
            <th>Status</th>
           
            <th>Action</th>  
                

              </div></tr>"; while($row = mysqli_fetch_array($result) )
              {
             echo "<tr class='tbl-content'>
              
            <td>";echo $row["c_name"]; echo "</td>
            <td>";echo $row["status"];echo"</td>";
            //<td><button style='width:50%;    height: 70%;' class='re'>Edit </button><button style='width:50%; height:70%; 'class='re'>Delete</button></td>           
           echo "<td><a href='apprvc1.php?c_id=";echo $row["id"];echo"'>Approve </a><br> <a href='notapprvc1.php?c_id=";echo $row["id"];echo"'>Not Approve </a> </td>";
              }
            
                     echo "</table>";
                     ?> 
    
    
    
    
    
    
    
    
    
    
    
    </center>
</form>

 </font>
 </div>
   
</body>

</html>
<?php



        
if(isset($_POST['submit']))
 { //password is equal
   

       $name = $_POST['Category'];
      
       

       echo $name; 







       
     
     //$sql="INSERT INTO `sineup`(`l_id`, `mbname`, `date_of_birth`, `gender`, `phone no.`, `email`, `address`, `city`, `state`, `country`, `upload_img`, `username`, `password`) VALUES ('','$name','$dateofbirth','$gender','$mobilenumber','$email','$Address','$City','$State','$Country','$content','$Username','$Password')";
   //$sql="INSERT INTO `libsineup` (`l_id`, `lname`, `date of birth`, `gender`, `phoneno`, `email`, `address`, `city`, `state`, `country`,`upload_img`, `username`, `password`) VALUES ('','$name','$dateofbirth','$gender','$mobilenumber','$email','$Address','$City','$State','$Country','$content','$Username','$Password')";
   $sql="INSERT INTO `ctagery` (`id`, `c_name`, `status`) VALUES (NULL, '$name', 'no')";
   if(!mysqli_query($conn,$sql)) {
       echo "Error: Could not save the data to mysql database. Please try again.";

 die(mysqli_error());

   }
   else 
   {
    echo '<script type="text/javascript"> window.location = "addcategery.php" </script>';
   }



 }

?>
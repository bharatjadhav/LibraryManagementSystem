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
    <title> Member info</title>
  <link rel="stylesheet" href="style\index.css">

<body>
    <style>th,tr,table,td{
    border: 4px solid black;

}
</style>


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
  <center><div class="bg"> Member info</div>
       <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

       <input  placeholder="Member ID/Name" type="text"  name="txtsearch">
        
        
        <button type="submit" name="search">Search</button><br>
    
    </center><br><br>
<?php 
         
          if(isset($_POST['search'])){
            $txtsearch = mysqli_real_escape_string($conn,$_POST['txtsearch']);
           // echo  $txtsearch = $_POST['txtsearch']; 
           
           //$sql = "SELECT * FROM `sineup` WHERE `id` = $txtsearch";
           $sql ="SELECT * FROM `sineup` WHERE `mbname` LIKE '$txtsearch%' "; 
           $result1 = mysqli_query($conn, $sql);
           $result2 = mysqli_query($conn, $sql);

            echo "<table style='width:100%;  border: 1px solid black;'><tr class='tbl-header'>         
            <th>Member id</th>
            <th>Photo</th>
            <th>member name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
             <th>Email</th>
             <th>Mobile No.</th>
             <th>Address</th>
             <th>Status</th>
             
             <th>Action</th>           
                 
             </tr>";//|| $row = mysqli_fetch_array ($result2)
             while($row = mysqli_fetch_array ($result1) )
             {
            
 echo "<tr class='tbl-content'>
                    <td>"; echo $row["id"];echo"</td>
            <td><div  class='grid'>";
            echo '<img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/>';  
                                  /*<img  style='border-color:slategray;box-shadow: 9px 5px 5px initial;   margin: 1px;width: 100px;  hight:100px; ' id='imglist' class='photo' src='.jpg'>
                         ";$image = $rows['upload_img'];    
                         print $image;*/echo"  </div></td>  
            <td>"; echo $row["mbname"];echo"<br></td>
            <td>"; echo $row["date_of_birth"];echo"<br></td>
            <td>"; echo $row["gender"];echo"</td>
             <td>"; echo $row["email"];echo"<br></td>
             <td>"; echo $row["phone no."];echo"<br></td>
             <td>"; echo $row["address"];echo'<br>'; echo $row["city"];echo'<br>';echo $row["state"];echo'<br>';echo $row["country"];  echo"<br></td>
             <td>"; echo $row["status"];echo"<br></td>
             <td><a href='apprv.php?id=";echo $row["id"];echo"'>Approve </a><br> <a href='notapprv.php?id=";echo $row["id"];echo"'>Not Approve </a> </td>";
             //<td><button style='width:50px;    height: 50px;' class='re'  ahref='addbook.php'>Approve </button><button style='width:50px; height:30px; ' class='re'>Approve</button></td>           
                 
        
             
                echo"    </tr>  
            ";
                    
                    }


            
                      
                      echo "</table>";


          }
          else
          {
$sql = "SELECT * FROM `sineup`";
$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result);
//print_r ($row); //|| $rows=mysqli_fetch_assoc($result)
    
   echo "<table style='width:100%;  border: 1px solid black;'><tr class='tbl-header'>         
                <th>Member id</th>
                <th>Photo</th>
                <th>member name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                 <th>Email</th>
                 <th>Mobile No.</th>
                 <th>Address</th>
                 <th>Status</th>
                 
                 <th>Action</th>           
                     
                 </tr>";
                 while($row = mysqli_fetch_array($result) )
                 {
                
     echo "<tr class='tbl-content'>
                        <td>"; echo $row["id"];echo"</td>
                <td><div  class='grid'>";
                echo '<img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/>';  
                                      /*<img  style='border-color:slategray;box-shadow: 9px 5px 5px initial;   margin: 1px;width: 100px;  hight:100px; ' id='imglist' class='photo' src='.jpg'>
                             ";$image = $rows['upload_img'];    
                             print $image;*/echo"  </div></td>  
                <td>"; echo $row["mbname"];echo"<br></td>
                <td>"; echo $row["date_of_birth"];echo"<br></td>
                <td>"; echo $row["gender"];echo"</td>
                 <td>"; echo $row["email"];echo"<br></td>
                 <td>"; echo $row["phone no."];echo"<br></td>
                 <td>"; echo $row["address"];echo'<br>'; echo $row["city"];echo'<br>';echo $row["state"];echo'<br>';echo $row["country"];  echo"<br></td>
                 <td>"; echo $row["status"];echo"<br></td>
                 <td><a href='apprv.php?id=";echo $row["id"];echo"'>Approve </a><br> <a href='notapprv.php?id=";echo $row["id"];echo"'>Not Approve </a> </td>";
                 //<td><button style='width:50px;    height: 50px;' class='re'  ahref='addbook.php'>Approve </button><button style='width:50px; height:30px; ' class='re'>Approve</button></td>           
                     
            
                 
                    echo"    </tr>  
                ";
                        
                        }
                
                          
                          echo "</table>";
                    }

?>
</div>
</form></body>
                          </html>        
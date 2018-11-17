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
    <title>All Book issued </title>
    <style>th,tr,table,td{
    border: 4px solid black;

}</style>
  <link rel="stylesheet" href="style\index.css">



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
    <center>
       <div class="bg">All Book issued</div>
    </center>
</form>
<br>
<table style="width:100%">
        <tbody><tr class="tbl-header">  
        <th>issueid</th>       
            <th>Member id</th>
            <th>member photo</th>
            <th>member name</th>
             <th>Book ID</th>
             <th>book  photo</th> 
            
             <th>Book name</th>
             <th>Title</th>
             <th>Author</th>
             <th>publisher</th>
             <th>Issue Date</th>
             
             <th>Expiry Date</th>           
             <th>Fine</th> 
             <th> 	status </th>    
             </tr>
 <?php


$sql ="SELECT * FROM `issuebook` WHERE `status` = 'issue' "; 
$result1 = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array ($result1) )
{
    $mid = $row["memberid"];
    $sql3 ="SELECT * FROM `sineup` WHERE `id` ='$mid' "; 
    $result3= mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array ($result3);
    $mbname = $row3["mbname"];
    
    //-------------------------------------------------------
    $bid = $row["bookid"];
    $sql2 ="SELECT * FROM `add_book` WHERE `bookid` ='$bid' "; 
    $result2= mysqli_query($conn, $sql2);
    $row1 = mysqli_fetch_array ($result2);
    $title = $row1["title"];
    $author = $row1["author"];
    
    $bookname  = $row1["book_name"];
    $publisher  = $row1["publisher"];

           echo "  <tr class='tbl-content'>";
           echo" <td>"; echo $row["id"];echo "</td>";
           echo" <td>"; echo $row["memberid"];echo "</td>
           <td> ";                       echo '<img  class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row3['upload_img'] ).'"/>'; echo " </td>
                    <td>  $mbname</td>";
                    echo" <td>"; echo $row["bookid"];echo "</td>";
                    echo "<td><div class='grid'>";
                 
                    echo '<img  class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row1['coverimg'] ).'"/>';  

                           echo "</div></td>";
                           echo" <td>"; echo  $bookname;echo "</td>";
                    echo" <td>"; echo  $title;echo "</td>";
               echo" <td>"; echo  $author;echo "</td>";
               echo "<td>"; echo  $publisher;echo "</td>";
             echo "<td>"; echo $exp = $row["issuedate"];echo "</td>";
             echo "<td>";  echo  $row["expteddate"];echo "</td>";
                  
              
          $date2=date_create($exp);
          $date1=date_create(date('Y-m-d'));
          $diff=date_diff($date2,$date1);
          $cal  = $diff->days;
          $cal2 = $cal - 7;  
          $issueid = $row["id"];    
                      echo "<td> $cal2</td>    ";
                      echo "<td>";  echo  $row["status"];echo "</td>";
             
                     echo " </tr>";
                      
                      
}?></tbody></table>
</body>
</div>
</html>
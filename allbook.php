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
    <title> all book</title>
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
    <style>th,tr,table,td{
    border: 4px solid black;

}
</style>


        <div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>
    <center>
       <div class="bg"> All Book</div>
       <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

       <input  placeholder="Search Book" type="text"  name="txtsearch"><br>
        
          
       
       <select name='category'> 
       <option value="book_name"> book_name</option>
       <option value="publisher"> publisher</option>
       <option value="author"> author</option>
       <option value="book_catagoary"> catagoary</option>
       <option value="edition_year"> edition_year</option>
       <option value="status"> status</option>
       </select>
 
    
        <button type="submit" name="search">Search</button><br>
    
<?php 
         
          if(isset($_POST['search'])){
           $book = $_POST['category'];
            $txtsearch = mysqli_real_escape_string($conn,$_POST['txtsearch']);
           // echo  $txtsearch = $_POST['txtsearch']; 
           
           //$sql = "SELECT * FROM `libsineup` WHERE `id` = $txtsearch";
    echo "</center><br><br>";
           $sql ="SELECT * FROM `add_book` WHERE `$book` LIKE  '%$txtsearch%' "; 
           $result1 = mysqli_query($conn, $sql);
           //$result2 = mysqli_query($conn, $sql);

           echo "<table style='width:100%;  border: 1px solid black;'><tr class='tbl-header'>         
           <th>Book id</th>
           <th>Photo</th>
           <th>Book name</th>
           <th>ISBN no</th>
           <th>Title</th>
            <th>author </th>
            <th>edition</th>
            <th>  book catagoary </th>
            <th> edition year </th>
            <th> number of Book </th> 
            <th> Available Book  </th> 
             <th> publisher </th>
             <th> sereis  </th>
             <th> price </th>
            <th>Status</th>
            
            <th>Action</th>           
                
            </tr>";
            while($row = mysqli_fetch_array($result1) )
            {
           
echo "<tr class='tbl-content'>
                   <td>"; echo $row["bookid"];echo"</td>
           <td><div  class='grid'>";
           echo '<img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['coverimg'] ).'"/>';  
                                 /*<img  style='border-color:slategray;box-shadow: 9px 5px 5px initial;   margin: 1px;width: 100px;  hight:100px; ' id='imglist' class='photo' src='.jpg'>
                        ";$image = $rows['upload_img'];    
                        print $image;*/echo"  </div></td>  
           <td>"; echo $row["book_name"];echo"<br></td>
           <td>"; echo $row["isbn_no"];echo"<br></td>
           <td>"; echo $row["title"];echo"</td>
            <td>"; echo $row["author"];echo"<br></td>
            <td>"; echo $row["edition"];echo"<br></td>
            <td>"; echo $row["book_catagoary"];echo"<br></td>
            <td>"; echo $row["edition_year"];echo"<br></td>
            <td>"; echo $row["numberofcopy"];echo"<br></td> 
            <td>"; echo $row["availablebook"];echo"<br></td>
       <td>"; echo $row["publisher"];echo"<br></td>
            <td>"; echo $row["series"];echo"<br></td>
            <td>"; echo $row["price"];echo"<br></td>
            <td>"; echo $row["status"];echo"<br></td>
            <td><a href='app3.php?l_id=";echo $row["bookid"];echo"'>Approve </a><br> <a href='notapp3.php?l_id=";echo $row["bookid"];echo"'>Not Approve </a> </td>";
            //<td><button style='width:50px;    height: 50px;' class='re'  ahref='addbook.php'>Approve </button><button style='width:50px; height:30px; ' class='re'>Approve</button></td>           
                
       
            
               echo"    </tr>  
           ";
                   
                   }
           
                     
                     echo "</table>";


          }
          else
          {
            $sql = "SELECT * FROM `add_book`";$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result);
//print_r ($row); //|| $rows=mysqli_fetch_assoc($result)
    
   echo "<table style='width:100%;  border: 1px solid black;'><tr class='tbl-header'>         
                <th>Book id</th>
                <th>Photo</th>
                <th>Book name</th>
                <th>ISBN no</th>
                <th>Title</th>
                 <th>author </th>
                 <th>edition</th>
                 <th>  book catagoary </th>
                 <th> edition year </th>
                 <th> number of Book </th> 
                 <th> Available Book  </th> 
                  <th> publisher </th>
                  <th> sereis  </th>
                  <th> price </th>
                 <th>Status</th>
                 
                 <th>Action</th>           
                     
                 </tr>";
                 while($row = mysqli_fetch_array($result) )
                 {
                
     echo "<tr class='tbl-content'>
                        <td>"; echo $row["bookid"];echo"</td>
                <td><div  class='grid'>";
                echo '<img class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row['coverimg'] ).'"/>';  
                                      /*<img  style='border-color:slategray;box-shadow: 9px 5px 5px initial;   margin: 1px;width: 100px;  hight:100px; ' id='imglist' class='photo' src='.jpg'>
                             ";$image = $rows['upload_img'];    
                             print $image;*/echo"  </div></td>  
                <td>"; echo $row["book_name"];echo"<br></td>
                <td>"; echo $row["isbn_no"];echo"<br></td>
                <td>"; echo $row["title"];echo"</td>
                 <td>"; echo $row["author"];echo"<br></td>
                 <td>"; echo $row["edition"];echo"<br></td>
                 <td>"; echo $row["book_catagoary"];echo"<br></td>
                 <td>"; echo $row["edition_year"];echo"<br></td>
                 <td>"; echo $row["numberofcopy"];echo"<br></td>
                 <td>"; echo $row["availablebook"];echo"<br></td>
                 <td>"; echo $row["publisher"];echo"<br></td>
                 <td>"; echo $row["series"];echo"<br></td>
                 <td>"; echo $row["price"];echo"<br></td>
                 <td>"; echo $row["status"];echo"<br></td>
                 <td><a href='app3.php?l_id=";echo $row["bookid"];echo"'>Approve </a><br> <a href='notapp3.php?l_id=";echo $row["bookid"];echo"'>Not Approve </a> </td>";
                 //<td><button style='width:50px;    height: 50px;' class='re'  ahref='addbook.php'>Approve </button><button style='width:50px; height:30px; ' class='re'>Approve</button></td>           
                     
            
                 
                    echo"    </tr>  
                ";
                        
                        }
                
                          
                          echo "</table>";
                    }

?>

</form></body>
                          </html>        
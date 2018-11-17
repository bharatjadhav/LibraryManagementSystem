

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
<html><head>

    <title>Issue Book</title>

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
<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

<div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div> </div>  
 <div class="bg">Member Search     
   <br>  
  </div>
  <br>
  <input type="text" name="bb" placeholder="Member ID"   required>
  <input  type="text" width="70%" placeholder="Book id OR Book name" name="bookid">
      
     
        
    <button type="submit" name="ms" onclick="document.getElementByClassName('hidden').style.display='block'">Search</button><br></form>
    <div class="hidden" style="display: block;"><?php         
     if(isset($_POST['ms']))
     { //$bname = $_POST['bb'];
     // echo $bname;           
      $txtsearch = mysqli_real_escape_string($conn,$_POST['bb']);
      global $txtsearch;           

      $sql ="SELECT * FROM `sineup` WHERE `id` = '$txtsearch' ORDER BY `username` ASC  "; 
      $result1 = mysqli_query($conn, $sql);


      $row = mysqli_fetch_array ($result1);
       echo $memberid = $row["id"];
       $_SESSION["memberid"]=$memberid;
       echo $membername = $row["mbname"];
       $_SESSION["membername"]=$membername;
       echo $memberusername = $row["username"];
       $_SESSION["memberusername"]=$memberusername;
       echo $memberaddress = $row["address"];
       $_SESSION["memberaddress"]=$memberaddress;
       echo $memberphoneno = $row["phone no."];
       $_SESSION["memberphoneno"]=$memberphoneno;
       echo $memberemail = $row["email"];
       $_SESSION["memberemail"]=$memberemail;

       $txtsearch = mysqli_real_escape_string($conn,$_POST['bookid']);
       echo $txtsearch;           
 
       $sql2 ="SELECT * FROM `add_book` WHERE `bookid` ='$txtsearch' AND `status` LIKE 'yes' "; 
       $result2= mysqli_query($conn, $sql2);
 
 
       $row1 = mysqli_fetch_array ($result2);
      
     $bookid= $row1["bookid"];
      $_SESSION["bookid"]=$bookid;
       echo $bookname= $row1["book_name"];
       $_SESSION["bookname"]=$bookname;
       echo $isbnno= $row1["isbn_no"];
       $_SESSION["isbnno"]=$isbnno;
       echo $title= $row1["title"];
       $_SESSION["title"]=$title;
       echo $author= $row1["author"];
       $_SESSION["author"]=$author;
       
       echo $edition= $row1["edition"];
       $_SESSION["edition"]=$edition;
      $availablebook = $row1["availablebook"];
     echo $availablebook =  $availablebook - 1;
     $_SESSION["availablebook"]=$availablebook;
       echo $book_catagoary= $row1["book_catagoary"];
       $_SESSION["book_catagoary"]=$book_catagoary;
       echo $publisher= $row1["publisher"];
       $_SESSION["publisher"]=$publisher;
       echo $sereis= $row1["series"];
       $_SESSION["sereis"]=$sereis;
       echo $price= $row1["price"];
       $_SESSION["price"]=$price;
       

    // print_r ($row);
                   echo"       <div class='bg'>Member info</div> 
                          <br><br>
                     <div class='grid'>";
                        //<img id='imgprofil' class='photo' src=''>
                        echo '<img  class="imgprofil" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/>';  

                               echo "</div>
                      <table class='poftd'>
                      <tr> <th >Member ID</th>
                    <td >"; echo $row["id"];echo"</td>
                   </tr>
               
                   <tr> <th >Name</th>
                    <td >"; echo $row["mbname"];echo"</td>
                   </tr>
               
                   <tr> <th >Date of Birth</th>
                    <td >"; echo $row["date_of_birth"];echo"</td>
                   </tr>
               
                   <tr> <th >Gender</th>
                    <td >"; echo $row["gender"];echo"</td>
                   </tr>
               
                   <tr> <th >Mobile Number</th>
                    <td >"; echo $row["phone no."];echo"</td>
                   </tr>
               
                   <tr> <th >Email</th>
                    <td >"; echo $row["email"];echo"</td>
                   </tr>
               
                   <tr> <th >Address</th>
                    <td >"; echo $row["address"];echo"</td>
                   </tr>
</table>
<br><br>";

//==============================================================================================================================================================================================================


echo"       <div class='bg'>book info</div> 
<br><br>
<div class='grid'>";
//<img id='imgprofil' class='photo' src=''>
echo '<img style="width:175px; height:275px;" class="imgprofil" src="data:image/jpeg;base64,'.base64_encode( $row1['coverimg'] ).'"/>';  
     echo "</div>
<table class='poftd'>
<tr> <th >Book ID</th>
<td >"; echo $row1["bookid"];echo"</td>
</tr>

<tr> <th >book Name</th>
<td >"; echo $row1["book_name"];echo"</td>
</tr>

<tr> <th >ISBN NO</th>
<td >"; echo $row1["isbn_no"];echo"</td>
</tr>

<tr> <th >Title</th>
<td >"; echo $row1["title"];echo"</td>
</tr>

<tr> <th >author</th>
<td >"; echo $row1["author"];echo"</td>
</tr>

<tr> <th >edition</th>
<td >"; echo $row1["edition"];echo"</td>
</tr>


<tr> <th >book_catagoary</th>
<td >"; echo $row1["book_catagoary"];echo"</td>
</tr>
<tr> <th > edition_year </th>
<td >"; echo $row1["edition_year"];echo"</td>
</tr>
<tr> <th >numberofcopy</th>
<td >"; echo $row1["numberofcopy"];echo"</td>
</tr>
<tr> <th >available book</th>
<td >"; echo $row1["availablebook"];echo"</td>
</tr>
<tr> <th >publisher</th>
<td >"; echo $row1["publisher"];echo"</td>
</tr>
<tr> <th >sereis</th>
<td >"; echo $row1["series"];echo"</td>
</tr>
<tr> <th >price</th>
<td >"; echo $row1["price"];echo"</td>
</tr>
</table>
<br><br>";
     



//=============================================================================================

echo "<div class='bg'>Member Book Issued</div><br>
<br>
         
            
 <table style='width:100%;  border: 4px solid black;' >
       <tr style='border: 4px solid black;' class='tbl-header'>         
        <th>issueid</th>
        <th>book name </th>
        <th>coverimg</th>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>publisher</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>           
            <th>Fine</th>    
            <th>Return</th>  </div></tr>

          ";
            
                      echo  $memberid = $_SESSION['memberid']; 
                     // echo $bookid=$_SESSION['bookid'];


               $sql ="SELECT * FROM `issuebook` WHERE `memberid` = '$memberid'  AND `status` LIKE 'issue'  "; 
               $result1 = mysqli_query($conn, $sql);
               while($row = mysqli_fetch_array ($result1) )
{     echo "<tr class='tbl-content'>";
  $bid = $row["bookid"];
  $sql2 ="SELECT * FROM `add_book` WHERE `bookid` ='$bid' "; 
  $result2= mysqli_query($conn, $sql2);
  $row1 = mysqli_fetch_array ($result2);
  $title = $row1["title"];
  $author = $row1["author"];
  
  $bookname  = $row1["book_name"];
  $publisher  = $row1["publisher"];
            echo" <td>"; echo $row["id"];echo "</td>";
            echo" <td>"; echo  $bookname;echo "</td>";
            echo "<td><div class='grid'>";
                        
                        echo '<img  class="imgprf" src="data:image/jpeg;base64,'.base64_encode( $row1['coverimg'] ).'"/>';  

                               echo "</div></td>";
            echo" <td>"; echo $row["bookid"];echo "</td>";
            echo "<td>"; echo   $title ;echo "</td>";
            echo "<td>"; echo $author;echo "</td>"; 
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
            //echo "<td> $issueid</td>    ";


            echo "<td><a href='return.php?l_id=";echo $row["bookid"];echo"&mid=";echo $memberid;echo"&cal2=";echo $cal2;echo"&issueid=";echo $issueid;echo"&availablebook=";echo $availablebook;echo"'>Return </a></td>";
}
                        
                    echo " </table> </div>";


//=========================================================================================================================
                 echo '   <form  name="form" action="'; echo $_SERVER["PHP_SELF"];echo '" method="post" enctype="multipart/form-data">
                    <div class="hidden" >
                   <button  name="issuebook1">Issue Book</button>
                         <button id="b1" type="button"  class="cancelbtn">Cancel</button>
                   </div></form>';
//==========================================================================================




}


//echo "======+++++++++++++++++++++++++++++=============================";
//echo $bookid;

if(isset($_POST['issuebook1'])){
  //echo "<script>alert('Book issue Sucessfully ')</script>";
  @$memberid = $_SESSION['memberid']; 
 @$membername =$_SESSION['membername'];
 @$memberusername=$_SESSION['memberusername'];
 @ $memberaddress= $_SESSION['memberaddress'];
 @ $memberphoneno=$_SESSION['memberphoneno'];
 @ $memberemail= $_SESSION['memberemail'];
 @ $bookid=$_SESSION['bookid'];
 @ $bookname=$_SESSION['bookname'];
 @ $isbnno =$_SESSION['isbnno'];

 @ $title =$_SESSION['title'];
 @ $author =$_SESSION['author'];
 @ $edition=$_SESSION['edition'];
 @ $book_catagoary=$_SESSION['book_catagoary'];

 @ $publisher =$_SESSION['publisher'];
 @ $sereis=$_SESSION['sereis'];
 @ $availablebook= $_SESSION['availablebook'];
 @ $price= $_SESSION['price'];
 
$issudate= date("Y-m-d");


























if(!empty($bookid) && !empty($memberid) ){
  $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+7, date("Y"));

  $expted = date("Y-m-d",$tomorrow);
  
  echo $expted;

 //$sql="INSERT INTO `issuebook` (`id`, `memberid`, `membername`, `username`, `address`, `phoneno`, `email`, `bookid`, `bookname`, `issuedate`,`expteddate`, `returndate`, `isbn`, `title`, `author`, `edition`, `catagoary`, `publisher`, `sereis`, `price`, `status`) VALUES (NULL, '$memberid', '$membername', '$memberusername', '$memberaddress', '$memberphoneno', '$memberemail', '$bookid', '$bookname', '$issudate','$expted', '', '$isbnno', '$title', '$author', '$edition', '$book_catagoary', '$publisher', '$sereis', '$price', 'issue')";
$sql="INSERT INTO `issuebook` (`id`, `memberid`, `bookid`, `issuedate`, `expteddate`, `returndate`, `status`, `fine`) VALUES (NULL, '$memberid', '$bookid', '$issudate', '$expted', '', 'issue', '')";

 //INSERT INTO `issuebook` (`id`, `memberid`, `bookid`, `issuedate`, `expteddate`, `returndate`, `status`, `fine`) VALUES (NULL, '', '', '', '', '', '', '') 
echo $availablebook;//UPDATE `add_book` SET `availablebook` = '36254' WHERE `add_book`.`bookid` = 22;
$sql1 = "UPDATE `add_book` SET `availablebook` = '$availablebook '  WHERE `bookid` = '$bookid' ";
if(!mysqli_query($conn,$sql1)) { echo "Error: Could not save the data to mysql database. Please try again.";

 die(mysqli_error());
   } 
  if(!mysqli_query($conn,$sql)) { echo "Error: Could not save the data to mysql database. Please try again.";

    die(mysqli_error());
      } 
      else
     { 
        echo "<script>alert('Book issue Sucessfully ')</script>";
       
//header("Loction:http://www.codeteasers.com/java/awt/aw.php ");    

//echo  $_POST['bb']; 

// $txtsearch = mysqli_real_escape_string($conn,$_POST['bb']);
// echo $txtsearch; 
       }
      
      }

}?> <!-- <form  name="form" action="<?php //echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
 <div class="hidden" >
<button  name="issuebook">Issue Book</button>
      <button id="b1" type="button"  class="cancelbtn">Cancel</button>
</div>-->
    
<?php
/*
      if(isset($_POST['issuebook'])){

          $memberid = $_SESSION['memberid']; 
         $membername =$_SESSION['membername'];
         $memberusername=$_SESSION['memberusername'];
         $memberaddress= $_SESSION['memberaddress'];
         $memberphoneno=$_SESSION['memberphoneno'];
         $memberemail= $_SESSION['memberemail'];
         $bookid=$_SESSION['bookid'];
         $bookname=$_SESSION['bookname'];
         $isbnno =$_SESSION['isbnno'];

         $title =$_SESSION['title'];
         $author =$_SESSION['author'];
         $edition=$_SESSION['edition'];
         $book_catagoary=$_SESSION['book_catagoary'];

         $publisher =$_SESSION['publisher'];
         $sereis=$_SESSION['sereis'];

         $price= $_SESSION['price'];
      
  $issudate= date("Y-m-d");

























  

         
         $sql="INSERT INTO `issuebook` (`id`, `memberid`, `membername`, `username`, `address`, `phoneno`, `email`, `bookid`, `bookname`, `issuedate`, `returndate`, `isbn`, `title`, `author`, `edition`, `catagoary`, `publisher`, `sereis`, `price`, `status`) VALUES (NULL, '$memberid', '$membername', '$memberusername', '$memberaddress', '$memberphoneno', '$memberemail', '$bookid', '$bookname', '$issudate', '', '$isbnno', '$title', '$author', '$edition', '$book_catagoary', '$publisher', '$sereis', '$price', 'issue')";
        //
          if(!mysqli_query($conn,$sql)) { echo "Error: Could not save the data to mysql database. Please try again.";
 
            die(mysqli_error());
              } 
              else
             { 
                echo "<script>alert('Book issue Sucessfully ')</script>";
               
        //header("Loction:http://www.codeteasers.com/java/awt/aw.php ");    
        
        //echo  $_POST['bb']; 
  
       // $txtsearch = mysqli_real_escape_string($conn,$_POST['bb']);
     // echo $txtsearch; 
               }

      
  




      }*/?>



      
          <div id="hidden1" style="display: block;">
      <form  name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">



     
    
<div id="id01" class="modal">
  
  <center>

      <form class="modal-content animate" name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

    <div class="container">
      






<?php


 if(isset($_POST['books']))
     { //$bname = $_POST['bb'];
     // echo $bname;           
     
    // print_r ($row);
                  
















    

      }?>





















    
<?php   //if(isset($_POST['issuebook'])){



//}
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>

    </div></form>

</div>
  
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "block";
    }
}
</script>
</div>
</body></html>



<?php //unset($_SESSION['showUpdated'];
    /* unset( $_SESSION['memberid']); 
       unset($_SESSION['membername']);
    unset($_SESSION['memberusername']);
       unset($_SESSION['memberaddress']);
        unset($_SESSION['memberphoneno']);
         unset($_SESSION['memberemail']);
       unset($_SESSION['bookid']);
        unset($_SESSION['bookname']);
     unset($_SESSION['isbnno']);

  unset($_SESSION['title']);
      unset($_SESSION['author']);
      unset($_SESSION['edition']);
      unset($_SESSION['book_catagoary']);

       unset($_SESSION['publisher']);
      unset($_SESSION['sereis']);

        unset($_SESSION['price']);
     */ ?>




<?php 
session_start();
require("connection.php") ?>
<html><head>

    <title>Issue Book</title>

   <link rel="stylesheet" href="style\index.css">
<body>
<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<script   language="javascript">
      var date=new Date();
      document.write(date);

</script>
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
  <input  type="text" width="70%" placeholder="Book id OR Book name" name="bookid" required>
      
     
        
    <button type="submit" name="ms" onclick="document.getElementByClassName('hidden').style.display='block';document.getElementById('hidden').style.display='block';">Search</button><br></form>
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
 
       $sql2 ="SELECT * FROM `add_book` WHERE `bookid` ='$txtsearch' "; 
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
         
            
 <table style='width:100%' >
       <tr class='tbl-header'>         
           
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>           
            <th>Fine</th>    
            <th>Return</th>  </div></tr>

          ";
            
                      echo  $memberid = $_SESSION['memberid']; 
                      echo $bookid=$_SESSION['bookid'];


               $sql ="SELECT * FROM `issuebook` WHERE `memberid` = '$memberid'  AND `status` LIKE 'issue'  "; 
               $result1 = mysqli_query($conn, $sql);
               while($row = mysqli_fetch_array ($result1) )
{     echo "<tr class='tbl-content'>";
            echo" <td>"; echo $row["bookid"];echo "</td>";
            echo "<td>"; echo $row["title"];echo "</td>";
            echo "<td>"; echo $row["author"];echo "</td>";
            echo "<td>"; echo $row["issuedate"];echo "</td>";
            echo "<td>";  echo $row["returndate"];echo "</td>";           
            echo "<td>Fine</td>    ";
            echo "<td><a href='return.php?l_id=";echo $row["bookid"];echo"&mid=";echo $memberid;echo"'>Return </a></td>";
}
                        
                    echo " </table> </div>";






}?>   <form  name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
 <div id="hidden" style="display: block";>
<button  name="issuebook">Issue Book</button>
      <button id="b1" type="button"  class="cancelbtn">Cancel</button>
</div>
    
<?php

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

      
  




      }?>



      
          <div id="hidden1" style="display: block;">
      <form  name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">



     
    
<div id="id01" class="modal">
  
  <center>

      <form class="modal-content animate" name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

    <div class="container">
      




<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$_a = explode("2017-06-25",fgets($_fp));
$_b = explode(" 2017-06-25",fgets($_fp));

// Initialising variable
$_fine = "";

// Calling Function
calculateFine($_a,$_b);

// Defining Function
function calculateFine($actualDate, $returnDate) 
    { 

        // Checking various conditions

        if ($actualDate[0] <= $returnDate[0] && $actualDate[1] == $returnDate[1] && $actualDate[2] == $returnDate[2])  
            {
                $_fine = 0;
                echo $_fine;
            }
        elseif($actualDate[0] > $returnDate[0] && $actualDate[1] == $returnDate[1] && $actualDate[2] == $returnDate[2])
            {
                $_late = $actualDate[0] - $returnDate[0];
                $_fine = 15*$_late;
                echo $_fine;
            }
        elseif($actualDate[1] > $returnDate[1] && $actualDate[2] == $returnDate[2])
            {
                $_late = $actualDate[1] - $returnDate[1];
                $_fine = 500*$_late;
                echo $_fine;
            }
        elseif($actualDate[2] > $returnDate[2])     
            {
                $_fine = 10000;
                echo $_fine;
            }
        else 
            { 
                $_fine = 0;
                echo $fine;  // Updated (This is the undefined variable causing error )
            }
    }
?>

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

</body></html>



<?php //unset($_SESSION['showUpdated'];
      unset( $_SESSION['memberid']); 
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
      ?>


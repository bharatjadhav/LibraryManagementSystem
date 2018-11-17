

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
<head>
<title>Add Book</title>       <link rel="icon" href="book.jpg" type="image/x-icon">
<meta name="them-color" content="#4285f4">
</head>

<?php 

session_start();
require_once("connection.php") ?>

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
    

    <div id="fullpage">
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>

            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>
       

            <div class="bg">Add Book</div>
            <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <font>

                    <label>Book Name <sup>*</sup></label>
                    <cener>
                    <input type="text" name="bname" autocomplete="on" placeholder="Enter Book  Name" style=" text-transform :uppercase" required><br>
                </cener>
                    <label>ISBN <sup>*</sup></label>
                    <input name="isbn" placeholder="Enter International Standard Book Number(ISBN)" type="text" required><br>




                    <label>Title   <sup>*</sup>
                </label>

                    <input name="title" placeholder="Enter Title" type="text" required><br>


                    <label>Subtitle  
                </label>
                    <input name="subtitle" placeholder="Enter Subtitle" type="text"><br>


                    <label>Author  <sup>*</sup>
                </label>
                    <input name="author" placeholder="Enter Author " type="text" required><br>


                    <label>Edition   <sup>*</sup>
                </label>
                    <input name="edition" placeholder="Enter Edition" type="text" required><br>


                    <label> Book Category <sup>*</sup>
                    </label>
                
<?php $sql = "SELECT * FROM `ctagery`";
$result = mysqli_query($conn, $sql);

                   echo "<select name='category'>";
                   while($row = mysqli_fetch_array($result) )
                 { 
echo " <option>";echo $row["c_name"];echo "</option>";}
echo "</select>";
                   ?> <br>



                    <label>Edition Year 
                </label>
                    <input name="edition_year" placeholder="Enter Edition Year " type="text"><br>

                    <label>Number of Copies   <sup>*</sup>
                </label>
                    <input min="1" name="number_of_books" value="1" placeholder="Enter Number of Copies  " type="number" required><br>

                    <label>Cover Image </label>
                    <input type="file"  name="image" placeholder="Enter Cover Image "><br>


                    <label>Publisher  <sup>*</sup>
                    </label>
                    <input name="publisher" placeholder="Enter Publisher " type="text" required><br>



                    <label>Series 
                    </label>

                    <input name="series" placeholder="Enter Series " type="text"><br>

                    <label>Price <sup>*</sup>
                </label>
                    <input name="price" placeholder="Enter Price " type="text" required><br>

                </font> <center>

                <button type="submit" name="submit">Add book</button>

        </center>
        </form>
</div>

</body>

</html>







<?php







        
     if(isset($_POST['submit']))
      { 
        if (!empty($_POST['bname']))
        {
            $bname = $_POST['bname'];
            $isbn = $_POST['isbn'];
            $title = $_POST['title'];
            $subtitle =$_POST['subtitle'];
            $author = $_POST['author'];
            $edition = $_POST['edition'];
           echo $bookcategory = $_POST['category'];
            $editionyear = $_POST['edition_year'];
            $numofcopi = $_POST['number_of_books'];
            $publisher = $_POST['publisher'];
            $series = $_POST['series'];
            $price = $_POST['price'];
        
           echo $bname;


 
            if ($_POST && !empty($_FILES)) {
                $formOk = true;
            
            
            
            //Assign Variables
            $path = $_FILES['image']['tmp_name'];
            $iname = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $type = $_FILES['image']['type'];
            if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
                $formOk = false;
                echo "<script>alert(' Error: Error in uploading file. Please try again !!!!')</script>";
            }
            //check file extension
                if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
                    $formOk = false;
                    echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
                }
                 // check for file size.
                 if ($formOk && filesize($path) > 500000) {
                    $formOk = false;
                    echo "Error: File size must be less than 500 KB.";
                }
            
            echo $path;
            echo $iname;
             echo $size;
            echo $type;
            }








            
            
          
      
            $content = file_get_contents($path);  
        $content2 = mysqli_real_escape_string($conn, $content);
        
         // $sql = "INSERT INTO `add_book` (`bookid`, `book_name`, `isbn_no`, `title`, `subtitle`, `author`, `edition`, `book_catagoary`, `edition_year`, `numberofcopy`,`coverimg`, `publisher`, `sereis`, `price`, `status`) VALUES (NULL, ' $bname', ' $isbn', '$title', '$subtitle', '$author', ' $edition', ' $bookcategory', '  $editionyear', '$numofcopi', '$content2', '$publisher', '$series','$price','no')";
           
            $sql="INSERT INTO `add_book` (`bookid`, `book_name`, `isbn_no`, `title`, `subtitle`, `author`, `edition`, `book_catagoary`, `edition_year`, `numberofcopy`,`availablebook`, `coverimg`,`publisher`, `series`, `price`, `status`) VALUES (NULL, '$bname', ' $isbn ', '$title', ' $subtitle', '$author', '  $edition', '$bookcategory', '$editionyear', ' $numofcopi',' $numofcopi', '$content2','$publisher', ' $series', ' $price', 'no')";
          if(!mysqli_query($conn,$sql)) {
           // echo "Error: Could not save the data to mysql database. Please try again.";
 
      die(mysqli_error());
        }
     else
     { 
         echo "<script>alert('Form is Sucessfully Submit')</script>";
        
         
        }
    
    }
    else{
        echo "<script>alert('Form is not submited . Please try again.')</script>";
    }

} 

else{
}



?>      



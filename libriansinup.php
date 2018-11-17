
<?php session_start(); 
require_once("connection.php") ?>
<html>
    <title>
        Sign up</title>
      <link rel="stylesheet" href="style\index.css">
<link rel="stylesheet" href="Sh/index.css">
<link rel="icon" href="book.jpg" type="image/x-icon">
    <script>
    function uppercase(){this.value=this.value.toUpperCase();}</script>
    <body >    
   
    
        <script   language="javascript">
      var date=new Date();

      document.write(date);

     </script>


    
        
        <div class="dropdown"  style="float:right;">

                    <button class="dropbtn">Login</button>
                    <div class="dropdown-content">
                        <a href="#">Admin login
                        </a>

                        <a href="#">Librarian login</a>
                        <a href="#">Member login</a>

                    </div>
                </div>


     
        <div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>

<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                   <font>






  <center>
 <div class="bg" style="width:30%;" >
   
                   Librarian Sign up </div> </legend> 
                   
                   
                   
    

                    <label>Name<sup>*</sup></label>
                   <input type="text" name="name" autocomplete="on"  placeholder="Enter Name" style=" text-transform :uppercase"  required><br>




                   <label>Date of Birth<sup>*</sup></label>
                   <input type="date" name=" dateofbirth"  autocomplete="on"  placeholder="Enter Date of Birth" required><br>


                   <label>Gender<sup>*</sup></label>
                   <input type="radio" name="gender" value="male" required>male
                   <input type="radio" name="gender" value="female" required>female<br>
     <label>Mobile Number<sup>*</sup></label>
                    <input min="1000000000" max="9999999999" type="number" name="mobilenumber"  autocomplete="on"  placeholder="Enter Mobile Number"  maxlength="10"required><br>

                    <label>Email<sup>*</sup></label>
                     <input type="email"  autocomplete="on" name="email"  placeholder="Enter Email" required><br>

                     <label>Address<sup>*</sup></label>
                     <textarea name="Address" placeholder="Enter Address" style=" text-transform :uppercase" required></textarea><br>

                     <label>City<sup>*</sup></label>
                     <input type="text" name="City" autocomplete="on"  placeholder="Enter City" style=" text-transform :uppercase"  required><br>

                     <label>State<sup>*</sup></label>
                     <input type="text" name="State" autocomplete="on"  placeholder="Enter State" style=" text-transform :uppercase" required><br>

                     <label>Country<sup>*</sup></label>
                     <input type="text" name="Country" autocomplete="on"  placeholder="Enter Country" style=" text-transform :uppercase"  required><br>

                     <label>Upload photo</label>
                     <input type="file"   placeholder="Upload photo" name="image"  value="" ><br>


                     <label>Select Username<sup>*</sup></label>
                     <input type="text" placeholder="Select  Username" name="Username" required><br>

                     <label>Password<sup>*</sup></label>
                     <input type="password" placeholder="Select Password" name="Password"required><br>
                     <label>Confirm Password<sup>*</sup></label>
                     <input type="password" placeholder="Confirm Password" name="ConfirmPassword"required><br>
   



     </font>
     <button type="submit" name="submit">Sign Up</button>
        </center>





  


          </form>

    </body>

    </html>




    




<?php







        
if(isset($_POST['submit']))
 { //password is equal
   if ($_POST['Password']==$_POST['ConfirmPassword'])
   {
       $name = $_POST['name'];
       $dateofbirth = $_POST['dateofbirth'];
       $gender = $_POST['gender'];
       $mobilenumber =$_POST['mobilenumber'];
       $email = $_POST['email'];
       $Address = $_POST['Address'];
       $City = $_POST['City'];
       $State = $_POST['State'];
       $Country = $_POST['Country'];
       $Username = $_POST['Username'];
       $Password = md5($_POST['Password']);   
       

       echo $name;
       echo $dateofbirth;
       echo $gender;
       echo $email;
       echo $Address;
       echo $City;
       echo $State;
       echo $Country;
       echo $Username;
       echo $Password; 


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
   $content = mysqli_real_escape_string($conn, $content);
   
     //$sql="INSERT INTO `sineup`(`l_id`, `mbname`, `date_of_birth`, `gender`, `phone no.`, `email`, `address`, `city`, `state`, `country`, `upload_img`, `username`, `password`) VALUES ('','$name','$dateofbirth','$gender','$mobilenumber','$email','$Address','$City','$State','$Country','$content','$Username','$Password')";
   $sql="INSERT INTO `libsineup` (`l_id`, `lname`, `date of birth`, `gender`, `phoneno`, `email`, `address`, `city`, `state`, `country`,`upload_img`, `username`, `password` , `status`) VALUES ('','$name','$dateofbirth','$gender','$mobilenumber','$email','$Address','$City','$State','$Country','$content','$Username','$Password','no')";
     if(!mysqli_query($conn,$sql)) {
       echo "Error: Could not save the data to mysql database. Please try again.";

 die(mysqli_error());
   }
else
{ 
    echo "<script>alert('Form is Sucessfully Submit')</script>";
   
//header("Loction:http://www.codeteasers.com/java/awt/aw.php ");        
   }

}
else{
   echo "<script>alert('Form is not submited . Please try again.')</script>";
}

} 



?>      
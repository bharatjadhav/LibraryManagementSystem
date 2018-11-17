<html>
    <head>
    <title>Admin Login</title>
  <link rel="stylesheet" href="style\index.css">
  <link rel="icon" href="book.jpg" type="image/x-icon">
  <meta name="them-color" content="#9285f4"></head>
<body>
<script   language="javascript">
      var date=new Date();
      document.write(date);

</script>



<?php @session_start();
require_once("connection.php") ?>

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
  <div class="bg"> Admin login</div>
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="Username" required="">
        <br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Password"required="">
        </font>
    <br>
        <button type="submit" name="submit"><font>Login</font></button><br> Forgot <a href="forgetpass.html">password?</a></span>
    </center>
</form>







</body>

</html>




<?php
?>
    <?php

    if(isset($_POST['submit']))
    {
    echo $username =mysqli_real_escape_string($conn,$_POST['Username']);
    echo $password =mysqli_real_escape_string($conn, md5($_POST['Password']));

      
        $count=0;
        $sqlq = "select * from admin where username= '$username' && password= '$password' && status = 'yes'";
       
        $sql=mysqli_query($conn, $sqlq);
    
        $count=mysqli_num_rows($sql);
       echo $count;
        
    
    if($count==0)
        {
            echo " InvalidUSERNAME AND PASSWORD";

                    }
                    else{    $_SESSION["admin"] = $username;
                        header('Location: alllibribrian.php');
                     
                    }
                }
                
                
                
    if(isset($_POST['submit']))
    {
    echo $username =mysqli_real_escape_string($conn,$_POST['Username']);
    echo $password =mysqli_real_escape_string($conn, md5($_POST['Password']));

        
        $count=0;
        $sqlq = "select * from sineup where username= '$username' && password= '$password' && status = 'yes'";
       
        $sql=mysqli_query($conn, $sqlq);
    
        $count=mysqli_num_rows($sql);
       echo $count;
        
    
    if($count==0)
        {
            echo " InvalidUSERNAME AND PASSWORD";

                    }
                    else{ $_SESSION["sineup"] = $username;
                        header('Location: memberprofil.php');

                    }
                }?>
    
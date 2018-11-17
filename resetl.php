<?php
session_start();
if($_GET['key'] && $_GET['reset'])
{  $id=$_GET['id'];

  $email=$_GET['key'];
  $pass=$_GET['reset'];
  require_once("connection.php") ;
 // $select=mysql_query("select email,password from user where md5(email)='$email' and md5(password)='$pass'");
  $sql="SELECT * FROM `libsineup` WHERE  md5(`email`) = '$email' AND md5(`password`) = '$pass'AND md5(`l_id`) = '$id' ";
    $result = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result )==1)
  {   $_SESSION["ls"] = $id;
    $row1 = mysqli_fetch_array ($result);
     ?>
    <html>
  <link rel="stylesheet" href="style\index.css">
<title>Password Recovery
</title>
<body>
<div class="back">
            <video height="100%" width="100%" autoplay="true" loop="loop" muted>
                <source src="" type="video/mp4">

            </video>
        </div>

    

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

        </div>   

    <center>
        <font>       
        <form name="form" action="changepassforgotl.php" method="post" enctype="multipart/form-data"> <div class="bg">Change password</div>
                
                <label>New Password<sup>*</sup></label>
                <input type="password" placeholder="Enter New Password" name="Password"required><br>
                <label>Confirm New Password<sup>*</sup></label>
                <input type="password" placeholder="Confirm new Password" name="ConfirmPassword"required><br>


        <button style="width:auto;" type="submit" name="submit"><font>Change password</font></button>
    </center>
</form>





</body>

</html>
   
    <?php

       






  }
}
?>
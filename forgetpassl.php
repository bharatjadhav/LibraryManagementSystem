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
        <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<div class="bg"> Password Recovery</div>
                           <input type="email"  autocomplete="on" name="email"  placeholder="Enter Your Email" required><br>

        <button style="width:auto;" type="submit" name="submit_email"><font>Send Recovery Email</font></button>
    </center>
</form>





</body>

</html>
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
require_once("connection.php") ;

if(isset($_POST['submit_email']) && $_POST['email'])
{
    $email = $_POST['email'];
    $sql="SELECT * FROM `libsineup` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
  //$select=mysqli_query($conn,"SELECT * FROM `libsineup` WHERE `email` = '$email'");
  if(mysqli_num_rows($result)==1)
  {
    while($row=mysqli_fetch_array($result))
    {
        $lemail = $row['email'];
        $name = $row['lname'];
        $username = $row['username'];
   
        $email=md5($row['email']);
      $pass=md5($row['password']);
      $id=md5($row['l_id']);
    }
    
    $link="<a href='http://localhost/may/resetl.php?key=".$email."&reset=".$pass."&id=".$id."'>Click To Reset password</a>";
    
    require 'phpmail/src/Exception.php';
    require 'phpmail/src/PHPMailer.php';
    require 'phpmail/src/SMTP.php';





 





echo $lemail;




    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "libraymang@gmail.com";
    // GMAIL password
    $mail->Password = "Asdfghjkl@99";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='libraymang@gmail.com';

    $mail->FromName='libraymang';
    $mail->AddAddress($lemail);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Dear  '.$name.'<br> username is  '. $username.'<br>  Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "<script>alert('Check Your Email and Click on the link sent to your email '); window.location='homepa.html'; </script>";
    

    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>
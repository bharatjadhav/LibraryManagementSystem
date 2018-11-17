
<?php require_once("connection.php") ?>
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
        
        
    <button type="submit" name="ms" onclick="document.getElementById('hidden').style.display='block'">Search</button><br></form>
    <div id="hidden" style="display: block;"><?php         
     if(isset($_POST['ms']))
     { //$bname = $_POST['bb'];
     // echo $bname;           
      $txtsearch = mysqli_real_escape_string($conn,$_POST['bb']);
      echo $txtsearch;           

      $sql ="SELECT * FROM `sineup` WHERE `mbname` LIKE '$txtsearch%' "; 
      $result1 = mysqli_query($conn, $sql);


      $row = mysqli_fetch_array ($result1);
      
    // print_r ($row);
                   echo"       <div class='bg'>Member info</div> 
                          <br><br>
                     <div class='grid'>";
                        //<img id='imgprofil' class='photo' src=''>
                        echo '<img class="imgprofil" src="data:image/jpeg;base64,'.base64_encode( $row['upload_img'] ).'"/>';  

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

      }?>


<div class="bg">Member Book Issued</div><br>
<br>
         
            
 <table style="width:100%" >
       <tr class="tbl-header">         
           
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>           
            <th>Fine</th>    
            <th>Return</th>  </div></tr>

            <tr class="tbl-content">
              
            <td>Book ID</td>
            <td>Title</td>
            <td>Author</td>
            <td>Issue Date</td>
            <td>Expiry Date</td>           
            <td>Fine</td>    
            <td><button class="re">
              Return</button></td>
            
                     </table> 


<button  onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> New Issue</button>

<div id="id01" class="modal">
  
  <center><form class="modal-content animate" >
    

    <div class="container">
      <h4 class="modal-title"><strong>New Issue book</strong></h4>
      <input  type="text" width="70%" placeholder="Book id OR Book name" name="bookid" required>
      
      <button type="submit">Search</button><br>
     <img class="img" style="width:175px; height:275px;" src=""><br><button type="submit" style="width:auto;">Issue Book</button>
 
      <button id="b1" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>

    </div>

</div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "INLINE";
    }
}
</script>

</body></html>





<?php 
      
      
        
      ?>
<html>
    <title>category Add</title>
  <link rel="stylesheet" href="style\index.css">

<body><script   language="javascript">
      var date=new Date();
      document.write(date);

</script>


<?php 

session_start();
require_once("connection.php") ?>
<div id="fullpage" >
        <div class="section" id="section1" style="height: 800px;position: fixed;z-index: -100;width: 100%;height: 100%;overflow:block;">
            <div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%;position: fixed;z-index: -100; height: 100%;" width="1349" height="800"></canvas></div>
            
            <script type="text/javascript" src="Sh/particles.js">
            </script>
            <script type="text/javascript" src="Sh/link.js"></script>

        </div>   
 <font>   
    <center>         <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

            
            <div class="bg"> Add Book Category  </div>
        <label>Book Category</label>
        <input type="text" placeholder="Enter Category" name="category" style=" text-transform :uppercase" required>
       
        <br><button type="submit" name="add">Add</button>
    
        </form>    
        <?php          if(isset($_POST['add']))
         {  $bookcategory = $_POST["category"];

        
            $sql="INSERT INTO `ctagery` (`id`, `c_name`, `status`) VALUES (NULL, '$bookcategory', 'active')";
        
            if(!mysqli_query($conn,$sql)) {
             // echo "Error: Could not save the data to mysql database. Please try again.";
   
        die(mysqli_error());
          }
       else
       { 
           echo "<script>alert('Form is Sucessfully Submit')</script>";
          
           
          }
        }
        

        $sql = "SELECT * FROM `ctagery` ";
$result = mysqli_query($conn, $sql);
      
echo  "<table style='width:100%' >
       <tr class='tbl-header'>         
       <th>Id</th>
            <th>Categoryr Name</th>
            <th>Status</th>
            
            
            <th>Action</th>  
                

              </div></tr>";
              while($row = mysqli_fetch_array($result) )
              {
            echo "<tr class='tbl-content'>
              
            <td>";echo $row["id"];echo"</td>
            <td>";echo $row["c_name"];echo"</td>
            <td>";echo $row["status"];echo"</td>
            
            <td><button style='width:50%;    height: 70%;' class='re'>Edit </button><button style='width:50%; height:70%; ' class='re'>Delete</button></td>           
           <td></td>";
              }
                   echo "  </table>"; 
    
    
    
    
    
    
    ?>
    
    
    
    
    </center>


 </font>
   
</body>

</html>
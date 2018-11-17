
  <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" enctype="multipart/form-data">
 
 
 
 
 <center>



<font> <!--
 <label>Name<sup>*</sup></label>
<input type="text" name="name" autocomplete="on"  placeholder="Enter Name" style=" text-transform :uppercase"  required><br>




<label>Date of Birth<sup>*</sup></label>
<input type="date" name="dateofbirth"  autocomplete="on"  placeholder="Enter Date of Birth" required><br>


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
  <input type="file"   placeholder="Upload photo" name="image"  required/><br>


  <label>Select Username<sup>*</sup></label>
  <input type="text" placeholder="Select  Username" name="Username" required><br>

  <label>Password<sup>*</sup></label>
  <input type="password" placeholder="Select Password" name="Password"required><br>
  <label>Confirm Password<sup>*</sup></label>
  <input type="password" placeholder="Confirm Password" name="ConfirmPassword"required><br>
--> 
<select name="category">
<option >hjdf</option>
<option>hjddddf</option>
<option >hjdddddddddddddddddddddf</option>
</select>


</font>
<button type="submit" name="submit" value="Upload">Sign Up</button>
</center>


</form>



<?php echo $issudate= date("Y-m-d");


//echo //$issudate= date("d") + 1;

echo "<br>";
$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+6, date("Y"));

$expted = date("Y-m-d",$tomorrow);

echo $expted;?>
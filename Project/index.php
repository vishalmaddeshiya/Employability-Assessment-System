<?php
$host = "localhost";
$user = "root";
$password = "";
$con = mysqli_connect($host,$user,$password,"company");
$message = "wrong credentials";

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
 if($_POST)
 {
	 $opass = $_POST["opass"];
	 $npass = $_POST["npass"];
	 $cpass = $_POST["cpass"];
	 
	 $sql="select passord from login where username ='($user)'";
	 $result = mysqli_query($con, $sql);
	 if (mysqli_num_rows($result) > 0) {
    // output data of each row 
	
    $row = mysqli_fetch_assoc($result);
	$data = mysqli_fetch_row($sql);
	if($data[0] == $opass)
	 {
		 if($npass == $cpass)
		{
		$q ="update login set password='[$npass]' where username='[$user]'";
			 $aa = mysqli_query($con, $q);
	 
	      if (mysqli_num_rows($aa) > 0) {
          // output data of each row
          $row = mysqli_fetch_assoc($aa);
		   if($q)
			 {
				 echo "<script>alert('Password changed')</script>";
			 }
			
		} else 
		 {
			echo "<script>alert('New Password and Confirm Password not match')</script>";
		 }
			
	 } else 
	 { 
		 echo "<script>alert('Old Password not match')</script>";
	 }
	 }
	 }
 }
?>
<!DOCTYPE html>
<html>
   <head>
     <title>Input From UI Design</title>
     <link rel="stylesheet" href="changepswde.css">
   </head>
   <body>
   
       <div class="box"> 
          <h2>Change Password</h>
          <form method="POST">
           <div class="inputBox">
                <input type="password" name="opass" required="">  
                <label>Old Password</label>
			</div>
             <div class="inputBox">
                <input type="password" name="npass" required=""> 
                <label>New password</label>
             </div>
             <div class="inputBox">
             <input type="password" name ="cpass" required=""> 
             <label>Confirm password</label>
             </div>
             <input type="Submit" name="" value="Change">
			 </form>
      </div>
   </body>
</html>


<?php
  session_start();
$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,"company");
$message = "wrong credentials";

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

 
 if($_POST)
 {
	 $opass = $_POST["opass"];
	 $npass = $_POST["npass"];
	 $cpass = $_POST["cpass"];
	 
	 
     //$uname = $_POST['uname'];
	//$_SESSION['username'] = $_POST['uname'];
     $username=$_POST['username'];	
	 $uname = $_SESSION['username'];
	 
 $sql ="select password from login where username ='".$uname."'";
	 $result = mysqli_query($con, $sql);
	 print_r($result); die;
	 

	 
	 if (mysqli_num_rows($result) > 0) {
    // output data of each row
        $row = mysqli_fetch_assoc($result);
	 
	 //$odata = mysql_fetch_row($oqr);
	 
	 if($row[0] == $opass)
	 {
		if($npass == $cpass)
		{
			
			$sql = "update login set password='{$npass}'
			where username='".$uname."'";
			$result = mysqli_query($con, $sql);
	           if (mysqli_num_rows($result) > 0) {
            // output data of each row
                $row = mysqli_fetch_assoc($result);
			
			
			 if($sql)
			 {
				 echo "<script>alert('Password changed')</script>";
			 }
			
		}
		}		else 
		 {
			echo "<script>alert('New Password and Confirm Password not match')</script>";
		 }
			
	 }
	 }	 else 
	    { 
		   echo "<script>alert('Old Password not match')</script>";
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
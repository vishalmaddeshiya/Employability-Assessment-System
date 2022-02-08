<?php

  session_start();
 // mysql_connect("localhost","root", " ") or die(mysql_error());
  //mysql_select_db("company") or die(mysql_error());
     $con = mysqli_connect('127.0.0.1','root','');
	
	if(!$con)
	{
		echo 'not connected to server';
	}
	if(!mysqli_select_db ($con,'company'))
	{
		echo 'Database Not Selected';
	}
	
 if($_POST)
 {
	 $opass = $_POST["opass"];
	 $npass = $_POST["npass"];
	 $cpass = $_POST["cpass"];
	 
	 
	 $user=$_SESSION["user"];
	 
	 $oqr = mysql_query("select passord from login where username
	 ='{$user}'") or die(mysql_error());
	 
	 
	 $odata = mysql_fetch_row($oqr);
	 
	 if($odata[0] == $opass)
	 {
		if($npass == $cpass)
		{
			$q = mysql_query("update login set password='{$npass}'
		where username='{$user}'") or die(mysql_error());
			
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

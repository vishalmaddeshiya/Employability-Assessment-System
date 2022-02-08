
<!DOCTYPE html>
<html>
   <head>
     <title>Input From UI Design</title>
     <link rel="stylesheet" href="changepswde.css">
   </head>
   <body>
   <a href="adminpage.html"><button>Back</button></a>
       <div class="box"> 
          <h2>Change Password</h>
          <form method="POST">
           <div class="inputBox">
                <input type="password" name="password" required="">  
                <label>Old password</label>
			</div>
             <div class="inputBox">
                <input type="password" name="txtnewpass" required=""> 
                <label>New password</label>
             </div>
             <div class="inputBox">
             <input type="password" name ="txtconfpass" required=""> 
             <label>Re-enter password</label>
             </div>
             <input type="submit" name="btnchange" value="submit">
			 </form>
 <?php
 session_start();
$host="localhost";
$user="root";
$pass="";
$db_name="company";
$conn=mysqli_connect($host,$user,$pass,$db_name);

if (!$conn):
    die("Connection failed: ".mysqli_errno($conn));
endif;
$btnchange=filter_input(INPUT_POST,"btnchange");
if(isset($btnchange))
{
	$username=filter_input(INPUT_POST,"password");
	$newpass=filter_input(INPUT_POST,"txtnewpass");
	$confpass=filter_input(INPUT_POST,"txtconfpass");
	
	$query="select password from login where password='$username'";
	$run= mysqli_query($conn, $query);
	
	$rows=mysqli_fetch_array($run);
	if($rows["password"]==$username)
	{
		if($newpass==$confpass)
		{
			$update_query="update login set password='$newpass' where password='$username'";
			
			$update_run=mysqli_query($conn, $update_query);
			
			if($update_query)
			{
				echo "<script>alert('password change sucessfully')</script>";
				
			}
			else{
				echo "<script>alert('password change failed')</script>";
			}
		}
		else{
			echo "<script>alert('re-enter password does not match')</script>";
		}
	
	} else
		echo "<script>alert('old password does not match')</script>";
}
			 
			 ?>
      </div>
   </body>
</html>
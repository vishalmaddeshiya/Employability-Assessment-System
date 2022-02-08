<?php
session_start();
$host="localhost";
$user="root";
$password="";
$conn=mysqli_connect($host,$user,$password,"company");
$message = "wrong credentials";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$uname = $_POST['uname'];
            
            if (!empty($_POST['uname']) 
               && !empty($_POST['pwd'])) {
				
$sql = "SELECT password FROM login where username='" . $_POST['uname'] . "'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row 
	//$SESSION["user"] = $uname;
$row = mysqli_fetch_assoc($result);
//$SESSION["user"] = $uname;

	if($_POST['pwd'] == $row["password"])
	echo "<script>window.location.assign('/project/adminpage.html'); </script>";
else
{
	        
             echo "<script type='text/javascript'>alert('$message');</script>";
			  echo "<script>window.location.assign('/project/loginpage.html'); </script>";
		   
} 
    }
else
echo 'Wrong Username';
}
$_SESSION['username'] = $_POST['uname'];  
              
                
        
                 
            
?>
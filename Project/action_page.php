<?php
$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,"company");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

            
            if (!empty($_POST['uname']) 
               && !empty($_POST['pwd'])) {
				
$sql = "SELECT password FROM login where enrol='" . $_POST['uname] . "'";

$result = mysqli_query($con, $sql);

if ($result > 0) {
    // output data of each row
$row = mysqli_fetch_assoc($result) or die(mysql_error());

	if($_POST['pass'] == $row["password"])
	echo 'You have entered valid user name and password';
             else
                  echo 'Wrong password';
    }
else
echo 'Wrong Username';
}

                  //$_SESSION['valid'] = true;
                 // $_SESSION['timeout'] = time();
                 // $_SESSION['uname'] = 'shira';
                  
              
?>
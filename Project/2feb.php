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
				
$sql = "SELECT password FROM login where username='" . $_POST['uname'] . "'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
$row = mysqli_fetch_assoc($result);

	if($_POST['pwd'] == $row["password"])
	echo '<a href="adminpage.html" class="btn">Submit</a>'; //'You have entered valid user name and password';
             else
                  echo 'Wrong password';
    }
else
echo 'Wrong Username';
}

              
                
        
                  
              
?>
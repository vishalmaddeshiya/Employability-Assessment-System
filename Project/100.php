<?
$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,"company");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
	$sql = "UPDATE password FROM login where password='" . $_POST['pwd'] . "'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
$row = mysqli_fetch_assoc($result);

	if($_POST['pd'] == $row["pdd"])
	echo "<script>window.location.assign('/project/adminpage.html'); </script>";
             else
               echo "<script>window.location.assign('/project/loginpage.html'); </script>";  
			 
    }
else
echo 'Wrong Username';
?>
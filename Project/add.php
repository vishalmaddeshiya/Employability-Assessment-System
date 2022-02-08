<?php
   session_start();
    $con = mysqli_connect('127.0.0.1','root','');
	
	if(!$con)
	{
		echo 'not connected to server';
	}
	if(!mysqli_select_db ($con,'company'))
	{
		echo 'Database Not Selected';
	}
	
	$name = $_POST['name'];
	//if(isset($_POST['name'])){ $name = $_POST['name']; }
	
	$id=$_POST['id'];
	$Designation = $_POST['desi'];
	
    $sql ="insert INTO data(Name,ID,designation) VALUES('$name',$id,'$Designation')";
	
	if(!mysqli_query($con,$sql))
	{
		echo 'Not ADD';
	}
     
	else
	{
	header("refresh:0;url=try.html");
	
	}
	$_SESSION['ID'] = $_POST['id'];
?>
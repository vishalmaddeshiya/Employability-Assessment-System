<?php

    $con = mysqli_connect('127.0.0.1','root','');
	
	if(!$con)
	{
		echo 'not connected to server';
	}
	if(!mysqli_select_db ($con,'company'))
	{
		echo 'Database Not Selected';
	}
	
	$tw = $_POST['Team'];
	$ps = $_POST['Pro'];
	$co = $_POST['Comm'];
	$cl = $_POST['Computer'];
	$ca = $_POST['Complete'];
	$le = $_POST['Learn'];
	
    $sql ="insert INTO data (Teamwork,Problem_Solving,Communication,Computer_Literacy,Complete_task_on_time_and_accuracy,Learning) VALUES ('$tw','$ps','$co','$cl','$ca','$le')";
	if(!mysqli_query($con,$sql))
	{
		echo 'Not ADD';
	}
     
	else
	{
	header("refresh:0; url=Adminpage.html");
	
	}
?>
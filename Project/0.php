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
	$T= $_POST['Team'];
	$P= $_POST['Pro'];
	$C= $_POST['Comm'];
	$L= $_POST['Computer'];
	$A= $_POST['Complete'];
	$G= $_POST['Learn'];
	$m= $_POST['posit'];
	$k= $_POST['think'];
	$r= $_POST['resil'];
	$f= $_POST['self'];
	$id = $_SESSION['ID'];
	$S= ($T+$P+$C+$L+$A+$G+$m+$k+$r+$f)/10;
	
   //Update Query
  $sql = "Update data SET Teamwork=$T,Problem_Solving=$P,Communication=$C,Computer_Literacy=$L,Complete_task_on_time_and_accuracy=$A,Willingness_to_learn=$G,positive_skill=$m,Thinking_skill=$k,Resilience=$r,Self_Management=$f,score=$S where ID=$id";
   //Execute the query
 if(mysqli_query($con,$sql))
	   header("refresh:1; url=adminpage.html");
   else
	   echo "Not Update";
?>
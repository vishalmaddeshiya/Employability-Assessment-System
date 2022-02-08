<?php
$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,"company");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
	
	
			/* echo $_POST['nm'];
			 echo $_POST['id'];
			 echo $_POST['de'];*/
			 $conn=mysqli_connect("localhost","root","","company");
			 if($conn->connect_error)
			 {
				 die("connection failed".$conn->connect_error);
			 }
			 
			 $sql="select Teamwork,Problem_Solving,Communication,Computer_Literacy,Complete_task_on_time_and_accuracy,Learning from data where ID=".$row["id"];
			 $result=$conn->query($sql);
			 if($result->num_rows>0)
			 {
				 
				 while($row=$result->fetch_assoc())
				 {
					
					 echo "<tr><td>".$row["ID"]."</td><td>".$row["Teamwork"]."</td><td>".$row["Problem_Solving"]."</td><td>".$row["Communication"]."</td><td>".$row["Computer_Literacy"]."</td><td>".$row["Complete_task_on_time_and_accuracy"]."</td><td>".$row["Learning"]."</td></tr>";
				 }
				 echo "</table>";
			 }
			 else echo "0 result";
			 $conn->close();
			 
?><!--
<html>
   <head>
     <title>Input From UI Design</title>
     <link rel="stylesheet" href="good.css">
   </head>
   <body>
       <div class="box">
           <h2><font size="50">Enter Skills</font></h2>
		   <h2><font color="white" align="left">Enter: &nbsp; 5 for <font color="#00aa00">excellent</font>,&nbsp;&nbsp; 4 for  <font color="lightgreen">very good</font>,&nbsp;&nbsp; 3 for <font color="#ffff00">good</font>, &nbsp;&nbsp;2 for <font color="ffa500">average</font>, &nbsp;&nbsp;1 for <font color="#bb0000">bad</font></font></h2>
          <form action="0.php" method="POST">
             <table border="4" cellpadding="12" cellspacing="0" class="gfg" align="center">
                  <tr>
                      <td><font color="WHITE">Teamwork</font></td>
                      <td><input type="number" size="1" name="Team" min="1" max="5"></td>
                  </tr>
                  <tr>
                    <td><font color="WHITE">Problem Solving</font></td>
                      <td><input type="number" size="1" name="Pro"  min="1" max="5"></td>
                  </tr>
                  <tr>
                    <td><font color="WHITE">Communication</font></td>
                      <td><input type="number" size="1" name="Comm" min="1" max="5"></td>
                  </tr>
                  <tr>
                    <td><font color="WHITE">Computer Literacy</font></td>
                      <td><input type="number" size="1" name="Computer" min="1" max="5"></td>
                  </tr>
                  <tr>
                    <td><font color="WHITE">Complete task on time and accuracy</font></td>
                      <td><input type="number" size="1" name="Complete" min="1" max="5"></td>
                  </tr>
                  <tr>
                    <td><font color="WHITE">Learning</font></td>
                      <td><input type="number" size="1" name="Learn" min="1" max="5"></td>
                 </tr>
              </table><br>
              <center>
             <input type="Submit" name="" value="Submit">
                  </center>
				  
          </form>
      </div>
   </body>
</html>-->

             
			
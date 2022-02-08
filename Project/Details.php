<html>
   <head>
     <title>Input From UI Design</title>
     <link rel="stylesheet" href="Details.css">
   </head>
   <body>
   <a href="adminpage.html"><button>Back</button></a>
   <div class="box">
          <h2><center>Details of Employees</center></h2>
                <table border="4" cellspacing="4" cellpadding="15" align="center" width="50%">
				<tr>
				<th>S no.</th>
				<th>Name</th>
				<th>ID</th>
				<th>Designation</th>
				<th>Score Obtained</th>
				</tr>
             <?php
			 $conn=mysqli_connect("localhost","root","","company");
			 if($conn->connect_error)
			 {
				 die("connection failed".$conn->connect_error);
			 }
			 $sql="select Name,ID,designation,score from data";
			 $result=$conn->query($sql);
			 if($result->num_rows>0)
			 {
				 $i=1;
				 while($row=$result->fetch_assoc())
				 {
					
					 echo "<tr><td>".$i++."</td><td>".$row["Name"]."</td><td>".$row["ID"]."</td><td>".$row["designation"]."</td><td>".$row["score"]."</td></tr>";
					
				 }
				 echo "</table>";
			 }
			 else echo "0 result";
			 $conn->close();
			 
			 

			 ?>
			</table>
			</div>
   </body>
</html>

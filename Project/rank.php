<!DOCTYPE html>
<html>
   <head>
     <title>Input From UI Design</title>
     <link rel="stylesheet" href="rank.css">
   </head>
   <body>
   <a href="adminpage.html"><button>Back</button></a>
   <div class="box">
          <h2><center>Ranking</center></h2>
                <table border="4" cellspacing="4" cellpadding="15" align="center" width="100%">
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Rank</th>
				</tr>
             <?php
			 $conn=mysqli_connect("localhost","root","","company");
			 if($conn->connect_error)
			 {
				 die("connection failed".$conn->connect_error);
			 }
			 $sql="select ID,Name from data order by Score DESC";
			 $result=$conn->query($sql);
			 if($result->num_rows>0)
			 {
				 $i=1;
				 while($row=$result->fetch_assoc())
				 {
					
					 echo "<tr><td align='center'>".$row["ID"]."</td><td align='center'>".$row["Name"]."</td><td align='center'>".$i++."</td></tr>";
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


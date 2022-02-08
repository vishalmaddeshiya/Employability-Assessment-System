<?php
 session_start();
// php code to Delete data from mysql database 

if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "company";
	$id = $_SESSION['ID'];
    
    // get id to delete
    $id = $_POST['id'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql delete query 
    $query = "DELETE FROM `data` WHERE `ID` = $id";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo "";
    }else{
     header("refresh:0; url=newdelete.php");
    }
    mysqli_close($connect);
}

function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['Name'];
    $posts[2] = $_POST['designation'];
    return $posts;
}
//search
if(isset($_POST['search']))
{
	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "company";
	
	
	$data=getPosts();
	$_session['ID']=$data[0];
	 $connect = mysqli_connect($hostname, $username, $password, $databaseName);
	 
	 
	$search_Query = "select * from data where ID = $data[0]";
	$search_Result = mysqli_query($connect, $search_Query);
	if($search_Result)
	{
		if(mysqli_num_rows($search_Result))
		{
			while($row = mysqli_fetch_array($search_Result))
			{
				$id = $row['ID'];
				$Name = $row['Name'];
				$designation = $row['designation'];
			$_session['name']=$Name;
			$_session['desig']=$designation;
			}
		}else{
			echo "No data";
		}
	}else{
		echo "result error";
	}
}

if(isset($_POST['update']))
{
	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "company";
	
	
	$data=getPosts();
	
	 $connect = mysqli_connect($hostname, $username, $password, $databaseName);
	
	 
	 
	$update_Query = "update data set Name='$data[1]',designation='$data[2]' where ID = $data[0]";
	try
{
	$update_Result = mysqli_query($connect, $update_Query);
	if($update_Result)
	{
			if(mysqli_affected_rows($connect) > 0)
			{
			 
			}
		else {
			echo "not updated";
	         }
   }
}catch (Exception $ex) 
    {
	echo 'error update'.$ex->getMessage();
     }
}
	
		

?>
<html>
   <head>
     <title>Input From UI Design</title>
	 <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="deletem.css">
   </head>
   <body>
       <a href="adminpage.html"><button>back</button></a>
       <div class="box">
          <h2>Edit/Delete Employee</h2>
          <form  method="POST">
		  <div class="inputBox">
                <input type="number" name="id"  value="<?php echo (isset($_session['ID']))?$_session['ID']:"";?>">
                <label>Employee Id</label>
             </div>
             <div class="inputBox">
                <input type="text" name="Name" value="<?php echo (isset($_session['name']))?$_session['name']:"";?>">
                <label>Name of Employee</label>
             </div>
             <div class="inputBox">
             <input type="text" name ="designation" value="<?php echo (isset($_session['desig']))?$_session['desig']:"";?>">
             <label>Designation</label>
             </div>
             <input type="Submit" name="delete" value="Delete">
			 <input type="Submit" name="search" value="Find">
			 <input type="Submit" name="update" value="update">
		
          </form>
		  
      </div>
	  
   </body>
</html>
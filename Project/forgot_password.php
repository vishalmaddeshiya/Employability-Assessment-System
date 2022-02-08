<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$connection = new mysqli("localhost","root","","company");
if($_POST)
{
$email=$_POST['email'];

$selectquery = mysqli_query($connection,"select * from login where email ='{$email}'") or die(mysqli_error($connection));

$count = mysqli_num_rows($selectquery);
$row =mysqli_fetch_array($selectquery);
if($count>0)
{
  //echo $row['password'];
  //require 'vendor/autoload.php';
  $mail = new PHPMailer(true);
  try{
  //server stting
  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'spa.cambay@gmail.com';
  $mail->Password = 'abc@123456789';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  
  $mail->setForm('spa.cambay@gmail.com','spa Demo');
  $mail->addAddress('$email','$email');
  
  $mail->isSMTP(true);
  $mail->subject = 'Forgot Password';
  $mail->body ="Hi $email your is {$row['password']}";
  $mail->Altbody ="Hi $email your is {$row['password']}";
  $mail->send();
  echo 'your Password has been sent on your Email id';
  }catch (Exception $e) {
  echo 'Email could not be sent';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
 }
 
}
else
{
echo "<script>alert('Email not found')</script>";
} 
}

?>



<html>
   <head>
     <title>Input From UI Design</title>

     <link rel="stylesheet" href="display.css">
	  
   </head>
   <body>
       <div class="box">
          <h2>Forgot Password</h2>
          <form method="POST">
             <div class="inputBox">
                <input type="email" name="email" required="">
                <label>E-mail</label>
             </div>
             <input type="submit" name="" value="Submit">
			
			 
          </form>
      </div>
   </body>
</html>

<?php
 
// Storing session data

include 'DatabaseConfig.php';
require_once "session.php";
include_once('class.phpmailer.php'); 
require_once('class.smtp.php');

 $email = $_POST["email"];
 $otp = rand(1000,100000);


         
         
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);


$sql2 = "SELECT * FROM user WHERE email = '$email' ";
$res2 = mysqli_query($con,$sql2);



//require_once "PHPMailerAutoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "sahebsshaikh8767@gmail.com";
$mail->FromName = "studcomp";
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";

// optional
// used only when SMTP requires authentication  
$mail->SMTPAuth = true;
$mail->Username = 'sahebsshaikh8767@gmail.com';
$mail->Password = 'SahebsGoogle8767';
//To address and name
$mail->addAddress($email, "Recepient Name");
$mail->addAddress($email); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("sahebsshaikh8767@gmail.com", "Reply");

//CC and BCC
$mail->addCC("sahebsshaikh8767@gmail.com");
$mail->addBCC("sahebsshaikh8767@gmail.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "OTP";
$mail->Body = "<i>OTP for studcomp login - </i>".$otp;
$mail->AltBody = "This is the plain text version of the email content";


 
// Storing session data
$_SESSION["name"] = $_POST["name"];;
$_SESSION["passwd"] = $_POST["password"];
$_SESSION["email"] = $email;
if(mysqli_num_rows($res2)!=0) 
{
 echo "<h2>User already exists</h2>";
}
else{

$sql = "INSERT INTO otp (value,email) VALUES ('$otp','$email')";

$result = mysqli_query($con,$sql);

/*header("Location:http://studcomp.c1.biz/otp.html");
die();*/
try {
    $mail->send();
    header("Location:otp.html");
	die();
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
mysqli_close($con);


 
}
?>

 
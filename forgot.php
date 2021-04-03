<?php
session_start();
include 'DatabaseConfig.php';
include_once('class.phpmailer.php'); 
 require_once('class.smtp.php');
$email = $_POST["email"];

 $otp = rand(1000,100000).substr($email,0,6);

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
$sql = "SELECT * FROM user WHERE email = '$email'";
$sql2 = "UPDATE user SET passwd = '$otp' WHERE email = '$email'";
$res = mysqli_query($conn,$sql);

if($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
else{
	if ($res->num_rows > 0) {
		mysqli_query($conn,$sql2);
		echo "ok";
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
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Forgot Password";
$mail->Body = "<i>New password - </i>".$otp;
$mail->AltBody = "This is the plain text version of the email content";


 try {
    $mail->send();
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
// Storing session data
		mysqli_close($conn);
	}
	else{
		echo "nok";
		mysqli_close($conn);
	}
}
?>

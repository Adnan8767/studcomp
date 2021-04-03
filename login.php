<?php
require_once "session.php";
include 'DatabaseConfig.php';
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])) {
    # code...

$email = $_POST["email"];
$passwd = $_POST["password"];

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
$sql = "SELECT * FROM user WHERE email = '$email'";
$res = mysqli_query($conn,$sql);

if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else{
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if($row["passwd"] == $passwd)
        {
            $_SESSION["userid"] = $row["id"];
            $_SESSION["user"] = true;
            mysqli_close($conn);
            header("location:index.php");
            die();
        }
        else{
            echo "Incorrect details";
        }
    }
    else{
        echo "User doesn't exists <a href=signup.html>sign up here</a>";
        
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
<style>
body {
	color: #fff;
	background: #000;
	visibility: visible;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: none;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 400px;
	margin: 30px auto;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2  {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr  {
	margin: 0 -30px 20px;
}    
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	min-width: 140px;
	margin-top: 30px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #2389cd !important;
	outline: none;
}
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #3598dc;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .hint-text  {
	padding-bottom: 15px;
	text-align: center;
}
#alertt{
visibility: hidden;
}
.loader {
	visibility: hidden;
	position: absolute;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  left: 45%;
  top:40%;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  z-index: 6;
}
#olay{
	visibility: hidden;
	position: fixed;
	top: 0px;
	bottom: 0px;
	width:100%;
	height: 100%;
	background:rgba(0,0,0,0.7);
	z-index: 5;
}
.loader~span{
	display: inline-block;
	position: absolute;
	visibility: hidden;
	z-index: 6;
	color:white;
	left: 44%;
	top:64%;
	font-family: 'Roboto', sans-serif;
	font-size: 26px;
}
#i2{
  display: inline-block;
  position:relative;
  top:-33px;
  left:90%;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
	<div class="alert alert-danger" role="alert" id="alertt">
</div>
<div id="olay">
	</div>
<div class="text-center">
 <div class="loader">
 </div>
  <span id="lmsg"> please wait... </span>
</div>
<div class="signup-form">
    <form action="" method="post" id="form1">
		<h2>Log in</h2>
		<p>Enter Credentials!</p>
		<hr>
        
        <div class="form-group">
        	<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="passwd" placeholder="Password" required="required">
             <i class="fa fa-eye" id="i2"></i>
        </div>
		
		<div class="form-group text-center">
         <button type="submit" class="btn btn-primary btn-lg" name="submit">Log in</button>
        </div>
        <div class="hint-text">Forgot Password? <a href="forgot.php" id="aa">click here</a></div>
          <div class="hint-text">Create new account <a href="signup.html">click here</a></div>
    </form>
</div>	
<div id="olay">
	
	</div>
	 <script src="//code.jquery.com/jquery.min.js"></script>
<script src='js/TableToJson.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jquery-XXX.js"></script>
    <script src="jquery.redirect.js"></script>
<script type="text/javascript">
	
	$("#aa").on('click',function(e)
    {
    	e.preventDefault();
    	var email = $("#email").val();
   		$('.loader').css('visibility', 'visible');
    	$('#olay').css("visibility","visible");
    	$("#alertt").css("visibility","hidden");
    	 $.ajax({
            type: "POST",
            data: {email:email},
            url: "forgot.php",
            success: function(data){
            	if(data=="ok")
            	{
            		
            		$('.loader').css('visibility', 'hidden');
    				$('#olay').css("visibility","hidden");
    				$("#alertt").removeClass("alert-danger");
     				$("#alertt").addClass( "alert-success" );
     				$("#alertt").html("New password sent to your email <i class='fa fa-check'></i>");
     				$("#alertt").css("visibility","visible");
            	}
            	else if(data=="nok")
            	{
            		$('#form1').trigger("reset");
            		$('.loader').css('visibility', 'hidden');
    				$('#olay').css("visibility","hidden");
     				$("#alertt").html("User doesn't exist , sign up <a href='signup.html'>Here !</a>");
     				$("#alertt").css("visibility","visible");
            	}
            }
           });
    });

  //Function for eye button in password field
    $("#i2").on('click', function(event) {
        event.preventDefault();
        var elm = $(this).siblings("#passwd")
        if(elm.attr("type") === "text"){
            elm.attr('type', 'password');
             elm.next("i").removeClass( "fa-eye-slash" );
            elm.next("i").addClass( "fa-eye" );
           
        }else if(elm.attr("type") === "password"){
            elm.attr('type', 'text');
            elm.next("i").removeClass( "fa-eye" );
          elm.next("i").addClass( "fa-eye-slash" );
        }
    });
</script>
</body>
</html>
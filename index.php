<?php
session_start();
if(!isset($_SESSION["userid"]) || $_SESSION["user"]!==true)
{
  header("Location:login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="nav.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   

<script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.min.js" integrity="sha512-2R8JJ9GapQ1VCvcazWIP4F7rOrMs6mzorqtZlXpvakAU0O/iw4n90CFrmG9+BwI//xxtnHxb5rbpkIF2s6z39w==" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.bootstrap.css" integrity="sha512-eauod+oRhJ84heQKG7Koq4RFiVEXhqhi14M+3+m/6XPJ/FmRHz4yDJ9mtz1X8HdOmQjdX69Wg8/rKal7lgEfsw==" crossorigin="anonymous" />

    <style type="text/css">
    	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    	@import url('https://fonts.googleapis.com/css2?family=Parisienne&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} 
html,body{
	height: 100%;
}
body{
	background-color: white;
	background-image: url("bg6.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

.cont{
  position:relative;
  z-index: 1;
  width: 100%;
  padding: 30px 30px;
  color: #1b1b1b;
  margin-top: -30px;
}
.cont div{
  font-size: 40px;
  font-weight: 700;
}
#ct{
  background:url("bb.png");
  background-size: 100% 100%;
  background-repeat: no-repeat;
    width:70%;
    font:25pt 'Gloria Hallelujah';
    color:rgba(255,255,255,0.7);
    text-shadow:0 0 4px rgba(255,255,255,0.6);
    height:350px;
    padding:50px;
	margin: 50px auto;
	text-align:center;
	position:relative;
	color :white;

}
p{padding-top:13px;
  font-family:'Parisienne',cursive;
  font-size:40px}

#qt{
  text-align:center;
  /*font-family:'Parisienne',cursive;*/
  font-size:40px;
  font-weight: lighter; 

  width: 90%;
  margin-left: 30px;
  word-wrap: break-word;
}
.mnc2{
	background-color: black;
	position: relative;
	text-align: center;
	color: white;
	padding: 10px;
	font-size:30px;
	margin-top: 40px;
	border-radius: 5px;
	font-family: 'Libre Baskerville', serif;
}
.mnc2 a{
	font-family: 'Libre Baskerville', serif;
	font-size: 30px;
	color: white;
}
@media (max-width: 1000px){
	.content{
		font-size: 20px;
	}
	#ct{
		width: 90%;
    height: 400px;

	}
  #qt{
    margin: 0;
    font-size: 30px;
    margin-top: 2%;
  }
}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
   <div class="logo">
      	<a href="index.html">
      		<img src="logo.png" alt=" ">
      		Studcomp
      	</a>
</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">contact us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<div class="cont row justify-content-center">
      <div id="ct" class="text-centered">
	  <blockquote id="qt">

		<p></p>
	  </blockquote>
	</div>
     
<div class="col-lg-7 col-xs-12 col-centered mnc2">
	<a href="schedule.php">Schedule</a> 
</div>
<div class="col-lg-7 col-xs-12 col-centered mnc2">
	<a href="#">Assignments</a>
</div>
<div class="col-lg-7 col-xs-12 col-centered mnc2">
	<a href="timetable.php">Timetable</a>
</div>
</div>
</div>
<script type="text/javascript">
	fetch("https://type.fit/api/quotes")
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {

// Converting JSON-encoded string to JS objec

// Accessing individual value from JS object
var now = new Date();
var start = new Date(now.getFullYear(), 0, 0);
var diff = (now - start) + ((start.getTimezoneOffset() - now.getTimezoneOffset()) * 60 * 1000);
var oneDay = 1000 * 60 * 60 * 24;
var day = Math.floor(diff / oneDay);
var qt = document.getElementById("qt");
qt.innerHTML = "&ldquo;" + data[day].text +"&rdquo;";
});
</script>
</body>
</html>

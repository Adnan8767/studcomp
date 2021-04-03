<?php
session_start();
if(!isset($_SESSION["userid"]) || $_SESSION["user"]!==true)
{
  header("Location:login.php");
  exit;
}
?>
<html translate="no">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="nav.css">
	<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

<style type="text/css">
	.schead{
		display: block;
		margin-left:-105px;
	}

body {
  background: #ff7e5f;
  background: -webkit-linear-gradient(to right, #ff7e5f, #feb47b);
  background: linear-gradient(to right, #ff7e5f, #feb47b);
  min-height: 100vh;
}

.rounded-lg {
  border-radius: 1rem;
}

.text-gray {
  color: #aaa;
}

div.h4 {
  line-height: 1rem;
}
.progress {
  width: 150px;
  height: 150px;
  background: none;
  position: relative;
}

.progress::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 6px solid #eee;
  position: absolute;
  top: 0;
  left: 0;
}

.progress>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: 1;
}

.progress .progress-left {
  left: 0;
}

.progress .progress-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 6px;
  border-style: solid;
  position: absolute;
  top: 0;
}

.progress .progress-left .progress-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}

.progress .progress-right {
  right: 0;
}

.progress .progress-right .progress-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
}

.progress .progress-value {
  position: absolute;
  top: 0;
  left: 0;
}
.save{
  display: inline-block;
  margin-left:-30px;
}
#fp{
	margin-bottom:80px;
}
.listt{
  color:white;
  margin:30px;
  padding: 10px;
  height: 150px;
  overflow: auto;
}
.listt h2{
  display: inline-block;
  position: absolute;
  left: 20;
  top:10;
  font-weight: bold;
}
.trash{
  display: inline-block;
  position: absolute;
  right: 20;
  top:20;
  font-size: 20px;
}
.descc{
  display: inline-block;
  margin-top: 20px;
  margin-bottom: 10px;
  position: absolute;
  left:20;
  width:60%;
}
input[type=time] {
  display: inline-block;
  position: absolute;
  bottom: 10;
  right: 10;
  width:30%;
  text-align:right;
  color:black;
  border: 0px;

}
#date{
  color:white;
}

	@media screen and (max-width: 992px) {
		.schead{
			margin-left: 0;
		}
	}
</style>
</head>
<body>
  <!--Navbar design-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
   <div class="logo">
      	<a href="index.php">
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
          <a class="nav-link" href="index.php">Home
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
          <a class="nav-link" href="#">Contact us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar end -->

<!-- Content start-->
<div class="card">
  <!--Heading-->
  <h3 class=" schead card-header text-center font-weight-bold py-4">Today's  Schedule</h3>

  <!--Buttons row-->
  <div class="card-body container text-center">
  	<div class="row d-flex justify-content-center">

      <!--Add to schedule button-->
      <span class="col-sm-12 col-lg-3 col-xl-3 mb-3 addy"><button type="button" class="btn btn-success" onclick="addsch()"><i class="fa fa-plus"></i> &nbsp; Add to schedule</button></span>
      
       <!--Date button-->
       <span class="col-sm-12 col-lg-3  mb-3 datee"><button type="button" class="btn btn-primary" id="date"><i class="fa fa-calendar"></i>&nbsp;</button></span>

       <!--Remove from schedule button-->
      <span class="col-sm-12 col-lg-4 col-xl-4 mb-3 save"><button type="button" class="btn btn-info" onclick="savee()"><i class="fa fa-save"></i>&nbsp;Save</button></span>
    </div>
  </div>
</div>
<!-- Button row end-->
<div class="card-body container content cont">
  <div class="row p-4" id="roww">
<!--Schedule list start -->
  <?php
         include 'DatabaseConfig.php';
        
// Create connection
         $id = $_SESSION["userid"];
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM schedule WHERE uid = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
 
  while($row = $result->fetch_assoc()) {
    $time = $row["time"];
		echo '<div class="col-sm-12 col-lg-5 col-xl-5 bg-primary p-4 listt">';
			echo '<h2 class=" float-left" style="font-weight:lighter" contenteditable="true">'.$row["title"].'</h2>';
			echo '<span> <span class="fa fa-trash float-right trash" onclick="deletee()"></span></span>';
			
			echo '<br>';
			echo '<span class="float-left descc" contenteditable="true">'.$row["descc"].'</span>';
      echo '<input type = "time" class="float-left timee" value='.$time.'>';
		echo '</div>';
		}
  }
    ?>
  </div>
</div>
    <!--Progress bar starts-->
    <div class="container py-5">
  <div class="row d-flex justify-content-center">

    <!-- For demo purpose -->
    <div class="col-lg-12 mx-auto mb-5 text-white text-center">
      <h1 class="display-4" style="font-weight: bold">Performance Progress Bar </h1>
     
      </p>
    </div>
    <!-- END -->

    <div class="col-xl-6 col-lg-6" id="fp">
      <div class="bg-white rounded-lg p-5 shadow">
        <h2 class="h6 font-weight-bold text-center mb-4">Overall progress</h2>

        <!-- Progress bar 1 -->
        <?php include 'DatabaseConfig.php';
        
// Create connection
         $id = $_SESSION["userid"];
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM schedule WHERE uid = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
 
  $row = $result->fetch_assoc();
  $prog = $row["prog"];
  echo '<div class="progress mx-auto tp2" id ="tp" data-value='.$prog.'>';
}
else{
  echo '<div class="progress mx-auto tp2" id ="tp2" data-value=0>';
}
mysqli_close($conn);
?>
  
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold gg">0<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- END -->
        </div>
    </div>
    <div class="col-xl-7 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
        <h2 class="h6 font-weight-bold text-center mb-4">Today's Progress</h2>

        <!-- Progress bar 4 -->
          <?php include 'DatabaseConfig.php';
        
// Create connection
         $id = $_SESSION["userid"];
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM schedule WHERE uid = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
 
  $row = $result->fetch_assoc();
  $prog = $row["prog"];
  echo '<div class="progress mx-auto tp2" id ="tp2" data-value='.$prog.'>';
}
else{
  echo '<div class="progress mx-auto tp2" id ="tp2" data-value=0>';
}
mysqli_close($conn);
?>
      
          <span class="progress-left">
                        <span class="progress-bar border-warning"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-warning"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold gg">0<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- END -->

        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">0%</div><span class="small text-gray">Last week</span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">0%</div><span class="small text-gray">Last month</span>
          </div>
        </div>
        <!-- END -->
      </div>
    </div>
  </div>
</div>
  </div>
  </div>
  <!--Progress bar end-->


<!-- Script starts-->
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="jquery.min.1.11.1.js" type="text/javascript"></script>  
	<script type="text/javascript">

    $(document).ready(function()
    {
      progchange();
      var ct = $(".trash").length;
      $(".trash").click(function()
      {
          if(confirm("Have you completed this task ?")){

            $(this).parent().parent().remove();
            var prog =  $(".tp2").attr("data-value");
            var p = (1/ct)*100;
            add = parseInt(p);
            $(".tp2").attr("data-value",add);
            progchange();
            $.ajax({
            type: "POST",
            data:{flag:3,prog:p},
            url: "sched.php",
            success: function(data){
       
                }
            });

          }
          else{
            
          }
      });
    });
      window.onload = function()
      {
        var d = new Date();
        var y = d.getFullYear();
        var m = d.getMonth();
        var dd = d.getDate();
        var el = document.getElementById("date");
        el.innerHTML = el.innerHTML+dd+" / "+m+" / "+y;
      }
  //Add to schedule function
		function addsch()
		{
			var obj = document.createElement("div");
			obj.setAttribute("class","listt col-sm-12 col-lg-5 col-xl-5 bg-primary text-white p-4");
			obj.innerHTML = "<h2 class='float-left'style='font-weight:lighter' contenteditable='true'>Title</h2><span> <span class='fa fa-trash float-right trash'></span></span><br><span class ='float-left descc' contenteditable='true'>Description</span><input type ='time' class='float-left timee'>";
			document.getElementById("roww").appendChild(obj);
      var prog =  $(".tp2").attr("data-value");
            var p = (1/ct)*100;
            var add = prog+parseInt(p);
            if(prog<p)
            {
            $(".tp2").attr("data-value",parseInt(p)-parseInt(prog));
           }
           else{
              $(".tp2").attr("data-value",parseInt(prog)-parseInt(p));
           }
           location.reload();
		}


    //Progress bar value adder function
  function progchange()
  {
  $(".progress").each(function() {

    var value = $(this).attr('data-value');
    var left = $(this).find('.progress-left .progress-bar');
    var right = $(this).find('.progress-right .progress-bar');
    $(".gg").html(value+'<sup class="small">%</sup>');
    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      } else {
        right.css('transform', 'rotate(180deg)')
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
      }
    }

  });
}

//Function to convert percentage to degrees
  function percentageToDegrees(percentage) {

    return percentage / 100 * 360;

  }

  


function savee()
{
  $.ajax({
            type: "POST",
            data:{flag:0},
            url: "sched.php",
            success: function(data){
       
                }
            });
  var el = document.getElementsByClassName("listt");
  var ct = el.length;
 for(var i =0;i<ct;i++)
 {
    var title = el[i].childNodes[0].innerHTML;
    var desc = el[i].childNodes[3].innerHTML;
    var time = el[i].childNodes[4].value;
    var prog = $("#tp2").attr("data-value");
    $.ajax({
            type: "POST",
            data:{flag:1,title:title,desc:desc,timee:time,prog:prog},
            url:"sched.php",
            success: function(data){
                }
            });
 }
 alertify.alert("Saved successfully");
}
	
	</script>
</body>
</html>
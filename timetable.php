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
 <script type="text/javascript" src="jquery-1.3.2.js"> </script>

<!-- JavaScript -->
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
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
  <div class="text-center">
 <div class="loader">
 </div>
</div>
<div id="olay">
  </div>
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
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Time table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center" id="tablee">
        <thead>
          <tr>
          	<th class="text-center">Time</th>
            <th class="text-center">Monday</th>
            <th class="text-center">Tuesday</th>
            <th class="text-center">Wednesday</th>
            <th class="text-center">Thursday</th>
            <th class="text-center">Friday</th>
            <th class="text-center">Saturday</th>
            <th class="text-center">Remove</th>
          </tr>
        </thead>
        <tbody id="tboc">
         
          <!-- This is our clonable table line -->
    <?php
         include 'DatabaseConfig.php';
        
// Create connection
         $id = $_SESSION["userid"];
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM days WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
 
  while($row = $result->fetch_assoc()) {
          echo "<tr>";
          $time = $row["timee"];
          echo "<td class=text-center contenteditable=true><input type='time' class='timme' value =".$time.">
          $time
          </td>";
           echo "<td class=pt-3-half contenteditable=true>". $row["mon"]."</td>";
            echo "<td class=pt-3-half contenteditable=true>". $row["tue"]."</td>";
             echo "<td class=pt-3-half contenteditable=true>". $row["wed"]."</td>";
              echo "<td class=pt-3-half contenteditable=true>". $row["thur"]."</td>";
               echo "<td class=pt-3-half contenteditable=true>". $row["fri"]."</td>";
                echo "<td class=pt-3-half contenteditable=true>". $row["sat"]."</td>";
               echo "<td> <span class=table-remove><button type=button class='btn btn-danger btn-rounded btn-sm my-0'>Remove</button></span></td>";
                echo "</tr>";
             
  }
} else {
  echo "Add something in table";
}

?>

       
</tbody>
</table>
</div>
    <div class="text-center">
    <button type="button" class="btn btn-success" id="save" onclick="sd()">Save</button>
     <button type="button" class="btn btn-primary" id="save" onclick="xd()">Export</button>
     <button type="button" class="btn btn-info" id="convert">Image</button>
</div>
  </div>
</div>

<div id="result">
         <!-- Result will appear be here -->
      </div>
<!-- Editable table -->
<script src="//code.jquery.com/jquery.min.js"></script>
<script src='js/TableToJson.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="jquery.min.1.11.1.js" type="text/javascript"></script>  
<script src="jquery.tabletoCSV.js" type="text/javascript"></script>  
<script type="text/javascript" src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
<script type="text/javascript">
  
  function sd()
  {
 var table = $("#tablee");
$.ajax({
            type: "POST",
            data:"ok",
            url: "foo1.php",
            success: function(data){
       
                }
            });
    a=[]
table.find('tr').each(function (i, el) {
        if(i<=0)
        {
        }
        else{
          var $tds = $(this).find('td'),
           item = {}
          item["time"] = $tds.eq(0).children("input").val(),//eq(0).text(),
         item["mon"] = $tds.eq(1).text(),
          item["tue"] = $tds.eq(2).text(),
          item["wed"] = $tds.eq(3).text(),
          item["thur"]= $tds.eq(4).text(),
          item["fri"]= $tds.eq(5).text(),
          item["sat"]= $tds.eq(6).text();
        a.push(item);
      }
    });
      var aa = JSON.stringify(a);
        $.ajax({
            type: "POST",
            data:{aray:aa},
            url: "test.php",
            success: function(data){
                  console.log("success");
                }
            });
        alertify.alert('Saved successfully');
    }
//Export to excel
function xd() 
{
var url = 'data:application/vnd.ms-excel,' + encodeURIComponent($('#table').html())
    location.href = url
    return false
}

function convertToImage()
{
   var resultDiv = document.getElementById("result");
            html2canvas(document.getElementById("table"), {
                onrendered: function(canvas) {
                    var img = canvas.toDataURL("image/png");
                    result.innerHTML = '<a download="test.jpeg" href="'+img+'">test</a>';
                    }
            });
             var url = img.replace(/^data:image\/[^;]+/, 'data:application/octet-stream'); window.open(url);
}
        var convertBtn = document.getElementById("convert");
         convertBtn.addEventListener('click', convertToImage);
//Table manipulation functions
const $tableID = $('#table');
 const $BTN = $('#export-btn');
 const $EXPORT = $('#export');

 const newTr = `
<tr class="hide">
 <td class="pt-3-half" contenteditable="true"><input type='time' class='timme' value=''></td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
   <td class="pt-3-half" contenteditable="true">Example</td>
  <td>
    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button></span>
  </td>
</tr>`;

 $('.table-add').on('click', 'i', () => {

   const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');

   if ($tableID.find('tbody tr').length === 0) {

     $('tbody').append(newTr);
   }

   $tableID.find('table').append($clone);
 });

 $tableID.on('click', '.table-remove', function () {
   $(this).parents('tr').detach();
 });

 $tableID.on('click', '.table-up', function () {

   const $row = $(this).parents('tr');

   if ($row.index() === 0) {
     return;
   }

   $row.prev().before($row.get(0));
 });

 $tableID.on('click', '.table-down', function () {

   const $row = $(this).parents('tr');
   $row.next().after($row.get(0));
 });

 // A few jQuery helpers for exporting only
 jQuery.fn.pop = [].pop;
 jQuery.fn.shift = [].shift;

 $BTN.on('click', () => {

   const $rows = $tableID.find('tr:not(:hidden)');
   const headers = [];
   const data = [];

   // Get the headers (add special header logic here)
   $($rows.shift()).find('th:not(:empty)').each(function () {

     headers.push($(this).text().toLowerCase());
   });

   // Turn all existing rows into a loopable array
   $rows.each(function () {
     const $td = $(this).find('td');
     const h = {};

     // Use the headers from earlier to name our hash keys
     headers.forEach((header, i) => {

       h[header] = $td.eq(i).text();
     });

     data.push(h);
   });
   
//save table to database

   // Output the result
   $EXPORT.text(JSON.stringify(data));
 });
</script>

</body>
</html>

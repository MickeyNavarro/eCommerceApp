<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 8, 2018 
//This is my own work.
//shows the form to create an order report

require_once '../../Header.php';
require_once '../../AutoLoader.php';
//require_once 'showUserAdmin.php';


//http://www.javascriptkit.com/javatutors/createelementcheck2.shtml
?>
<head>
<meta charset="UTF-8">
<title>Search</title>
<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<style>
body { 
 background-color: white; 
 color: black; 
 font-family: 'Vampiro One', cursive;
}
.centerHalf { 
 margin: auto;
 height:400px; 
 padding: 40px;
 position: relative;
 border: 15px solid #80ffbf;
 border-radius: 50px;
 background-color: #161616;
 color:white; 
 
}
input {
 border-radius: 5px; 
 font-family: 'Vampiro One', cursive;
 width:100%;
}
h1 {
 color:#80ffbf;
 
}
h2 { 
  color:black; 
}
.btn {
  color: #161616;
  border: none;
  cursor: pointer;
}
</style>

<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
</script> 
<script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#startdate').datepicker({dateFormat: "yy-mm-dd"});
    })
}
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#enddate').datepicker({dateFormat: "yy-mm-dd"});
    })
}
</script>

</head>
<body>
<br><br><br>
<div class = "centerHalf">
<h1>Generate an order report:</h1>
<form class = "inputForm" action = "/eCommerceApp/Presentation/Process/processOrdersReport.php"> 
	<div class = "form-group" name = "startdate" type = "date">
		<label for = "startdate">
		Start Date: 
		</label>
		<input class = "form-control" name = "startdate" type= "date" id = "startdate" required>
	</div>
	<div class = "form-group" name = "enddate" type = "date">
		<label for = "enddate">
		End Date: 
		</label>
		<input class = "form-control" name = "enddate" type= "date" id = "enddate" required>
	</div>

	<a class = "btn btn-light btn-lg" href = "/eCommerceApp/Presentation/Show/showHome.php">Cancel</a>
	<button class = "btn btn-light btn-lg" type = "submit">Generate Report</button>
</form>
</div>

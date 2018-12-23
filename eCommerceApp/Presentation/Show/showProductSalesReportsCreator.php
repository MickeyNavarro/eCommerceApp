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
.forms { 
 margin: auto;
 width: 610px;
 height: 500px; 
 padding: 40px;
 position: relative;
 border: 25px solid #80ffbf;
 border-radius: 50px;
 background-color: black; 
 
}
input {
 border-radius: 5px; 
 font-family: 'Vampiro One', cursive;
}
h1 {
 color:#80ffbf;
}
.btn {
  background-color: #80ffbf;
  color: white;
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
<br><br><br>
<body>
<h1>Generate a product sales report:</h1>
<div class = "centerHalf">
<form class = "inputForm" action = "/eCommerceApp/Presentation/Process/processProductSalesReport.php"> 
	<div class = "form-group" name = "startdate" type = "date">
		<label for = "startdate">
		Start Date: 
		</label>
		<input class = "form-control" name = "startdate" type= "date" id = "startdate">
	</div>
	<div class = "form-group" name = "enddate" type = "date">
		<label for = "enddate">
		End Date: 
		</label>
		<input class = "form-control" name = "enddate" type= "date" id = "enddate">
	</div>

	<a class = "btn btn-light" href = "">Cancel</a>
	<input class = "btn btn-primary" type = "submit" value = "Generate Report">
</form>
</div>
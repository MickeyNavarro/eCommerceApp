<?php 
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//shows a search page for finding a certain user or product

require_once '../../Header.php';
?>
<!DOCTYPE html>
<html>
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
</head>
<body>
<br><br><br>
<?php if (isset($_SESSION['ROLE'])) { 
		    if ($_SESSION['ROLE'] == '1'){
?>
<div class = "forms" style = "height: 500px;">
 <div class="userSearch">
<h1>Search for user(s):</h1>
<form action= "/eCommerceApp/Presentation/Process/processUserSearch.php" method = "POST"> 
	<input name = "userSearch" type="text" required><br><br>
	<input class = "btn btn-light btn-lg" value="Search" type="submit">
</form>
</div>
<br><br><br>
<?php
		    }
		    else {
?>
<div class = "forms" style = "height: 300px;">
<?php 
		    }
    }
    else {
?>
<div class = "forms" style = "height: 300px;">
<?php 
    }
?>
<div class="">
<h1>Search for product(s):</h1>
<form action="/eCommerceApp/Presentation/Process/processProductSearch.php" method="POST">
	<input type ="text" name="productSearch" required><br><br>
	<input class = "btn btn-light btn-lg" type="submit" value="Search">	
</form>
</div>
</div>
</body>
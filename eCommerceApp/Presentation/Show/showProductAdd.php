<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//shows the add form for a new product

require_once '../../Header.php';
require_once '../../Autoloader.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add a New Product</title>
<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<style>
body { 
 background-color: white; 
 color: black; 
 font-family: 'Vampiro One', cursive;
}
.forms { 
 margin: auto;
 height: 850px; 
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
hr { 
 border-width: 3px;
 border-style: inset;
}
</style>
</head>
<body>
<br><br><br>
<div class = "forms">
<h1>Add a New Product:</h1>
<form action="/eCommerceApp/Presentation/Process/processProductAdd.php" method="POST" enctype="multipart/form-data">
	<p>Product Name: </p><input type ="text" name="productname" required><br>
	<p>Description: </p><input type ="text" name="description" required><br>
	<p>Price: </p><input type ="text" name="price" required><br>
	<p>Quantity: </p><input type ="text" name="quantity" required><br><br>
    	<p>Photo #1: </p><input type="file" name="fileToUpload1" id="fileToUpload1" ><br><br>
    		<hr>
    	<p>Photo #2: </p><input type="file" name="fileToUpload2" id="fileToUpload2" ><br><br>
    		<hr>
    	<p>Photo #3: </p><input type="file" name="fileToUpload3" id="fileToUpload3" ><br><br>
	<a class = "btn btn-light btn-lg" href = "/eCommerceApp/Presentation/Show/showHome.php">Cancel</a>
	<button class = "btn btn-light btn-lg" type="submit">Add Product</button></form>
</div>
</body>
</html>
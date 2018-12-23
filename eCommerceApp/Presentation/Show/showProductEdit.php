<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//shows the edit form for a prodcut

require_once '../../Header.php';
require_once '../../Autoloader.php';

//checks if role status is admin (ROLE = 1)
if ($_SESSION['ROLE'] != '1') {
    echo "Please login as an admin<br>";
    exit;
}

//get ID from product admin page
$id = $_POST['id'];

//create a new instance of the PBS class
$bs = new ProductBusinessService();

//find the product info by their given id
$product = $bs->findByID($id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Product</title>
<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<style>
body { 
 background-color: white; 
 color: black; 
 font-family: 'Vampiro One', cursive;
}
.forms { 
 margin: auto;
 height: 1050px; 
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
 <div class="userSearch">
<h1>Edit Product:</h1>
<form action= "/eCommerceApp/Presentation/Process/processProductEdit.php" method = "POST" enctype="multipart/form-data"> 
	<p>ID: </p><input type ="text" name="id" value = "<?php echo $product->getProduct_id() ?>" required><br>
	<p>Product Name: </p><input type ="text" name="productname" value = "<?php echo $product->getProduct_name() ?>"required><br>
	<p>Description: </p><input type ="text" name="description"  value = "<?php echo $product->getDescription()?>" required><br>
	<p>Price: </p><input type ="text" name="price" value = "<?php echo $product->getPrice()?>" required><br>
	<p>Quantity: </p><input type ="text" name="quantity" value = "<?php echo $product->getQuantity()?>"required><br><br>
	<p>Current Photo #1: <?php echo $product->getPhoto1()?></p><input type="hidden" name = "photo1" id ="photo1" value = "<?php echo $product->getPhoto1()?>">
    	<p>New Photo #1: </p><input type="file" name="fileToUpload1" id="fileToUpload1" ><br><br>
	<hr>
    	<p>Current Photo #2: <?php echo $product->getPhoto2()?></p><input type="hidden" name = "photo2" id ="photo2" value = "<?php echo $product->getPhoto2()?>">
    	<p>New Photo #2: </p><input type="file" name="fileToUpload2" id="fileToUpload2" ><br><br>
	<hr>
    	<p>Current Photo #3: <?php echo $product->getPhoto3()?></p><input type="hidden" name = "photo3" id ="photo3" value = "<?php echo $product->getPhoto3()?>">
    	<p>New Photo #3: </p><input type="file" name="fileToUpload3" id="fileToUpload3" ><br><br>
	<a class = "btn btn-light btn-lg" href = "/eCommerceApp/Presentation/Show/showProductAdmin.php">Cancel</a>
	<button class = "btn btn-light btn-lg" type="submit">Commit changes</button>
</form>
</div>
</div>
</body>
</html>
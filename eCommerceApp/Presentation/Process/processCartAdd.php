<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 9, 2018
//This is my own work.

//processes adding a product to the user's cart & sets the cart session variables
require_once '../../Autoloader.php';
require_once '../../Header.php'; //holds the session start 

//get the product id from the button that was clicked
$prod_id = $_GET['prod_id'];

//checks if the cart session was set
if (isset($_SESSION['cart'])) { 
    $c = $_SESSION['cart']; 
}
else { 
    echo "Please login first<br>";
    exit; 
}
//add an item to the cart
$c->addItem($prod_id); 
$c->calcTotal(); 

//save the cart as a session variable
$_SESSION['cart'] = $c; 

//redirect the user to show their cart
header("Location:/eCommerceApp/Presentation/Show/showCart.php"); 
?>
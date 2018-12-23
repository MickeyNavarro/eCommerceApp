<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 30, 2018
//This is my own work.

require_once '../../Autoloader.php';
require_once '../../Header.php'; //holds the session start

//checks if the cart session was set
if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
}
else {
    if (isset($_SESSION['ID'])){
        $c = new Cart($_SESSION['ID']);
    }
    else {
        echo "Please login first<br>";
        exit;
    }
}

//get the id of the product
$prod_id = $_GET['id'];
echo $prod_id;

//use the BusinessService class to update the old quantity
$c->deleteByID($prod_id);

//checks if cart is empty, unsets the cart session
if (count($c->getItems()) == 0) {
    unset($_SESSION['cart']);
}

//update the total cost
$c->calcTotal();

//show the updated quantity & costs in the cart by redirecting the user to show their cart
header("Location: /eCommerceApp/Presentation/Show/showCart.php"); 
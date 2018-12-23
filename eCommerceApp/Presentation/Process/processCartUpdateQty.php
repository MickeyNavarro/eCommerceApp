<?php 
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 2, 2018
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

//get the id & chosen updated quantity of the product
$prod_id = $_GET['id']; 
$qty = $_GET['qty']; 

//use the BusinessService class to update the old quantity
$c->updateQuantity($prod_id, $qty);

//update the total cost
$c->calcTotal(); 

//show the updated quantity & costs in the cart by redirecting the user to show their cart
header("Location: /eCommerceApp/Presentation/Show/showCart.php"); 

?>


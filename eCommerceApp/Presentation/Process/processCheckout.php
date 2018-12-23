<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 2, 2018

require_once '../../Autoloader.php';
require_once '../../Header.php'; //holds the session start 

//check if you are logged in or have a cart with products 
if (isset($_SESSION['ID'])) {
    $userid = $_SESSION['ID'];
    if (isset($_SESSION['cart'])) { 
       $c = $_SESSION['cart'];
    }
    else {
        echo "<br><br><br>Nothing is in your cart yet! <br>";
    }
}
else{
    echo "<br><br><br>Please login first!<br>";
    exit;
}

//check if card is valid or not
$card_id = null;
$card_name = $_GET['cardname'];
$card_number= $_GET['cardnumber'];
$expiration_month = $_GET['expmonth'];
$expiration_year= $_GET['expyear'];
$cvv = $_GET['cvv'];

$ccservice = new CreditCardService($card_id, $card_name, $card_number, $expiration_month, $expiration_year, $cvv); 
if ($ccservice->authenticate($card_id, $card_name, $card_number, $expiration_month, $expiration_year, $cvv)) {
    echo "<br><br><br>Credit card was authenticated!<br>"; 
}
else {
    echo "<br><br><br>Credit card failed!<br>"; 
    exit; 
}

//get the items' attributes from the cart 
$items = $c->getItems(); 
$total = $c->getTotal_price(); 

//make a new order
$order = new Orders(null, date("Y/m/d h:i:sa"), $total, $_SESSION['ID'], 1);
 
//make a new instance of the OBS class to checkout
$orderbs = new OrderBusinessService(); 

//check out 
$checkOut = $orderbs->checkOut($order, $c); 

//empty the cart of its contents 
empty($_SESSION['cart']); 

//create a new cart session variable
$_SESSION['cart'] = new Cart($_SESSION['ID']);





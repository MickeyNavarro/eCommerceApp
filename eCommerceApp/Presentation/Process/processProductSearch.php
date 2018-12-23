<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//searches for a product; uses _displayProductSearchResults.php to display the results


ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//save search form data
$ps = $_POST['productSearch'];

//check if search form data is valid
if ($ps == NULL || trim($ps)== "") {
    return null; 
}

//use the ProductService class to authenticate the credentials (LOGIN)
$service1 = new ProductBusinessService();
$products = $service1->findByProductName($ps);
if($products) {
    include('_displayProductSearchResultsCards.php');
}
else{
    include('_displayNoSearchResultsFound.php');
}
?>
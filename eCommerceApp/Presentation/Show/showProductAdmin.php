<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//shows all the products on the website

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//checks if role status is admin (1)
if ($_SESSION['ROLE'] != '1') {
    echo "Please login as an admin<br>";
    exit;
}

$bs = new ProductBusinessService();
$products= $bs->showAll();
require_once '/Applications/MAMP/htdocs/eCommerceApp/Presentation/Process/_displayProductAdmin.php';
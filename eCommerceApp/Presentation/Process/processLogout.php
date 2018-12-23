<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 10, 2018
//This is my own work.
//processes the logout

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//unset the session variables 
unset( $_SESSION['ROLE']);
unset($_SESSION['ID']); 
unset($_SESSION['USERNAME']); 
unset($_SESSION['cart']);
unset($_SESSION['principal']);
unset($_SESSION['loginpopup']); 
$_SESSION['logoutpopup'] = "2"; 

//REDIRECT THEM TO THE HOME PAGE
header("Location:/eCommerceApp/Presentation/Show/showHome.php");
?>
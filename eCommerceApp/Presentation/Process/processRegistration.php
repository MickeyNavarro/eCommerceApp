<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//September 20, 2018
//This is my own work.
//processes a registration 

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//save registration form data
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

//check if registration form data is valid
if ($firstname == NULL || trim($firstname)== "") {
    exit ("First Name is a required field");
}
if ($lastname == NULL || trim($lastname)== "") {
    exit("Last Name is a required field");
}
if ($username == NULL || trim($username)== "") {
    exit ("Username is a required field");
}
if ($password == NULL || trim($password)== "") {
    exit("Password is a required field");
} 

//use the SecurityService class to create a user (REGISTER)
$service2 = new SecurityService($username, $password);
$registerSuccess = $service2->register();
if($registerSuccess) {
    $_SESSION['principal'] = "1";
    $_SESSION['registerpopup'] = "1";
    header("Location:/eCommerceApp/Presentation/Show/showHome.php");
}
else{
    $_SESSION['principal'] = "2";
    $_SESSION['registerpopup'] = "2";
    header("Location:/eCommerceApp/Presentation/Show/showHome.php");
}


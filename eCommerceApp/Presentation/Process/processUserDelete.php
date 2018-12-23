<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//processes the user deletes

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//save edit user form data
$id = $_GET['id'];

//use the BusinessService class to update the user
$service2 = new UserBusinessService();
$deleteSuccess = $service2->deleteItemByID($id);
if($deleteSuccess) {
    echo "<br><br><br>Account has been deleted!";
}
else{
    echo "<br><br><br>Error! Account has NOT been deleted.";
}
?>
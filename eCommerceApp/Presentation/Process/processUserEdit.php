<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//processes the user edits

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//save edit user form data
$id = $_POST['id']; 
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$role = $_POST['role'];

//create a new instance of the user to update their info 
$user = new Users($id, $firstname, $lastname, $username, $password, $role); 

//use the BusinessService class to update the user 
$service2 = new UserBusinessService();
$editSuccess = $service2->updateOne($id, $user);
if($editSuccess) {
    echo "<br><br><br>Changes have been saved!";
}
else{
    echo "<br><br><br>Error! Changes have NOT been saved.";
}
?>
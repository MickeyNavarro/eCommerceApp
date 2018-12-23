<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//processes product deletes

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

//save edit product form data
$id = $_GET['id'];

$pbs = new ProductBusinessService(); 
$product = $pbs->findByID($id); 
$fileToDelete1 = $product->getPhoto1(); 
$fileToDelete2 = $product->getPhoto2();
$fileToDelete3 = $product->getPhoto3();


//First, delete the photo(s)
$target_dir = "/Applications/MAMP/htdocs/eCommerceApp/ProductPhotos/";
$target_file1 = $target_dir . basename($fileToDelete1);
unlink($target_file1);

if (!$fileToDelete2 == null) {
    $target_dir = "/Applications/MAMP/htdocs/eCommerceApp/ProductPhotos/";
    $target_file2 = $target_dir . basename($fileToDelete2);
    unlink($target_file2);
}

if (!$fileToDelete3 == null) {
    $target_dir = "/Applications/MAMP/htdocs/eCommerceApp/ProductPhotos/";
    $target_file3 = $target_dir . basename($fileToDelete3);
    unlink($target_file3);
}

//Second, delete the product from the database
//use the BusinessService class to update the user
$service2 = new ProductBusinessService();
$deleteSuccess = $service2->deleteItemByID($id);
if($deleteSuccess) {
    echo "<br><br><br>Product has been deleted!";
}
else{
    echo "<br><br><br>Error! Product has NOT been deleted.";
}
?>
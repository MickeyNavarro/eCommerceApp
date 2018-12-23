<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//September 20, 2018
//This is my own work.

if(isset($_SESSION['principal']) == "2" || $_SESSION['principal'] == null) { 
    header("Location: /eCommerceApp/Presentation/Show/showHome.php"); 
}
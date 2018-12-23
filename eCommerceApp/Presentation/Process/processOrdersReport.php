<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 8, 2018 
//This is my own work.
//processes the form to create an order report

require_once '../../Header.php';
require_once '../../AutoLoader.php';

$sdate = $_GET['startdate']; 
$edate = $_GET['enddate']; 
$orderbs = new OrderBusinessService(); 
$userbs = new UserBusinessService(); 

$orders = $orderbs->getOrdersBetweenDatesForOrderReport($sdate, $edate); 

if ($orders == null ) { 
    echo "Sorry, no orders have been found within that date range!"; 
    exit; 
}

include '_displayOrdersReportsTable.php';
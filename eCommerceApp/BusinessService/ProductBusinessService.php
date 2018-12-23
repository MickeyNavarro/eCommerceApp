<?php
require_once '../../Autoloader.php';

class ProductBusinessService
{
    function findByProductName($n) { 
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByProductName($n); 
        
        return $products;
    }
    function findByKeywordInDescription($n) {
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByKeywordInDescription($n);
        
        return $products;
    }
    function findByPriceRange($n) {
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByPriceRange($n);
        
        return $products;
    }
    function findByID($id){
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByID($id);
        
        return $products;
    }
    function addNewProduct(){
        $dbservice = new ProductDataService();
        $add = $dbservice->addNewProduct(); 
        
        return $add;
    }
    function deleteItemByID($id){
        $dbservice = new ProductDataService();
        $delete = $dbservice->deleteItemByID($id);
        
        return $delete;
    }
    function updateOne($id, $product){
        $dbservice = new ProductDataService();
        $edit = $dbservice->updateOne($id, $product);
        return $edit;
    }
    function showAll() {
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->showAll();
        
        return $products;
    }
}


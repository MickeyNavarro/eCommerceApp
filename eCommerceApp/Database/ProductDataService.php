<?php
require_once '../../Autoloader.php';
require_once '../../Header.php';

class ProductDataService { 
    
    // returns an array of products found by name
    function findByProductName($n){
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRICE, QUANTITY, PHOTO1, PHOTO2, PHOTO3 FROM PRODUCTS WHERE PRODUCT_NAME LIKE ?");
        
        //make sure to modify the set parameter so that it will find the value in any position
        $like_n = "%".$n."%";
        
        //bind, execute, and get results
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        //checks if result didn't work
        if (!$result) {
            echo "assume the SQL statement has an error";
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $product_array = array();
            while ($product = $result->fetch_assoc()){
                
                array_push($product_array, $product);
                
            }
            
            return $product_array;
        }
    }
    
    // returns an array of products found by keyword in description
    function findByKeywordInDescripton($n){
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRICE, QUANTITY, PHOTO1, PHOTO2, PHOTO3 FROM PRODUCTS WHERE DESCRIPTION LIKE ?");
        
        //make sure to modify the set parameter so that it will find the value in any position
        $like_n = "%".$n."%";
        
        //bind, execute, and get results
        $stmt->bind_param("s", $like_n);
        $stmt->execute();
        $result = $stmt->get_result();
        
        //checks if result didn't work
        if (!$result) {
            echo "assume the SQL statement has an error";
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $product_array = array();
            while ($product = $result->fetch_assoc()){
                
                array_push($product_array, $product);
                
            }
            
            return $product_array;
        }
    }
    
    // returns an array of products found by price range
    function findByPriceRange($min, $max){
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRICE, QUANTITY, PHOTO1, PHOTO2, PHOTO3 FROM PRODUCTS WHERE PRICE BETWEEN ? AND ?");
           
        //bind, execute, and get results
        $stmt->bind_param("ss", $min, $max);
        $stmt->execute();
        $result = $stmt->get_result();
        
        //checks if result didn't work
        if (!$result) {
            echo "assume the SQL statement has an error";
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $product_array = array();
            while ($product = $result->fetch_assoc()){
                
                array_push($product_array, $product);
                
            }
            
            return $product_array;
        }
    }
    // returns a product object found by id
    function findByID($id) {
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statments
        $stmt = $connection->prepare("SELECT * FROM PRODUCTS WHERE ID = ?  LIMIT 1");
        
        //bind, execute, and get results
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        //checks if the result didn't work
        if (!$result) {
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $product_array = array();
            while ($product = $result->fetch_assoc()){
                array_push($product_array, $product);
            }
        }
        
        //return the results as a product object
        $product = new Products($product_array[0]['ID'], $product_array[0]['PRODUCT_NAME'], $product_array[0]['DESCRIPTION'], $product_array[0]['PRICE'], $product_array[0]['QUANTITY'], $product_array[0]['PHOTO1'], $product_array[0]['PHOTO2'], $product_array[0]['PHOTO3']);
        return $product;
    }
    
    //method to allow the user to create a new product
    function addNewProduct() {
        //create new instance of database class & get the connection
        $conn = new Database();
        $connection = $conn->getConnection();
        
        //get data from product form 
        $productname = $_POST['productname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        //returns an array 
        $photo1 = $_FILES['fileToUpload1'];
        $photo2 = $_FILES['fileToUpload2'];
        $photo3 = $_FILES['fileToUpload3'];

        //extract just the file name of the photo and return as a string
        $like_photo1 = $photo1['name'];
        $like_photo2 = $photo2['name'];
        $like_photo3 = $photo3['name'];
                        
        //create a prepared statement
        $sql = $connection->prepare("INSERT INTO PRODUCTS (ID, PRODUCT_NAME, DESCRIPTION, PRICE, QUANTITY, PHOTO1, PHOTO2, PHOTO3) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);");
        
        //bind, execute, and get results
        $sql->bind_param("ssdisss", $productname, $description, $price, $quantity, $like_photo1, $like_photo2, $like_photo3);
        $result = $sql->execute();
        
        //checks if data was inserted into form
        if ($result) {
            return true;
        }
        else {
            return false;
        }
  
        //destroy the connection between the PHP code and the database
        mysqli_close($connection);
    } 
    
    //$id is the number to delete; returns a true(success) or false(failure)
    function deleteItemByID($id) {
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statments
        $stmt = $connection->prepare("DELETE FROM PRODUCTS WHERE ID = ? LIMIT 1");
        
        //bind and execute
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        
        //checks if the result didn't work
        if ($result){
            return true;
        }
        else {
            return false;
        }
    }
    
    //updates info about a PRODUCT; returns a true (success) or false(failure)
    function updateOne($id, $product){
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("UPDATE PRODUCTS SET PRODUCT_NAME = ?, DESCRIPTION = ?, PRICE = ?, QUANTITY = ?, PHOTO1 = ?, PHOTO2 = ?, PHOTO3 = ? WHERE ID = ?");
        
        //get the attributes of the product
        $pn = $product->getProduct_name();
        $d = $product->getDescription();
        $p = $product->getPrice();
        $q = $product->getQuantity();
        $ph1 = $product->getPhoto1();
        $ph2 = $product->getPhoto2(); 
        $ph3 = $product->getPhoto3();
        
        //bind the data and execute the prepared statment
        $stmt->bind_param("ssdisssi", $pn, $d, $p, $q, $ph1, $ph2, $ph3, $id);
        $edit = $stmt->execute();
        
        //checks if the result didn't work
        if ($edit) {
            return true;
        }
        else {
            return false;
        }
        
    }
    
    //returns an array of all products in database
    function showAll() {
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT * FROM PRODUCTS");
        
        //execure and get results
        $stmt->execute();
        $result = $stmt->get_result();
        
        //checks if result didn't work
        if (!$result) {
            echo "assume the SQL statement has an error";
            return null;
            exit;
        }
        
        //checks if there were results found
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $product_array = array();
            while ($product= $result->fetch_assoc()){
                
                array_push($product_array, $product);
                
            }
            
            return $product_array;
        }
    }
}
<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 2, 2018

require_once '../../Autoloader.php';
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

class OrderDataService {
    
    function createOrder($order, $conn) {
        
        //get attributes of the order
        $order_id = $order->getOrder_id();
        $date = $order->getDate();
        $total = $order->getTotal();
        $user_id = $order->getUser_id();
        $address_id = $order->getAddress_id();
        
        //create a prepared statement
        $sql = $conn->prepare("INSERT INTO `ORDERS` (`ID`,`DATE`, `TOTAL`, `USERS_ID`, `ADDRESSES_ID`) VALUES (NULL, ?, ?, ?, ?)");
        
        //bind, execute, and get results
        $sql->bind_param("sdii", $date, $total, $user_id,$address_id);
        $result = $sql->execute();
        
        //checks if data was inserted into form BY RETURNING THE ORDER ID
        if ($result) {
            return $conn->insert_id;
        }
        else {
            return -1;
        }
        
    }
    
    function addDetailsLine($order_id, $orderDetails, $conn) {
        //create a new line in the order details table 
        //return the id number of the last item inserted
        
        $stmt = $conn->prepare("INSERT INTO `ORDER_DETAILS` (`ID`, `PRODUCTS_ID`, `QUANTITY`, `PRODUCT_PRICE`, `ORDERS_ID`) VALUES (NULL, ?, ?, ?, ?)"); 
        
        if(!$stmt) { 
            echo "something is wrong with the binding process. SQL statement error!"; 
            return -1; 
        }
                
        $product_id = $orderDetails->getProducts_id(); 
        $quantity = $orderDetails->getQuantity(); 
        $price = $orderDetails->getProduct_price(); 
        
        $stmt->bind_param("iidi", $product_id, $quantity, $price, $order_id); 
        $result = $stmt->execute();
        
        //checks if the result didn't work
        if ($result){
            return $conn->insert_id;
        }
        else {
            return -1;
        }
    }
    
    function getAllOrders() {
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT * FROM ORDERS");
        
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
            $orders_array = array();
            while ($order= $result->fetch_assoc()){
                
                array_push($orders_array, $order);
                
            }
            
            return $orders_array;
        }
    }
    
    function deleteItem($id) {
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statments
        $stmt = $connection->prepare("DELETE FROM ORDERS WHERE ID = ? LIMIT 1");
        
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
    
    function findById($id) {
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statments
        $stmt = $connection->prepare("SELECT * FROM ORDERS WHERE ID = ?  LIMIT 1");
        
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
        $product = new Products($product_array[0]['ID'], $product_array[0]['DATE'], $product_array[0]['TOTAL'], $product_array[0]['ORDER_DETAILS_ID'], $product_array[0]['USERS_ID'], $product_array[0]['ADDRESSES_ID']);
        return $product;
    }

    
    function updateOne($id, $order) {
        //create a new instance of the database
        $db = new Database();
        
        //connect to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("UPDATE ORDERS SET DATE = ?, TOTAL = ?, USERS_ID = ?, ADDRESSES_ID = ? WHERE ID = ?");
        
        //get attributes of the order
        $date = $order->getUser();
        $total = $order->getTotal();
        $user_id = $order->getUser_id();
        $address_id = $order->getAddress_id();
        
        //bind the data and execute the prepared statment
        $stmt->bind_param("sdii", $date, $total, $user_id,$address_id);
        $edit = $stmt->execute();
        
        //checks if the result didn't work
        if ($edit) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function getOrderDetails($order_id) {
        $stmt = $conn->preapare("SELECT * FROM ORDER_DETAILS WHERE `ID` = ?");
        
        if(!$stmt) {
            echo "something is wrong with the binding process. SQL statement error!";
            return -1;
        }
        
        
        $product_id = $orderDetails->getProducts_id();
        $quantity = $orderDetails->getQuantity();
        $price = $orderDetails->getProduct_price();
        
        $stmt->bind_param("i", $order_id);
        $result = $stmt->execute();
        
        //checks if the result didn't work
        if ($result){
            return $conn->insert_id;
        }
        else {
            return -1;
        }
    }
    
    function getOrdersBetweenDatesForOrderReport($date1, $date2) {
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT 
            ORDERS.ID AS 'ORDERSID',
            USERS.FIRSTNAME, 
            ADDRESSES.ADDRESS, 
            ADDRESSES.CITY, 
            ADDRESSES.STATE, 
            ADDRESSES.ZIP_CODE,
            PRODUCTS.PRODUCT_NAME, 
            ORDER_DETAILS.QUANTITY, 
            ORDER_DETAILS.PRODUCT_PRICE, 
            ROUND(ORDER_DETAILS.QUANTITY * ORDER_DETAILS.PRODUCT_PRICE, 2) AS `SUBTOTAL`  
            FROM ORDER_DETAILS
            JOIN ORDERS ON ORDERS.ID = ORDER_DETAILS.ORDERS_ID
            JOIN USERS ON USERS.ID = ORDERS.USERS_ID
            JOIN ADDRESSES ON ADDRESSES.ID = ORDERS.ADDRESSES_ID
            JOIN PRODUCTS ON PRODUCTS.ID = ORDER_DETAILS.PRODUCTS_ID
            WHERE ORDERS.DATE BETWEEN ? AND ?
            ORDER BY ORDERSID ASC");
        
        //bind the data and execute the prepared statment
        $stmt->bind_param("ss", $date1, $date2);
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
            $orders_array = array();
            while ($order= $result->fetch_assoc()){
                
                array_push($orders_array, $order);
                
            }
            
            return $orders_array;
        }
        
    }
    
    function getOrdersBetweenDatesForProductReport($date1, $date2) {
        //creates a new instance of the database
        $db = new Database();
        
        //connects to the database
        $connection = $db->getConnection();
        
        //create prepared statement
        $stmt = $connection->prepare("SELECT ORDERS.ID AS `ORDERSID`, USERS.FIRSTNAME, ADDRESSES.ADDRESS, ADDRESSES.CITY, ADDRESSES.STATE, ADDRESSES.ZIP_CODE, PRODUCTS.PRODUCT_NAME, ORDER_DETAILS.QUANTITY, ORDER_DETAILS.PRODUCT_PRICE, ROUND(ORDER_DETAILS.QUANTITY * ORDER_DETAILS.PRODUCT_PRICE, 2) AS `SUBTOTAL` FROM ORDER_DETAILS JOIN ORDERS ON ORDERS.ID = ORDER_DETAILS.ORDERS_ID JOIN USERS ON USERS.ID = ORDERS.USERS_ID JOIN ADDRESSES ON ADDRESSES.ID = ORDERS.ADDRESSES_ID JOIN PRODUCTS ON PRODUCTS.ID = ORDER_DETAILS.PRODUCTS_ID WHERE `DATE` BETWEEN ? AND ? ORDER BY SUBTOTAL DESC");
        
        //bind the data and execute the prepared statment
        $stmt->bind_param("ss", $date1, $date2);
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
            $orders_array = array();
            while ($order= $result->fetch_assoc()){
                
                array_push($orders_array, $order);
                
            }
            
            return $orders_array;
        }
    }
    
}
    
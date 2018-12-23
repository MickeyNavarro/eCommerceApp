<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 2, 2018

require_once '../../Autoloader.php';

class OrderBusinessService {
    
    function checkOut($order, $cart) { 
        //creat a new line in the orders table; relies on newItem f(x) in OrderDataSevice 
        //create mult. lines in the order details table; relies on addDetailsLine f(x) in OrderDataSevice 
        //ensure that the transaction is atomic
        
        //get a database connecton
        $db = new Database();
        $conn = $db->getConnection();
        
        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        
        //create a new instance of the service classes 
        $productbs = new ProductBusinessService();
        $orderds = new OrderDataService();
        
        //check if the order input was a success
        $newOrderId = $orderds->createOrder($order, $conn);
        
        //loop to get the product attributes from cart
        foreach($cart->getItems() as $item => $qty) {
            $product = $productbs->findByID($item);
            $products_id = $product->getProduct_id();
            $quantity = $product->getQuantity();
            $product_price = $product->getPrice();
            
            //create new instance of the order detail line per product
            $orderDetails = new Orders_Details(null, $products_id, $quantity, $product_price, $newOrderId);
            
            //add each line of data to the order details table
            $newOrderDetailsId = $orderds->addDetailsLine($newOrderId, $orderDetails, $conn);
            
            //create a bool to hold that the order details were not added
            $newOrderDetailsSuccess = false; 
            
            //check if each order detail was added
            if ($newOrderDetailsId){
                $newOrderDetailsSuccess = true;
                $conn->commit();
            }
            else {
                $newOrderDetailsSuccess = false;
                $conn->rollback();
            }
            
        }
        
        //check if the order and order details were added to the database
        if ($newOrderId && $newOrderDetailsSuccess) {
            echo "Success! Order is now being processed!<br>";
            $conn->commit();
            
        }
        else {
            echo "Failure! Order cannot be processed!<br>";
            $conn->rollback();
        }
        
        //close the connection to the database
        $conn->close();
        
    }
    function getOrder($order, $conn) {
        //accept a new $order object; ignores the id number; this will auto-assign the new id number
        //returns the id number of the last inserted record
        
        $dbservice = new OrderDataService($conn); 
        return $dbservice->createOrder($order, $conn); 
    }
    
    function getAllOrders() { 
        $products = Array(); 
        $dbservice = new OrderDataService(); 
        $orders = $dbservice->getAllOrders(); 
        
        return $orders; 
    }
    
    function deleteItem($id) { 
        //$id is the number to delet; returns a true or false
        $dbservice = new OrderDataService(); 
        
        return $dbservice->deleteItem($id); 
    }
    
    function findById($id) { 
        //search for $id number; return 
        $dbservice = new OrderDataService();
        $order = $dbservice->findById($id); 
        return $order; 
    }
    
    function updateOne($id, $order) { 
        $dbservice = new OrderDataService();
        return $dbservice->updateOne($id, $order);
    }
    
    function getOrderDetails($id) {
        $dbservice = new OrderDataService(); 
        return $dbservice->getOrderDetails($id); 
    }
    
    function getOrdersBetweenDatesForOrderReport($date1, $date2) { 
        $dbservice = new OrderDataService(); 
        return $dbservice->getOrdersBetweenDatesForOrderReport($date1, $date2); 
    }
    
    function getOrdersBetweenDatesForProductReport($date1, $date2) {
        $dbservice = new OrderDataService();
        return $dbservice->getOrdersBetweenDatesForProductReport($date1, $date2);
    }
}
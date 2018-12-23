<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//October 18, 2018
//This is my own work.

require_once '../../Header.php';
require_once '../../AutoLoader.php';

class SecurityService
{
    //attributes
    private $firstname = ""; 
    private $lastname = ""; 
    private $username = ""; 
    private $password = ""; 
    
    //creates new user
    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password; 
    }
    
    //method to allow the user to login 
    function login() {
        
        //create new instance of database class & get the connection 
        $conn = new Database(); 
        $connection = $conn->getConnection(); 
        
        // Check connection
        if (!$connection) {
            echo "Failed to connect: ". $connection->errno . "<br>";
        }
        
        //prepared statment where name = attempted name & ps = attempted pw from the login form on showLoginAndRegistration.html
        $user = $_POST['username']; 
        $pass = $_POST['password']; 
        $sql = $connection->prepare("SELECT * FROM USERS WHERE USERNAME = ? AND PASSWORD = ? LIMIT 1");

        //bind, execute, and get results
        $sql->bind_param("ss", $user, $pass);
        $result = $sql->execute();
        $res = $sql->get_result();
        
        //fetch an associative array that holds the user's info
        $row = $res->fetch_assoc();
        
        //check the results 
        if ($result) {
            if ($res) { 
                if (!empty($row)) {
                    //http://php.net/manual/en/mysqli.quickstart.prepared-statements.php
                    //set the session variables for the role and id of the user
                    $_SESSION['ROLE'] = $row['ROLE'];
                    $_SESSION['ID'] = $row['ID'];
                    $_SESSION['USERNAME'] = $row['USERNAME']; 
                    
                    //create the cart session variable
                    $_SESSION['cart'] = new Cart($_SESSION['ID']);
                    return true;
                }
                //if no result, then return false
                else {
                    return false;
                }
            }
        }
        
        //destroy the connection between the PHP code and the database
        mysqli_close($connection);
    }
    
    //method to allow the user to create an account
    function register() { 
        //create new instance of database class & get the connection
        $conn = new Database();
        $connection = $conn->getConnection();
        
        // Check connection
        if ($connection) {
            echo "Connected successfully!<br>";
        }
        
        //get data from registration form on showLoginAndRegistration.html
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //create a prepared statement
            //default role is 4
        $sql = $connection->prepare("INSERT INTO USERS (ID, USERNAME, PASSWORD, FIRSTNAME, LASTNAME, ROLE) VALUES (NULL, ?, ?, ?, ?, 4);");
        
        //bind, execute, and get results
        $sql->bind_param("ssss", $username, $password, $firstname, $lastname);
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

}
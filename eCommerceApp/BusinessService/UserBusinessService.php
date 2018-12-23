<?php
require_once '../../Autoloader.php';

class UserBusinessService
{
    function findByFirstName($n){ 
        $users = Array(); 
        
        $dbservice = new UserDataService(); 
        $users = $dbservice->findByFirstName($n); 

        return $users; 
    }
    function findByLastName($n){
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->findByLastName($n);
        
        return $users;
    }
    function findByID($id){
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->findByID($id);
        
        return $users;
    }
    function deleteItemByID($id){        
        $dbservice = new UserDataService();
        $delete = $dbservice->deleteItemByID($id);
        
        return $delete; 
    }
    function updateOne($id, $user){
        $dbservice = new UserDataService();
        $edit = $dbservice->updateOne($id, $user);
        return $edit; 
    }
    function findByFirstNameWithAddress($n){
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->findByFirstNameWithAddress($n);
        
        return $users;
    }
    
    function showAll() { 
        $users = Array();
        
        $dbservice = new UserDataService();
        $users = $dbservice->showAll();
        
        return $users; 
    }
}


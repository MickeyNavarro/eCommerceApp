<?php
require_once '../../Autoloader.php';

class CreditCardService {
    
    private $card_id;
    private $card_name;
    private $card_number;
    private $expiration_month;
    private $expiration_year;
    private $cvv; 
    
    //function to check if the credit card is valid; returns true or false
    function authenticate($card_id, $card_name, $card_number, $expiration_month, $expiration_year, $cvc) {    
        $cc = new Credit_Cards($card_id, $card_name, $card_number, $expiration_month, $expiration_year, $cvc);
        $auth = $cc->authenticate($card_id, $card_name, $card_number, $expiration_month, $expiration_year, $cvc);
        
        return $auth;
    }
}


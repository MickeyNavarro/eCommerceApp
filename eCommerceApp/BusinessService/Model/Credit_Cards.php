<?php
require_once '../../Autoloader.php';
class Credit_Cards
{
    private $card_id; 
    private $card_name; 
    private $card_number; 
    private $expiration_month;
    private $expiration_year; 
    private $cvv; 
    private $is_default;
    
    function __construct($card_id, $card_name, $card_number, $expiration_month, $expiration_year, $cvv) {
        $this->card_id = $card_id;
        $this->card_name = $card_name;
        $this->card_number = $card_number;
        $this->expiration_month = $expiration_month;
        $this->expiration_year = $expiration_year; 
        $this->cvv = $cvv;
    }
    
    /**
     * @return mixed
     */
    public function getCardId()
    {
        return $this->card_id;
    }

    /**
     * @return mixed
     */
    public function getCard_name()
    {
        return $this->card_name;
    }

    /**
     * @return mixed
     */
    public function getCard_number()
    {
        return $this->card_number;
    }

    /**
     * @return mixed
     */
    public function getExpiration_month()
    {
        return $this->expiration_month;
    }
    
    /**
     * @return mixed
     */
    public function getExpiration_year()
    {
        return $this->expiration_year;
    }

    /**
     * @return mixed
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @return mixed
     */
    public function getIs_default()
    {
        return $this->is_default;
    }

    /**
     * @param mixed $id
     */
    public function setCardId($id)
    {
        $this->id = $card_id;
    }

    /**
     * @param mixed $card_name
     */
    public function setCard_name($card_name)
    {
        $this->card_name = $card_name;
    }

    /**
     * @param mixed $card_number
     */
    public function setCard_number($card_number)
    {
        $this->card_number = $card_number;
    }

    /**
     * @param mixed $expiration_month
     */
    public function setExpiration_month($expiration_month)
    {
        $this->expiration_month = $expiration_month;
    }
    
    /**
     * @param mixed $expiration_year
     */
    public function setExpiration_year($expiration_year)
    {
        $this->expiration_year = $expiration_year;
    }

    /**
     * @param mixed $cvv
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    }

    /**
     * @param mixed $is_default
     */
    public function setIs_default($is_default)
    {
        $this->is_default = $is_default;
    }
    
    //method to authenticare the card to make sure it matches something..?
    public function authenticate($card_id, $card_name, $card_number, $expiration_month, $expiration_year, $cvv) {
        if ($this->card_id == null && $this->card_name = "ADMIN" && $this->card_number = "1111-1111-1111-1111" && $this->expiration_month = "JAN" && $this->expiration_year = "2020" && $this->cvv = "111") {
            return true;
        }
        else {
            return false; 
        }
    }
}
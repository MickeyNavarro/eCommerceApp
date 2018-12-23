<?php
namespace Model;

class Addresses
{
    private $address_id; 
    private $address; 
    private $city; 
    private $state; 
    private $zip; 
    private $is_default;
    
    function __construct($address_id, $address, $city, $state, $zip, $is_default) {
        $this->address_id = $address_id;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->is_default = $is_default;
    }
    
    /**
     * @return mixed
     */
    public function getAddress_id()
    {
        return $this->address_id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return mixed
     */
    public function getIs_default()
    {
        return $this->is_default;
    }

    /**
     * @param mixed $address_id
     */
    public function setAddress_id($address_id)
    {
        $this->address_id = $address_id;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @param mixed $is_default
     */
    public function setIs_default($is_default)
    {
        $this->is_default = $is_default;
    }
 
    
}


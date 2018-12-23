<?php

class Products
{
    private $product_id; 
    private $product_name; 
    private $description; 
    private $price;
    private $quantity; 
    private $photo1; 
    private $photo2; 
    private $photo3; 
    
    function __construct($product_id, $product_name, $description, $price, $quantity, $photo1, $photo2, $photo3) { 
        $this->product_id = $product_id; 
        $this->product_name = $product_name; 
        $this->description = $description; 
        $this->price = $price; 
        $this->quantity = $quantity; 
        $this->photo1 = $photo1; 
        $this->photo2 = $photo2;
        $this->photo3 = $photo3;
        
       
    }
    /**
     * @return mixed
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * @return mixed
     */
    public function getProduct_name()
    {
        return $this->product_name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $product_id
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @param mixed $product_name
     */
    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


    /**
     * @return mixed
     */
    public function getPhoto1()
    {
        return $this->photo1;
    }

    /**
     * @return mixed
     */
    public function getPhoto2()
    {
        return $this->photo2;
    }

    /**
     * @return mixed
     */
    public function getPhoto3()
    {
        return $this->photo3;
    }

    /**
     * @param mixed $photo1
     */
    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;
    }

    /**
     * @param mixed $photo2
     */
    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;
    }

    /**
     * @param mixed $photo3
     */
    public function setPhoto3($photo3)
    {
        $this->photo3 = $photo3;
    }

    
}
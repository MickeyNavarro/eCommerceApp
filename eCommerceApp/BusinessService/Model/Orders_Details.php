<?php
class Orders_Details
{
    private $order_details_id;
    private $products_id; 
    private $quantity; 
    private $product_price; 
    private $order_id; 
    
    function __construct($order_details_id, $products_id, $quantity, $product_price, $order_id) { 
        $this->order_details_id = $order_details_id; 
        $this->products_id = $products_id; 
        $this->quantity = $quantity; 
        $this->product_price = $product_price;
        $this->order_id = $order_id; 
    }
        
    /**
     * @return mixed
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getOrder_details_id()
    {
        return $this->order_details_id;
    }

    /**
     * @return mixed
     */
    public function getProducts_id()
    {
        return $this->products_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getProduct_price()
    {
        return $this->product_price;
    }

    /**
     * @param mixed $order_details_id
     */
    public function setOrder_details_id($order_details_id)
    {
        $this->order_details_id = $order_details_id;
    }

    /**
     * @param mixed $products_id
     */
    public function setProducts_id($products_id)
    {
        $this->products_id = $products_id;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $product_price
     */
    public function setProduct_price($product_price)
    {
        $this->product_price = $product_price;
    }

 
}


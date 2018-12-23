<?php

require_once '../../Autoloader.php';
class Cart
{
    private $userid; //owner of cart
    private $items = array(); //associative arry of items in the cart (prod_id=>qty, prod_id=>qty, prod_id=>qty)
    private $subtotals = array(); //associative array. (prod_id=>cost, prod_id=>cost, prod_id=>cost)
    private $total_price; //float. Total cost of all items in the cart 
    
    function __construct($userid) { 
        $this->userid = $userid; 
        $this->items = array(); 
        $this->subtotals = array(); 
        $this->total_price = 0; 
    }
    
    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return multitype:
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return multitype:
     */
    public function getSubtotals()
    {
        return $this->subtotals;
    }

    /**
     * @return number
     */
    public function getTotal_price()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @param multitype: $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @param multitype: $subtotals
     */
    public function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    /**
     * @param number $total_price
     */
    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }
    
    //allows user to add an item and choose their added quantity 
    function addItem ($prod_id) { 
        if (array_key_exists($prod_id, $this->items)){ 
            //item already in the cart; check if user wants to add more of this item; add selected quantity
            $this->items[$prod_id] += 1; 
        }
        else { 
            //item not in cart yet; add selected quantity 
            $this->items = $this->items + array($prod_id=>1); 
        }

    }
    
    //allows user to update the quanity within the cart
    function updateQuantity($prod_id, $updatequantity) { 
        if (array_key_exists($prod_id, $this->items)){
            //item already in the cart; update selected quantity
            $this->items[$prod_id] = $updatequantity;
        }
        else {
            //item not in cart yet; add selected quantity
            $this->items = $this->items + array($prod_id=>$updatequantity);
        }
        
        //checks if the product quantity is 0, will remove from the cart
        if ($this->items[$prod_id] == 0) { 
            unset($this->items[$prod_id]);
        }
    }
    
    //calculates the total for the entire cart  & sets/returns the new total
    function calcTotal() {       
        //creat a new instance of the product BS class
        $productBS = new ProductBusinessService(); 
        
        //create an array to hold the subtotals 
        $subtotals_array = array(); 
        $this->total_price = 0; 
        
        foreach($this->items as $item=>$qty) { 
            $product = $productBS->findByID($item); 
            
            //calculate the subtotal for each product in the cart.
            $product_subtotal = $product->getPrice() * $qty;
            
            //calculate the total for the entire cart
            $subtotals_array = $subtotals_array + array($item=>$product_subtotal); 
            $this->total_price = $this->total_price + $product_subtotal; 
        }
        //return the subtotal
        $this->subtotals = $subtotals_array; 
    }
    
    //delete an item from the cart by product id
    function deleteByID($id) { 
        //check if the item is in cart
        if (array_key_exists($id, $this->items)){
            unset($this->items[$id]);
        }
    }

}


<?php
class Orders
{
    private $order_id; 
    private $date; 
    private $total; 
    private $user_id; 
    private $address_id; 
    
    
    function __construct($order_id, $date, $total, $user_id, $address_id) {
        $this->order_id = $order_id;
        $this->date = $date;
        $this->total= $total;
        $this->user_id = $user_id;
        $this->address_id = $address_id;
    }
    
    /**
     * @return mixed
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getAddress_id()
    {
        return $this->address_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }


    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $address_id
     */
    public function setAddress_id($address_id)
    {
        $this->address_id = $address_id;
    }

}


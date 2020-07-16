<?php
include_once '../../../DBconnector.php';
class APIHandler{
    private $meal_name;
    private $meal_units;
    private $unit_price;
    private $status;
    private $user_api_key;

    /**
     * @return mixed
     */
    public function getMealName()
    {
        return $this->meal_name;
    }

    /**
     * @param mixed $meal_name
     */
    public function setMealName($meal_name)
    {
        $this->meal_name = $meal_name;
    }

    /**
     * @return mixed
     */
    public function getMealUnits()
    {
        return $this->meal_units;
    }

    /**
     * @param mixed $meal_units
     */
    public function setMealUnits($meal_units)
    {
        $this->meal_units = $meal_units;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * @param mixed $unit_price
     */
    public function setUnitPrice($unit_price)
    {
        $this->unit_price = $unit_price;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setUserApiKey($user_api_key)
    {
        $this->user_api_key = $user_api_key;
    }

    public function createOrder()
    {
        $con = new DBConnector();
        $res = mysqli_query($con->conn, "INSERT INTO orders(order_name,units,unit_price,order_status) VALUES ('$this->meal_name','$this->meal_units','$this->unit_price','$this->status')") or die("Error: ".mysqli_error($con->conn));
        return $res;
    }
    public function checkOrderStatus($id){
        $con = new DBConnector();
        $order = mysqli_query($con->conn,"SELECT order_status FROM orders WHERE order_id='$id'");
        return $order;
    }

    public function checkAPIKey(){
        $con = new DBConnector();
        $api = mysqli_query($con->conn, "SELECT * FROM api_keys WHERE api_key = '$this->user_api_key' ");
        return $api;

    }

}

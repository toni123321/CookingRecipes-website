<?php
class Ingredient{

    //variables
    private $id;
    private $name;
    private $quantity;

    //constructor
    public function __construct($id, $name, $quantity){
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
    }

    //setters
    public function SetName($name){
        $this->name = $name;
    }

    public function SetQuantity($quantity){
        $this->quantity = $quantity;
    }

    //getters
    public function GetName(){
        return $this->name;
    }

    public function GetQuantity(){
        return $this->quantity;
    }

    public function GetID(){
        return $this->id;
    }
}
?>
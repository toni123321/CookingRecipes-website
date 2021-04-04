<?php
class Ingredient{

    //variables
    public static $idCounter = 1000;
    private $id;
    private $name;
    private $quantity;

    //constructor
    public function __construct($name, $quantity){
        $this->name = $name;
        $this->quantity = $quantity;

        $this->id = self::$idCounter;
        self::$idCounter++;
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
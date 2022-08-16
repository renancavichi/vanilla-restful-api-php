<?php
class Product{
    // Properties
    public $id;
    public $image;
    public $name; 
    public $price; 

    // Construct Method 
    function __construct($id, $image, $name, $price) {
        $this->id = $id;
        $this->image = $image;
        $this->name = $name;
        //$this->setName($name);
        $this->price = $price;
    }

    // Methods (Functions)
    function setPrice($price){
        $this->price = $price;
    }

    function getPrice(){
        echo $this->price;
    }

    function setName($name){
        $this->name = str_replace("'", "°", $name);
    }

    function getName(){
        echo $this->name;
    }  
}
?>
<?php

    class Products {
        public $id;
        public $name;
        public $price;

        function __construct($name){
            $this->name = $name;
        }    
    }  
    class Console extends Products{
        
    }   

?>

Klass till databasen (abstrakt)

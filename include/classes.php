<?php

    class DBObject
    {
        private $conn;

        function __construct()
        {
            $this->conn = new mysqli("localhost", "joakimedwardh", "x@ZeIbKiSPIr", "joakimedwardh");
        }

        function __destruct()
        {
            $this->conn->close();
        }
    }

    class Product
    {
        public $id;
        public $name;
        public $price;

        function __construct($name)
        {
            $this->name = $name;
        }
    }

   
?>

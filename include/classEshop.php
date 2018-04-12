<?php
include "./functions.php";




abstract class Draw {

    protected $image;

    public function draw(){
    
    echo "<img src='./" . $this->image . "'></img>" . "<br>" 
    . $this->id . "<br>"
     . $this->name . "<br>"
      . $this->desc. "<br>"
       . $this->price;
    
    }
    

}

abstract class Cart{

    public function printCart(){
        echo"
            <div id='cartDiv'>
                <div id='amountDiv'>
                    ".$id->."
                </div>
                <div id='productNameDiv'>
                    ".$variabel."
                </div>
                <div id='priceDiv'>
                    ".$variabel."
                </div>
            </div>
        ";
    }
}

abstract class Products extends Draw{


    protected $image;
    protected $id;
    protected $name;
    protected $desc;
    protected $price;


}


abstract class Games extends Products{

    public function __construct(){

        
        $this->image = $sql["pic"];
        $this->id = $sql["productId"];
        $this->name = $sql["productName"];
        $this->desc = $sql["info"];
        $this->price = $sql["price"];
    
    }
}

abstract class Consoles extends Products{

    public function __construct(){

        $sql = "SELECT productId, pic, productName, info, price, unitsInStock FROM Products WHERE category = '".$_GET['category']."' ";
        $result = $conn->query($sql);        
         // $this->XXXX måste kopplas på något vis, antingen ifrån Sql eller input. eller befintligt.
        // lite osäker på redan befintliga
        $this->image = $sql["pic"];
        $this->id = $sql["productId"];
        $this->name = $sql["productName"];
        $this->desc = $sql["info"];
        $this->price = $sql["price"];
    }
}

abstract class Accesories extends Products{

    public function __construct(){

        // $this->XXXX måste kopplas på något vis, antingen ifrån Sql eller input. eller befintligt.
        // lite osäker på redan befintliga
        $this->image = $sql["pic"];
        $this->id = $sql["productId"];
        $this->name = $sql["productName"];
        $this->desc = $sql["info"];
        $this->price = $sql["price"];
    
    }
}









?>
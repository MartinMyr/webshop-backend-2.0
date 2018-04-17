<?php
include "./functions.php";

abstract class Product {


    protected $pic;
    protected $productId;
    protected $productName;
    protected $info;
    protected $price;
    protected $unitsInStock;

    public function __construct($sql){

        
        $this->pic = $sql["pic"];
        $this->productId = $sql["productId"];
        $this->pruductName = $sql["productName"];
        $this->info = $sql["info"];
        $this->price = $sql["price"];
        $this->unitsInStock = $sql["unitsInStock"];
    
    }
    public function printProductDiv($sql) {
        return "<div class='card'>
            <div class='cardName'>" . $this->productName . "</div>
                <div class='cardImage'><img src='img/" . $this->pic . "' class='gameImg'></div>
                <div class='cardInfo'>" . $this->info . "</div>
                <div class='cardPrice'>Pris: " . $this->price . ":-</div>
                <div class='unitsInStock'>Antal i lager: " . $this->unitsInStock . "</div>
                <div class='amount_submit'>
                    <form action='products.php' method='post'>
                        <input value='1' name='quantity' type='number' class='amount'>
                        <input type='hidden' value='". $this->productId ."' name='id'><br/>
                        <input type='submit' value='Lägg i varukorgen' class='cartSubmit'>
                    </form>
                </div>
            </div>";
    }

}


class Game extends Product{

    
   
}

class Console extends Product{

    
}

class Accessorie extends Product{

   
}
class Nintendo extends Product{

   
}
class Sega extends Product{

   
}


?>
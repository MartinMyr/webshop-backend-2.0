<?php
include "./functions.php";




// abstract class Draw {

//     protected $image;

//     public function draw(){
    
//     echo "<img src='./" . $this->image . "'></img>" . "<br>" 
//     . $this->id . "<br>"
//      . $this->name . "<br>"
//       . $this->desc. "<br>"
//        . $this->price;
    
//     }
    

// }

// abstract class Cart{

//     public function printCart(){
//         echo"
//             <div id='cartDiv'>
//                 <div id='amountDiv'>
//                     ".$id->."
//                 </div>
//                 <div id='productNameDiv'>
//                     ".$variabel."
//                 </div>
//                 <div id='priceDiv'>
//                     ".$variabel."
//                 </div>
//             </div>
//         ";
//     }
// }

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
                        <input style='width:150px; height:100px;' type='submit' value='Lägg i varukorgen' class='cartSubmit'>
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

?>
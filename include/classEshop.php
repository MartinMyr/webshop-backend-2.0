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
    
    }
    public function printProductDiv($sql) {
        return "<div class='card'>
            <div class='cardName'>" . $this->productName . "</div>
                <div class='cardImage'><img src='img/" . $this->pic . "' class='gameImg'></div>
                <div class='cardInfo'>" . $this->info . "</div>
                <div class='cardPrice'>Price: " . $this->price . ":-</div>
                <div class='unitsInStock'>In stock: " . $this->unitsInStock . "</div>
                <div class='amount_submit'>
                    <form action='products.php' method='post'>
                        <input value='1' name='quantity' type='number' class='amount'>
                        <input type='hidden' value='". $this->productId ."' name='id'>
                        <input type='submit' value='add to basket'>
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
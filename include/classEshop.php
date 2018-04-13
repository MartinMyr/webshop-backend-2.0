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


    protected $image;
    protected $id;
    protected $name;
    protected $desc;
    protected $price;


    public function printProductDiv() {
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


abstract class Game extends Product{

    public function __construct(){

        
        $this->image = $sql["pic"];
        $this->id = $sql["productId"];
        $this->name = $sql["productName"];
        $this->desc = $sql["info"];
        $this->price = $sql["price"];
    
    }
}

abstract class Console extends Product{

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

abstract class Accessorie extends Product{

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
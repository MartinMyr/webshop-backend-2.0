<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>

<?php
?>

<div id="productButtons">
    <form method="GET">
        <button type="submit" name="category" value="Nintendo" id="Nintendo">Nintendo</button>
        <button type="submit" name="category" value="Sega" id="Sega">Sega</button>
        <button type="submit" name="category" value="console" id="console">Konsoll</button>
        <button type="submit" name="category" value="games" id="games">Spel</button>
        <button type="submit" name="category" value="accessories" id="accessories">Tillbehör</button> 
    </form>
</div>
<div class="cards">
    <?php
        
    if(isset($_POST["id"])){
        pushToCart($_POST["id"], $_POST["quantity"]);
    }
 
        if (empty($_GET["category"])){
            allProducts();
        }
        else{
            selectedProduct();
        };

        if(!empty($_POST["quantity"])) {
            $conn = connection();
            $productByCode = $conn->query("SELECT productId, productName, info, price, unitsInStock FROM Products")->fetch_assoc();
         
            $itemArray = array($productByCode["productId"]=>array('name'=>$productByCode["productName"], 'code'=>$productByCode["productId"], 'quantity'=>$_POST["unitsInStock"], 'price'=>$productByCode["price"]));
            
       
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    ?>
</div>












<?php
    include 'include/footer.php';
?>
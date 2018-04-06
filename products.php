<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>

<div id="productButtons">
    <form method="GET">
    <button type="submit" name="category" value="console" id="console">Console</button>
    <button type="submit" name="category" value="games" id="games">Games</button>
    <button type="submit" name="category" value="accessories" id="games">Accessories</button>
</form>
</div>
<div class="cards">


    <?php
    print_r($_POST);
        if (empty($_GET["category"])){
            allProducts();
        }
        else{
            selectedProduct();
        };

        if(!empty($_POST["quantity"])) {
            $conn = connection();
    
            // $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
		
            // mysqli_result Object ( [current_field] => 0 [field_count] => 5 [lengths] => [num_rows] => 0 [type] => 0 )

            $productByCode = $conn->query("SELECT productId, productName, info, price, unitsInStock FROM Products")->fetch_assoc();
         
            $itemArray = array($productByCode["productId"]=>array('name'=>$productByCode["productName"], 'code'=>$productByCode["productId"], 'quantity'=>$_POST["unitsInStock"], 'price'=>$productByCode["price"]));
            
            echo "<br>";
            print_r($itemArray);
       



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
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
        if (empty($_GET["category"])){
            allProducts();
        }
        else{
            selectedProduct();
        };

    ?>
</div>












<?php
    include 'include/footer.php';
?>
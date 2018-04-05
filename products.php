<?php
    include 'include/header.php';
?>
<div id="productButtons">
    <button id="console">Console</button>
    <button id="games">Games</button>
    <button id="accessories">Accessories</button>
</div>
<div class="cards">
<?php
    
    $servername = "localhost";
    $username = "joakimedwardh";
    $password = "x@ZeIbKiSPIr";
    $dbname = "joakimedwardh";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("FEL: " . $conn->connect_error);
    }

    $sql = "SELECT pic, productName, info, price, unitsInStock FROM Products";
    $result = $conn->query($sql);

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
            echo "<div class='card'>";
            echo "<div class='cardName'>" . $row["productName"] . "</div>";
            echo "<div class='cardImage'><img src='img/" . $row["pic"] . "' class='gameImg'></div>";
            echo "<div class='cardInfo'>" . $row["info"] . "</div>";
            echo "<div class='cardPrice'>Price: " . $row["price"] . ":-</div>";
            echo "<div class='unitsInStock'>In stock: " . $row["unitsInStock"] . "</div>";
            echo "<div class='amount_submit'>";
            echo "<form action='products.php' method='post'>";
            echo "<input type='number' class='amount'>";
            echo "<input type='submit' value='add to basket'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        

    } else {
        echo "error";
    }
    
    ?>
</div>












<?php
    include 'include/footer.php';
?>
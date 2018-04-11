<?php
    
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../functions/functions.php';
    
    echo "Hej och välkommen till Produktsidan";


    $sql = "SELECT productName, productId  FROM Products";
    $totProd = connection()->query($sql);
    echo "<ul>";
    if($totProd->num_rows > 0){
        
        while($row = $totProd->fetch_assoc()){
            echo "<li>" .$row['productName']. "</li><li>" .$row['productId']";
        }
        
    }
    echo "</ul>";
    connection()->close;
   



    else{
    echo "error";
    }




    echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><div><br>";

    echo '<div id="newProd"><h4>Lägg till produkt</h4>
    <form method="post">
    <input type="text" name="picture" placeholder="Picture">
    <input type="text" name="id" placeholder="Id">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="info" placeholder="Info">
    <input type="text" name="price" placeholder="Price">
    <button type="submit" >Add product</button>
    </form></div>';


 
?>
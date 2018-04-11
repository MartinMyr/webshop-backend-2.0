<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    
echo "Hej och välkommen till Produktsidan";

echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><div>";

echo '<div id="newProd"><h4>Lägg till produkt</h4>
<form method="post">
<input type="text" name="picture" placeholder="Picture">
<input type="text" name="id" placeholder="Id">
<input type="text" name="name" placeholder="Name">
<input type="text" name="info" placeholder="Info">
<input type="text" name="price" placeholder="Price">
<button type="submit" >Add product</button>
</form></div>';


}
else{
echo "error";
}

?>
<?php
    
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../functions/functions.php';
    
    echo "Hej och välkommen till Produktsidan";


    $sql = "SELECT productName, category, productId FROM Products ORDER BY category ASC";
    $totProd = connection()->query($sql);
    echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><ul>";
    if($totProd->num_rows > 0){
        
        while($row = $totProd->fetch_assoc()){
            echo "<div class='prodList'><li><strong>Product name:</strong> " .$row['productName']. "</li><li><strong>Product cat:</strong> " .$row['category']. "<form method='post'>
            Delete<input type='checkbox' name='delete' placeholder='Delete' required>
            <select name='Categorie'>
            <option value=''>Select Categorie</option>
            <option name='accesory' value='Accesorie'>accesorie</option>
            <option name='game' value='Game'>Gamme</option>
            <option name='console' value='Console'>Console</option>
            </select>
            <button type='submit' class='' name='prodButton' value='" . $row['productId'] . "'>Submit</button>
            
        </form></li></div>";
        }
        


        

        if(isset($_POST['formSubmit']) )
        {
            //connection grej

            if($_POST['Delete'] === 'true')
            {
                //kör delete
            }
            else
            {
                $varGame = $_POST['Game'];
                $varConsole = $_POST['Console'];
                $varDelete = $_POST['Delete'];
                $varID = $_POST['prodButton'];
                $errorMessage = "";
                
                //"UPDATE category FROM Products WHERE prodID = $varID"
        
                // - - - snip - - - 
            }
        }





    }
    else{
        echo "error";
    }

    echo "</ul></div><br>";
    connection()->close;
   



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
 
?>
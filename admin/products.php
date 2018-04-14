<?php
    if(isset($_POST['category']) && isset($_POST['productId'])) {
        include '../functions/functions.php';
        $conn = connection();
        $sql = "UPDATE Products SET  category = '".$_POST['category']."' WHERE (productId = ".$_POST['productId'].")";
        $conn->query($sql);
        echo $conn->affected_rows;


    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include '../functions/functions.php';
        echo "Hej och välkommen till Produktsidan";
        $sql = "SELECT productName, category, productId FROM Products ORDER BY category ASC";
        $totProd = connection()->query($sql);
        echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><ul>";
        if($totProd->num_rows > 0) {
            while($row = $totProd->fetch_assoc()){
                echo "<div class='prodList'><li><strong>Product name:</strong> " .$row['productName']. "</li><li><strong>Product cat:</strong> " .$row['category']. "
                <select id='category".$row['productId']."'>
                    <option value=''>Select Category</option>
                    <option value='accessories'>accesorie</option>
                    <option value='games'>Game</option>
                    <option value='console'>Console</option>
                </select>
                <button type='button' onclick='changeCategory(".$row['productId'].")' class=''>Submit</button>
                </li></div>";
            }
        }
    }

    die();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../functions/functions.php';
    
    echo "Hej och välkommen till Produktsidan";


    $sql = "SELECT productName, category, productId FROM Products ORDER BY category ASC";
    $totProd = connection()->query($sql);
    echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><ul>";
    
    if($totProd->num_rows > 0){
        
        while($row = $totProd->fetch_assoc()){
            echo "<div class='prodList'><li><strong>Product name:</strong> " .$row['productName']. "</li><li><strong>Product cat:</strong> " .$row['category']. "<form method='post'>
            Delete<input type='checkbox' name='delete' placeholder='Delete'>
            <select name='Categorie'>
            <option value=''>Select Categorie</option>
            <option name='accesory' value='Accesorie'>accesorie</option>
            <option name='game' value='Game'>Game</option>
            <option name='console' value='Console'>Console</option>
            </select>
            <input type='hidden' name='productId' value='".$row['productId']."' />
            <button type='submit' class=''>Submit</button>
            </form></li></div>";
        }

        print_r($_GET);

        if(isset($_POST['formSubmit']) )
        {
            
            connection();

            if($_POST['Delete'] === 'true')
            {
                $sql = "DELETE productId FROM Products WHERE productId =???no one knows";
                $totProd = connection()->query($sql);
            }
            else
            {
                $varGame = $_POST['Game'];
                $varConsole = $_POST['Console'];
                $varDelete = $_POST['Delete'];
                $varID = $_POST['prodButton'];
                $errorMessage = "";

                //"UPDATE category FROM Products WHERE prodID = $varID"
        
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
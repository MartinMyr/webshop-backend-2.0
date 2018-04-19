<?php
    
  include_once '../functions/functions.php';


    if(isset($_POST['deleteID'])) {      
       $conn = connection();
       $sql = "DELETE FROM Products WHERE  (productId = ".$_POST['deleteID'].") LIMIT 1";
       $conn->query($sql);
       echo $conn->affected_rows;
  
   } else if(isset($_POST['category']) && isset($_POST['productId'])) {
       $conn = connection();
       $sql = "UPDATE Products SET  category = '".$_POST['category']."' WHERE (productId = ".$_POST['productId'].")";
       $conn->query($sql);
       echo $conn->affected_rows;


   } else if(isset($_POST['prodID']) && isset($_POST['amount'])) {
        $conn = connection();
        $sql = "UPDATE Products SET  unitsInStock = '".$_POST['amount']."' WHERE (productId = ".$_POST['prodID'].")";
        $conn->query($sql);
        echo $conn->affected_rows;

    } else if(isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["units"]) && isset($_POST["category"]) && isset($_POST["info"])){
            $conn = connection();
            $sql = "INSERT INTO Products (productName, price, unitsInStock, category, info) VALUES ('".$_POST['name']."', ".$_POST['price'].", ".$_POST['units'].", '".$_POST['category']."', '".$_POST['info']."');";
            $conn->query($sql);
            echo $conn->affected_rows;

    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
       echo "Hej och välkommen till Produktsidan";
       $sql = "SELECT productName, category, productId, unitsInStock FROM Products ORDER BY category ASC";
       $totProd = connection()->query($sql);
       echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><ul>";
       if($totProd->num_rows > 0) {
           while($row = $totProd->fetch_assoc()){
               echo "<div class='prodList'><li><strong>Product name:</strong> " .$row['productName']. "</li><li><strong>Product cat:</strong> " .$row['category']. "</li><li><strong>Units in stock:</strong> " .$row['unitsInStock']. "
              <br> <button type='button' onclick='Delete(".$row['productId'].")' class=''>Delete</button>
               <select id='category".$row['productId']."'>
                   <option value=''>Select Category</option>
                   <option value='accessories'>accesorie</option>
                   <option value='games'>Game</option>
                   <option value='console'>Console</option>
               </select>
               <input id='amount".$row['productId']."' type='number' name='units' placeholder='Amount'>
               <button type='button' onclick='changeCategory(".$row['productId']."); changeAmount(".$row['productId'].");' class=''>Submit</button>
               </li></div>";
           }
        
       }  
       echo '<div id="newProd"><h4>Lägg till produkt</h4>
           
           
           <input id="name" type="text" name="name" placeholder="Name">
           <input id="info" type="text" name="info" placeholder="Info">
           <input id="price" type="number" name="price" placeholder="Price">
           <input id="units" type="number" name="units" placeholder="Units">
           <select id="category"'.$row['productId'].'">
                   <option value="">Select Category</option>
                   <option value="accessories">accesorie</option>
                   <option value="games">Game</option>
                   <option value="console">Console</option>
               </select>
               <button  id="createButton"  onclick="createProduct();" class="">Submit</button>
               
           </div>';
   }
?>
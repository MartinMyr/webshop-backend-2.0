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
           echo '<div id="newProd"><h4>Lägg till produkt</h4>
           <form method="get">
           <input id="pic" type="text" name="picture" placeholder="Picture">
           <input id="name" type="text" name="name" placeholder="Name">
           <input id=info"" type="text" name="info" placeholder="Info">
           <input id="price" type="text" name="price" placeholder="Price">
           <input id="units" type="number" name="units" placeholder="Units">
           <select id="category"'.$row['productId'].'">
                   <option value="">Select Category2</option>
                   <option value="accessories">accesorie</option>
                   <option value="games">Game</option>
                   <option value="console">Console</option>
               </select>
               <button type="submit" class="">Submit</button>
               </form>
           </div>';
       
           if(isset($_GET["name"]) && isset($_GET["price"])){
           $sqlNew = "INSERT productName, price, unitsInStock INTO Products WHERE productName = ".$_GET['name'].", price = ".$_GET['price']." ";
           $create = connection()->query($sqlNew);
        }
      
       }  
   }
?>




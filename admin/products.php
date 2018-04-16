<?php

   if(isset($_POST['deleteId'])) {
       include_once '../functions/functions.php';
       $conn = connection();
       $sql = "DELETE Products WHERE  (productId = ".$_POST['deleteId'].")";
       $conn->query($sql);
       echo $conn->affected_rows;
   
   } else if(isset($_POST['category']) && isset($_POST['productId'])) {
       include_once '../functions/functions.php';
       $conn = connection();
       $sql = "UPDATE Products SET  category = '".$_POST['category']."' WHERE (productId = ".$_POST['productId'].")";
       $conn->query($sql);
       echo $conn->affected_rows;


   } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
       include_once '../functions/functions.php';
       echo "Hej och välkommen till Produktsidan";
       $sql = "SELECT productName, category, productId, unitsInStock FROM Products ORDER BY category ASC";
       $totProd = connection()->query($sql);
       echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><ul>";
       if($totProd->num_rows > 0) {
           while($row = $totProd->fetch_assoc()){
               echo "<div class='prodList'><li><strong>Product name:</strong> " .$row['productName']. "</li><li><strong>Product cat:</strong> " .$row['category']. "</li><li><strong>Units in stock:</strong> " .$row['unitsInStock']. "
              <br> <button type='button' id='delete' onclick='Delete(".$row['productId'].")' class=''>Delete</button>
               <select id='category".$row['productId']."'>
                   <option value=''>Select Category</option>
                   <option value='accessories'>accesorie</option>
                   <option value='games'>Game</option>
                   <option value='console'>Console</option>
               </select>
               <input id='amount' type='number' name='units' placeholder='Amount'>
               <button type='button' onclick='changeCategory(".$row['productId'].")' class=''>Submit</button>
               </li></div>";
           }
           echo '<div id="newProd"><h4>Lägg till produkt</h4>
           
           <input id="pic" type="text" name="picture" placeholder="Picture">
           <input id="id" type="text" name="id" placeholder="Id">
           <input id="name" type="text" name="name" placeholder="Name">
           <input id=info"" type="text" name="info" placeholder="Info">
           <input id="price" type="text" name="price" placeholder="Price">
           <select id="category"'.$row['productId'].'">
                   <option value="">Select Category2</option>
                   <option value="accessories">accesorie</option>
                   <option value="games">Game</option>
                   <option value="console">Console</option>
               </select>
               <button type="button" onclick="createProduct()" class="">Submit</button>
           </div>';
       
       }
   

}

?>
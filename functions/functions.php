<?php
session_start();
include './include/classes.php';
include './classEshop.php';

?>

<?php

function pushToCart($prodID, $quantity) {
    if(isset($_SESSION['CART'])) $array = $_SESSION['CART'];
    else $array = array();
    $isInCart = false;
    foreach($array as $key => $value) {
        if(isset($value[$prodID])) {
            $array[$key][$prodID]++;
            $isInCart = true;
            break;
        }

    }
    if(!$isInCart) array_push($array, array($prodID => $quantity));
    
    $_SESSION['CART'] = $array;
    
    $antal = 0;
    foreach($array as $value) {
        $antal += reset($value);
    }
    $_SESSION["cartAmount"] += $antal;
 }


function connection(){

    $servername = "localhost";
    $username = "joakimedwardh";
    $password = "x@ZeIbKiSPIr";
    $dbname = "joakimedwardh";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("FEL: " . $conn->connect_error);
    }
        // GÖR TILL GLOBAL
    return $conn;

}

function testloop(){

    $conn = connection();
    $sql = "SELECT productId, pic, productName, info, price, unitsInStock FROM Products";
    $result = $conn->query($sql);
    
    print_r($result);

    if($result->num_rows > 0){
        echo "hit kommer den";
        
        while($row = $result->fetch_assoc()){
            echo "hej!";
        // $games = new Games();
        // $games -> draw();
        print_r($row);
        }
    }  
}

function selectedProduct(){
    $conn = connection();

    $sql = "SELECT productId, pic, productName, info, price, unitsInStock FROM Products WHERE category = '".$_GET['category']."' ";
    $result = $conn->query($sql);
        
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            echo "<div class='card'>
            <div class='cardName'>" . $row["productName"] . "</div>
                <div class='cardImage'><img src='img/" . $row["pic"] . "' class='gameImg'></div>
                <div class='cardInfo'>" . $row["info"] . "</div>
                <div class='cardPrice'>Price: " . $row["price"] . ":-</div>
                <div class='unitsInStock'>In stock: " . $row["unitsInStock"] . "</div>
                <div class='amount_submit'>
                    <form action='products.php' method='post'>
                        <input value='1' name='quantity' type='number' class='amount'>
                        <input type='hidden' value='". $row["productId"]."' name='id'>
                        <input type='submit' value='add to basket'>
                    </form>
                </div>
            </div>";
        }
    } else {
        echo "error";
    }
}

function allProducts(){ 
    $conn = connection();
    $class = "products";
    $sql = "SELECT productId, pic, productName, info, price, unitsInStock FROM Products";
    $result = $conn->query($sql);
        

    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            if ($row['category'] == 'games') {
                return new Game($row);
            }
            if ($row['category'] == 'accessories') {
                return new Accessorie($row);
            }
            if ($row['category'] == 'console') {
                return new Console($row);
            }
            echo $row->printProductDiv();
        }
        
        
        } else {
            echo "error";
        }
    } 

    function insert($namn, $email){
        $sql = "INSERT INTO Subscribers (namn, email)
        VALUES ('$namn', '$email')";
        mysqli_query(connection(), $sql);
    }
    
    function insertPassword($password){
        $sql = "INSERT INTO User (username, password, email, admin, subscribe, name )
        VALUES ('nej', '$password', 'mail', '1', '1','name')";
        mysqli_query(connection(), $sql);
    }

    function insertUser($userName, $email, $password, $subs){
        $sql = "INSERT INTO User (username, email, password, admin, subscribe, name)
        VALUES ('$userName', '$email', '$password', '1', '$subs', 'name')";
        mysqli_query(connection(), $sql);
    }

    if(isset($_POST["newsletterName"]))
    {
        insert($_POST["newsletterName"],$_POST["email"]);
    }
    
    if(isset($_POST["signUpUsername"]) && isset($_POST["signUpPassword"]) && isset($_POST["signUpEmail"]))
    {  
        insertUser($_POST["signUpUsername"], $_POST["signUpEmail"], $_POST["signUpPassword"], true);
    }


        if(isset($_POST["newsletterName"]) && isset($_POST["email"]) && $_COOKIE["newsletter"] !== "true")
        {
            insert($_POST["newsletterName"],$_POST["email"]);  
            setcookie("newsletter", "true", time()+3600*48);
            
        }

function getOrders(){ 
    $conn = connection();


    $sql = "SELECT orderId, customerId, orderDate, shippedDate, shippedBy, shipped, recived FROM Orders";
    $result = $conn->query($sql);
        
    
    if($result->num_rows > 0){
        
        while($row = $result->fetch_assoc()){
            echo "
                    <tr>
                        <td>".$row['orderId']."</td>
                        <td>".$row['customerId']."</td>
                        <td>".$row['orderDate']."</td>
                        <td>".$row['shippedDate']."</td>
                        <td>".$row['shippedBy']."</td>
                        <td>".$row['shipped']."</td>
                        <td>
                            <form action='member.php?id=' action='POST'>
                                <input type='submit' value='recieved'>
                            </form>
                        </td>
                    </tr>";

        }
        
        
        } else {
            echo "error";
        }
}
    





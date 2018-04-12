<?php
include './include/classes.php';
include './classEshop.php';
session_start();
?>

<?php
function pushToCart($id, $amount){
    if(isset($id)){
        echo "<script>alert('Lagt i varukorg!');</script>";
        $_SESSION["cartId"] .= $id;
        $_SESSION["cartAmount"] += $amount;
        header("Refresh:0");
        
    }
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

    $sql = "SELECT productId, pic, productName, info, price, unitsInStock FROM Products";
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

    if(isset($_POST["newsletterName"]))
    {
        insert($_POST["newsletterName"],$_POST["email"]);
    }





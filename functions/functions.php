<?php
session_start();
include './include/classEshop.php';
include './Krypt.php';

?>

<?php

function printCart(){
    $conn = connection();
    
    foreach ($_SESSION['cartByproduct'] as $key => $value){
        
            $sql = "SELECT productId, pic, productName, price FROM Products WHERE productId = $key";
            $result = $conn->query($sql);
           
            if($result->num_rows > 0){
                if($row = $result->fetch_assoc()){  

             

                    echo "
                    <tr>
                    <td>".$key."</td>
                    <td>".$row['productName']."</td>
                    <td><img style='width:100px;' src='img/".$row['pic']."'</td>
                    <td>".$row['price']." kr</td>
                    <td>".$value."</td>
                    <td>
                        <form action='member.php?id=' action='POST'>
                            <input type='submit' value='remove product'>
                        </form>
                    </td>
                    </tr>";
                }   
            }       

    }
}

function pushToCart($prodID, $quantity) {
    if(empty($_SESSION['CART'])){
        $_SESSION['CART'] = array();
    }
        array_push($_SESSION['CART'], array($prodID => $quantity));
        if(empty($sumArray)){
            $sumArray = array();
        }

        foreach ($_SESSION['CART'] as $k=>$subArray) {
            foreach ($subArray as $id=>$value) {
               $antal += $value;
            }
        }
        $_SESSION["antal"] = $antal; 

        
        foreach ($_SESSION["CART"] as $k=>$subArray) {
            foreach ($subArray as $id=>$value) {
                $sumArray[$id]+=$value;
            }
        }
        $_SESSION["cartByproduct"] = $sumArray;
        // print_r($sumArray);
        header("Refresh:0");
        
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


function selectedProduct(){
    $conn = connection();

    $sql = "SELECT category, productId, pic, productName, info, price, unitsInStock FROM Products WHERE category = '".$_GET['category']."' ";
    $result = $conn->query($sql);
        
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){            
            
            if ($row['category'] == 'games') {
                
                $game = new Game($row);
                echo $game->printProductDiv($sql);
               
            }
            if ($row['category'] == 'accessories') {
                $accessorie = new Accessorie($row);

                echo $accessorie->printProductDiv($sql);
            }
            if ($row['category'] == 'console') {
                
                $console = new Console($row);
                
                echo $console->printProductDiv($sql);
                
            }            
        }  
    } 
    else {
        echo "error";
    }
}

function allProducts(){ 
    $conn = connection();
    $class = "products";
    $sql = "SELECT category, productId, pic, productName, info, price, unitsInStock FROM Products";
    $result = $conn->query($sql);
        

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            //print_r($row);
            //ini_set('display_errors', 1 );
            
            
            if ($row['category'] == 'games') {
                
                $game = new Game($row);
                echo $game->printProductDiv($sql);
               
            }
            if ($row['category'] == 'accessories') {
                $accessorie = new Accessorie($row);

                echo $accessorie->printProductDiv($sql);
            }
            if ($row['category'] == 'console') {
                
                $console = new Console($row);
                
                echo $console->printProductDiv($sql);
                
            }            
        }  
    } 
    else {
            echo "error";
    }
} 
    //Functions for insert to DB
    function insert($namn, $email){
        $sql = "INSERT INTO Subscribers (namn, email)
        VALUES ('$namn', '$email')";
        mysqli_query(connection(), $sql);
    }
    function insertNewsletter($title, $message){
        $sql = "INSERT INTO Newsletter (title, message)
        VALUES ('$title', '$message')";
        mysqli_query(connection(),$sql);
    }
    
    function insertPassword($password){
        $sql = "INSERT INTO User (username, password, email, admin, subscribe, name )
        VALUES ('nej', '$password', 'mail', '1', '1','name')";
        mysqli_query(connection(), $sql);
    }

    //Lägger till ny user i SQL
    function insertUser($userName, $email, $password, $subs){
        $sql = "INSERT INTO User (username, email, password, admin, subscribe, name)
        VALUES ('$userName', '$email', '$password', 0, '$subs', 'name')";
        mysqli_query(connection(), $sql);
    }



    //Make admin
    function updateAdmin($username){
        $sql = "UPDATE User
        SET admin = 1
        WHERE username = '$username'";
        mysqli_query(connection(), $sql);
    }
      //makeAdmin check
    if(isset($_GET["makeAdmin"])){
        updateAdmin($_GET["makeAdmin"]);
    }
    //

<<<<<<< HEAD
   
    

=======
>>>>>>> 81b24498677a0c83dc3d506be3d9b395da08b926
    if(isset($_POST["signUpUsername"]) && isset($_POST["signUpPassword"]) && isset($_POST["signUpEmail"]))
    {  
        $sql = "SELECT username FROM User";
        $result = connection()->query($sql);
        
        foreach($result as $name){
            if($_POST["signUpUsername"] == $name['username']){
                ?><script>alert("Username is not available!");</script><?php
                break;
            } else {
                insertUser($_POST["signUpUsername"], $_POST["signUpEmail"], $_POST["signUpPassword"], true);
            }
        }
    }

    //Newsletter check
    if(isset($_POST["newsletterName"]) && isset($_POST["email"]) && $_COOKIE["newsletter"] !== "true")
    {
        insert($_POST["newsletterName"],$_POST["email"]);  
        setcookie("newsletter", "true", time()+3600*48);
            
    }
    //

    //Send newsletter from admin check
    if(isset($_POST["newsletterTitle"]) && isset($_POST["comment"]) ){
        insertNewsletter($_POST["newsletterTitle"], $_POST["comment"]);
        echo "Sent";
    }

    //
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
    









// BACKUP



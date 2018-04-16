<?php
    session_start();
    include './include/classEshop.php';
    include './functions/krypt.php';
    include './functions/insert.php';
    include './functions/update.php';
?>

<?php



   

    function shipping(){
        $conn = connection();
        
        $sql = "SELECT companyName, price, shipperId FROM Shippers";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if ($row['shipperId'] == $_POST['shipping_id']) {
                    $_POST['shipping_cost'] = $row['price'];
                    $_SESSION["shipping_id"] = $row['companyName'];
                }
                echo "
                
                <td>".$row['companyName']. " (".$row['price']." kr)<input type='radio' name='shipping_id' value='".$row['shipperId']."'></td>
                
                ";
            }
        }
        else
        {
            echo "error";
        }
        echo $_SESSION["shipping_id"];
    }

    function printCart()
    {
        $conn = connection();
        
        foreach ($_SESSION['cartByproduct'] as $key => $value)
        {
            $sql = "SELECT productId, pic, productName, price FROM Products WHERE productId = $key";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0)
            {
                if($row = $result->fetch_assoc())
                {
                    $price = $row['price'];

                    // The subtotal is the cost of each item multiplied by how many you're ordering
                    $subtotal = $price * $value;
                
                    // Add this subtotal to the running total
                    $totalPrice += $subtotal;
                    $totalAmount += $value;
                    echo "
                    <tr>
                        <td>".$key."</td>
                        <td>".$row['productName']."</td>
                        <td><img style='width:100px; border-radius:10%; border:1px solid black;'  src='img/".$row['pic']."'</td>
                        <td>".$row['price']." kr</td>
                        <td>
                            <form action='cart.php' method='POST'>
                                <input style='width:30px; text-align:center;' type='number' name='changeAmount' value='".$value."'>
                                <input type='hidden' name='delProdID' value='".$key."' />
                                <input type='submit' value='ändra antal'>
                            </form>
                        </td>
                        <td>
                            <form action='cart.php' method='POST'>
                                <input type='hidden' name='delProdID' value='".$key."' />
                                <input type='submit' value='Ta bort produkt'>
                            </form>
                        </td>
                    </tr>"
                    ;
                  
                }
            }
        }

        return array($totalPrice, $totalAmount);

    }

    function pushToCart($prodID, $quantity)
    {
        if(empty($_SESSION['CART']))
        {
            $_SESSION['CART'] = array();
        }
        
        array_push($_SESSION['CART'], array($prodID => $quantity));
        
        if(empty($sumArray))
        {
            $sumArray = array();
        }
        
        foreach ($_SESSION["CART"] as $k=>$subArray)
        {
            foreach ($subArray as $id=>$value)
            {
                $sumArray[$id] += $value;
            }
        }
        $_SESSION["cartByproduct"] = $sumArray;
        header("Refresh:0");

    }

    function connection()
    {
        $servername = "localhost";
        $username = "joakimedwardh";
        $password = "x@ZeIbKiSPIr";
        $dbname = "joakimedwardh";

        $conn = new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error)
        {
            die("FEL: " . $conn->connect_error);
        }
        
        // GÖR TILL GLOBAL
        return $conn;
    }

    function selectedProduct()
    {
        $conn = connection();

        $sql = "SELECT category, productId, pic, productName, info, price, unitsInStock FROM Products WHERE category = '" . $_GET['category'] . "'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if ($row['category'] == 'games')
                {
                    $game = new Game($row);
                    echo $game->printProductDiv($sql);
                }

                if ($row['category'] == 'accessories')
                {
                    $accessorie = new Accessorie($row);
                    echo $accessorie->printProductDiv($sql);
                }

                if ($row['category'] == 'console')
                {
                    $console = new Console($row);
                    echo $console->printProductDiv($sql);
                }
            }
        }
        else
        {
            echo "error";
        }
    }

    function allProducts()
    {
        $conn = connection();
        $class = "products";
        $sql = "SELECT category, productId, pic, productName, info, price, unitsInStock FROM Products ORDER BY ( CASE WHEN category = 'console' THEN 0 ELSE 1 END ), category";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {

                if ($row['category'] == 'games')
                {
                    $game = new Game($row);
                    echo $game->printProductDiv($sql);
                }

                if ($row['category'] == 'accessories')
                {
                    $accessorie = new Accessorie($row);
                    echo $accessorie->printProductDiv($sql);
                }
                
                if ($row['category'] == 'console')
                {
                    $console = new Console($row);
                    echo $console->printProductDiv($sql);
                }
            }
        }
        else
        {
            echo "error";
        }
    }
    
    //Functions for insert to DB
    function insert($namn, $email)
    {
        $sql = "INSERT INTO Subscribers (namn, email)
        VALUES ('$namn', '$email')";
        mysqli_query(connection(), $sql);
    }

    function insertNewsletter($title, $message)
    {
        $sql = "INSERT INTO Newsletter (title, message)
        VALUES ('$title', '$message')";
        mysqli_query(connection(),$sql);
    }

    
    //Lägger till ny user i SQL
    function insertUser($userName, $email, $password, $subs, $name)
    {
        $sql = "INSERT INTO User (username, email, password, admin, subscribe, name)
        VALUES ('$userName', '$email', '$password', 0, '$subs', '$name')";
        mysqli_query(connection(), $sql);

    }

<<<<<<< HEAD
    //Make admin
    function updateAdmin($username)
    {
        $sql = "UPDATE User
        SET admin = 1
        WHERE username = '$username'";
        mysqli_query(connection(), $sql);
    }
    
    //makeAdmin check
    if(isset($_GET["makeAdmin"]))
    {
        updateAdmin($_GET["makeAdmin"]);
    }
    
    function updateOrderSkickad($orderId)
    {
        $sql = "UPDATE Orders
        SET shipped = 0
        WHERE orderId = '$orderId'";
        mysqli_query(connection(), $sql);
    }

    if(isset($_GET["orderSkickad"])){
        updateOrderSkickad($_GET["orderSkickad"]);
    }

   
    

    
  
    if(isset($_POST["signUpUsername"]) && isset($_POST["signUpPassword"]) && isset($_POST["signUpEmail"]) && isset($_POST["signUpName"]))
    {  
        $sql = "SELECT username FROM User";
        $result = connection()->query($sql);
  
        foreach($result as $name)
        {
            
            if($_POST["signUpUsername"] == $name['username']){
                ?><script>alert("Username is not available!");</script><?php
                break;
            }
            else
            {
                insertUser($_POST["signUpUsername"], $_POST["signUpEmail"], md5($_POST["signUpPassword"]), true, $_POST["signUpName"]);
                ?><script>alert('User created')</script><?php
                break;
            }
        }
    }
    

    //Newsletter check
    if(isset($_POST["newsletterName"]) && isset($_POST["email"]) && $_COOKIE["newsletter"] !== "true")
    {
        insert($_POST["newsletterName"],$_POST["email"]);
        setcookie("newsletter", "true", time()+3600*48);
    }

    //Send newsletter from admin check
    if(isset($_POST["newsletterTitle"]) && isset($_POST["comment"]))
    {
        insertNewsletter($_POST["newsletterTitle"], $_POST["comment"]);
            ?><script>alert('Newsletter created')</script><?php
    }

=======
>>>>>>> 709211db0589fafbb9f657035d10f1df12cc4ef4
    function getOrders()
    {
        $conn = connection();

        $sql = "SELECT orderId, customerId, orderDate, shippedDate, shippedBy, shipped, recived FROM Orders";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
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
                    </tr>
                ";
            }
        }
        else
        {
            echo "error";
        }
    }
    if(!isset($_SESSION["nameOnUser"])){
        $_SESSION["nameOnUser"] = "Guest";
    }
    if($_SESSION["nameOnUser"] == true && $_SESSION["nameOnUser"] !== "Guest"){
        ?><script>sessionStorage.setItem("userLoggedIn","true");</script><?php
    }

    
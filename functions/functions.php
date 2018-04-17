<?php
    if (!isset($_SESSION))
    {
        session_start();
    }

    include_once './include/classEshop.php';
    include_once './functions/insert.php';
    include_once './functions/update.php';

?>



<?php

    function createGuestUser(){
        $guestUser = "Guest".rand(1,1000);
        
        return $guestUser;
    }

    function createGuestPass(){
        $guestPass = "Pass".rand(1,1000);

        return $guestPass;
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
    
    function getOrders()
    {
        $conn = connection();

        $sql = "SELECT orderId, customerId, orderDate, shippedDate, shippedBy, shipped, recived FROM Orders WHERE (customerId = '".$_SESSION['nameOnUser']."') ";
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
    // if(!isset($_SESSION["nameOnUser"])){
    //     $userGuest = "Guest".rand(1,1000);
    //     $_SESSION["nameOnUser"] = $userGuest;
    // }
    // if(!isset($_SESSION["randomPassword"])){
    //     $userPass = "Pass".rand(1,1000);
    //     $_SESSION["randomPassword"] = $userPass;
    // }

    if($_SESSION["memberIsLoggedIn"] == 1){
        ?><script>sessionStorage.setItem("userLoggedIn","true");</script><?php
    }
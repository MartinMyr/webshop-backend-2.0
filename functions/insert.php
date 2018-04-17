<?php

    //Lägger till ny user i SQL
    function insertUser($userName, $email, $password, $subs, $name)
    {
        $conn = connection();

        $sql = "INSERT INTO User (username, email, password, admin, subscribe, name)
        VALUES ('$userName', '$email', '$password', 0, '$subs', '$name')";
        mysqli_query(connection(), $sql);

    }

    //FÖR ATT HÄMTA SENASTE ORDER ID
    function getLatesOrder(){
        $conn = connection();

        $selectId = "SELECT MAX(orderId) as id FROM Orders ";
        $id = $conn->query($selectId)->fetch_assoc();

        return $id;
    }

    function insertOrder(){

        //SKAPAR RANDOM USER OCH PASS INLOGG TILL GUEST
        if(isset($_SESSION["memberIsLoggedIn"])){
            $nameOnuser = $_SESSION["nameOnUser"];    
        }
        else{
            $_SESSION["guestUser"] = createGuestUser();
            $_SESSION["guestPass"] = createGuestPass();
            $nameOnuser = $_SESSION["guestUser"];
        }

        //KOLLAR OM KUNDEN HAR LAGT TILL FRAKT
        if(empty($_SESSION["shipping_id"])){
        echo "<script>alert('Du måste välja fraktalternativ :)')</script>";
        }
        else{
            
            $conn = connection();

            //SKICKAR ORDERN TILL DATABASEN
            $date = date('Y-m-d');
  
            $sqlInsertIntoOrders = "INSERT INTO Orders (customerId, orderDate, ShippedDate, ShippedBy, Shipped, recived)
            VALUES ('$nameOnuser','$date','2018-05-01',' ".$_SESSION["shipping_id"]." ','0','0')";
            (mysqli_query(connection(), $sqlInsertIntoOrders));

            $id = getLatesOrder();
            
            foreach ($_SESSION['cartByproduct'] as $key => $value)
            {
                $sql = "SELECT productId, pic, productName, price FROM Products WHERE productId = $key";
                $result = $conn->query($sql);
                
                if($result->num_rows > 0)
                {
                    if($row = $result->fetch_assoc())
                    {
                        $price = $row['price'];

                            
                        $sqlinsert = "INSERT INTO Order_details (orderId, productId, price, quantity)
                        VALUES (' ".$id["id"]." ','$key','$price','$value')";
                        mysqli_query(connection(), $sqlinsert);
                    
                    }
                }
                
                if($result->num_rows > 0){
                    if($row = $result->fetch_assoc()){
                        $price = $row['price'];
                        
                        $orderTillDatabas = array('id'=>$key, 'price'=>$price,'quantity'=> $value);
                        
                    }
                }
                
            $sqlinsert = "INSERT INTO Order_details (orderId, productId, price, quantity)
            VALUES (".$id["id"].", ".$orderTillDatabas["id"].",".$orderTillDatabas["price"].",".$orderTillDatabas['quantity'].")";
            (mysqli_query(connection(), $sqlinsert));

            }

            //SKICKAR GÄSTANVÄNDARE TILL DATABASEN MED KRYPTERAT LÖSEN
            $kryptPass = md5($_SESSION["guestPass"]);

            if(empty($_SESSION["memberIsLoggedIn"])){
                insertUser($_SESSION["guestUser"],"guest@guest.com",$kryptPass,0,"guest");
            }
            
            //TÖMMER VARUKORGEN OCH SKICKAR ANVÄNDARE TILL TACKSIDAN
            unset($_SESSION['CART']);
            header("location:thanks.php");
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


    ?>
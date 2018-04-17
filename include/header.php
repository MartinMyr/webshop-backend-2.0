<?php 
    if (!isset($_SESSION))
    {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Super Nintendo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="./script/ajax.js"></script>
    <script src="./script/login.js"></script>
    <script src="./script/admin.js"></script>
</head>
<body>
    
    <header>
        <div id="header_content">
            <div>
                <img id="logo" src="img/logo.png">
            </div>
        </div>    
    </header>

    <div id="newsletter">
        <h2>Sign up for our newsletter NOW!!!</h2>
        <img src="./img/newsletter.jpg">
        <form method="post">
            <input type="text" name="newsletterName" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" class="hideNewsletter">Yes plz</button>
            <button class="hideNewsletter">Noooo</button>
        </form>
    </div>



    <div id="container">
        
        <div class="menu">
            <div class="linkDiv">
                <a href="index.php">Start</a>
            </div> 
            <div class="linkDiv">  
                <a href="products.php">Produkter</a>
            </div> 
            <div class="linkDiv">
                <a href="contact.php">Kontakt</a>
            </div>
            <div class="linkDiv" id="loginDiv">
                <a href="login.php">Login</a>
            </div>  
            <div class='linkDiv' id='member'></div>

            <?php
                if(isset($_SESSION["inloggad"])){
                    
                    echo "<div class='linkDiv' onclick='logout();'><a href='#'>Logout</a></div>";
                    
                }
            ?>

            <div id="cart">
                <a id="cartLink" href="cart.php" style="color:black";>
                    <?php
                    if(empty($_SESSION['CART'])){
                        echo "<i class='fas fa-cart-arrow-down fa-6x'></i>";
                    }
                    else{
                        echo "<i class='fas fa-shopping-cart fa-6x'></i>";
                    }
                    ?>    
                </a>
            </div>  
        </div>
        <div id="content">

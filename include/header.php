<?php 
session_start()
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
            <input type="mail" name="mail" placeholder="Email">
            <input type="checkbox" name="isNewsletterTrue">
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <button type="submit" class="hideNewsletter">Yes plz</button>
        </form>
    </div>



    <div id="container">
        
        <div class="menu">
            <div class="linkDiv">
                <a href="index.php">Start</a>
            </div> 
            <div class="linkDiv">  
                <a href="products.php">Products</a>
            </div> 
            <div class="linkDiv">
                <a href="contact.php">Contact</a>
            </div>
            <div class="linkDiv">
                <a href="login.php">Login</a>
            </div>  
            <div id="cart">
                <a id="cartLink" href="cart.php">
                    <?php
                        echo "Antal varor i kundkorgen:<br/><br/>".$_SESSION["cart_item"][""]["quantity"]."";
                    ?>
                </a>
            </div>  
        </div>
        <div id="content">

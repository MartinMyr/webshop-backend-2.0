<?php
    if (!isset($_SESSION))
    {
        session_start();
    }

    session_unset($_SESSION['CART']);
    header("location: cart.php");
?>


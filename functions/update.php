<?php

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

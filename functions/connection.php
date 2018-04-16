<?php

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

?>
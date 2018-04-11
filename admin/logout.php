<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
include 'include/header.php';
    
unset($_SESSION['adminCheck']);

header('location: index.php');
}
else{
echo "error";
}

?>
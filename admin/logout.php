<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
unset($_SESSION['adminCheck']);
header('location: index.php');
}
else{
echo "error";
}

?>
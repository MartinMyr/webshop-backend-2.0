<?php
     
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../functions/functions.php';
    unset($_SESSION['adminCheck']);
}
else{
echo "error";
}

?>
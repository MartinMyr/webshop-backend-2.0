<?php
     
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../functions/functions.php';
    unset($_SESSION["inloggad"]);
    $_SESSION["adminCheck"] = 'false';
    
}
else{
echo "error";
}

?>
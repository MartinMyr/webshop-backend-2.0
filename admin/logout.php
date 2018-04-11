<?php
    session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    unset($_SESSION['adminCheck']);
}
else{
echo "error";
}

?>
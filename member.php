<?php 
include "include/header.php";
include "functions/functions.php";
?>
<div id="memberDiv">
    <table id='ordersTable'>
    <tr>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Order Date</th>
        <th>shipped Date</th>
        <th>Shipped By</th>
        <th>Shipped</th>
        <th>Recieved</th>
    </tr>
        <?php

            getOrders();

        ?>    
    </table>
</div>
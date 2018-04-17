<?php
    include "include/header.php";
    include_once "../functions/functions.php";

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $conn = connection();

        $sql = "SELECT orderId, customerId, orderDate, shippedDate, shippedBy, shipped, recived FROM Orders";
        $result = $conn->query($sql);
        
        echo "<div id='memberDiv'>
        <table id='ordersTable'>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Order Date</th>
            <th>shipped Date</th>
            <th>Shipped By</th>
            <th>Shipped</th>
            <th>Confirm shipped</th>
            <th>Recieved</th>
        </tr>";

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "
                    <tr>
                        <td>".$row['orderId']."</td>
                        <td>".$row['customerId']."</td>
                        <td>".$row['orderDate']."</td>
                        <td>".$row['shippedDate']."</td>
                        <td>".$row['shippedBy']."</td>
                        <td>".$row['shipped']."</td>
                        <td>
                            <input type='checkbox' id='order" . $row["orderId"] . "' value='".$row['orderId']."'>
                            <button onclick='setSendStatus(" . $row["orderId"] . ")'>Bekräfta</button>
                        </td>
                        <td>".$row['recived']."</td>
                    </tr>
                ";
            }   
        }
        echo "</table></div>";
        connection()->close;
    }
    else if(isset($_POST["orderID"]) && isset($_POST["sendStatus"]))
    {
        $conn = connection();
        $sql = "UPDATE Orders SET shipped = '" . $_POST['sendStatus'] . "' WHERE (orderId = " . $_POST['orderID'] . ")";
        $conn->query($sql);
        echo $conn->affected_rows;
    }
    else
    {
        echo "error";
    }
?>
<?php
include "include/header.php";
include "../functions/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    

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
                    <form action='member.php?id=' action='POST'>
                        <input type='submit' value='recieved'>
                    </form>
                </td>
            </tr>
        ";
    }
}

echo "</table></div>";

}
else{
echo "error";
}

?>


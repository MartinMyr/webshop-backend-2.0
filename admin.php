<?php
    
    include 'include/header.php';
    include 'functions/functions.php';
?>
   <script>$(".menu").empty();
            $(".menu").append("<div class='linkDiv' onclick='viewOrders();'><a href='#'>Users</a></div><div class='linkDiv'><a href='#'>Products</a></div><div class='linkDiv'><a href='#'>Subs.</a></div><div class='linkDiv'><a href='#'>Orders</a></div><div class='linkDiv'><a href='#'>Logout</a></div>");
    </script>
   



<?php
    include 'include/footer.php';
?>

<?php
    session_start();
    if($_SESSION["adminCheck"] == 'false'){
        header("location: index.php");
    }
    include 'include/header.php';
    include 'functions/functions.php';
?>
   <script>$(".menu").empty();
            $(".menu").append(`<div class='linkDiv' onclick='viewOrders();'><a href='#'>Orders</a>
                </div><div class='linkDiv' onclick='viewProducts();'><a href='#'>Products</a>
                </div><div class='linkDiv' onclick='viewSubscribers();'><a href='#'>Subs.</a>
                </div><div class='linkDiv' onclick='viewUsers();'><a href='#'>Users</a>
                </div><div class='linkDiv' onclick='createNews();'><a href='#'>Newsletter</a>
                </div><div class='linkDiv' onclick='logout();'><a href='#'>Logout</a></div>`);
    </script>
   

<?php
print_r($_GET["makeAdmin"]);
?>

<?php
    include 'include/footer.php';
?>

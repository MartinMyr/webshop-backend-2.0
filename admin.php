<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>
   
   <div id="productButtons">
    <form method="GET">
    <button type="submit" name="meny" value="users" id="users">Users</button>
    <button type="submit" name="meny" value="subscribers" id="subscribers">subscribers</button>
    <button type="submit" name="meny" value="products" id="products">products</button>
    <button type="submit" name="meny" value="orders" id="orders">orders</button>
    </form>
    </div>
    <div>
<?php
     if (empty($_GET["meny"])){
            echo "Hej och välkommen till Adminsidan";
        }
        else{
            selectedMeny();
        };


?>
</div>



<?php
    include 'include/footer.php';
?>

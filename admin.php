<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>
   
   <div id="productButtons">
    <form method="GET">
    <button type="submit" name="meny" value="users" id="users">Users</button>
    <button type="submit" name="meny" value="subscribers" id="subscribers">subscribers</button>
    <button type="submit" name="meny" value="products" id="products">products</button>
    </form>
    </div>
<?php
     if (empty($_GET["meny"])){
            echo "Hej och välkommen till Adminsidan";
        }
        else{
            selectedMeny();
        };


?>




<?php
    include 'include/footer.php';
?>

<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>

<div id="productButtons">
    <button id="console">Console</button>
    <button id="games">Games</button>
    <button id="accessories">Accessories</button>
</div>
<div class="cards">
    <?php
        
        AllProducts();

    ?>
</div>












<?php
    include 'include/footer.php';
?>
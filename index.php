<?php
    include 'include/header.php';
    include 'functions/functions.php';
    
?>
<div id='startDiv'>
    <?php 
        if($_SESSION["inloggad"] == 'true'){
            echo "<h1>Välkommen " . $_SESSION["inloggadNamn"] . "!";
        }
    ?>
    <h1>Hej och välkommen till året 1992.</h1>
    <p> 
        År 1992 blev tv-spelskonsolen årets julklapp, här på denna retroinspirerade superawzumsida skickar vi er tillbaka till denna udnerbara 16bits tid. 
    </p>
    <p>
        Här kan ni beställa allt man kan önska sig ifrån denna svunna tid. SÅ pass på, gör ditt fynd och upplev varför det var bättre förr.
    </p>        
</div>


<?php
    print_r($_SESSION["nameOnUser"]);
    include 'include/footer.php';
?>
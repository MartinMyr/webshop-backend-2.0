<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>
   <div id='startDiv'>
   <?php if($_SESSION['inloggad'] == true){
       echo "<h1>Välkommen" . $SESSION_['inloggadNamn'] . "!";
   }?>
<h1>Hej och välkommen till året 1992.</h1>
<p> År 1992 blev tv-spelskonsolen årets julklapp, här på denna retroinspirerade superawzumsida skickar vi er tillbaka till denna udnerbara 16bits tid.
    Här kan ni beställa allt man kan önska sig ifrån denna svunna tid. SÅ pass på, gör ditt fynd och upplev varför det avr bättre förr.
</p>
</div>



<?php
    include 'include/footer.php';
?>
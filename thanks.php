<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>
<div id='startDiv'>

    <?php 

    // showOrder();
        if($_SESSION["nameOnUser"] == true && $_SESSION["nameOnUser"] !== "Guest"){
            echo " <h1>Tack för din beställning ".$_SESSION["nameOnUser"].".</h1>
            <p>Din beställning kommer skickas så fort som möjligt!</p>";
        }
        else{
            echo "<h1>Tack för din beställning.</h1>
                <p> 
                    Här får ser du dina inloggningsuppgifter för att se din beställning:
                </p>
                <p>
                    Användarnamn:  
                </p>        
                <p>
                    Lösenord:
                </p> 
            ";
        }
        
    ?>

</div>


<?php
    include 'include/footer.php';
?>
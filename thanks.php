<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>
<div id='startDiv'>
    <?php 

        echo $_SESSION["guestUser"];
        echo "<br>";
        echo $_SESSION["guestPass"];

    $id = getLatesOrder();
        if(isset($_SESSION["memberIsLoggedIn"])){
            echo " <h1>Tack för din beställning ".$_SESSION["nameOnUser"].".</h1>
            <p>Din beställning med ordernr: ".$id["id"]." kommer skickas så fort som möjligt!</p>";
        }
        else{
            echo "<h1>Tack för din beställning.</h1>
                <p> 
                    Här är dina inloggningsuppgifter för att se din beställning med ordernummer: <strong>".$id["id"]."</strong>.
                </p>
                <p>
                    Användarnamn: <strong>".$_SESSION["guestUser"]."</strong>  
                </p>        
                <p>
                    Lösenord: <strong> ".$_SESSION["guestPass"]."</strong>
                </p> 
            ";
        }
        
    ?>

</div>


<?php
    include 'include/footer.php';
?>
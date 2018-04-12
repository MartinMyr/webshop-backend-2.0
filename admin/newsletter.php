<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
    ?>  
        <form id="inputNewsletter" method="post">
        <input type="text" name="newsletterTitle" required>
        <textarea name="comment" form="inputNewsletter"></textarea>
        <button type="submit">Send</button>
        </form>        
        <?php
    }
?>
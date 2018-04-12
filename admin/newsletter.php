<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
    ?>  
        <form id="inputNewsletter" method="post">
        <h3>Title</h3>
        <input type="text" name="newsletterTitle" maxlength="16" required>
        <h3>Message</h3>
        <textarea name="comment" maxlength="128" form="inputNewsletter" required></textarea>
        <button type="submit">Send</button>
        </form>        
        <?php
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
    ?>  
        <div id='newsDiv'>
            <h2>Newsletter</h2>
            <p>Här kan du skapa ett nytt Newsletter, ange titel och infon.</p>
        <form id="inputNewsletter" method="post">
        <h3>Title</h3>
        <input type="text" name="newsletterTitle" maxlength="16" required>
        <h3>Message</h3>
        <textarea name="comment" maxlength="128" form="inputNewsletter" required></textarea><br>
        <button type="submit">Send</button>
        </form> 
        </div>       
        <?php
    }
?>
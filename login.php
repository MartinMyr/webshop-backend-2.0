<?php
    include 'include/header.php';
?>

<h1>Login here!</h1>

<form id="loginform" method="post">
    <div class="userField">
        <img class="loginIcon" src="img/userlogin.png">
        <input type="name" name="username" placeholder="username">
    </div>

    <div class="passwordField">
        <img class="loginIcon" src="img/bowserpassword.png">
        <input type="password" name="password" placeholder="password">
    </div>
    
    <button id="login" type="submit">Login</button>
</form>













<?php
    include 'include/footer.php';
?>
<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>

<h1>Login here!</h1>

<form id="loginform" method="post">
    <div class="userField">
        <img class="loginIcon" src="img/userlogin.png">
        <input type="name" name="username" placeholder="Username">
    </div>

    <div class="passwordField">
        <img class="loginIcon" src="img/bowserpassword.png">
        <input type="password" name="password" placeholder="Password">
    </div>
    
    <button  id="login" type="submit">Login</button>
</form>


<?php
     $sqlUser = "SELECT 'username' FROM User";
     $sqlPass = "SELECT 'password' FROM User";
     $sqlUsernameChk = mysqli_query(connection(), $sqlUser)->fetch_assoc();
     $sqlPasswordChk = mysqli_query(connection(), $sqlPass)->fetch_assoc();
    
     print_r($sqlUsernameChk);

     if($_POST["username"] == $sqlUsernameChk && $_POST["password"] == $sqlPasswordChk){
         echo "YOLOSWAG!";
     }

?>











<?php
    include 'include/footer.php';
?>
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
     $conn = connection();
     $sqlUser = "SELECT username FROM User";
     $sqlPass = "SELECT 'password' FROM User";
     $sqlUserChk = $conn->query($sqlUser);
     $sqlPassChk = $conn->query($sqlPassword);

print_r($sqlUserChk->fetch_assoc()["username"]);
     for( $i = 0; $i < count($sqlUserChk->fetch_assoc()); $i++){
        echo "4";
        for( $j = 0; $j < count($sqlPassChk->fetch_assoc()["password"]); $j++){
            echo $sqlPassChk;
            if( $_POST["username"] == $sqlUserChk[$i] and  $_POST["password"] == $sqlPassChk[$j]){
                echo "YOU FUCKING MADE IT!";

            }
        }
    }


    
        
        

?>











<?php
    include 'include/footer.php';
?>
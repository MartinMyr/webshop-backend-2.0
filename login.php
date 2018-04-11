<?php
    include 'include/header.php';
    include 'functions/functions.php';
?>

<h1 id="loginText">Login here!</h1>

<form id="loginform" method="post">
    <div class="userField">
        <img class="loginIcon" src="img/userlogin.png">
        <input type="name" name="username" placeholder="Username">
    </div>

    <div class="passwordField">
        <img class="loginIcon" src="img/bowserpassword.png">
        <input type="password" name="password" placeholder="Password">
    </div>
    
    <button id="login" type="submit">Login</button>
    <button onclick="signUp()">Bli medlem</button>
    
</form>

<script>function signUp(){
    $("#loginText").remove();
    $("#loginform").empty();
    $("#loginform").append(`
        <h2>Please fill out the form</h2>
        <div class="userField">
            <img class="loginIcon" src="img/userlogin.png">
            <input type="name" name="signUpUsername" placeholder="Username">
        </div>

        <div class="passwordField">
            <img class="loginIcon" src="img/bowserpassword.png">
            <input type="password" name="signUpPassword" placeholder="Password">
        </div>

        <div class="passwordField">
            <img class="loginIcon" src="img/userlogin.png">
            <input type="email" name="signUpEmail" placeholder="Email">
        </div>

        <input type="submit" value="Create account">
        
        `
    );
}</script>



<?php
    if(isset($_POST["username"])){
        $conn = connection();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sqlUser = "SELECT username, password FROM User WHERE username = '$username' AND password = '$password' LIMIT 1"; 
     
        $results = $conn->query($sqlUser)->fetch_assoc();
        
        if($results == true){
            $_SESSION["adminCheck"] = "true";
            header("location: admin.php");
            
        }else{
           echo "False";
        }
        
        
    }


    
        



?>


<?php
    include 'include/footer.php';
?>
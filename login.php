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
    
    <button id="login" type="submit">Login</button>
</form>


<?php
    if(isset($_POST["username"])){
        $conn = connection();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sqlUser = "SELECT username, password FROM User WHERE username = '$username' AND password = '$password'"; 
     
        $results = $conn->query($sqlUser)->fetch_assoc();
        
        if($results == true){
            print_r($results);
        }else{
           echo "False";
        }
        
        
    }


    
        



?>




  





<?php
    include 'include/footer.php';
?>
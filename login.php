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


<?php
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sqlUser="SELECT username, password, admin FROM User WHERE username='$username' AND password='$password' LIMIT 1"; 
     
        $results = connection()->query($sqlUser)->fetch_assoc();
        if (!$results)
        {
            ?><script>alert("Wrong username or password!");</script><?php
        }
        elseif($results['admin'] == true){
            $_SESSION["adminCheck"] = 'true';
            header("location: admin.php");
        }else
        {
            $_SESSION["nameOnUser"] = $results["username"];
            echo  "<script>alert('FEL!!)</script>";
            $_SESSION["memberIsLoggedIn"] =  'true';
            header("location: index.php");
           
            
            
        }
            
    }

?>


<?php
    include 'include/footer.php';
?>
<?php
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
        $sql = "SELECT username, email, name FROM User";
        $users = connection()->query($sql);
        echo "<div id='userDiv'><table border='2' id='subTable'><tr><th>Username</th><th>Email</th><th>Name</th></tr>";
        if($users->num_rows > 0){
            
            while($row = $users->fetch_assoc()){
                echo "<tr><td>".$row['username']."</td><td>".$row['email']."</td><td>".$row['name']."</td> </tr>";
            }
            
        }
        echo "</table></div>";
        connection()->close;
    }


   
    else{
        echo "error";
    }
    

?>
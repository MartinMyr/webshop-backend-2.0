<?php
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
        $sql = "SELECT username, email, name FROM Users";
        $subs = connection()->query($sql);
        echo "<table border='2' id='subTable'><tr><th>Username</th><th>Email</th><th>Name</th></tr>";
        if($subs->num_rows > 0){
            
            while($row = $subs->fetch_assoc()){
                echo "<tr><td>".$row['username']."</td><td>".$row['email']."</td><td>".$row['name']."</td> </tr>";
            }
            
        }
        echo "</table>";
        connection()->close;
    }


   
    else{
        echo "error";
    }
    

?>
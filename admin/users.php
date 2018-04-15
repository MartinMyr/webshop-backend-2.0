<?php
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
        $sql = "SELECT username, email, admin, name FROM User";
        $users = connection()->query($sql);
        echo "<form method='get'>";
        echo "<div id='userDiv'><table border='2' id='subTable'><tr><th>Username</th><th>Email</th><th>Name</th><th>Admin</th><th>Make admin</th></tr>";
       
        if($users->num_rows > 0){
            

            while($row = $users->fetch_assoc()){
                echo "<tr><td>".$row['username']."</td><td>".$row['email']."</td><td>".$row['name']."</td><td>".$row["admin"]."</td><td><input type='checkbox' name='makeAdmin' value='".$row['username']."' ></td> </tr>";
            }  
            
        }else{
            echo "error";
        }
        echo "</table></div><button id='makeAdmin'  type='submit'>Make admin</button></form>";
        connection()->close;
       
        
    }


   
    
    

?>
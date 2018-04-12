<?php
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
        $sql = "SELECT namn, email FROM Subscribers";
        $subs = connection()->query($sql);
        echo "<div id='subDiv'><table border='2' id='subTable'><tr><th>Name</th><th>Email</th></tr>";
        if($subs->num_rows > 0){
            
            while($row = $subs->fetch_assoc()){
                echo "<tr><td>".$row['namn']."</td><td>".$row['email']."</td> </tr>";
            }
            
        
        echo "</table></div>";
        connection()->close;

        }else{
            echo "error";
        }
    
    }
?>
<?php
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include '../functions/functions.php';
        $sql = "SELECT namn, email FROM Subscribers";
        $subs = connection()->query($sql);
        if($subs->num_rows > 0){
            echo "<table id='subTable'><tr><th>Name</th><th>Email</th></tr>";
            while($row = $subs->fetch_assoc()){
                echo "<tr><td>".$row['namn']."</td><td>".$row['email']."</td> </tr>";
            }
            echo "</table>";
        }
    }


   
    else{
        echo "error";
    }
    

?>
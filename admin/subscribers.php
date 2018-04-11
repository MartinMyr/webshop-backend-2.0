<?php
    

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
       
        $sql = "SELECT namn, email FROM Subscribers";
        $subs = connection()->query($sql);
        if($subs->num_rows > 0){
        
            while($row = $subs->fetch_assoc()){
                echo $row["namn"];
            }
        }
        }
        else{
            echo "error";
        }
    

?>
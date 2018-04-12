
<?php
// include "header.php";
include "functions/functions.php";
// Define a test variable
if(isset($_POST["encrypt"])){


    function encrypt($str, $offset) {
        $encrypted_text = "";
        $offset = $offset % 26;
        if($offset < 0) {
            $offset += 26;
        }
        $i = 0;
        while($i < strlen($str)) {
            // $c = mb_strtoupper($str{$i}); 
            if(($c >= "A") && ($c <= 'Ö')) {
                if((ord($c) + $offset) > ord("Ö")) {
                    $encrypted_text .= chr(ord($c) + $offset - 26);
            } else {
                $encrypted_text .= chr(ord($c) + $offset);
            }
          } else {
              $encrypted_text .= " ";
          }
          $i++;
        }
        return $encrypted_text;
    }
    function decrypt($str, $offset) {
        $decrypted_text = "";
        $offset = $offset % 26;
        if($offset < 0) {
            $offset += 26;
        }
        $i = 0;
        while($i < strlen($str)) {
            $c = mb_strtoupper($str{$i}); 
            if(($c >= "A") && ($c <= 'Z')) {
                if((ord($c) - $offset) < ord("A")) {
                    $decrypted_text .= chr(ord($c) - $offset + 26);
            } else {
                $decrypted_text .= chr(ord($c) - $offset);
            }
          } else {
              $decrypted_text .= " ";
          }
          $i++;
        }
        return $decrypted_text;
    }
    
    //sample text
    $text = $_POST["encrypt"];
    $dec = $_POST["decrypt"];
    $offset = 5;
    
    $enc = encrypt($text, $offset);
    echo $enc;
    echo "<br />";
    echo decrypt($dec, $offset);
    insertPassword($enc);
}
?>

<form action="krypt.php" method="post">
encrypt: <input type="text" name="encrypt">
</br>
decrypt: <input type="text" name="decrypt">
<input type="submit" value="Decrypt">  
</form>

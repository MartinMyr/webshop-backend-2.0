<?php
    function encrypt($str, $offset) {
        $encrypted_text = $str;
        $offset = $offset % 26;
        if($offset < 0) {
            $offset += 26;
        }
        $i = 0;
        while($i < strlen($str)){
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
        $decrypted_text = $str;
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

?>



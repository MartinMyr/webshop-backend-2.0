<?php
// Define a test variable
$name = $_POST["text"];

// Create a Random Generator
srand((double)microtime()*1000000); // Seed the Random Generator
$strCharNumber = rand(102,106); // Pics a number between 102 and 106

// Print our decryption number
print chr($strCharNumber); // Prints the CHAR of the Random Number (used to de-generate the number)
$strcode = chr($strCharNumber); // Add char to ending String

// For Loop to convert each char into ascii then increase number
for ($i = 0; $i < strlen($name); $i++) {
        $strChar = ord($name[$i]) + $strCharNumber;
        $strChar = bin2hex(chr($strChar));                      // Convert Char to Binary, leave out
        print strtoupper($strChar);                                   // Make the string Upper
        $strcode = $strcode & $strChar;
}
?>
<form action="krypt.php" method="post">
<input type="text" name="text">
<iput type="submit">
</form>
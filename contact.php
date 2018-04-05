<?php
include "include/header.php"
?>

<?php 

if(isset($_POST['email'])){
    $to = "jesper.hansson@medieinstitutet.se, danielstena@medieinstitutet.se, martin.myrmarker@medieinstitutet.se, joakim.edwardh@medieinstitutet.se, thomas.vanderven@medieinstitutet.se"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "E-mail from super_nintendo.se ";
    $subject2 = "Copy of your e-mail to super_nintendo.se";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo '<script> alert("'.$first_name.' , we will contact you shortly"); </script>';
        // You can also use header('Location: thank_you.php'); to redirect to another page.
    }

?>
<div id="formDiv">
    <h1>Please fill out this form if you want to get in touch with us. </h1>
    <form action="contact.php" method="POST">
        <div class='textAndInput'>
            <div class='text'>
                Your E-mail address: 
            </div> 
            <div class='input'>
                <input type='email' name='email'>
            </div>
        </div>
        <div class='textAndInput'>
            <div class='text'>
                Firstname: 
            </div> 
            <div class='input'>
                <input type='text' name='first_name'>
            </div>
        </div>
        <div class='textAndInput'>
            <div class='text'>
                Lastname: 
            </div> 
            <div class='input'>
                <input type='text' name='last_name'>
            </div>
        </div>
        <div>
            <textarea name="message" id="message"></textarea>                        
        </div>
        <div>
            <input type="submit" value="SEND" id="submit">
        </div>
    </form>
</div> 




<?php
    include 'include/footer.php'
?>


<?php
/*Script to Send E-mail by Little Gyaani*/

//PHPMailer Functiona Calls
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Include phpMailer Library
include 'static/plugin/phpMailer/PHPMailer.php'; 
include 'static/plugin/phpMailer/SMTP.php'; 
include 'static/plugin/phpMailer/Exception.php'; 

//Mail Send

//Parameters
// print_r($_POST);
$sender_name = $_POST['name'];
$sender_email = $_POST['email'];
$sender_subject = $_POST['subject'];
$sender_message = $_POST['message'];

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//Enable SMTP debugging.
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "subhasishsahoo.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "support@subhasishsahoo.com";                 
$mail->Password = "Ck6r^0v8";                           
// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
//Set TCP port to connect to
$mail->Port = 587;

//From email address and name
$mail->From = "$sender_email";
$mail->FromName = "$sender_name";

//To address and name
$mail->addAddress("$sender_email", "$sender_name");
// $mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("support@subhasishsahoo.com", "Subhasish Sahoo - Support Center");

//CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "New Enquiry from - $sender_name - $sender_subject";
$mail->Body = "$sender_message";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    // echo "Message has been sent successfully";
    echo 1;
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
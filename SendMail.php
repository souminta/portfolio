<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP();      // Set mailer to use SMTP
    $mail->Host       = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;  // Enable SMTP authentication
    $mail->Username   = 'souminta'; // SMTP username
    $mail->Password   = 'sendgrid@11'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;   // TCP port to connect to
    //Recipients
    $mail->setFrom($_POST["email"], $_POST["name"] );
    $mail->addAddress('souminta.noiboualapha-merlier@epitech.eu',"souminta");

    // Content
    //$mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Mail from my portfolio';
    $mail->Body    = $_POST["message"];

    $mail->send();
  header("Location: index.html");   
  exit();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error:{$mail->ErrorInfo}";

}

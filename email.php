<?php

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$sender = $_POST['mailAddress'];
$subject = $_POST['subject'];
$message = $_POST['mailContent'];

$mail = new PHPMailer;
$mail->SMTPDebug = 0;                               
$mail->isSMTP();                                   
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;                              
$mail->Username = "emploi.baydir@gmail.com";                 
$mail->Password = "RatedRKO";                           
$mail->Port = 587;                                   

$mail->SetFrom($sender);

$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);

$mail->addAddress("emploi.baydir@gmail.com", "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Mail de la part de " . $sender . " : " . $subject;
$mail->Body = $message;
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
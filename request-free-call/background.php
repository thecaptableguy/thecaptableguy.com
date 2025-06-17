<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($argc < 3) {
    error_log("Background email processor: Insufficient parameters. Expected: to_email, to_name, message. Received: ". implode(", ", $argv));
    exit(1);
}

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$from_email = 'bob.gillespie@captableexpert.com';
$from_name = 'Bob Gillespie - The Cap Table Expert';
$bcc_email = 'bob.gillespie@captableexpert.com';
$bcc_name = 'Contact from website';
$subject = 'We received your request for a free consultation';

$to_email = $argv[1];
$to_name = $argv[2];
$user_message = $argv[3];

$body = 'Hello ' . (!empty($to_name) ? $to_name : 'there') . ",\n";
$body .= "thank you for your request for a free consultation at wwww.captableexpert.com.\n\n";
$body .= "We will be in touch with you shortly.\n\n";
$body .= (!empty($user_message)) ? ("Your message was:\n" . $user_message . "\n\n") : "";
$body .= "Best regards,\n";
$body .= "Bob Gillespie - The Cap Table Expert\n";

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'localhost';
$mail->Port       = 25;
$mail->SMTPAuth   = false;
$mail->SMTPSecure = false;       

$mail->isHTML(false);
$mail->setFrom($from_email, $from_name);
$mail->addAddress($to_email, $to_name);
$mail->addBCC($bcc_email, $bcc_name);

$mail->Subject = $subject;
$mail->Body    = $body;

$mail->send();

exit(0);

<?php
// Background script to notify Bob about new checklist lead
// Matches structure of existing background.php using PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($argc < 3) {
    error_log("Lead notification: Insufficient parameters. Expected: to_email, to_name. Received: ". implode(", ", $argv));
    exit(1);
}

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$from_email = 'noreply@captableexpert.com';
$from_name = 'Cap Table Expert Website';
$to_email = 'bob.gillespie@captableexpert.com';
$to_name = 'Bob Gillespie';

$lead_email = $argv[1];
$lead_name = $argv[2];

$subject = 'New Checklist Lead - Cap Table Expert';

$body = "New checklist download request:\n\n";
$body .= "Email: $lead_email\n";
$body .= "Name: " . (!empty($lead_name) ? $lead_name : 'Not provided') . "\n";
$body .= "Date: " . date('Y-m-d H:i:s') . "\n";
$body .= "Checklist URL: https://www.captableexpert.com/checklist/\n\n";
$body .= "Follow up with this lead to convert to consultation booking.\n";

$mail = new PHPMailer(true);

// Use same SMTP settings as background.php
$mail->isSMTP();
$mail->Host       = 'localhost';
$mail->Port       = 25;
$mail->SMTPAuth   = false;
$mail->SMTPSecure = false;

$mail->isHTML(false);
$mail->setFrom($from_email, $from_name);
$mail->addAddress($to_email, $to_name);

$mail->Subject = $subject;
$mail->Body    = $body;

$mail->send();

exit(0);
?>

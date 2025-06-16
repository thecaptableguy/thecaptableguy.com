<?php

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;

// Function to redirect to success page with #thankyou fragment
function redirectSuccess() {
     $redirect_url = ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '/') . '#thankyou';
     
     header('Location: ' . $redirect_url);
     http_response_code(303);
}

// Function to redirect to contact page with #contact fragment
function redirectError() {
     $redirect_url = ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '/') . '#contact';
     
     header('Location: ' . $redirect_url);
     http_response_code(405);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['csrf_token'])|| empty($_POST['email'])) {
    redirectError();
    exit;
}

session_start(); 

if(empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    redirectError();
    exit;
}

session_write_close();

if (!filter_var(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL), FILTER_SANITIZE_EMAIL)) {
    redirectError();
    exit;
}

redirectSuccess();

while (ob_get_level()) {
    ob_end_flush();
}
flush();

if (function_exists('fastcgi_finish_request')) {
    fastcgi_finish_request();
} else {
    error_log('WARNING: fastcgi_finish_request not active!');
}

$mailto_client = $_POST['email'];
$name_client = !empty($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : null;
$message_client = !empty($_POST['message']) ? filter_var($_POST['message'], FILTER_SANITIZE_STRING) : null;

require_once $_SERVER['DOCUMENT_ROOT'] . '/contact/PHPMailer/src/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/contact/PHPMailer/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/contact/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->Timeout = 5;

$mail->isSMTP();
$mail->Host       = 'localhost';
$mail->Port       = 25;
$mail->SMTPAuth   = false;
$mail->SMTPSecure = false;

$mail->isHTML(false);
$mail->setFrom('bob.gillespie@captableexpert.com', 'Bob Gillespie - The Cap Table Expert');
$mail->addAddress($mailto_client, $name_client);
$mail->addBCC('bob.gillespie@captableexpert.com', 'Contact from www.captableexpert.com website');

$mail->Subject = 'Thank you for your request at www.captableexpert.com';
$mail->Body    =  'Hello' . (!empty($name_client) ? ' ' . ($name_client) : '') . ",\n" .
                  'I have received your request and will get back to you as soon as possible.' . "\n\n" .
                  (!empty($message_client) ? "Your message was:\n" . $message_client : '') . "\n\n" .
                  "Best regards," . "\n" .
                  "Bob Gillespie - The Cap Table Expert";

$mail->send();
exit;
?>

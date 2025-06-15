<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once $_SERVER['DOCUMENT_ROOT'] . '/contact/PHPMailer/src/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/contact/PHPMailer/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/contact/PHPMailer/src/SMTP.php';

function isTooManySubmissions() {
    if (isset($_SESSION["submissions_count"])) {
        if (++$_SESSION["submissions_count"] > 2) {
            return true;
        }
    } else {
        $_SESSION["submissions_count"] = 1;
        return false;
    }
}

if (
    $_SERVER['REQUEST_METHOD'] !== 'POST' ||
    empty($_POST['email']) ||
   // isTooManySubmissions() ||
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '/#contact'));
    http_response_code(303);
    exit;
}

    $mailto_client = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if (!$mailto_client) {
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '/#contact'));
    http_response_code(303);
    exit;
}
$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Timeout = 5;

$mail->isSMTP();
$mail->Host       = 'localhost';
$mail->Port       = 25;
$mail->SMTPAuth   = false;
$mail->SMTPSecure = false;
echo "Connection dump: " . $mail->smtpConnect();

$mail->setFrom('bob.gillespiele@captableexpert.com', 'Bob Gillespie');
$mail->addAddress('marco.santonastasi@gmail.com', 'Marco Santonastasi');
// set a content of "test email"
$mail->Subject = 'Test Email from PHPMailer';
$mail->Body    = 'This is a test email sent using PHPMailer sent directly to MS.';
// set the email format to HTML
$mail->isHTML(true);
// Attempt to send the email
try {
    if (!$mail->send()) {
        throw new Exception('Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
    }
    echo 'Email has been sent successfully.';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ' . $e->getMessage();
}

?>

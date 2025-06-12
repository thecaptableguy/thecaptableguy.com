<?php
session_start();

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
    isTooManySubmissions() ||
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

    $name_client = trim(strip_tags($_POST['name']));

    $message_client = trim(strip_tags($_POST['message']));

    $mailto_admin = "bob@captableexpert.com";
    $subject_admin = "New contact from captableexpert.com website";
    $body_admin = "The following email contacted you on the website captableexpert.com\n\n";
    $body_admin .= "Email: " . $mailto_client . "\n";
    $body_admin .= "Name: " . ($name_client ? $name_client : "No name provided") . "\n";
    $body_admin .= "Message: " . ($message_client ? $message_client : "No message provided") . "\n";

    $headers_admin = "From: " . $mailto_client . "\r\n" .
                     'Reply-To: ' . $mailto_client . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();
 

    $mail_to_admin_success = mail($mailto_admin, $subject_admin, $body_admin, $headers_admin);


    $subject_client = "Thank You for contacting Bob Gillespie";
    $body_client = "Hello" . ($name_client ? " " . $name_client : "") . ",\n\n";
    $body_client .= "Thank you for contacting me on www.captableexpert.com.\nI will get back to you shortly.\n\n";
    $body_client .= "Best regards,\nBob Gillespie";

    $headers_client =  'From: Bob Gillespie - Cap Table Expert <bob@captableexpert.com>' . "\r\n" .
                       'Reply-To: bob@captableexpert.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

    $mail_to_user_success = mail($mailto_client, $subject_client, $body_client, $headers_client);

    if ($mail_to_user_success) {
        header('Location: /#thankyou');
        exit;
    } else {
        header('Location: /#error');
        exit;
    }

?>

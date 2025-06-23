<?php
session_start();

$requested_on = $_SESSION['free_call_requested_on'] ?? false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $csrf_token_valid = !empty($_POST['csrf_token']) && 
                       !empty($_SESSION['csrf_token']) && 
                       hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
    
    $mailto_client = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $name_client = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
    $message_client = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

    if (!$requested_on && $csrf_token_valid && $mailto_client) {
        
        $requested_on = $_SESSION['free_call_requested_on'] = date('Y-m-d');

        $background_script = __DIR__ . '/background.php';
        $php_binary = PHP_BINARY;
        
        $command = sprintf(
            '%s %s %s %s %s > /dev/null 2>&1 &',
            escapeshellarg($php_binary),
            escapeshellarg($background_script),
            escapeshellarg($mailto_client),
            escapeshellarg($name_client),
            escapeshellarg($message_client)
        );
                
        exec($command);   
    }

} else {

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    $mailto_client = '';
    $name_client = '';
    $message_client = '';
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="bobthere">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free One Hour Call - Bob Gillespie Cap Table Expert</title>
    <link rel="canonical" href="https://www.captableexpert.com/request-free-call/" />
    <meta name="description"
        content="Book your free one-hour cap table consultation with Bob Gillespie. Get expert guidance on equity structures, fundraising, and avoid costly cap table mistakes.">
    <link rel="icon" type="image/png" href="/static/favicon.png" />
    <link href="/static/styles.css" rel="stylesheet" type="text/css" />

    <!--#include virtual="request-free-call.og.html" -->
	<!--#include virtual="request-free-call.strd.html" -->

</head>

<body class="bg-base-100">

    <!-- Header -->
    <!--#set var="header_cta" value="home" -->
    <!--#include virtual="/fragments/header-global.fragment.html" -->
    
    
    <main>
        <!--#if expr="!('<?php echo $requested_on ?>')" -->
            <!--#set var="name_client" value="<?php echo $name_client ?>" -->
            <!--#set var="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>" -->
            <!--#set var="mailto_client" value="<?php echo $mailto_client ?>" -->
            <!--#set var="message_client" value="<?php echo $message_client ?>" -->
            <!--#include virtual="make-request.fragment.html" -->
        <!--#else -->
            <!--#set var="requested_on" value="<?php echo $requested_on ?>" -->
            <!--#include virtual="success-request.fragment.html" -->
        <!--#endif -->
        

        
        
    </main>

		<!-- Footer -->
	    <!--#include virtual="/fragments/footer-global.fragment.html" -->

</body>

</html>

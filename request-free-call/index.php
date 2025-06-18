<?php

// Function to redirect to contact page with #contact fragment
function redirectError() {
    $redirect_url = ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '/') . '#contact';
    
    header('Location: ' . $redirect_url);
    http_response_code(405);
}

// main script
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_SESSION['free_call_requested'])) {

        if (empty($_POST['csrf_token']) || empty($_POST['email'])) {
            error_log("Invalid request method or missing parameters: " . $_SERVER['REQUEST_METHOD'] . ", CSRF token: " . $_POST['csrf_token'] . ", Email: " . $_POST['email']);
            redirectError();
            exit;
        }
        
        if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            error_log("Invalid CSRF token: " . $_POST['csrf_token'] . " (expected: " . $_SESSION['csrf_token'] . ")");
            redirectError();
                exit;
        }

        if (!filter_var(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL), FILTER_SANITIZE_EMAIL)) {
            error_log("Invalid email address: " . $_POST['email']);
            redirectError();
            exit;
        }

        $_SESSION['free_call_requested'] = date('Y-m-d');

        $mailto_client = $_POST['email'];
        $name_client = !empty($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : null;
        $message_client = !empty($_POST['message']) ? filter_var($_POST['message'], FILTER_SANITIZE_STRING) : null;

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
</head>

<body class="bg-base-100">
    <!-- Navigation -->
    <header class="navbar bg-base-100 border-b border-base-300">
        <nav class="navbar-start">
            <div class="flex items-center gap-3">
                <div class="avatar">
                    <div class="size-16 rounded">
                        <img src="/static/logo.webp" alt="Logo for Bob Gillespie Cap Table Expert Consultancy"
                            class="w-full h-full object-contain">
                    </div>
                </div>
                <div>
                    <div class="text-lg font-semibold text-base-content">Bob Gillespie</div>
                    <div class="text-xs text-base-content/60">Cap Table Specialist - Consultancy Services</div>
                </div>
            </div>
        </nav>
        <nav class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 text-sm">
                <li><a href="/about" class="text-base-content/70 hover:text-primary">About</a></li>
                <li><a href="/blog" class="text-base-content/70 hover:text-primary">Blog</a></li>
            </ul>
        </nav>
        <nav class="navbar-end">
            <a href="/" class="btn btn-accent btn-sm font-bold">Home</a>
        </nav>
    </header>

    <main>
        <?php if (!empty($_SESSION['free_call_requested'])): ?>
            <?php 
            // Set environment variable for SSI
            putenv('CONSULTATION_DATE=' . date('F j, Y', strtotime($_SESSION['free_call_requested'])));
            ?>
            <!--#include virtual="/fragments/success-page.html" -->

        <?php else: ?>
            <?php 
            // Set environment variable for SSI
            putenv('CSRF_TOKEN=' . $_SESSION['csrf_token']);
            ?>
            <!--#include virtual="/fragments/landing-page.html" -->
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer class="footer footer-center bg-base-200 text-base-content p-10">
        <div>
            <div class="avatar">
                <div class="size-28 rounded">
                    <img src="/static/logo.webp" alt="Cap Table Expert Logo" class="w-full h-full object-contain">
                </div>
            </div>
            <p class="font-bold text-lg text-base-content">Bob Gillespie</p>
            <p class="text-base-content/70">Cap Table Expert • Helping startups since 2008</p>
        </div>
        <div>
            <div class="grid grid-flow-col gap-4">
                <a href="/about" class="link link-hover text-base-content/70 hover:text-primary">About</a>
                <a href="/blog" class="link link-hover text-base-content/70 hover:text-primary">Blog</a>
            </div>
        </div>
        <div>
            <p class="text-base-content/60">© 2008-present Bob Gillespie. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>



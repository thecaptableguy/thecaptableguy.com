<?php
session_start();

// Configuration constants
define('BOB_EMAIL', 'bob@captableexpert.com');
define('MAX_MESSAGE_LENGTH', 2000);
define('RATE_LIMIT_MINUTES', 1);
define('MAX_SUBMISSIONS_PER_PERIOD', 3);

// Initialize variables
$message = '';
$message_type = '';
$errors = [];
$form_data = [
    'email' => '',
    'message' => '',
    'honeypot' => ''
];

// Generate CSRF token if not exists
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Rate limiting function
function checkRateLimit() {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $current_time = time();
    
    if (!isset($_SESSION['submissions'])) {
        $_SESSION['submissions'] = [];
    }
    
    // Clean old submissions
    $_SESSION['submissions'] = array_filter($_SESSION['submissions'], function($timestamp) use ($current_time) {
        return ($current_time - $timestamp) < (RATE_LIMIT_MINUTES * 60);
    });
    
    return count($_SESSION['submissions']) < MAX_SUBMISSIONS_PER_PERIOD;
}

// Log function (basic file logging)
function logMessage($message, $level = 'INFO') {
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $log_entry = "[$timestamp] [$level] [IP: $ip] $message" . PHP_EOL;
    error_log($log_entry, 3, __DIR__ . '/contact_form.log');
}

// Sanitize and validate input
function sanitizeInput($input, $max_length = null) {
    $sanitized = htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    if ($max_length && strlen($sanitized) > $max_length) {
        return substr($sanitized, 0, $max_length);
    }
    return $sanitized;
}

function validateEmail($email) {
    // Enhanced email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    
    // Check for suspicious patterns (basic header injection prevention)
    $suspicious_patterns = ['/\r/', '/\n/', '/\%0A/', '/\%0D/', '/Content-Type:/i', '/bcc:/i', '/cc:/i'];
    foreach ($suspicious_patterns as $pattern) {
        if (preg_match($pattern, $email)) {
            return false;
        }
    }
    
    return true;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // CSRF protection
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $errors[] = 'Security token mismatch. Please try again.';
        logMessage('CSRF token mismatch attempt', 'WARNING');
    }
    
    // Rate limiting check
    if (!checkRateLimit()) {
        $errors[] = 'Too many submissions. Please wait before trying again.';
        logMessage('Rate limit exceeded', 'WARNING');
    }
    
    // Honeypot check (bot detection)
    if (!empty($_POST['name'])) {
        $errors[] = 'Spam detected.';
        logMessage('Honeypot triggered - possible bot submission', 'WARNING');
    }
    
    if (empty($errors)) {
        // Sanitize form data
        $form_data['email'] = sanitizeInput($_POST['email'] ?? '');
        $form_data['message'] = sanitizeInput($_POST['message'] ?? '', MAX_MESSAGE_LENGTH);
        
        // Validation
        if (empty($form_data['email'])) {
            $errors[] = 'Email is required.';
        } elseif (!validateEmail($form_data['email'])) {
            $errors[] = 'Please enter a valid email address.';
        }
        
        if (empty($form_data['message'])) {
            $errors[] = 'Message is required.';
        } elseif (strlen($form_data['message']) < MIN_MESSAGE_LENGTH) {
            $errors[] = 'Message must be at least ' . MIN_MESSAGE_LENGTH . ' characters long.';
        }
        
        // If no validation errors, send email
        if (empty($errors)) {
            try {
                // Prepare safe email headers
                $to = RECIPIENT_EMAIL;
                $email_subject = 'Contact Form Message';
                
                $email_body = "You have received a new message from your website contact form.\n\n" .
                             "Details:\n" .
                             "Email: " . $form_data['email'] . "\n" .
                             "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n" .
                             "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'unknown') . "\n" .
                             "Timestamp: " . date('Y-m-d H:i:s') . "\n\n" .
                             "Message:\n" . $form_data['message'];
                
                // Safe headers (prevent header injection)
                $headers = [];
                $headers[] = 'From: Contact Form <noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '>';
                $headers[] = 'Reply-To: ' . $form_data['email'];
                $headers[] = 'Content-Type: text/plain; charset=UTF-8';
                $headers[] = 'X-Mailer: PHP/' . phpversion();
                
                $headers_string = implode("\r\n", $headers);
                
                if (mail($to, $email_subject, $email_body, $headers_string)) {
                    $message = 'Thank you! Your message has been sent successfully.';
                    $message_type = 'success';
                    
                    // Log successful submission
                    logMessage("Successful form submission from {$form_data['email']}");
                    
                    // Add to rate limiting
                    $_SESSION['submissions'][] = time();
                    
                    // Clear form data on success
                    $form_data = [
                        'email' => '',
                        'message' => '',
                        'honeypot' => ''
                    ];
                    
                    // Regenerate CSRF token
                    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                    
                } else {
                    $errors[] = 'Unable to send message. Please try again later.';
                    logMessage("Failed to send email for {$form_data['email']}", 'ERROR');
                }
                
            } catch (Exception $e) {
                $errors[] = 'An unexpected error occurred. Please try again later.';
                logMessage("Exception in email sending: " . $e->getMessage(), 'ERROR');
            }
        }
    }
    
    if (!empty($errors)) {
        $message = implode(' ', $errors);
        $message_type = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="container bg-white p-8 rounded-lg shadow-xl border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Contact Us</h2>

        <?php if (!empty($message)): ?>
            <div class="p-4 mb-6 rounded-lg text-center
                <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-4">
            <!-- CSRF Protection -->
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            
            <!-- Honeypot field (hidden from users, bots might fill it) -->
            <div style="position: absolute; left: -9999px;">
                <label for="name">Name (leave blank):</label>
                <input type="text" id="name" name="name" tabindex="-1" autocomplete="off">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Your Email</label>
                <input type="email" id="email" name="email"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       placeholder="john.doe@example.com" 
                       value="<?php echo htmlspecialchars($form_data['email']); ?>" 
                       required>
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                <textarea id="message" name="message" rows="5"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          placeholder="Your message here..." 
                          maxlength="<?php echo MAX_MESSAGE_LENGTH; ?>" 
                          required><?php echo htmlspecialchars($form_data['message']); ?></textarea>
                <div class="text-xs text-gray-500 mt-1">
                    Minimum <?php echo MIN_MESSAGE_LENGTH; ?> characters, maximum <?php echo MAX_MESSAGE_LENGTH; ?> characters
                </div>
            </div>

            <div>
                <button type="submit" name="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</body>
</html>

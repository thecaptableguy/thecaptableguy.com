<?php
// Set a default success/error message variable
$message = '';
$message_type = ''; // 'success' or 'error'

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Sanitize and collect form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    $message_content = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Validate input
    if (empty($name) || empty($email) || empty($subject) || empty($message_content)) {
        $message = 'Please fill in all fields.';
        $message_type = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format. Please enter a valid email address.';
        $message_type = 'error';
    } else {
        // --- Email sending logic ---
        // Replace 'your_email@example.com' with the email address where you want to receive messages
        $to = 'your_email@example.com';
        $email_subject = "Contact Form: $subject";
        $email_body = "You have received a new message from your website contact form.\n\n" .
                      "Here are the details:\n\n" .
                      "Name: $name\n" .
                      "Email: $email\n" .
                      "Subject: $subject\n" .
                      "Message:\n$message_content";

        // Set email headers to ensure proper formatting and reply-to functionality
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

        // Attempt to send the email
        if (mail($to, $email_subject, $email_body, $headers)) {
            $message = 'Thank you! Your message has been sent successfully.';
            $message_type = 'success';
            // Optionally, clear the form fields after successful submission
            $_POST = array(); // Clear all POST data
        } else {
            $message = 'Oops! Something went wrong and we could not send your message. Please try again later.';
            $message_type = 'error';
        }
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
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                <input type="text" id="name" name="name"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       placeholder="John Doe" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Your Email</label>
                <input type="email" id="email" name="email"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       placeholder="john.doe@example.com" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
            </div>

            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                <input type="text" id="subject" name="subject"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       placeholder="Regarding your service..." value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>" required>
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                <textarea id="message" name="message" rows="5"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          placeholder="Your message here..." required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
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

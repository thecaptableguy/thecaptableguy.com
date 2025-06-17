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
            <!-- Thank You / Success Page -->
            <div class="hero min-h-screen bg-gradient-to-br from-base-100 to-base-200">
                <div class="hero-content text-center">
                    <div class="max-w-3xl">
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body items-center text-center p-8">
                                <!-- Success Icon -->
                                <div class="size-28 bg-success rounded-full flex items-center justify-center mb-6">
                                    <svg class="size-16 text-success-content" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                
                                <h1 class="card-title text-4xl lg:text-5xl font-bold text-success mb-6">
                                    Thank You!
                                </h1>
                                
                                <p class="text-xl text-base-content/80 mb-8 leading-relaxed">
                                    Your message has been received. Bob will personally review your submission and get back to you within 24 hours.
                                </p>

                                <div class="alert alert-soft alert-success mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <h3 class="font-bold">Request Submitted</h3>
                                        <div class="text-sm">
                                            Consultation requested on <?php echo date('F j, Y', strtotime($_SESSION['free_call_requested'])); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-soft alert-info mb-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <h3 class="font-bold">Next Steps</h3>
                                        <div class="text-sm">
                                            Bob will review your cap table questions and prepare a customized response with actionable insights for your specific situation.
                                        </div>
                                    </div>
                                </div>

                                <div class="divider"></div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                                    <div class="card card-border bg-base-100">
                                        <div class="card-body">
                                            <h3 class="card-title text-lg">While You Wait</h3>
                                            <p class="text-sm text-base-content/70">
                                                Check out our latest insights on cap table management and equity strategies.
                                            </p>
                                            <div class="card-actions justify-end">
                                                <a href="/blog" class="btn btn-outline btn-primary btn-sm">Read Blog</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card card-border bg-base-100">
                                        <div class="card-body">
                                            <h3 class="card-title text-lg">Learn More</h3>
                                            <p class="text-sm text-base-content/70">
                                                Discover Bob's background and expertise in cap table consulting.
                                            </p>
                                            <div class="card-actions justify-end">
                                                <a href="/about" class="btn btn-outline btn-secondary btn-sm">About Bob</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-actions justify-center mt-8">
                                    <a href="/" class="btn btn-accent btn-lg">Return Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <!-- Landing Page with Contact Form -->
            <div class="hero min-h-screen bg-gradient-to-br from-base-100 to-base-200">
                <div class="hero-content flex-col lg:flex-row-reverse w-full max-w-7xl">
                    <!-- Left Column - Hero Content -->
                    <div class="flex-1 text-center lg:text-left">
                        <div class="badge badge-accent badge-outline mb-6">
                            Free Consultation
                        </div>
                        
                        <h1 class="text-5xl lg:text-5xl font-bold text-base-content mb-6">
                            Get Your Cap Table <span class="text-primary">Right</span> From Day One
                        </h1>
                        
                        <p class="text-xl text-base-content/80 mb-8 leading-relaxed">
                            Book a free one-hour consultation with Bob Gillespie, a seasoned cap table expert with 30+ years of experience. 
                            Get personalized advice on equity structures, fundraising strategies, and ownership optimization.
                        </p>

                        <!-- Value Propositions -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-start gap-3 text-left">
                                <div class="badge badge-success badge-sm mt-1">✓</div>
                                <div>
                                    <h3 class="font-semibold text-base-content">Expert Equity Guidance</h3>
                                    <p class="text-base-content/70 text-sm">Navigate complex cap table scenarios with confidence</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3 text-left">
                                <div class="badge badge-success badge-sm mt-1">✓</div>
                                <div>
                                    <h3 class="font-semibold text-base-content">Fundraising Strategy</h3>
                                    <p class="text-base-content/70 text-sm">Optimize your equity structure for Series A, B, and C rounds</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3 text-left">
                                <div class="badge badge-success badge-sm mt-1">✓</div>
                                <div>
                                    <h3 class="font-semibold text-base-content">Avoid Costly Mistakes</h3>
                                    <p class="text-base-content/70 text-sm">Prevent dilution issues and ownership disputes before they happen</p>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial -->
                        <div class="card card-border bg-base-100 shadow-sm mb-8">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="avatar">
                                        <div class="size-12 rounded-full bg-primary">
                                            <div class="flex items-center justify-center h-full text-primary-content font-bold">
                                                CF
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-base-content">Startup Founder</div>
                                        <div class="text-xs text-base-content/60">Series A Company</div>
                                    </div>
                                </div>
                                <p class="text-sm text-base-content/80 italic">
                                    "Bob's expertise saved us from a major dilution mistake during our Series A. His guidance was invaluable."
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Contact Form -->
                    <div class="flex-shrink-0 w-full max-w-md">
                        <div class="card bg-base-100 shadow-2xl">
                            <div class="card-body">
                                <div class="card-title justify-center text-2xl mb-6 text-base-content">
                                    Schedule Your Free Call
                                </div>

                                <fieldset class="fieldset">
                                    <legend class="fieldset-legend">Contact Information</legend>
                                    
                                    <form method="POST" action="/request-free-call/" class="space-y-4">
                                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />

                                        <label class="input">
                                            <span class="label">Your Name</span>
                                            <input type="text" name="name" placeholder="Enter your full name" />
                                        </label>

                                        <label class="input">
                                            <span class="label">Email Address *</span>
                                            <input type="email" name="email" placeholder="your@email.com" required />
                                        </label>

                                        <fieldset class="fieldset">
                                            <legend class="fieldset-legend">Tell Bob About Your Situation</legend>
                                            <textarea name="message" class="textarea h-24" 
                                                placeholder="Describe your cap table questions, fundraising stage, or specific challenges you're facing..."></textarea>
                                            <div class="label">Optional - helps Bob prepare for your call</div>
                                        </fieldset>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Request Free Consultation
                                        </button>
                                    </form>
                                </fieldset>

                                <div class="divider text-xs">Trusted by 100+ startups</div>

                                <div class="text-center">
                                    <p class="text-xs text-base-content/60">
                                        Typically responds within 24 hours
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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



<?php
session_start();
if (!isset($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="bobthere">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Understanding the Difference Between Pre-Money and Post-Money SAFEs</title>
        <link rel="canonical" href="https://www.captableexpert.com/blog/safe-pre-post-money/" />
        <link rel="shortcut icon" href="/static/favicon.png" type="image/png">
        <link rel="stylesheet" href="/static/styles.css">
    </head>

    <body>
        <!-- Navigation -->
        <header class="navbar bg-base-100 border-b border-base-300">
            <nav class="navbar-start">
                <div class="flex items-center gap-3">
                    <div class="avatar">
                        <div class="size-16 rounded">
                            <img src="/static/logo.webp" alt="Cap Table Expert Logo"
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
                    <li><a href="/about/" class="text-base-content/70 hover:text-primary">About</a></li>
                    <li><a href="/blog/" class="text-base-content/70 hover:text-primary">Blog</a></li>
                </ul>
            </nav>
            <nav class="navbar-end">
                <a href="#contact" class="btn btn-accent btn-sm font-bold">Free Consultation</a>
            </nav>
        </header>

        <main class="container mx-auto px-6 py-16">
            <div class="max-w-4xl mx-auto">
                <!-- Blog Post Header -->
                <div class="text-center mb-16">
                    <div class="badge badge-outline badge-accent mb-4">Cap Table Strategy</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-primary mb-6">
                        Understanding the Difference Between Pre-Money and Post-Money SAFEs
                    </h1>
                    <p class="text-xl text-base-content/70 max-w-3xl mx-auto mb-8">
                        Learn how pre-money and post-money SAFEs impact ownership and dilution differently, and why this
                        distinction matters for your fundraising strategy.
                    </p>
                    <div class="flex items-center justify-center gap-4 text-sm text-base-content/50">
                        <span>By Bob Gillespie</span>
                        <span>•</span>
                        <span>Cap Table Expert</span>
                    </div>
                </div>

                <!-- Blog Post Content -->
                <div class="prose prose-lg max-w-none">
                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">Introduction</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Startup fundraising is filled with terms that sound similar but have real implications for
                            your cap table. One of the most commonly misunderstood distinctions is between pre-money
                            SAFEs and post-money SAFEs. Both are tools for raising capital without setting a valuation
                            today — but how they impact ownership and dilution is very different.
                        </p>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">First, What Is a SAFE?</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            A SAFE (Simple Agreement for Future Equity) is a form of convertible security that allows
                            investors to invest in your company today, with the promise of receiving equity in the
                            future — usually when a priced round occurs. Created by Y Combinator in 2013, SAFEs are
                            simpler and faster than traditional convertible notes because they don't accrue interest or
                            have a maturity date.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            Now, let's get into the difference that really matters.
                        </p>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-8">Pre-Money SAFEs vs Post-Money SAFEs</h2>

                        <!-- Pre-Money SAFEs -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">Pre-Money SAFEs (2013 Version)</h3>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    <strong>Key idea:</strong> Investor ownership is calculated before the new money
                                    from the priced round comes in.
                                </p>
                                <h4 class="font-bold text-lg mb-2">How it works:</h4>
                                <ul class="list-disc list-inside space-y-2 mb-6">
                                    <li>In a pre-money SAFE, the SAFE investor's equity is based on the company's
                                        pre-money valuation at the time of the next financing round</li>
                                </ul>
                                <h4 class="font-bold text-lg mb-2">This means:</h4>
                                <ul class="list-disc list-inside space-y-2 mb-6">
                                    <li>They convert before the new money is counted.</li>
                                    <li>The SAFE investor ends up owning less if more SAFEs were raised later.</li>
                                    <li>You can't accurately predict the dilution caused by pre-money SAFEs until the
                                        priced round.</li>
                                </ul>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="alert">
                                        <div>
                                            <h4 class="font-bold text-lg mb-2">Pros:</h4>
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Simple and founder-friendly</li>
                                                <li>Encourages quick closes without intense valuation negotiation</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="alert">
                                        <div>
                                            <h4 class="font-bold text-lg mb-2">Cons:</h4>
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Hard to model dilution</li>
                                                <li>Earlier investors may be unintentionally diluted by later SAFE
                                                    holders</li>
                                                <li>Creates uncertainty in the cap table</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Post-Money SAFEs -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">Post-Money SAFEs (2018 Update)</h3>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    <strong>Key idea:</strong> Investor ownership is calculated after all prior SAFEs
                                    have converted.
                                </p>
                                <h4 class="font-bold text-lg mb-2">How it works:</h4>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    In a post-money SAFE, the SAFE investor receives a fixed percentage of the company —
                                    calculated after the SAFE investment, but before the new money in the priced round.
                                    This creates:
                                </p>
                                <ul class="list-disc list-inside space-y-2 mb-6">
                                    <li>A predictable ownership outcome for investors</li>
                                    <li>Clearer modeling of dilution</li>
                                    <li>Dilution from SAFEs falls entirely on the founders and existing holders</li>
                                </ul>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="alert">
                                        <div>
                                            <h4 class="font-bold text-lg mb-2">Pros:</h4>
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Clear and predictable dilution</li>
                                                <li>Easier cap table modeling</li>
                                                <li>More transparent for both founders and investors</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="alert">
                                        <div>
                                            <h4 class="font-bold text-lg mb-2">Cons:</h4>
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Can be more dilutive to founders than expected if many SAFEs are
                                                    raised</li>
                                                <li>Founders bear all dilution from the SAFEs</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Example -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">A Simple Example</h3>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    Let's say:
                                </p>
                                <ul class="list-disc list-inside space-y-2 mb-6">
                                    <li>You raise $1M on a SAFE with a $10M valuation cap</li>
                                    <li>Later, you raise a $5M Series A at a $15M pre-money valuation</li>
                                </ul>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="bg-base-200 p-4 rounded-lg">
                                        <h4 class="font-bold text-lg mb-2">With a pre-money SAFE, the investor gets:
                                        </h4>
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>$1M / $10M = 10% ownership before the Series A</li>
                                            <li>After Series A, their ownership is diluted by the $5M of new investors
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bg-base-200 p-4 rounded-lg">
                                        <h4 class="font-bold text-lg mb-2">With a post-money SAFE, the investor gets:
                                        </h4>
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>A locked 10% ownership after all other SAFEs convert</li>
                                            <li>The $5M Series A dilutes everyone else, not the SAFE holder</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- So Which Is Better? -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">So Which Is Better?</h3>
                                <div class="space-y-4">
                                    <p class="text-base-content/80 leading-relaxed">
                                        <strong>For founders:</strong> Pre-money SAFEs seem attractive upfront, but can
                                        lead to unpredictable and painful dilution.
                                    </p>
                                    <p class="text-base-content/80 leading-relaxed">
                                        <strong>For investors:</strong> Post-money SAFEs are fairer and more transparent
                                        — they know exactly what percentage they'll own.
                                    </p>
                                    <p class="text-base-content/80 leading-relaxed">
                                        Because of this clarity, post-money SAFEs have become the new standard in most
                                        early-stage financings.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">Final Thoughts</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            The trend has been to move away from pre-money SAFEs and instead use post-money SAFEs. They
                            are both excellent structures when used properly.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            If you're raising on SAFEs — especially multiple SAFEs over time — it's critical to
                            understand how they impact your ownership. Don't treat SAFEs as "not real equity." They are
                            equity, and when they convert, they can take a larger bite out of your cap table than
                            expected.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Always model the dilution, ideally using a cap table tool or working with an expert. Your
                            future self (and co-founders) will thank you.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            If you'd like to talk with Bob about cap tables, you can connect with him here – because
                            <span class="text-xl font-bold text-secondary">every point matters.</span>
                        </p>
                    </section>
                </div>
            </div>
        </main>

        <!-- Contact Section -->
        <section id="contact" class="bg-primary text-primary-content py-20">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold mb-6">
                    Get Expert Cap Table Guidance
                </h2>
                <p class="text-xl mb-12 text-primary-content/90 max-w-3xl mx-auto">
                    Send Bob a message. He will get back to you promptly
                </p>

                <div class="max-w-lg mx-auto">
                    <div class="card bg-base-100 text-base-content shadow-2xl">
                        <div class="card-body">
                            <h3 class="card-title justify-center text-2xl mb-6 text-base-content">
                                Message Bob
                            </h3>

                            <form id="message" method="POST" action="/contact/opvmghihjeo.php" class="space-y-4">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />

                                <input type="text" name="name" placeholder="Your name..."
                                    class="input input-lg w-full placeholder:text-base-300" />

                                <input type="email" name="email" placeholder="Your email address.."
                                    class="input input-lg w-full placeholder:text-base-300" required />

                                <textarea name="message" class="textarea textarea-lg w-full placeholder:text-base-300"
                                    rows="4" placeholder="Tell us about your cap table needs..."></textarea>

                                <button type="submit" class="btn btn-outline btn-accent btn-lg btn-block">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
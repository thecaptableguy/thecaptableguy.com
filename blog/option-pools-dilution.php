<?php
session_start();
if (!isset($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
session_write_close();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="bobthere">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>How Option Pools in an Equity Round Create Dilution — and What Founders Need to Know</title>
        <link rel="canonical" href="https://www.captableexpert.com/blog/option-pools-dilution/" />
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
                        How Option Pools in an Equity Round Create Dilution — and What Founders Need to Know
                    </h1>
                    <p class="text-xl text-base-content/70 max-w-3xl mx-auto mb-8">
                        Understanding how option pools work and where dilution happens in funding rounds is crucial for
                        making informed decisions about your equity structure.
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
                            When you're negotiating a funding round, one of the most important — and most misunderstood
                            — sources of founder dilution is the option pool. It's not always obvious, but how the
                            option pool is sized and when it's calculated can have a major impact on your cap table.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            Let's break it down...
                        </p>
                    </section>

                    <section class="mb-12">
                        <!-- What is an option pool -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">What is an option pool</h3>
                                <p class="text-base-content/80 leading-relaxed">
                                    An option pool is a portion of a company's shares reserved for future employees,
                                    advisors, and consultants. It ensures you have enough equity to attract top talent
                                    after the round.
                                </p>
                            </div>
                        </div>

                        <!-- Why VCs ask for an option pool -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">Why VCs ask for an option pool</h3>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    Typically, VCs want to see a 10–20% option pool post-financing, so new hires can be
                                    incentivized without further diluting investors.
                                </p>
                                <p class="text-base-content/80 leading-relaxed">
                                    But here's the twist: where and when the option pool is created matters a lot.
                                </p>
                            </div>
                        </div>

                        <!-- Where the Dilution Happens -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">Where the Dilution Happens: The
                                    Pre-Money Trick</h3>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    In most VC term sheets, investors will ask for the option pool to be included in the
                                    pre-money valuation.
                                </p>
                                <p class="text-base-content/80 leading-relaxed mb-6">
                                    This means that the founders—not the investors—bear the dilution from the new option
                                    pool.
                                </p>

                                <div class="bg-base-200 p-6 rounded-lg mb-6">
                                    <h4 class="font-bold text-lg mb-4 text-accent">Example:</h4>
                                    <p class="text-base-content/80 leading-relaxed mb-4">Let's say:</p>
                                    <ul
                                        class="list-disc list-inside space-y-2 text-base-content/80 leading-relaxed mb-4">
                                        <li>Pre-money valuation = $10M</li>
                                        <li>VC is investing $5M for 33.3% ownership (post-money)</li>
                                        <li>VC wants a 15% option pool after the round</li>
                                    </ul>
                                    <p class="text-base-content/80 leading-relaxed">
                                        In effect, the founders are giving up an extra 15% on top of the equity sold to
                                        the VC — even though those options haven't been granted yet. Your final cap
                                        table will mean the existing shareholders have been diluted by 48.3%.
                                    </p>
                                </div>

                                <p class="text-base-content/80 leading-relaxed">
                                    Understanding what levers to pull in this negotiation can be done through building a
                                    great model that will help you understand the math and variables in the deal.
                                </p>
                            </div>
                        </div>

                        <!-- Why Do Investors Do This? -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">Why Do Investors Do This?</h3>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    It's not malicious — it's just math. VCs want the company to have enough room to
                                    hire a team post-investment, without their equity being diluted. So they push that
                                    dilution onto the founders before they invest.
                                </p>
                                <p class="text-base-content/80 leading-relaxed">
                                    Your job as the founder isn't to minimize the option pool, it's to get it right.
                                </p>
                            </div>
                        </div>

                        <!-- Founders: What You Can Do -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">Founders: What You Can Do</h3>
                                <div class="alert">
                                    <div>
                                        <ul class="list-disc list-inside space-y-2">
                                            <li><strong>Negotiate the option pool size:</strong> If you already have a
                                                strong team or existing option grants, argue for a smaller top-up.</li>
                                            <li><strong>Model the impact:</strong> Cap table modeling helps you see
                                                exactly how much equity you're giving up. Always run the numbers before
                                                signing. Find an expert to help you build and understand the model.</li>
                                            <li><strong>Use real hiring plans:</strong> If you can justify a smaller
                                                pool based on your actual hiring roadmap, you may avoid unnecessary
                                                dilution.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Rule of Thumb -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">Quick Rule of Thumb</h3>
                                <p class="text-base-content/80 leading-relaxed mb-4">
                                    When you hear "we want a 15% option pool," ask:
                                </p>
                                <p class="text-base-content/80 leading-relaxed font-semibold">
                                    To get to this point with a VC, you've had a lot of discussions on use of funds. So:
                                    Is that what our plan says we need to allocate?
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">Final Thoughts</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Option pools are a necessary tool — but don't let them become a silent equity giveaway.
                            Understanding how it creates dilution gives you leverage in negotiation and confidence in
                            your fundraising decisions.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Always model your cap table before agreeing to a term sheet. A small line in a legal doc can
                            mean millions in lost ownership down the road.
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
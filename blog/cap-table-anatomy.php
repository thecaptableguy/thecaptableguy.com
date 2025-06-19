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
        <title>The Anatomy of a Clean Cap Table — What Investors Want to See</title>
        <link rel="canonical" href="https://www.captableexpert.com/blog/cap-table-anatomy/" />
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
                    <div class="badge badge-outline badge-accent mb-4">Cap Table Structure</div>
                    <h1 class="text-4xl lg:text-5xl font-bold text-primary mb-6">
                        The Anatomy of a Clean Cap Table — What Investors Want to See
                    </h1>
                    <p class="text-xl text-base-content/70 max-w-3xl mx-auto mb-8">
                        A comprehensive guide to building and maintaining a clean cap table that signals professionalism and attracts investors.
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
                            If you're planning to raise capital, your pitch deck isn't the only thing under scrutiny. One of the first things a serious investor will ask for is your cap table — and how clean it is will shape how much confidence they have in you as a founder.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            A messy, over-complicated, or opaque cap table can kill deals or delay closings. A clean one can signal professionalism, clarity, and execution — even if you're still early-stage.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            Here's what a clean cap table looks like, why it matters, and what investors are really looking for when they open it up.
                        </p>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">What Is a "Clean" Cap Table?</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            A clean cap table is one that's:
                        </p>
                        <div class="grid md:grid-cols-2 gap-6 mb-8">
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">✅</span>
                                        <h4 class="font-bold text-lg">Accurate</h4>
                                    </div>
                                    <p class="text-base-content/80">Reflects all outstanding shares, options, and convertibles</p>
                                </div>
                            </div>
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">🎯</span>
                                        <h4 class="font-bold text-lg">Simple</h4>
                                    </div>
                                    <p class="text-base-content/80">Understandable at a glance, not bloated with early errors</p>
                                </div>
                            </div>
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">📊</span>
                                        <h4 class="font-bold text-lg">Structured</h4>
                                    </div>
                                    <p class="text-base-content/80">Properly organized by shareholder, security type, and class</p>
                                </div>
                            </div>
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">📝</span>
                                        <h4 class="font-bold text-lg">Documented</h4>
                                    </div>
                                    <p class="text-base-content/80">Every entry backed by legal paperwork</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            In other words, it shows a well-run company that respects ownership — which is ultimately what investors are buying into.
                        </p>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">Why Investors Care So Much</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Investors look at your cap table to assess:
                        </p>
                        <div class="grid md:grid-cols-2 gap-6 mb-8">
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">🏦</span>
                                        <h4 class="font-bold text-lg">Ownership Assessment</h4>
                                    </div>
                                    <p class="text-base-content/80">How much they'll own after investing</p>
                                </div>
                            </div>
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">🤝</span>
                                        <h4 class="font-bold text-lg">Control Structure</h4>
                                    </div>
                                    <p class="text-base-content/80">Who controls the company now</p>
                                </div>
                            </div>
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">💥</span>
                                        <h4 class="font-bold text-lg">Dilution Impact</h4>
                                    </div>
                                    <p class="text-base-content/80">How much dilution is coming from SAFEs, option pools, or debts</p>
                                </div>
                            </div>
                            <div class="alert">
                                <div>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-2xl">🚩</span>
                                        <h4 class="font-bold text-lg">Red Flags</h4>
                                    </div>
                                    <p class="text-base-content/80">Dead equity, unresolved grants, or unconverted notes</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            If they sense confusion, undocumented promises, or structural complexity — they'll often pause, negotiate harder, or walk away.
                        </p>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-8">What a Clean Cap Table Includes</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-8">
                            Here's what investors expect to see in a clean, professional cap table:
                        </p>

                        <!-- Element 1 -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">1. Founders With Vesting in Place</h3>
                                <p class="text-base-content/80 leading-relaxed mb-6">
                                    Founders should have standard vesting (typically 4 years with a 1-year cliff). This shows long-term commitment and prevents dead equity.
                                </p>
                                <div class="alert alert-error alert-outline">
                                    <div>
                                        <h4 class="text-error font-bold text-lg mb-2">Red flag:</h4>
                                        <p class="text-base-content/80">Fully vested founders with large ownership stakes who are no longer involved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Element 2 -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">2. An Option Pool That Makes Sense</h3>
                                <p class="text-base-content/80 leading-relaxed mb-6">
                                    You've reserved a reasonable portion (usually 10–20%) of equity for employees — but haven't bloated it just to meet investor expectations.
                                </p>
                                <div class="alert alert-error alert-outline">
                                    <div>
                                        <h4 class="text-error font-bold text-lg mb-2">Red flag:</h4>
                                        <p class="text-base-content/80">Investors requiring a large pre-money pool expansion that dilutes founders too much.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Element 3 -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">3. SAFEs and Convertible Notes Clearly Modeled</h3>
                                <p class="text-base-content/80 leading-relaxed mb-6">
                                    You can show how existing SAFEs/notes will convert in the next round — and what the fully diluted ownership will look like post-close.
                                </p>
                                <div class="alert alert-error alert-outline">
                                    <div>
                                        <h4 class="text-error font-bold text-lg mb-2">Red flag:</h4>
                                        <p class="text-base-content/80">Multiple overlapping SAFEs with inconsistent terms (e.g. high caps, low caps, no caps) and no conversion modeling.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Element 4 -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">4. One Class of Common Stock (Until Priced Rounds)</h3>
                                <p class="text-base-content/80 leading-relaxed mb-6">
                                    At the seed stage, most companies should have a single class of common shares. Once you raise a priced round, preferred shares may come in — but keep it simple as long as possible.
                                </p>
                                <div class="alert alert-error alert-outline">
                                    <div>
                                        <h4 class="text-error font-bold text-lg mb-2">Red flag:</h4>
                                        <p class="text-base-content/80">Early startups with multiple share classes, complex option structures, or exotic grants.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Element 5 -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">5. All Grants Documented — No Verbal Promises</h3>
                                <p class="text-base-content/80 leading-relaxed mb-6">
                                    Every equity grant, whether to founders, employees, or advisors, should be signed and reflected in the cap table.
                                </p>
                                <div class="alert alert-error alert-outline">
                                    <div>
                                        <h4 class="text-error font-bold text-lg mb-2">Red flag:</h4>
                                        <p class="text-base-content/80">"I promised this person some equity, but we never did the paperwork."</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Element 6 -->
                        <div class="card bg-base-100 shadow-sm border border-base-300 mb-8">
                            <div class="card-body p-8">
                                <h3 class="text-2xl font-bold text-accent mb-4">6. A Clear Fully Diluted Picture</h3>
                                <p class="text-base-content/80 leading-relaxed mb-6">
                                    You should be able to instantly show what your cap table looks like on a fully diluted basis — including all SAFEs, options, and convertibles.
                                </p>
                                <div class="alert alert-error alert-outline">
                                    <div>
                                        <h4 class="text-error font-bold text-lg mb-2">Red flag:</h4>
                                        <p class="text-base-content/80">Founders who only show ownership as-is, without modeling the full post-money impact of fundraising.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">How to Clean Up a Messy Cap Table</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Even if your cap table is messy now, it's fixable. Here's how to clean it up before your next raise:
                        </p>
                        <div class="alert">
                            <div>
                                <ul class="list-disc list-inside space-y-3 text-lg text-base-content/80">
                                    <li>Centralize everything into one ledger of truth</li>
                                    <li>Audit all outstanding grants — formalize anything verbal</li>
                                    <li>Model convertible conversions and visualize dilution</li>
                                    <li>Trim unnecessary advisors or option holders</li>
                                    <li>Work with an expert to fix structure before it's a deal blocker</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section class="mb-12">
                        <h2 class="text-3xl font-bold text-primary mb-6">Final Thoughts</h2>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Your cap table is your company. It's the source of truth for who owns what — and who stands to gain if you succeed.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            Founders who take the time to manage their equity structure thoughtfully earn more trust from investors, retain more ownership, and make better long-term decisions.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed mb-6">
                            So before you send out that pitch deck, open your cap table. Clean it up. Understand it fully. And own the story it tells.
                        </p>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            Need help reviewing or modeling your cap table? Bob helps founders get investor-ready. Connect with him below – because <span class="text-xl font-bold text-secondary">every point matters.</span>
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

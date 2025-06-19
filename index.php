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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bob Gillespie - Cap Table Specialist - Free 1-Hour Consultation</title>
		<link rel="canonical" href="https://www.captableexpert.com/" />
		<meta name="robots" content="index, follow">
		<meta name="description"
			content="Get expert cap table advice from Bob. Book your free one-hour consultation and avoid costly equity mistakes.">
		<link rel="icon" type="image/png" href="/static/favicon.png" />
		<link href="/static/styles.css" rel="stylesheet" type="text/css" />

		<!--#include virtual="/fragments/og/homepage.og.html" -->
		<!--#include virtual="/fragments/strd/homepage.strd.html" -->

	</head>

	<body>

		<!-- Header -->
		<!--#set var="header_cta" value="free_call" -->
		<!--#include virtual="/fragments/html/header-global.fragment.html" -->

		<main>
			<!-- Hero Section -->
			<div class="hero min-h-screen bg-base-100">
				<div class="hero-content flex-col lg:flex-row-reverse max-w-7xl px-4 gap-12">
					<!-- Right side - Excel-like Spreadsheet -->
					<div class="hidden lg:flex flex-1 lg:max-w-4xl perspective-distant">
						<!-- Excel Window Frame -->
						<div
							class="bg-base-100 shadow-xl border border-base-300 rounded-lg overflow-hidden transform-3d rotate-x-15 -rotate-y-4 rotate-z-6">
							<!-- Excel Title Bar -->
							<div
								class="bg-base-200 border-b border-base-300 px-4 py-2 flex items-center justify-between">
								<div class="flex items-center gap-2">
									<div class="flex gap-1">
										<div class="w-3 h-3 rounded-full bg-red-500"></div>
										<div class="w-3 h-3 rounded-full bg-yellow-500"></div>
										<div class="w-3 h-3 rounded-full bg-green-500"></div>
									</div>
									<span class="text-sm font-medium text-base-content ml-2">Microsoft Excel - CapTable.xlsx</span>
								</div>
							</div>

							<!-- Excel Menu Bar -->
							<div class="bg-base-100 border-b border-base-200 px-4 py-1">
								<div class="flex text-xs text-base-content/60 gap-6">
									<span class="text-primary font-medium">File</span>
									<span>Home</span>
									<span>Insert</span>
									<span>Data</span>
									<span>Formulas</span>
								</div>
							</div>

							<!-- Excel Spreadsheet Content -->
							<div class="bg-base-100">
								<!-- Column Headers -->
								<div class="grid grid-cols-5 border-b border-base-300">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/70">
									</div>
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/70">A</div>
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/70">B</div>
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/70">C</div>
									<div
										class="bg-base-200 px-3 py-2 text-center text-xs font-medium text-base-content/70">D</div>
								</div>

								<!-- Row 1 - Headers -->
								<div class="grid grid-cols-5 border-b border-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">1</div>
									<div
										class="border-r border-base-200 px-3 py-2 text-xs font-semibold text-base-content">Shareholder</div>
									<div
										class="border-r border-base-200 px-3 py-2 text-xs font-semibold text-base-content">Shares</div>
									<div
										class="border-r border-base-200 px-3 py-2 text-xs font-semibold text-base-content">Ownership %</div>
									<div class="px-3 py-2 text-xs font-semibold text-base-content">Value</div>
								</div>

								<!-- Row 2 -->
								<div class="grid grid-cols-5 border-b border-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">2</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">John Doe (Founder)
									</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">$4,500,000
									</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">45.0%
									</div>
									<div class="px-3 py-2 text-xs text-base-content/70">$4,500,000
									</div>
								</div>

								<!-- Row 3 -->
								<div class="grid grid-cols-5 border-b border-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">3</div>

									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">Jane Smith (Co-founder)</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">$3,500,000</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">35.0%</div>
									<div class="px-3 py-2 text-xs text-base-content/70">$3,500,000</div>
								</div>

								<!-- Row 4 -->
								<div class="grid grid-cols-5 border-b border-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">4</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">Venture Capital LLC</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">$1,500,000</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">15.0%</div>
									<div class="px-3 py-2 text-xs text-base-content/70">$1,500,000</div>
								</div>

								<!-- Row 5 -->
								<div class="grid grid-cols-5 border-b border-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">5</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">Employee Pool</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">$500,000</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/70">5.0%</div>
									<div class="px-3 py-2 text-xs text-base-content/70">$500,000</div>
								</div>

								<!-- Row 6 - Empty -->
								<div class="grid grid-cols-5 border-b border-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">6</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/30"></div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/30"></div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/30"></div>
									<div class="px-3 py-2 text-xs text-base-content/30"></div>
								</div>

								<!-- Row 7 - Total -->
								<div class="grid grid-cols-5 border-b border-base-200 bg-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">7</div>
									<div
										class="border-r border-base-200 px-3 py-2 text-xs font-semibold text-base-content">TOTAL</div>
									<div
										class="border-r border-base-200 px-3 py-2 text-xs font-semibold text-base-content">$10,000,000</div>
									<div
										class="border-r border-base-200 px-3 py-2 text-xs font-semibold text-base-content">100.0%</div>
									<div class="px-3 py-2 text-xs font-semibold text-base-content">$10,000,000</div>
								</div>

								<!-- Additional empty rows -->
								<div class="grid grid-cols-5 border-b border-base-200">
									<div
										class="bg-base-200 border-r border-base-300 px-3 py-2 text-center text-xs font-medium text-base-content/60">8</div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/30"></div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/30"></div>
									<div class="border-r border-base-200 px-3 py-2 text-xs text-base-content/30"></div>
									<div class="px-3 py-2 text-xs text-base-content/30"></div>
								</div>
							</div>

							<!-- Excel Status Bar -->
							<div
								class="bg-base-200 border-t border-base-300 px-4 py-1 flex items-center justify-between">
								<div class="text-xs text-base-content/60">Ready</div>
								<div class="text-xs text-base-content/60">Sum: $10,000,000</div>
							</div>
						</div>
					</div>
					<!-- Left side - Content -->
					<div class="flex-1 text-center lg:text-left">
						<h1 class="text-4xl lg:text-5xl font-bold text-base-content leading-tight mb-6">
							Get Your Cap Table
							<span class="text-secondary">
								Right
							</span>
							From Day One
						</h1>
						<!-- Horizontal divider line -->
						<div class="w-1/4 h-1 bg-accent rounded-full mx-auto lg:mx-0"></div>

						<h2 class="text-md lg:text-4xl text-base-content leading-tight mb-6">
							Your first hour is completely free
						</h2>
						<p class="text-lg lg:text-xl mb-8 text-base-content/70 max-w-2xl mx-auto lg:mx-0">
							With deep expertise in structuring, modeling, and optimizing ownership stakes,
							Bob has helped hundreds of startups, investors, and executives navigate complex equity
							scenarios with confidence and precision
						</p>

						<!-- Main CTA -->
						<form action="/request-free-call/" method="POST"
							class="w-full max-w-md mx-auto lg:mx-0 mb-12">
							<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
							<fieldset class="fieldset">
								<legend class="fieldset-legend sr-only">Request Free Consultation</legend>
								<div class="join join-vertical w-full">
									<input type="email"
										class="input input-lg join-item w-full text-center placeholder:text-base-300"
										placeholder="Enter your email..." name="email" required />
									<button type="submit" name="submit" class="btn btn-accent btn-lg join-item w-full">
										Request Free One Hour Consultation
									</button>
								</div>
							</fieldset>
						</form>

						<!-- Minimal Social Proof Stats -->
						<div
							class="flex flex-col lg:flex-row justify-center lg:justify-start gap-6 lg:gap-4 text-center lg:text-left">
							<div class="flex-shrink-0 lg:flex-shrink">
								<div class="text-sm lg:text-xs text-base-content/70">Startups helped</div>
								<div class="text-2xl lg:text-xl font-bold text-primary">100+</div>
							</div>
							<div class="flex-shrink-0 lg:flex-shrink">
								<div class="text-sm lg:text-xs text-base-content/70">Companies Portfolio</div>
								<div class="text-2xl lg:text-xl font-bold text-primary">70+</div>
							</div>
							<div class="flex-shrink-0 lg:flex-shrink">
								<div class="text-sm lg:text-xs text-base-content/70">Years</div>
								<div class="text-2xl lg:text-xl font-bold text-primary">30+</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Client Reviews Section -->
			<div class="bg-base-200 py-20">
				<div class="container mx-auto px-4">
					<div class="text-center mb-16">
						<h2 class="text-4xl font-bold mb-4 text-base-content">
							What Clients Say About <span class="text-accent">Working With Bob</span>
						</h2>
						<p class="text-lg text-base-content/70 max-w-2xl mx-auto">
							Real feedback from founders and companies who've transformed their cap tables
						</p>
					</div>

					<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
						<!-- Review 1 -->
						<div class="card bg-base-100 shadow-sm">
							<div class="card-body">
								<div class="flex items-center mb-3">
									<div class="badge badge-outline badge-secondary badge-sm mr-2">Startup Founder</div>
								</div>
								<p class="text-base-content/80 italic">
									"Bob is a genius on this stuff. He just knows exactly what's going on—and let's face it,
									cap tables are not the place to make mistakes. You can't go wrong with Bob. 15 on a
									scale of 1 to 10!"
								</p>
							</div>
						</div>

						<!-- Review 2 -->
						<div class="card bg-base-100 shadow-sm">
							<div class="card-body">
								<div class="flex items-center mb-3">
									<div class="badge badge-outline badge-secondary badge-sm mr-2">Company Founder</div>
								</div>
								<p class="text-base-content/80 italic">
									"Bob is an amazing professional, with exceptional deep knowledge of cap tables,
									startups, deal structures, funding, and finance. Our specific situation is complex,
									and Bob helped us untangle things."
								</p>
							</div>
						</div>

						<!-- Review 3 -->
						<div class="card bg-base-100 shadow-sm">
							<div class="card-body">
								<div class="flex items-center mb-3">
									<div class="badge badge-outline badge-secondary badge-sm mr-2">Entrepreneur</div>
								</div>
								<p class="text-base-content/80 italic">
									"Great working with Bob! He really knows his stuff. Something that seemed very
									complex, he managed to get done within a few hours."
								</p>
							</div>
						</div>

						<!-- Review 4 -->
						<div class="card bg-base-100 shadow-sm">
							<div class="card-body">
								<div class="flex items-center mb-3">
									<div class="badge badge-outline badge-secondary badge-sm mr-2">VC Partner</div>
								</div>
								<p class="text-base-content/80 italic">
									"Bob is a fantastic VC who gives back to his community and helps up-and-coming companies
									succeed with his insight. He is very easy to work with, and this was an educational experience."
								</p>
							</div>
						</div>

						<!-- Review 5 -->
						<div class="card bg-base-100 shadow-sm">
							<div class="card-body">
								<div class="flex items-center mb-3">
									<div class="badge badge-outline badge-secondary badge-sm mr-2">CEO</div>
								</div>
								<p class="text-base-content/80 italic">
									"Excellent service with a consultative approach. It felt like working with a partner and
									not a freelancer. Bob's work exceeded expectations with unparalleled professionalism."
								</p>
							</div>
						</div>

						<!-- Review 6 -->
						<div class="card bg-base-100 shadow-sm">
							<div class="card-body">
								<div class="flex items-center mb-3">
									<div class="badge badge-outline badge-secondary badge-sm mr-2">Tech Founder</div>
								</div>
								<p class="text-base-content/80 italic">
									"Bob clearly knows his stuff. A few hours of his time will definitely pay dividends.
									I recommend all people looking to raise funds to have a chat with Bob."
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- About Bob Section -->
			<div class="py-20 bg-base-100">
				<div class="container mx-auto px-4">
					<div class="grid lg:grid-cols-2 gap-12 items-center max-w-6xl mx-auto">
						<div class="text-center lg:text-left">
							<h2 class="text-4xl font-bold mb-6 text-base-content">Meet Bob Gillespie</h2>
							<p class="text-lg mb-6 text-base-content/80">
								Your Cap Table specialist with deep experience in helping startups and growth stage
								companies manage their cap tables
							</p>

							<div class="space-y-4">
								<div class="flex items-center gap-3">
									<div class="badge badge-outline badge-accent">✓</div>
									<span class="text-base-content">3x founder (CEO, COO, CFO)</span>
								</div>
								<div class="flex items-center gap-3">
									<div class="badge badge-outline badge-accent">✓</div>
									<span class="text-base-content">Expertise in varying equity instruments and
										structures</span>
								</div>
								<div class="flex items-center gap-3">
									<div class="badge badge-outline badge-accent">✓</div>
									<span class="text-base-content">Expert in Series A-C fundraising</span>
								</div>
								<div class="flex items-center gap-3">
									<div class="badge badge-outline badge-accent">✓</div>
									<span class="text-base-content">
										Deep knowledge working with SAFEs, convertible notes, options, warrants,
										proforma cap tables and equity deals
									</span>
								</div>
								<div class="flex items-center gap-3">
									<div class="badge badge-outline badge-accent">✓</div>
									<span class="text-base-content">
										University of Chicago Booth MBA
									</span>
								</div>
							</div>
						</div>
						<div class="text-center">
							<div class="avatar">
								<div class="w-80 rounded-full">
									<img src="/static/BobGillespieHeadshot.webp" class="object-cover"
										alt="Headshot of Bob Gillespie - Cap Table Specialist" />
								</div>
							</div>
							<div class="mt-6">
								<h3 class="text-2xl font-bold text-base-content">Bob Gillespie</h3>
								<p class="text-primary text-lg">Cap Table Expert Consultant</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Contact Section -->
			<!--#set var='csrf_token' value="<?php echo $_SESSION['csrf_token']; ?>" -->
			<!--#include virtual="/fragments/html/contact-form-full.fragment.html" -->

		</main>
	    
		<!-- Footer -->
	    <!--#include virtual="/fragments/html/footer-global.fragment.html" -->

	</body>

</html>
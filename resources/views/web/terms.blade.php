<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title> {{ x_('Terms & Conditions - Bzns Book', 'web') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')

        <!-- Page Header -->
        <section class="container pt-5 pb-3 mt-5">
            <div class="row justify-content-center">
                <div class="text-center col-lg-8">
                    <h1 class="mb-3 display-5 fw-bold">{{ x_('Terms Conditions', 'web') }}</h1>
                    <p class="fs-lg text-body-secondary">{{ x_('Last updated:', 'web') }} {{ now()->format('F d, Y') }}</p>
                </div>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="container pb-5 mb-md-4 mb-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="border-0 shadow-sm card">
                        <div class="p-4 card-body p-lg-5">

                            <!-- Introduction -->
                            <h2 class="mb-3 h4">{{ x_('1. Agreement to Terms', 'web') }}</h2>
                            <p>{{ x_('By accessing or using BznsBook ("the Platform"), you agree to be bound by these Terms & Conditions ("Terms"). If you do not agree to these Terms, you must not access or use the Platform.', 'web') }}</p>
                            <p class="mb-4">{{ x_('BznsBook is a subscription-based professional services marketplace and portfolio network operated to connect agencies, freelancers, and businesses worldwide. These Terms govern your use of all features, services, and content available on the Platform.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Nature of Service -->
                            <h2 class="mb-3 h4">{{ x_('2. Nature of Service', 'web') }}</h2>
                            <div class="mb-3 alert alert-primary">
                                <i class="bx bx-info-circle me-2"></i>
                                <strong>{{ x_('BznsBook does not sell any physical or hard products.', 'web') }}</strong>
                            </div>
                            <p>{{ x_('By subscribing to BznsBook, you pay to access a professional platform that enables you to:', 'web') }}</p>
                            <ul class="mb-3">
                                <li>{{ x_('Connect and communicate with current or potential clients for your company', 'web') }}</li>
                                <li>{{ x_('Share your professional data, services, and portfolio with other platform members', 'web') }}</li>
                                <li>{{ x_('Post projects and receive proposals from qualified professionals', 'web') }}</li>
                                <li>{{ x_('Apply to projects posted by other members', 'web') }}</li>
                                <li>{{ x_('Access professional profiles, data, and consultation resources', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('BznsBook serves as a facilitator of professional connections. We do not guarantee any specific business outcomes, partnerships, or deals as a result of using the Platform.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Account Registration -->
                            <h2 class="mb-3 h4">{{ x_('3. Account Registration', 'web') }}</h2>
                            <p>{{ x_('To access the full features of BznsBook, you must create an account and provide accurate, complete, and up-to-date information. You are responsible for:', 'web') }}</p>
                            <ul class="mb-4">
                                <li>{{ x_('Maintaining the confidentiality of your account credentials', 'web') }}</li>
                                <li>{{ x_('All activities that occur under your account', 'web') }}</li>
                                <li>{{ x_('Notifying us immediately of any unauthorized use of your account', 'web') }}</li>
                                <li>{{ x_('Ensuring all information provided is truthful and not misleading', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- Subscription & Payment -->
                            <h2 class="mb-3 h4">{{ x_('4. Subscription & Payment', 'web') }}</h2>
                            <h3 class="h6 fw-bold">{{ x_('4.1 Subscription Plans', 'web') }}</h3>
                            <p>{{ x_('BznsBook provides its services for the period covered by your active subscription, from the start date until the expiry date of your chosen billing cycle (Monthly, Semi-Annual, or Annual).', 'web') }}</p>

                            <h3 class="h6 fw-bold">{{ x_('4.2 Access & Permissions', 'web') }}</h3>
                            <p>{{ x_('Once subscribed, you may access all data, profiles, and consultation features available on the Platform according to the permissions and features included in your subscription plan.', 'web') }}</p>

                            <h3 class="h6 fw-bold">{{ x_('4.3 Refund Policy', 'web') }}</h3>
                            <div class="mb-4 alert alert-warning">
                                <i class="bx bx-error-circle me-2"></i>
                                <strong>{{ x_('No Refunds After Data Access:', 'web') }}</strong> {{ x_("Once you have reviewed the available data and accessed the Platform's services, you are not entitled to a refund of the subscription fee. In the event of failure to access the Platform's services due to technical malfunctions, complaints must be submitted via email. BznsBook will investigate and resolve the issue accordingly.", 'web') }}
                            </div>

                            <h3 class="h6 fw-bold">{{ x_('4.4 Subscription Renewal & Cancellation', 'web') }}</h3>
                            <ul class="mb-4">
                                <li>{{ x_('Subscriptions may be renewed manually at the end of your billing cycle', 'web') }}</li>
                                <li>{{ x_('You may cancel your subscription at any time; however, no prorated refunds will be issued for the remaining period', 'web') }}</li>
                                <li>{{ x_('Upon cancellation or expiry, your profile will remain visible but you will lose access to premium features', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- Verified Badge -->
                            <h2 class="mb-3 h4">{{ x_('5. Verified Badge Program', 'web') }}</h2>
                            <p>{{ x_('Companies wishing to obtain a', 'web') }} <strong>{{ x_('"Verified Badge"', 'web') }}</strong> {{ x_('from BznsBook must submit the following documentation:', 'web') }}</p>
                            <ul class="mb-3">
                                <li><strong>{{ x_('Commercial Record', 'web') }}</strong> {{ x_('(Trade License or equivalent business registration)', 'web') }}</li>
                                <li><strong>{{ x_('VAT Registration Number', 'web') }}</strong></li>
                                <li><strong>{{ x_('BznsBook Application Form', 'web') }}</strong> {{ x_('— stamped by your company or legalized by the relevant embassy, depending on your country\'s regulations (following standard international trade documentation practices)', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('BznsBook reserves the right to approve or reject verification requests at its sole discretion. Submission of fraudulent or misleading documents may result in immediate account suspension.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- User Content & Data -->
                            <h2 class="mb-3 h4">{{ x_('6. User Content & Data Privacy', 'web') }}</h2>
                            <h3 class="h6 fw-bold">{{ x_('6.1 Your Content', 'web') }}</h3>
                            <p>{{ x_('You retain ownership of all content you post on BznsBook (services, portfolios, project descriptions, etc.). By posting content, you grant BznsBook a non-exclusive, worldwide license to display, distribute, and promote your content within the Platform.', 'web') }}</p>

                            <h3 class="h6 fw-bold">{{ x_('6.2 Data Sharing', 'web') }}</h3>
                            <div class="mb-3 alert alert-primary">
                                <i class="bx bx-shield-quarter me-2"></i>
                                <strong>{{ x_('BznsBook will NOT share any private data except the information that you voluntarily share on your profile.', 'web') }}</strong>
                            </div>
                            <p>{{ x_('By using the Platform, you acknowledge and agree that:', 'web') }}</p>
                            <ul class="mb-3">
                                <li>{{ x_('Information you add to your public profile will be visible to other subscribed members', 'web') }}</li>
                                <li>{{ x_('Your last sign-in time will be displayed to other users on the Platform', 'web') }}</li>
                                <li>{{ x_('Private information (e.g., password, payment details) will never be shared with other users', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('For full details on how we handle your data, please refer to our', 'web') }} <a href="{{ route('pages.privacy') }}">{{ x_('Privacy Policy', 'web') }}</a>.</p>

                            <hr class="my-4">

                            <!-- User Responsibilities -->
                            <h2 class="mb-3 h4">{{ x_('7. User Responsibilities & Prohibited Conduct', 'web') }}</h2>
                            <p>{{ x_('By using BznsBook, you agree NOT to:', 'web') }}</p>
                            <ul class="mb-4">
                                <li>{{ x_('Provide false, misleading, or fraudulent information on your profile', 'web') }}</li>
                                <li>{{ x_('Impersonate any person or entity, or misrepresent your affiliation', 'web') }}</li>
                                <li>{{ x_('Use the Platform for any unlawful purpose or activity', 'web') }}</li>
                                <li>{{ x_('Spam, harass, or send unsolicited communications to other members', 'web') }}</li>
                                <li>{{ x_('Attempt to gain unauthorized access to other accounts or Platform systems', 'web') }}</li>
                                <li>{{ x_('Scrape, harvest, or collect data from the Platform using automated means', 'web') }}</li>
                                <li>{{ x_('Post content that infringes on intellectual property rights of others', 'web') }}</li>
                                <li>{{ x_('Use the Platform to promote competing services or redirect users off-platform', 'web') }}</li>
                                <li>{{ x_('Interfere with or disrupt the Platform\'s infrastructure or services', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- Service Requests & Projects -->
                            <h2 class="mb-3 h4">{{ x_('8. Service Requests & Project Marketplace', 'web') }}</h2>
                            <h3 class="h6 fw-bold">{{ x_('8.1 Service Requests', 'web') }}</h3>
                            <p>{{ x_('When you request a service from another member, the terms of the engagement (scope, pricing, timeline) are agreed upon between the parties. BznsBook facilitates the connection but is not a party to any contract or agreement between users.', 'web') }}</p>

                            <h3 class="h6 fw-bold">{{ x_('8.2 Projects & Proposals', 'web') }}</h3>
                            <p>{{ x_('Project owners may post projects and receive proposals from professionals. The selection of a winning proposal and the execution of the project are the responsibility of the involved parties.', 'web') }}</p>

                            <h3 class="h6 fw-bold">{{ x_('8.3 Reviews & Ratings', 'web') }}</h3>
                            <p class="mb-4">{{ x_('Users may leave reviews and ratings after service completion. Reviews must be honest, factual, and based on genuine experiences. BznsBook reserves the right to remove reviews that violate these Terms or are deemed fraudulent.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Intellectual Property -->
                            <h2 class="mb-3 h4">{{ x_('9. Intellectual Property', 'web') }}</h2>
                            <p>{{ x_('The BznsBook name, logo, design, and all associated intellectual property are owned by BznsBook. You may not use, copy, or distribute any of our trademarks, branding, or proprietary content without written permission.', 'web') }}</p>
                            <p class="mb-4">{{ x_('All platform features, source code, design elements, and documentation are protected by applicable intellectual property laws.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Limitation of Liability -->
                            <h2 class="mb-3 h4">{{ x_('10. Limitation of Liability', 'web') }}</h2>
                            <p>{{ x_('To the maximum extent permitted by applicable law:', 'web') }}</p>
                            <ul class="mb-4">
                                <li>{{ x_('BznsBook is provided on an "as is" and "as available" basis without warranties of any kind', 'web') }}</li>
                                <li>{{ x_('We do not guarantee the accuracy, completeness, or reliability of any user-generated content on the Platform', 'web') }}</li>
                                <li>{{ x_('We are not liable for any disputes, losses, or damages arising from transactions or interactions between users', 'web') }}</li>
                                <li>{{ x_('We are not responsible for any business decisions made based on information obtained through the Platform', 'web') }}</li>
                                <li>{{ x_('Our total liability shall not exceed the amount you paid in subscription fees during the 12 months preceding the claim', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- Account Suspension -->
                            <h2 class="mb-3 h4">{{ x_('11. Account Suspension & Termination', 'web') }}</h2>
                            <p>{{ x_('BznsBook reserves the right to suspend or terminate your account at any time if you:', 'web') }}</p>
                            <ul class="mb-4">
                                <li>{{ x_('Violate any provision of these Terms', 'web') }}</li>
                                <li>{{ x_('Engage in fraudulent or illegal activities', 'web') }}</li>
                                <li>{{ x_('Provide false verification documents', 'web') }}</li>
                                <li>{{ x_('Receive repeated complaints from other users', 'web') }}</li>
                                <li>{{ x_('Fail to maintain an active subscription (limited access may apply)', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- Complaints -->
                            <h2 class="mb-3 h4">{{ x_('12. Complaints & Dispute Resolution', 'web') }}</h2>
                            <p>{{ x_('If you experience any issues with the Platform\'s services or functionality:', 'web') }}</p>
                            <ul class="mb-3">
                                <li>{{ x_('Submit your complaint via email to', 'web') }} <a href="mailto:info@bznsbook.com">info@bznsbook.com</a></li>
                                <li>{{ x_('Include a detailed description of the issue, your account information, and any supporting evidence', 'web') }}</li>
                                <li>{{ x_('BznsBook will investigate and respond within a reasonable timeframe', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('We aim to resolve all disputes amicably. If a resolution cannot be reached, disputes shall be governed by the applicable laws of the jurisdiction in which BznsBook operates.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Changes to Terms -->
                            <h2 class="mb-3 h4">{{ x_('13. Changes to These Terms', 'web') }}</h2>
                            <p class="mb-4">{{ x_('BznsBook reserves the right to modify these Terms at any time. We will notify registered users of significant changes via email or through a notice on the Platform. Your continued use of the Platform after any changes constitutes acceptance of the revised Terms.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Governing Law -->
                            <h2 class="mb-3 h4">{{ x_('14. Governing Law', 'web') }}</h2>
                            <p class="mb-4">{{ x_('These Terms shall be governed by and construed in accordance with the laws of the jurisdiction in which BznsBook is registered, without regard to its conflict of law provisions.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Contact -->
                            <h2 class="mb-3 h4">{{ x_('15. Contact Us', 'web') }}</h2>
                            <p>{{ x_('If you have any questions about these Terms & Conditions, please contact us:', 'web') }}</p>
                            <ul class="mb-0 list-unstyled">
                                <li class="mb-2"><i class="bx bx-envelope text-primary me-2"></i> <strong>{{ x_('Email:', 'web') }}</strong> <a href="mailto:info@bznsbook.com">info@bznsbook.com</a></li>
                                <li class="mb-2"><i class="bx bx-phone text-primary me-2"></i> <strong>{{ x_('Phone:', 'web') }}</strong> <a href="tel:+20201036943149">+202 01036943149</a> / <a href="tel:+971554396086">+971 55 4396086</a></li>
                                <li class="mb-2"><i class="bx bx-map text-primary me-2"></i> <strong>{{ x_('Address:', 'web') }}</strong> {{ x_('90 Street, 5th District, New Cairo, Egypt', 'web') }}</li>
                                <li><i class="bx bx-globe text-primary me-2"></i> <strong>{{ x_('Website:', 'web') }}</strong> <a href="{{ route('pages.contact') }}">{{ x_('Contact Page', 'web') }}</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>

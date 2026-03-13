<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title> {{ x_('Privacy Policy - Bzns Book', 'web') }} </title>
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
                    <h1 class="mb-3 display-5 fw-bold">{{ x_('Privacy Policy', 'web') }}</h1>
                    <p class="fs-lg text-body-secondary">{{ x_('Last updated:', 'web') }} {{ now()->format('F d, Y') }}</p>
                </div>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="container pb-5 mb-md-4 mb-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="border-0 shadow-sm card">
                        <div class="p-4 card-body p-lg-5">

                            <!-- Introduction -->
                            <h2 class="mb-3 h4">{{ x_('1. Introduction', 'web') }}</h2>
                            <p>{{ x_('Welcome to BznsBook ("we," "us," or "our"). BznsBook is a professional services marketplace and portfolio network that connects agencies, freelancers, and businesses worldwide. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our platform services.', 'web') }}</p>
                            <p class="mb-4">{{ x_('By accessing or using BznsBook, you agree to this Privacy Policy. If you do not agree with the terms of this policy, please do not access the platform.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Nature of Service -->
                            <h2 class="mb-3 h4">{{ x_('2. Nature of Our Service', 'web') }}</h2>
                            <p>{{ x_('BznsBook does not sell any physical or hard products. Our platform is a subscription-based service where you pay to:', 'web') }}</p>
                            <ul class="mb-3">
                                <li>{{ x_('Connect with other professionals, agencies, and businesses', 'web') }}</li>
                                <li>{{ x_('Share your professional data, services, and portfolio with current or potential clients', 'web') }}</li>
                                <li>{{ x_('Post and apply to projects in our marketplace', 'web') }}</li>
                                <li>{{ x_('Access professional profiles, services, and business information of other members', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('Your subscription grants you access to the platform\'s features for the duration of your chosen billing cycle, up to the expiry date of your subscription.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Information We Collect -->
                            <h2 class="mb-3 h4">{{ x_('3. Information We Collect', 'web') }}</h2>
                            <h3 class="h6 fw-bold">{{ x_('3.1 Personal Information', 'web') }}</h3>
                            <p>{{ x_('When you register and use BznsBook, we may collect:', 'web') }}</p>
                            <ul class="mb-3">
                                <li><strong>{{ x_('Account Information:', 'web') }}</strong> {{ x_('Name, email address, password, phone number', 'web') }}</li>
                                <li><strong>{{ x_('Profile Information:', 'web') }}</strong> {{ x_('Company name, job title, bio, skills, expertise, profile picture', 'web') }}</li>
                                <li><strong>{{ x_('Company Details:', 'web') }}</strong> {{ x_('Company address, website, social media links, industry, country, city', 'web') }}</li>
                                <li><strong>{{ x_('Service & Portfolio Data:', 'web') }}</strong> {{ x_('Service descriptions, pricing, portfolio entries, case studies, project images', 'web') }}</li>
                                <li><strong>{{ x_('Subscription & Payment Data:', 'web') }}</strong> {{ x_('Billing cycle, subscription status, payment records', 'web') }}</li>
                            </ul>

                            <h3 class="h6 fw-bold">{{ x_('3.2 Verification Documents', 'web') }}</h3>
                            <p>{{ x_('If your company wishes to obtain a', 'web') }} <strong>{{ x_('"Verified Badge"', 'web') }}</strong> {{ x_('from BznsBook, you must submit the following documents:', 'web') }}</p>
                            <ul class="mb-3">
                                <li>{{ x_('Commercial Record (Trade License)', 'web') }}</li>
                                <li>{{ x_('VAT Registration Number', 'web') }}</li>
                                <li>{{ x_('BznsBook Application Form — stamped by your company or legalized by the relevant embassy, depending on your country\'s regulations (similar to standard import/export documentation requirements)', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('These documents are used solely for verification purposes and are stored securely.', 'web') }}</p>

                            <h3 class="h6 fw-bold">{{ x_('3.3 Automatically Collected Information', 'web') }}</h3>
                            <ul class="mb-4">
                                <li><strong>{{ x_('Last Seen Status:', 'web') }}</strong> {{ x_('BznsBook displays your last sign-in activity to other users on the platform', 'web') }}</li>
                                <li><strong>{{ x_('Usage Data:', 'web') }}</strong> {{ x_('Pages visited, features used, time spent on the platform', 'web') }}</li>
                                <li><strong>{{ x_('Device Information:', 'web') }}</strong> {{ x_('Browser type, IP address, operating system', 'web') }}</li>
                                <li><strong>{{ x_('Cookies:', 'web') }}</strong> {{ x_('Session cookies and preference cookies to enhance your experience', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- How We Use Your Information -->
                            <h2 class="mb-3 h4">{{ x_('4. How We Use Your Information', 'web') }}</h2>
                            <p>{{ x_('We use the information we collect to:', 'web') }}</p>
                            <ul class="mb-4">
                                <li>{{ x_('Create and manage your account and professional profile', 'web') }}</li>
                                <li>{{ x_('Provide, maintain, and improve our platform services', 'web') }}</li>
                                <li>{{ x_('Process subscriptions and manage billing', 'web') }}</li>
                                <li>{{ x_('Display your professional profile, services, and portfolio to other platform members', 'web') }}</li>
                                <li>{{ x_('Facilitate connections between service providers and clients', 'web') }}</li>
                                <li>{{ x_('Verify company authenticity for the Verified Badge program', 'web') }}</li>
                                <li>{{ x_('Show your last sign-in activity to other users', 'web') }}</li>
                                <li>{{ x_('Send you service-related communications and notifications', 'web') }}</li>
                                <li>{{ x_('Respond to your inquiries and support requests', 'web') }}</li>
                                <li>{{ x_('Enforce our Terms & Conditions and protect against misuse', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- Data Sharing -->
                            <h2 class="mb-3 h4">{{ x_('5. Data Sharing & Disclosure', 'web') }}</h2>
                            <div class="mb-3 alert alert-primary">
                                <i class="bx bx-shield-quarter me-2"></i>
                                <strong>{{ x_('BznsBook will NOT share any private data except the information that you voluntarily share on your profile.', 'web') }}</strong>
                            </div>
                            <p>{{ x_('Your profile information — including your name, company details, services, portfolio, and reviews — is visible to other subscribed members of the platform. This is the core purpose of BznsBook: to help professionals discover and connect with each other.', 'web') }}</p>
                            <p>{{ x_('We may share your information only in the following limited circumstances:', 'web') }}</p>
                            <ul class="mb-4">
                                <li><strong>{{ x_('With Your Consent:', 'web') }}</strong> {{ x_('When you explicitly agree to share specific information', 'web') }}</li>
                                <li><strong>{{ x_('Legal Requirements:', 'web') }}</strong> {{ x_('When required by law, regulation, legal process, or governmental request', 'web') }}</li>
                                <li><strong>{{ x_('Platform Safety:', 'web') }}</strong> {{ x_('To protect the rights, property, or safety of BznsBook, our users, or the public', 'web') }}</li>
                                <li><strong>{{ x_('Service Providers:', 'web') }}</strong> {{ x_('With trusted third-party service providers who assist in operating our platform (e.g., payment processors, hosting), subject to confidentiality agreements', 'web') }}</li>
                            </ul>

                            <hr class="my-4">

                            <!-- Data Security -->
                            <h2 class="mb-3 h4">{{ x_('6. Data Security', 'web') }}</h2>
                            <p>{{ x_('We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. These measures include:', 'web') }}</p>
                            <ul class="mb-4">
                                <li>{{ x_('Encrypted data transmission (SSL/TLS)', 'web') }}</li>
                                <li>{{ x_('Secure server infrastructure', 'web') }}</li>
                                <li>{{ x_('Access controls and authentication mechanisms', 'web') }}</li>
                                <li>{{ x_('Regular security assessments', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('However, no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your information, we cannot guarantee absolute security.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Data Retention -->
                            <h2 class="mb-3 h4">{{ x_('7. Data Retention', 'web') }}</h2>
                            <p>{{ x_('We retain your personal information for as long as your account is active or as needed to provide you services. If you wish to delete your account, please contact us at the email address provided below.', 'web') }}</p>
                            <p class="mb-4">{{ x_('We may retain certain information as required by law or for legitimate business purposes, such as resolving disputes and enforcing our agreements.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Your Rights -->
                            <h2 class="mb-3 h4">{{ x_('8. Your Rights', 'web') }}</h2>
                            <p>{{ x_('Depending on your location, you may have the following rights regarding your personal data:', 'web') }}</p>
                            <ul class="mb-4">
                                <li><strong>{{ x_('Access:', 'web') }}</strong> {{ x_('Request a copy of the personal data we hold about you', 'web') }}</li>
                                <li><strong>{{ x_('Correction:', 'web') }}</strong> {{ x_('Request correction of inaccurate or incomplete data', 'web') }}</li>
                                <li><strong>{{ x_('Deletion:', 'web') }}</strong> {{ x_('Request deletion of your personal data, subject to legal obligations', 'web') }}</li>
                                <li><strong>{{ x_('Portability:', 'web') }}</strong> {{ x_('Request a copy of your data in a structured, machine-readable format', 'web') }}</li>
                                <li><strong>{{ x_('Objection:', 'web') }}</strong> {{ x_('Object to the processing of your personal data in certain circumstances', 'web') }}</li>
                            </ul>
                            <p class="mb-4">{{ x_('To exercise any of these rights, please contact us using the information provided in the Contact section below.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Cookies -->
                            <h2 class="mb-3 h4">{{ x_('9. Cookies & Tracking Technologies', 'web') }}</h2>
                            <p>{{ x_('BznsBook uses cookies and similar tracking technologies to enhance your browsing experience, analyze platform usage, and personalize content. You can control cookie preferences through your browser settings.', 'web') }}</p>
                            <p class="mb-4">{{ x_('Essential cookies are required for the platform to function properly (e.g., session management, authentication). Disabling these may affect your ability to use BznsBook.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Third-Party Links -->
                            <h2 class="mb-3 h4">{{ x_('10. Third-Party Links', 'web') }}</h2>
                            <p class="mb-4">{{ x_('Our platform may contain links to third-party websites or services. We are not responsible for the privacy practices or content of these external sites. We encourage you to review the privacy policies of any third-party services you access through our platform.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Children's Privacy -->
                            <h2 class="mb-3 h4">{{ x_('11. Children\'s Privacy', 'web') }}</h2>
                            <p class="mb-4">{{ x_('BznsBook is intended for use by professionals and businesses. We do not knowingly collect personal information from individuals under the age of 18. If we become aware that we have collected personal data from a minor, we will take steps to delete that information promptly.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Changes -->
                            <h2 class="mb-3 h4">{{ x_('12. Changes to This Policy', 'web') }}</h2>
                            <p class="mb-4">{{ x_('We may update this Privacy Policy from time to time. We will notify you of any significant changes by posting the new policy on this page and updating the "Last updated" date. Your continued use of BznsBook after any changes constitutes your acceptance of the updated policy.', 'web') }}</p>

                            <hr class="my-4">

                            <!-- Contact -->
                            <h2 class="mb-3 h4">{{ x_('13. Contact Us', 'web') }}</h2>
                            <p>{{ x_('If you have any questions or concerns about this Privacy Policy, please contact us:', 'web') }}</p>
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

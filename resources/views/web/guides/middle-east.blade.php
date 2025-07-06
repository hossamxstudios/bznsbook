<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>Middle East Business Insights | Bzns</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
    <style>
        /* Custom styles for the guide */
        .guide-header {
            background: linear-gradient(135deg, #3e3e3e 0%, #1a1a1a 100%);
            padding: 60px 0;
            margin-bottom: 0;
            position: relative;
        }
        .guide-title {
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 1rem;
        }
        .guide-subtitle {
            font-weight: 300;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }
        .guide-content {
            padding: 50px 0;
            background: #fff;
            position: relative;
        }
        .guide-content .container {
            position: relative;
        }
        .content-block {
            margin-bottom: 2rem;
            line-height: 1.7;
        }
        .content-visible {
            border-bottom: 1px solid #eee;
            padding-bottom: 2rem;
            margin-bottom: 2rem;
        }
        .content-blurred {
            position: relative;
            filter: blur(4px);
            user-select: none;
            pointer-events: none;
            opacity: 0.7;
        }
        .content-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.8) 70%, rgba(255,255,255,1) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 10;
            padding-top: 100px;
        }
        .subscribe-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
            transform: translateY(-133px);
        }
        .subscribe-btn {
            background: #3e3e3e;
            color: white;
            font-weight: 600;
            border-radius: 50px;
            padding: 12px 35px;
            font-size: 16px;
            transition: all 0.3s ease;
            border: 2px solid #3e3e3e;
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
        }
        .subscribe-btn:hover {
            background: #555;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            color: white;
            text-decoration: none;
        }
        .section-title {
            font-weight: 700;
            margin-bottom: 1rem;
            color: #333;
            position: relative;
            display: inline-block;
        }
        .section-title:after {
            content: '';
            display: block;
            width: 70%;
            height: 3px;
            background: #3e3e3e;
            margin-top: 5px;
        }
        .list-styled {
            padding-left: 20px;
        }
        .list-styled li {
            margin-bottom: 0.75rem;
            position: relative;
            padding-left: 10px;
        }
        .list-styled li:before {
            content: '\2022';
            color: #3e3e3e;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        .featured-badge {
            display: inline-block;
            background-color: #f8f9fa;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 12px;
            color: #3e3e3e;
            border: 1px solid #eee;
            margin-bottom: 1rem;
        }
        .highlight-box {
            background-color: #f8f9fa;
            border-left: 4px solid #3e3e3e;
            padding: 20px;
            margin: 1.5rem 0;
            border-radius: 0 5px 5px 0;
        }
        .highlight-box p:last-child {
            margin-bottom: 0;
        }
        /* Enhanced country card styling */
        .country-card {
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-color: #eaeaea !important;
        }
        .country-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .country-card .btn {
            transition: all 0.3s ease;
        }
        .country-card .btn-outline-dark:hover {
            background-color: #3e3e3e;
            border-color: #3e3e3e;
        }
        .country-card .disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }
        .country-flag {
            width: 50px;
            height: 30px;
            overflow: hidden;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .country-flag img {
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <!-- Guide Header -->
        <section class="guide-header">
            <div class="container py-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <span class="featured-badge">MENA Investment Resources</span>
                        <h1 class="text-white guide-title">Middle East Investment Portal Directory</h1>
                        <p class="mb-4 text-white guide-subtitle">Access official government investment portals across the Middle East and North Africa region to explore business opportunities, incentives, and strategic sectors.</p>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" class="img-fluid rounded-3" alt="MENA Investment Landscape" style="object-fit: cover; height: 250px; width: 100%;">
                    </div>
                </div>
            </div>
        </section>
        <!-- Guide Content Section -->
        <section class="guide-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <!-- Introduction - Visible Content -->
                        <div class="content-block content-visible">
                            <h2 class="section-title">Official Investment Portals</h2>
                            <p> This exclusive directory provides direct access to official government investment portals across the MENA region. These portals serve as gateways to discovering sector-specific opportunities, incentive programs, regulatory frameworks, and strategic initiatives designed to attract foreign direct investment.</p>
                            <p> Each country offers unique advantages and focus areas, from UAE's diversified economy and free zones to Saudi Arabia's Vision 2030 initiatives and Egypt's strategic location connecting Africa and Asia.</p>
                        </div>
                        <!-- Investment Portals Section -->
                        <div class="content-block">
                            <h2 class="section-title">Investment Portals by Country</h2>
                            <p>Access official investment portals for key Middle Eastern countries to discover sector-specific opportunities, incentives, and regulatory frameworks. These government-backed resources provide essential market entry information for international investors.</p>
                            
                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                            <!-- Full content for subscribers -->
                            <div class="mt-4 row">

                                <!-- UAE -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/ae.png" alt="UAE Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">الإمارات العربية المتحدة</h4>
                                        </div>
                                        <p class="mb-2">Access UAE's comprehensive investment framework covering free zones, mainland opportunities, and sector incentives.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://www.investuae.gov.ae/ar" class="btn btn-sm btn-outline-dark" target="_blank">InvestUAE Portal <i class="bx bx-link-external ms-1"></i></a>
                                                <a href="https://www.avatrade.ae/education/online-trading-strategies/investment-strategies" class="btn btn-sm btn-outline-dark ms-2" target="_blank">Trading Strategies <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">********* <i class="bx bx-lock ms-1"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary ms-2 disabled">***************** <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Saudi Arabia -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/sa.png" alt="Saudi Arabia Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">المملكة العربية السعودية</h4>
                                        </div>
                                        <p class="mb-2">Explore Saudi Vision 2030 initiatives and investment programs through the kingdom's official investment portal.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://furas.momah.gov.sa/ar/about-furas" class="btn btn-sm btn-outline-dark" target="_blank">Furas Platform <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">*********** <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Qatar -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/qa.png" alt="Qatar Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">قطر</h4>
                                        </div>
                                        <p class="mb-2">Discover Qatar's investment sectors, incentives, and free zone opportunities through the official investment promotion agency.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://www.invest.qa/ar/sectors-and-opportunities/opportunities" class="btn btn-sm btn-outline-dark" target="_blank">Invest Qatar <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">*********** <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Kuwait -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/kw.png" alt="Kuwait Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">الكويت</h4>
                                        </div>
                                        <p class="mb-2">Access Kuwait's investment framework, incentives, and strategic sectors through the Kuwait Direct Investment Promotion Authority.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://kdipa.gov.kw/ar/invest-in-kuwait/" class="btn btn-sm btn-outline-dark" target="_blank">KDIPA <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">***** <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Oman -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/om.png" alt="Oman Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">سلطنة عمان</h4>
                                        </div>
                                        <p class="mb-2">Explore Oman's investment landscape, incentives, and key economic sectors through the official investment portal.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://investoman.om/ar_002" class="btn btn-sm btn-outline-dark" target="_blank">Invest Oman <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">********** <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Egypt -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/eg.png" alt="Egypt Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">مصر</h4>
                                        </div>
                                        <p class="mb-2">Access Egypt's investment map, incentives, and opportunities across diverse sectors through the official investment portal.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://www.investinegypt.gov.eg/Arabic/pages/exploreMap.aspx" class="btn btn-sm btn-outline-dark" target="_blank">Invest in Egypt <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">************ <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Iraq -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/iq.png" alt="Iraq Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">العراق</h4>
                                        </div>
                                        <p class="mb-2">Explore Iraq's investment opportunities, regulations, and priority sectors through the National Investment Commission.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://investpromo.gov.iq/ar/" class="btn btn-sm btn-outline-dark" target="_blank">Invest Iraq <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">********* <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Jordan -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/jo.png" alt="Jordan Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">الأردن</h4>
                                        </div>
                                        <p class="mb-2">Access Jordan's investment framework, development zones, and sector opportunities through the Ministry of Investment.</p>
                                        <div class="mt-3">
                                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->hasActiveSubscription())
                                                <a href="https://moin.gov.jo" class="btn btn-sm btn-outline-dark" target="_blank">Ministry of Investment <i class="bx bx-link-external ms-1"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary disabled">**************** <i class="bx bx-lock ms-1"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 highlight-box">
                                <p><strong>Investment Insight:</strong> The Middle East is evolving beyond traditional oil & gas sectors, with significant growth in technology, renewable energy, tourism, and financial services. Countries are competing to offer the most attractive investment environments with tax incentives, special economic zones, and streamlined business setup procedures.</p>
                            </div>
                            @else
                            <!-- Blurred content for non-subscribers -->
                            <div class="mt-4 row content-blurred">
                                <!-- UAE -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/ae.png" alt="UAE Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">الإمارات العربية المتحدة</h4>
                                        </div>
                                        <p class="mb-2">Access UAE's comprehensive investment framework covering free zones, mainland opportunities, and sector incentives.</p>
                                    </div>
                                </div>
                                
                                <!-- More blurred country cards -->
                                <div class="mb-4 col-md-6">
                                    <div class="p-3 rounded border country-card h-100">
                                        <div class="mb-3 d-flex align-items-center">
                                            <div class="country-flag me-3">
                                                <img src="https://flagcdn.com/w40/sa.png" alt="Saudi Arabia Flag" width="40">
                                            </div>
                                            <h4 class="mb-0">المملكة العربية السعودية</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 highlight-box content-blurred">
                                <p><strong>Investment Insight:</strong> The Middle East is evolving beyond traditional oil & gas sectors with significant growth in multiple industries...</p>
                            </div>
                            @endif
                        </div>

                        <!-- Subscription Overlay - Only show for non-subscribers -->
                        @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                        <div class="content-overlay">
                            <div class="subscribe-card">
                                <div class="mb-3">
                                    <span class="mb-2 badge bg-warning text-dark">Premium Content</span>
                                    <h3 class="mb-2">Access Official MENA Investment Portals</h3>
                                </div>
                                <p class="mb-3">Unlock direct access to government investment portals across the Middle East:</p>
                                <ul class="mb-4 text-start ps-4">
                                    <li class="mb-2">Official investment opportunities in 8+ countries</li>
                                    <li class="mb-2">Direct links to government portals and programs</li>
                                    <li class="mb-2">Sector-specific investment frameworks</li>
                                    <li>Latest incentives and regulatory information</li>
                                </ul>
                                <a href="{{ route('web.select-plan') }}" class="subscribe-btn">Upgrade Your Access <i class="bx bx-right-arrow-alt ms-1"></i></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>

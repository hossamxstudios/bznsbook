<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>{{ x_('Business Growth Strategy Guide | Bzns', 'guides') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
    <style>
        /* Custom styles for the business guide */
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
            background: linear-gradient(180deg, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.9) 30%, rgba(255,255,255,1) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            z-index: 10;
            padding-top: 500px;
        }
        .subscribe-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
            transform: translateY(0);
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
        }
        .subscribe-btn:hover {
            background: #555;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
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
            content: '•';
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
    </style>
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')

        <!-- Guide Header Section -->
        {{-- <section class="text-white guide-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center col-lg-8">
                        <span class="bg-white featured-badge text-dark">{{ x_('PREMIUM BUSINESS GUIDE', 'guides') }}</span>
                        <h1 class="guide-title">{{ x_('Ultimate Business Growth Strategy Guide 2025', 'guides') }}</h1>
                        <p class="guide-subtitle">{{ x_('Master proven strategies to scale your business, optimize operations, and increase revenue in today\'s competitive market', 'guides') }}</p>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Guide Content Section -->
        <section class="guide-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <!-- Introduction - Always Visible Content -->
                        <div class="content-block content-visible">
                            <h1 class="guide-title">{{ x_('Business Growth Strategy Guide', 'guides') }}</h1>
                            <p class="lead">
                                {{ x_('Discover proven frameworks and data-driven approaches to scale your business effectively in today\'s competitive market.', 'guides') }}
                            </p>
                        </div>

                        <!-- International Trade Websites Section -->
                        <div class="content-block">
                            <h2 class="section-title">{{ x_('International Trade Data Websites', 'guides') }}</h2>
                            <p>{{ x_('Access these valuable resources to gain data-driven insights for your international business decisions.', 'guides') }}</p>

                            @if(auth('client')->check() && auth('client')->user()->hasActiveSubscription())
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://iccwbo.org" target="_blank" rel="noopener">{{ x_('International Chamber of Commerce (ICC)', 'guides') }}</a></h5>
                                                <div class="small mb-2">
                                                    <span class="badge bg-light text-dark me-2">{{ x_('🏛️ Est. 1919', 'guides') }}</span>
                                                    <span class="badge bg-light text-dark">{{ x_('📍 Paris, France', 'guides') }}</span>
                                                </div>
                                                <p class="card-text">{{ x_('Sets global standards including Incoterms®, provides arbitration services, and shapes global trade policy.', 'guides') }}</p>
                                                <h6>{{ x_('Key Resources:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Incoterms® 2020 Guide', 'guides') }}</li>
                                                    <li>{{ x_('Arbitration and dispute resolution', 'guides') }}</li>
                                                    <li>{{ x_('Trade news and reports', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://comtrade.un.org" target="_blank" rel="noopener">{{ x_('UN Comtrade Database', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Comprehensive database with export and import data for more than 170 countries worldwide.', 'guides') }}</p>
                                                <h6>{{ x_('Features:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Filter by country, year, HS code', 'guides') }}</li>
                                                    <li>{{ x_('Download detailed trade statistics', 'guides') }}</li>
                                                    <li>{{ x_('Generate custom trade reports', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.trademap.org" target="_blank" rel="noopener">{{ x_('Trade Map (ITC)', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Provides detailed analysis of international trade flows by country and product category.', 'guides') }}</p>
                                                <h6>{{ x_('Features:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Visual charts and trends', 'guides') }}</li>
                                                    <li>{{ x_('Competitor analysis', 'guides') }}</li>
                                                    <li>{{ x_('Target market identification', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://wits.worldbank.org" target="_blank" rel="noopener">{{ x_('World Integrated Trade Solution', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('World Bank tool in collaboration with WTO and UNCTAD offering comprehensive trade analysis.', 'guides') }}</p>
                                                <h6>{{ x_('Features:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Cross-country comparisons', 'guides') }}</li>
                                                    <li>{{ x_('HS Code metadata', 'guides') }}</li>
                                                    <li>{{ x_('Advanced trade analysis tools', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-4">{{ x_('Additional Data Resources', 'guides') }}</h4>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://oec.world" target="_blank" rel="noopener">OEC.world</a></h5>
                                                <p class="card-text">{{ x_('Interactive visualization of global trade flows with beautiful graphical representations.', 'guides') }}</p>
                                                <h6>{{ x_('Features:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Visual country trade maps', 'guides') }}</li>
                                                    <li>{{ x_('Easy to understand charts', 'guides') }}</li>
                                                    <li>{{ x_('Comprehensive country comparisons', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.wto.org" target="_blank" rel="noopener">{{ x_('World Trade Organization', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Official source for global trade regulations, disputes and statistical reports.', 'guides') }}</p>
                                                <h6>{{ x_('Resources:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Annual trade reports', 'guides') }}</li>
                                                    <li>{{ x_('Quarterly statistics', 'guides') }}</li>
                                                    <li>{{ x_('Trade policy reviews', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://ec.europa.eu/eurostat" target="_blank" rel="noopener">{{ x_('Eurostat', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Comprehensive foreign trade data for European Union countries and markets.', 'guides') }}</p>
                                                <h6>{{ x_('Useful for:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('EU market entry analysis', 'guides') }}</li>
                                                    <li>{{ x_('European trade flows', 'guides') }}</li>
                                                    <li>{{ x_('Statistical business reports', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.statista.com" target="_blank" rel="noopener">{{ x_('Statista', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Subscription-based database with comprehensive charts and indicators on global trade.', 'guides') }}</p>
                                                <h6>{{ x_('Content:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Statistical reports and infographics', 'guides') }}</li>
                                                    <li>{{ x_('Market forecasts and outlooks', 'guides') }}</li>
                                                    <li>{{ x_('Industry-specific trade data', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.tridge.com" target="_blank" rel="noopener">{{ x_('Tridge', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Global platform connecting buyers and suppliers in agriculture and food industries.', 'guides') }}</p>
                                                <h6>{{ x_('Key Features:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Daily and weekly price data', 'guides') }}</li>
                                                    <li>{{ x_('Import and export trends', 'guides') }}</li>
                                                    <li>{{ x_('Global trade flow visualizations', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.hscode.org" target="_blank" rel="noopener">{{ x_('HS Code Lookup', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Search tool for finding the correct customs classification code for any product.', 'guides') }}</p>
                                                <h6>{{ x_('Benefits:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Accurate product classification', 'guides') }}</li>
                                                    <li>{{ x_('Avoid customs delays', 'guides') }}</li>
                                                    <li>{{ x_('Determine applicable duties', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                                <h4 class="mt-4">{{ x_('Shipping & Logistics Resources', 'guides') }}</h4>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.track-trace.com" target="_blank" rel="noopener">Track-Trace.com</a></h5>
                                                <p class="card-text">{{ x_('Free service for tracking international shipments across multiple carriers.', 'guides') }}</p>
                                                <h6>{{ x_('Supports:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Postal services (USPS, China Post, etc.)', 'guides') }}</li>
                                                    <li>{{ x_('Commercial couriers (FedEx, UPS, DHL)', 'guides') }}</li>
                                                    <li>{{ x_('Container tracking for sea freight', 'guides') }}</li>
                                                    <li>{{ x_('Air cargo tracking via AWB numbers', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.sgs.com" target="_blank" rel="noopener">{{ x_('SGS Inspection Services', 'guides') }}</a></h5>
                                                <p class="card-text">{{ x_('Provides inspection and verification services for international goods shipments.', 'guides') }}</p>
                                                <h6>{{ x_('Services:', 'guides') }}</h6>
                                                <ul class="list-styled">
                                                    <li>{{ x_('Pre-shipment inspection', 'guides') }}</li>
                                                    <li>{{ x_('Quality control verification', 'guides') }}</li>
                                                    <li>{{ x_('Compliance with agreements', 'guides') }}</li>
                                                    <li>{{ x_('Dispute resolution support', 'guides') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Growth Section - Title Visible -->
                        <div class="content-block">
                            <h2 class="section-title">{{ x_('Key Growth Strategies for 2025', 'guides') }}</h2>

                            @if(auth('client')->check() && auth('client')->user()->hasActiveSubscription())
                            <!-- Full content for subscribers -->
                            <p>
                                {{ x_('The business landscape of 2025 presents unique challenges and opportunities driven by technological advancement, changing consumer behaviors, and economic shifts. Organizations that thrive will be those that successfully implement the following strategic frameworks:', 'guides') }}
                            </p>

                            <h3>{{ x_('1. Market Penetration and Expansion', 'guides') }}</h3>
                            <p>
                                {{ x_('Deepening your presence in existing markets often represents the lowest-risk growth path. Consider these approaches:', 'guides') }}
                            </p>
                            <div class="highlight-box">
                                <p><strong>{{ x_('Case Study:', 'guides') }}</strong> {{ x_('How Company XYZ increased market share by 32% in 12 months through targeted micro-segmentation and personalized marketing automation.', 'guides') }}</p>
                            </div>

                            <h3>{{ x_('2. Digital Transformation Strategy', 'guides') }}</h3>
                            <p>
                                {{ x_('Digital transformation isn\'t just about adopting new technologies—it\'s about reimagining business processes and customer experiences. A successful digital transformation strategy includes:', 'guides') }}
                            </p>
                            <ul class="list-styled">
                                <li>{{ x_('Comprehensive audit of current technology infrastructure and capabilities', 'guides') }}</li>
                                <li>{{ x_('Clear prioritization of initiatives based on business impact and implementation feasibility', 'guides') }}</li>
                                <li>{{ x_('Development of digital-first customer journeys that enhance satisfaction and loyalty', 'guides') }}</li>
                                <li>{{ x_('Implementation of data analytics frameworks to enable data-driven decision making', 'guides') }}</li>
                                <li>{{ x_('Cultural transformation to foster innovation and agility across the organization', 'guides') }}</li>
                            </ul>

                            <h3>{{ x_('3. Operational Excellence', 'guides') }}</h3>
                            <p>
                                {{ x_('Streamlining operations is essential for scaling efficiently. Focus on these areas:', 'guides') }}
                            </p>
                            <ul class="list-styled">
                                <li>{{ x_('Process standardization and documentation', 'guides') }}</li>
                                <li>{{ x_('Strategic automation of repetitive tasks', 'guides') }}</li>
                                <li>{{ x_('Implementation of continuous improvement methodologies', 'guides') }}</li>
                                <li>{{ x_('Development of key performance indicators aligned with strategic objectives', 'guides') }}</li>
                                <li>{{ x_('Regular review cycles to identify and address operational bottlenecks', 'guides') }}</li>
                            </ul>
                            </div>
                        @endif
                        </div>

                        <!-- Subscription Overlay - Only show for non-subscribers -->
                        @if(!auth('client')->check() || !auth('client')->user()->hasActiveSubscription())
                        <div class="content-overlay" style="padding-top: 500px !important;">
                            <div class="subscribe-card" style="transform: translateY(0) !important;">
                                <div class="mb-3">
                                    <span class="mb-2 badge bg-warning text-dark">{{ x_('Premium Content', 'guides') }}</span>
                                    <h3 class="mb-2">{{ x_('Business Growth Expertise', 'guides') }}</h3>
                                    <p>{{ x_('Unlock complete access to our business growth guide including:', 'guides') }}</p>
                                </div>
                                <ul class="list-unstyled text-start">
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> {{ x_('Full growth strategy frameworks', 'guides') }}</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> {{ x_('Market expansion tactics', 'guides') }}</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> {{ x_('Digital transformation roadmaps', 'guides') }}</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> {{ x_('Operational excellence best practices', 'guides') }}</li>
                                </ul>
                                <div class="mt-3">
                                    <a href="{{ route('web.select-plan') }}" class="subscribe-btn">{{ x_('Subscribe Now', 'guides') }}</a>
                                </div>
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

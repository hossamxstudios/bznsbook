<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>Business Growth Strategy Guide | Bzns</title>
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
                        <span class="bg-white featured-badge text-dark">PREMIUM BUSINESS GUIDE</span>
                        <h1 class="guide-title">Ultimate Business Growth Strategy Guide 2025</h1>
                        <p class="guide-subtitle">Master proven strategies to scale your business, optimize operations, and increase revenue in today's competitive market</p>
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
                            <h1 class="guide-title">Business Growth Strategy Guide</h1>
                            <p class="lead">
                                Discover proven frameworks and data-driven approaches to scale your business effectively in today's competitive market.
                            </p>
                        </div>

                        <!-- International Trade Websites Section -->
                        <div class="content-block">
                            <h2 class="section-title">International Trade Data Websites</h2>
                            <p>Access these valuable resources to gain data-driven insights for your international business decisions.</p>
                            
                            @if(auth('client')->check() && auth('client')->user()->hasActiveSubscription())
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://iccwbo.org" target="_blank" rel="noopener">International Chamber of Commerce (ICC)</a></h5>
                                                <div class="small mb-2">
                                                    <span class="badge bg-light text-dark me-2">🏛️ Est. 1919</span>
                                                    <span class="badge bg-light text-dark">📍 Paris, France</span>
                                                </div>
                                                <p class="card-text">Sets global standards including Incoterms®, provides arbitration services, and shapes global trade policy.</p>
                                                <h6>Key Resources:</h6>
                                                <ul class="list-styled">
                                                    <li>Incoterms® 2020 Guide</li>
                                                    <li>Arbitration and dispute resolution</li>
                                                    <li>Trade news and reports</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://comtrade.un.org" target="_blank" rel="noopener">UN Comtrade Database</a></h5>
                                                <p class="card-text">Comprehensive database with export and import data for more than 170 countries worldwide.</p>
                                                <h6>Features:</h6>
                                                <ul class="list-styled">
                                                    <li>Filter by country, year, HS code</li>
                                                    <li>Download detailed trade statistics</li>
                                                    <li>Generate custom trade reports</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.trademap.org" target="_blank" rel="noopener">Trade Map (ITC)</a></h5>
                                                <p class="card-text">Provides detailed analysis of international trade flows by country and product category.</p>
                                                <h6>Features:</h6>
                                                <ul class="list-styled">
                                                    <li>Visual charts and trends</li>
                                                    <li>Competitor analysis</li>
                                                    <li>Target market identification</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://wits.worldbank.org" target="_blank" rel="noopener">World Integrated Trade Solution</a></h5>
                                                <p class="card-text">World Bank tool in collaboration with WTO and UNCTAD offering comprehensive trade analysis.</p>
                                                <h6>Features:</h6>
                                                <ul class="list-styled">
                                                    <li>Cross-country comparisons</li>
                                                    <li>HS Code metadata</li>
                                                    <li>Advanced trade analysis tools</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <h4 class="mt-4">Additional Data Resources</h4>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://oec.world" target="_blank" rel="noopener">OEC.world</a></h5>
                                                <p class="card-text">Interactive visualization of global trade flows with beautiful graphical representations.</p>
                                                <h6>Features:</h6>
                                                <ul class="list-styled">
                                                    <li>Visual country trade maps</li>
                                                    <li>Easy to understand charts</li>
                                                    <li>Comprehensive country comparisons</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.wto.org" target="_blank" rel="noopener">World Trade Organization</a></h5>
                                                <p class="card-text">Official source for global trade regulations, disputes and statistical reports.</p>
                                                <h6>Resources:</h6>
                                                <ul class="list-styled">
                                                    <li>Annual trade reports</li>
                                                    <li>Quarterly statistics</li>
                                                    <li>Trade policy reviews</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://ec.europa.eu/eurostat" target="_blank" rel="noopener">Eurostat</a></h5>
                                                <p class="card-text">Comprehensive foreign trade data for European Union countries and markets.</p>
                                                <h6>Useful for:</h6>
                                                <ul class="list-styled">
                                                    <li>EU market entry analysis</li>
                                                    <li>European trade flows</li>
                                                    <li>Statistical business reports</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.statista.com" target="_blank" rel="noopener">Statista</a></h5>
                                                <p class="card-text">Subscription-based database with comprehensive charts and indicators on global trade.</p>
                                                <h6>Content:</h6>
                                                <ul class="list-styled">
                                                    <li>Statistical reports and infographics</li>
                                                    <li>Market forecasts and outlooks</li>
                                                    <li>Industry-specific trade data</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.tridge.com" target="_blank" rel="noopener">Tridge</a></h5>
                                                <p class="card-text">Global platform connecting buyers and suppliers in agriculture and food industries.</p>
                                                <h6>Key Features:</h6>
                                                <ul class="list-styled">
                                                    <li>Daily and weekly price data</li>
                                                    <li>Import and export trends</li>
                                                    <li>Global trade flow visualizations</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.hscode.org" target="_blank" rel="noopener">HS Code Lookup</a></h5>
                                                <p class="card-text">Search tool for finding the correct customs classification code for any product.</p>
                                                <h6>Benefits:</h6>
                                                <ul class="list-styled">
                                                    <li>Accurate product classification</li>
                                                    <li>Avoid customs delays</li>
                                                    <li>Determine applicable duties</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                
                                <h4 class="mt-4">Shipping & Logistics Resources</h4>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.track-trace.com" target="_blank" rel="noopener">Track-Trace.com</a></h5>
                                                <p class="card-text">Free service for tracking international shipments across multiple carriers.</p>
                                                <h6>Supports:</h6>
                                                <ul class="list-styled">
                                                    <li>Postal services (USPS, China Post, etc.)</li>
                                                    <li>Commercial couriers (FedEx, UPS, DHL)</li>
                                                    <li>Container tracking for sea freight</li>
                                                    <li>Air cargo tracking via AWB numbers</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="https://www.sgs.com" target="_blank" rel="noopener">SGS Inspection Services</a></h5>
                                                <p class="card-text">Provides inspection and verification services for international goods shipments.</p>
                                                <h6>Services:</h6>
                                                <ul class="list-styled">
                                                    <li>Pre-shipment inspection</li>
                                                    <li>Quality control verification</li>
                                                    <li>Compliance with agreements</li>
                                                    <li>Dispute resolution support</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Business Growth Section - Title Visible -->
                        <div class="content-block">
                            <h2 class="section-title">Key Growth Strategies for 2025</h2>
                            
                            @if(auth('client')->check() && auth('client')->user()->hasActiveSubscription())
                            <!-- Full content for subscribers -->
                            <p>
                                The business landscape of 2025 presents unique challenges and opportunities driven by technological advancement, changing consumer behaviors, and economic shifts. Organizations that thrive will be those that successfully implement the following strategic frameworks:
                            </p>

                            <h3>1. Market Penetration and Expansion</h3>
                            <p>
                                Deepening your presence in existing markets often represents the lowest-risk growth path. Consider these approaches:
                            </p>
                            <div class="highlight-box">
                                <p><strong>Case Study:</strong> How Company XYZ increased market share by 32% in 12 months through targeted micro-segmentation and personalized marketing automation.</p>
                            </div>

                            <h3>2. Digital Transformation Strategy</h3>
                            <p>
                                Digital transformation isn't just about adopting new technologies—it's about reimagining business processes and customer experiences. A successful digital transformation strategy includes:
                            </p>
                            <ul class="list-styled">
                                <li>Comprehensive audit of current technology infrastructure and capabilities</li>
                                <li>Clear prioritization of initiatives based on business impact and implementation feasibility</li>
                                <li>Development of digital-first customer journeys that enhance satisfaction and loyalty</li>
                                <li>Implementation of data analytics frameworks to enable data-driven decision making</li>
                                <li>Cultural transformation to foster innovation and agility across the organization</li>
                            </ul>

                            <h3>3. Operational Excellence</h3>
                            <p>
                                Streamlining operations is essential for scaling efficiently. Focus on these areas:
                            </p>
                            <ul class="list-styled">
                                <li>Process standardization and documentation</li>
                                <li>Strategic automation of repetitive tasks</li>
                                <li>Implementation of continuous improvement methodologies</li>
                                <li>Development of key performance indicators aligned with strategic objectives</li>
                                <li>Regular review cycles to identify and address operational bottlenecks</li>
                            </ul>
                            </div>
                        @endif
                        </div>

                        <!-- Subscription Overlay - Only show for non-subscribers -->
                        @if(!auth('client')->check() || !auth('client')->user()->hasActiveSubscription())
                        <div class="content-overlay" style="padding-top: 500px !important;">
                            <div class="subscribe-card" style="transform: translateY(0) !important;">
                                <div class="mb-3">
                                    <span class="mb-2 badge bg-warning text-dark">Premium Content</span>
                                    <h3 class="mb-2">Business Growth Expertise</h3>
                                    <p>Unlock complete access to our business growth guide including:</p>
                                </div>
                                <ul class="list-unstyled text-start">
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> Full growth strategy frameworks</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> Market expansion tactics</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> Digital transformation roadmaps</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i> Operational excellence best practices</li>
                                </ul>
                                <div class="mt-3">
                                    <a href="{{ route('web.select-plan') }}" class="subscribe-btn">Subscribe Now</a>
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

<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>{{ x_('International Shipping Guide | Bzns', 'guides') }}</title>
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
            background: linear-gradient(180deg, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.9) 30%, rgba(255,255,255,1) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            z-index: 10;
            padding-top: 80px;
        }
        .subscribe-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
            transform: translateY(-100px);
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
            margin-bottom: 1.5rem;
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
        .shipping-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 2rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .shipping-table th {
            background-color: #f8f9fa;
            padding: 15px 20px;
            font-weight: 600;
            border-bottom: 2px solid #eaeaea;
            text-align: left;
        }
        .shipping-table td {
            padding: 12px 20px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }
        .shipping-table tr:last-child td {
            border-bottom: none;
        }
        .shipping-table tr:hover td {
            background-color: rgba(0,0,0,0.01);
        }
        .incoterm-card {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        .incoterm-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transform: translateY(-3px);
        }
        .incoterm-code {
            font-weight: 700;
            font-size: 18px;
            display: block;
            margin-bottom: 5px;
        }
        .incoterm-term {
            color: #666;
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
        }
        .incoterm-desc {
            font-size: 14px;
            color: #444;
            line-height: 1.5;
        }
        .shipping-emoji {
            font-size: 1.5rem;
            margin-right: 8px;
            vertical-align: middle;
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
            transform: translateY(-100px);
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
                        <span class="featured-badge">{{ x_('GLOBAL LOGISTICS', 'guides') }}</span>
                        <h1 class="text-white guide-title">{{ x_('International Shipping Guide', 'guides') }}</h1>
                        <p class="mb-4 text-white guide-subtitle">{{ x_('Master the essentials of global shipping with key methods, terms, and best practices for international trade.', 'guides') }}</p>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" class="img-fluid rounded-3" alt="{{ x_('Container Ship', 'guides') }}" style="object-fit: cover; height: 250px; width: 100%;"> 
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
                            <h2 class="section-title">{{ x_('Global Shipping Essentials', 'guides') }}</h2>
                            <p>{{ x_('International shipping is a cornerstone of global trade, connecting businesses across continents and enabling the movement of goods worldwide. Understanding the fundamentals of international logistics is essential for any business engaging in cross-border commerce.', 'guides') }}</p>
                            <p>{{ x_('This guide covers the most important aspects of international shipping, from transportation methods to documentation requirements, helping you navigate the complexities of global logistics.', 'guides') }}</p>
                        </div>
                        
                        <!-- Shipping Methods Section - Section Title Visible -->
                        <div class="content-block">
                            <h2 class="section-title">{{ x_('1. Main International Shipping Methods', 'guides') }}</h2>
                            @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                            <div class="content-blurred">
                            @else
                            <div>
                            @endif
                            <p>{{ x_('There are four primary methods for shipping goods internationally, each with specific advantages and suitable use cases:', 'guides') }}</p>
                            
                            <table class="shipping-table">
                                <thead>
                                    <tr>
                                        <th>{{ x_('Shipping Method', 'guides') }}</th>
                                        <th>{{ x_('Description', 'guides') }}</th>
                                        <th>{{ x_('Usage', 'guides') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="shipping-emoji">🚢</span> {{ x_('Sea Freight', 'guides') }}</td>
                                        <td>{{ x_('Transporting goods via ships through seaports.', 'guides') }}</td>
                                        <td>{{ x_('Best for heavy or large-volume shipments (containers).', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="shipping-emoji">✈️</span> {{ x_('Air Freight', 'guides') }}</td>
                                        <td>{{ x_('Transporting goods via airplanes.', 'guides') }}</td>
                                        <td>{{ x_('Fastest but most expensive; suitable for light or urgent goods.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="shipping-emoji">🚛</span> {{ x_('Land Freight', 'guides') }}</td>
                                        <td>{{ x_('Overland transportation via trucks between nearby countries.', 'guides') }}</td>
                                        <td>{{ x_('Common in Europe, Asia, and the Gulf.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="shipping-emoji">🚂</span> {{ x_('Rail Freight', 'guides') }}</td>
                                        <td>{{ x_('Economical and faster than land freight in some regions.', 'guides') }}</td>
                                        <td>{{ x_('Available in China and Europe.', 'guides') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <!-- Incoterms Section - Section Title Visible -->
                        <div class="content-block">
                            <h2 class="section-title">{{ x_('2. Key International Shipping Terms (Incoterms)', 'guides') }}</h2>
                            @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                            <div class="content-blurred">
                            @else
                            <div>
                            @endif
                            
                            <div class="highlight-box">
                                <h5>{{ x_('What are Incoterms?', 'guides') }}</h5>
                                <p>{{ x_('Short for "International Commercial Terms", issued by the ICC (International Chamber of Commerce) to define the responsibilities of sellers and buyers in global trade.', 'guides') }}</p>
                            </div>
                            
                            <h5 class="mt-4 mb-3">{{ x_('The 11 Most Common Incoterms (2020):', 'guides') }}</h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">EXW</span>
                                        <span class="incoterm-term">{{ x_('Ex Works', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Buyer bears all responsibility from seller\'s premises onward.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">FCA</span>
                                        <span class="incoterm-term">{{ x_('Free Carrier', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller delivers goods to a location chosen by buyer (e.g., freight forwarder).', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">FAS</span>
                                        <span class="incoterm-term">{{ x_('Free Alongside Ship', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller places goods alongside the vessel at the port.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">FOB</span>
                                        <span class="incoterm-term">{{ x_('Free On Board', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller loads goods on board ship. Buyer takes responsibility afterward.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">CFR</span>
                                        <span class="incoterm-term">{{ x_('Cost and Freight', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller pays shipping cost to destination port (excludes insurance).', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">CIF</span>
                                        <span class="incoterm-term">{{ x_('Cost, Insurance & Freight', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller pays for shipping and insurance to the destination port.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">CPT</span>
                                        <span class="incoterm-term">{{ x_('Carriage Paid To', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller pays freight to an agreed destination.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">CIP</span>
                                        <span class="incoterm-term">{{ x_('Carriage & Insurance Paid To', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller pays freight and insurance.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">DAP</span>
                                        <span class="incoterm-term">{{ x_('Delivered At Place', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller delivers to a location; buyer handles customs.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">DPU</span>
                                        <span class="incoterm-term">{{ x_('Delivered at Place Unloaded', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller delivers and unloads goods at location.', 'guides') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="incoterm-card">
                                        <span class="incoterm-code">DDP</span>
                                        <span class="incoterm-term">{{ x_('Delivered Duty Paid', 'guides') }}</span>
                                        <p class="incoterm-desc">{{ x_('Seller bears all costs including customs clearance and duties.', 'guides') }}</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                        <!-- Key Documents Section - Section Title Visible -->
                        <div class="content-block">
                            <h2 class="section-title">{{ x_('3. Key Shipping Documents', 'guides') }}</h2>
                            @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                            <div class="content-blurred">
                            @else
                            <div>
                            @endif
                            <p>{{ x_('Proper documentation is essential for smooth international shipping. These are the primary documents you\'ll need:', 'guides') }}</p>
                            
                            <table class="shipping-table">
                                <thead>
                                    <tr>
                                        <th>{{ x_('Document', 'guides') }}</th>
                                        <th>{{ x_('Description', 'guides') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ x_('Commercial Invoice', 'guides') }}</td>
                                        <td>{{ x_('Contains product details, price, seller/buyer information, and terms of sale. Required for customs clearance.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Packing List', 'guides') }}</td>
                                        <td>{{ x_('Itemized list of package contents with weights, dimensions and packaging type. Helps with customs inspection.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Bill of Lading (B/L)', 'guides') }}</td>
                                        <td>{{ x_('Receipt of goods shipped by sea and title document. Proves ownership and serves as shipping contract.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Air Waybill (AWB)', 'guides') }}</td>
                                        <td>{{ x_('Non-negotiable transport document for air freight. Serves as proof of receipt and contract of carriage.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Certificate of Origin', 'guides') }}</td>
                                        <td>{{ x_('Document certifying where products were manufactured. Often required for tariff/duty calculations.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Insurance Certificate', 'guides') }}</td>
                                        <td>{{ x_('Proof that goods are insured during transport against loss or damage.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Dangerous Goods Declaration', 'guides') }}</td>
                                        <td>{{ x_('Required for hazardous materials. Details the nature of the hazard and handling instructions.', 'guides') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="highlight-box">
                                <p><strong>{{ x_('Pro Tip:', 'guides') }}</strong> {{ x_('Create a document checklist for each destination country as requirements can vary significantly between markets. Having pre-prepared templates can save considerable time and reduce errors.', 'guides') }}</p>
                            </div>
                            </div>
                        </div>

                        <!-- Common Shipping Terms Section - Section Title Visible -->
                        <div class="content-block">
                            <h2 class="section-title">{{ x_('4. Common Shipping Terms & Concepts', 'guides') }}</h2>
                            @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                            <div class="content-blurred">
                            @else
                            <div>
                            @endif
                            <p>{{ x_('Understanding these key terms will help you navigate shipping arrangements and avoid unexpected costs:', 'guides') }}</p>
                            
                            <table class="shipping-table">
                                <thead>
                                    <tr>
                                        <th>{{ x_('Term', 'guides') }}</th>
                                        <th>{{ x_('Meaning', 'guides') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ x_('LCL (Less than Container Load)', 'guides') }}</td>
                                        <td>{{ x_('Shipping method where your goods share container space with other shipments. Cost-effective for smaller volumes.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('FCL (Full Container Load)', 'guides') }}</td>
                                        <td>{{ x_('Exclusive use of an entire container for your shipment. More secure and often faster than LCL.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Lead Time', 'guides') }}</td>
                                        <td>{{ x_('Total time between order placement and delivery arrival. Critical for supply chain planning.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Freight Forwarder', 'guides') }}</td>
                                        <td>{{ x_('Third-party logistics provider that organizes shipments from manufacturer to final destination.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('HS Code', 'guides') }}</td>
                                        <td>{{ x_('Harmonized System code used globally to classify products for customs and duties.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Demurrage', 'guides') }}</td>
                                        <td>{{ x_('Charges applied when containers remain at port beyond the free time period.', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('Detention', 'guides') }}</td>
                                        <td>{{ x_('Fees incurred when containers are not returned to the shipping line within the allocated timeframe.', 'guides') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                        <!-- Choosing Right Method Section - Section Title Visible -->
                        <div class="content-block">
                            <h2 class="section-title">{{ x_('5. How to Choose the Right Shipping Method', 'guides') }}</h2>
                            @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                            <div class="content-blurred">
                            @else
                            <div>
                            @endif
                            <p>{{ x_('Selecting the optimal shipping method depends on your specific requirements:', 'guides') }}</p>
                            
                            <table class="shipping-table">
                                <thead>
                                    <tr>
                                        <th>{{ x_('If...', 'guides') }}</th>
                                        <th>{{ x_('The Best Option Is...', 'guides') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ x_('Your goods are heavy or in bulk', 'guides') }}</td>
                                        <td>{{ x_('Sea Freight (FCL or LCL) - most cost-effective for large/heavy shipments', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('You need fast delivery', 'guides') }}</td>
                                        <td>{{ x_('Air Freight - can be 5-10× faster than sea freight', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('You\'re shipping to neighboring countries', 'guides') }}</td>
                                        <td>{{ x_('Land or Rail Freight - often the most efficient for shorter distances', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('You want to minimize your risks', 'guides') }}</td>
                                        <td>{{ x_('Use Incoterms like DDP or CIP where seller handles most responsibilities', 'guides') }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ x_('You want lower costs & more control', 'guides') }}</td>
                                        <td>{{ x_('Consider EXW or FOB terms where you handle more logistics yourself', 'guides') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="highlight-box mt-4">
                                <p><strong>{{ x_('Pro Tip:', 'guides') }}</strong> {{ x_('Work with experienced freight forwarders who can provide end-to-end logistics solutions and handle customs clearance. This can save time and reduce the risk of delays or compliance issues, especially when shipping to new markets.', 'guides') }}</p>
                            </div>
                            </div>
                        </div>

                        <!-- Subscription Overlay - Only show for non-subscribers -->
                        @if(!Auth::guard('client')->check() || !Auth::guard('client')->user()->hasActiveSubscription())
                        <div class="content-overlay" style="padding-top: 500px !important;">
                            <div class="subscribe-card" style="transform: translateY(0) !important;">
                                <div class="mb-3">
                                    <span class="mb-2 badge bg-warning text-dark">{{ x_('Premium Content', 'guides') }}</span>
                                    <h3 class="mb-2">{{ x_('International Shipping Expertise', 'guides') }}</h3>
                                </div>
                                <p class="mb-3">{{ x_('Unlock complete access to our shipping guide including:', 'guides') }}</p>
                                <ul class="mb-4 text-start ps-4">
                                    <li class="mb-2">{{ x_('Full Incoterms reference guide', 'guides') }}</li>
                                    <li class="mb-2">{{ x_('Essential shipping documents templates', 'guides') }}</li>
                                    <li class="mb-2">{{ x_('Cost optimization strategies', 'guides') }}</li>
                                    <li>{{ x_('Compliance & customs best practices', 'guides') }}</li>
                                </ul>
                                <a href="{{ route('web.select-plan') }}" class="subscribe-btn">{{ x_('Upgrade Your Access', 'guides') }} <i class="bx bx-right-arrow-alt ms-1"></i></a>
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

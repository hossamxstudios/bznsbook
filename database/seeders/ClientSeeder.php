<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Service;
use App\Models\Subcategory;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $subcategories = Subcategory::all();

        $clients = [
            [
                'name' => 'PixelCraft Studio',
                'title' => 'Creative Design Agency',
                'email' => 'hello@pixelcraft.com',
                'phone' => '+20-100-555-1001',
                'address' => '15 Tahrir Square, Downtown',
                'city' => 'Cairo',
                'country' => 'Egypt',
                'zip' => '11511',
                'company_size' => '10-50',
                'website' => 'https://pixelcraft.com',
                'facebook' => 'https://facebook.com/pixelcraft',
                'linkedin' => 'https://linkedin.com/company/pixelcraft',
                'instagram' => 'https://instagram.com/pixelcraft',
                'founding_year' => 2018,
                'is_company' => 1,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['Logo Design', 'Brand Identity', 'UI/UX Design', 'Print Design'],
                'services' => [
                    ['name' => 'Brand Identity Design', 'price' => 2500, 'level' => 95, 'years_experience' => 7, 'details' => 'Complete brand identity including logo, color palette, typography, and brand guidelines. We create memorable brands that stand out in competitive markets.', 'skills' => ['Adobe Illustrator', 'Figma', 'Brand Strategy', 'Typography']],
                    ['name' => 'UI/UX Design', 'price' => 3500, 'level' => 90, 'years_experience' => 5, 'details' => 'User-centered design for web and mobile applications. From wireframes to high-fidelity prototypes with usability testing.', 'skills' => ['Figma', 'Sketch', 'User Research', 'Prototyping', 'Usability Testing']],
                    ['name' => 'Logo Design', 'price' => 800, 'level' => 98, 'years_experience' => 8, 'details' => 'Custom logo design with multiple concepts, revisions, and final delivery in all formats. Includes brand mark, wordmark, and combination options.', 'skills' => ['Adobe Illustrator', 'Typography', 'Icon Design']],
                    ['name' => 'Print Design', 'price' => 1200, 'level' => 85, 'years_experience' => 6, 'details' => 'Professional print design for brochures, flyers, business cards, and marketing collateral.', 'skills' => ['Adobe InDesign', 'Adobe Photoshop', 'Print Production']],
                ],
            ],
            [
                'name' => 'CodeNest Solutions',
                'title' => 'Software Development Company',
                'email' => 'info@codenest.io',
                'phone' => '+971-50-555-2001',
                'address' => 'Dubai Internet City, Building 12',
                'city' => 'Dubai',
                'country' => 'UAE',
                'zip' => '500001',
                'company_size' => '50-100',
                'website' => 'https://codenest.io',
                'linkedin' => 'https://linkedin.com/company/codenest',
                'founding_year' => 2016,
                'is_company' => 1,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['Web Development', 'Mobile App Development', 'E-commerce Development', 'SaaS Development', 'API Development'],
                'services' => [
                    ['name' => 'Custom Web Application Development', 'price' => 8000, 'level' => 95, 'years_experience' => 9, 'details' => 'Full-stack web development using modern frameworks. We build scalable, secure, and performant web applications tailored to your business needs.', 'skills' => ['Laravel', 'React', 'Vue.js', 'Node.js', 'PostgreSQL']],
                    ['name' => 'Mobile App Development', 'price' => 12000, 'level' => 90, 'years_experience' => 7, 'details' => 'Native and cross-platform mobile app development for iOS and Android. From concept to App Store deployment.', 'skills' => ['Flutter', 'React Native', 'Swift', 'Kotlin']],
                    ['name' => 'E-commerce Solutions', 'price' => 5000, 'level' => 88, 'years_experience' => 6, 'details' => 'End-to-end e-commerce development with payment integration, inventory management, and analytics.', 'skills' => ['Shopify', 'WooCommerce', 'Laravel', 'Stripe', 'Payment Gateways']],
                ],
            ],
            [
                'name' => 'BrightWave Marketing',
                'title' => 'Digital Marketing Agency',
                'email' => 'contact@brightwave.agency',
                'phone' => '+20-111-555-3001',
                'address' => 'Smart Village, Building B4',
                'city' => 'Giza',
                'country' => 'Egypt',
                'zip' => '12577',
                'company_size' => '10-50',
                'website' => 'https://brightwave.agency',
                'facebook' => 'https://facebook.com/brightwave',
                'instagram' => 'https://instagram.com/brightwave',
                'founding_year' => 2019,
                'is_company' => 1,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['SEO', 'Social Media Marketing', 'Content Marketing', 'PPC Advertising', 'Email Marketing'],
                'services' => [
                    ['name' => 'SEO Strategy & Implementation', 'price' => 2000, 'level' => 92, 'years_experience' => 6, 'details' => 'Comprehensive SEO services including technical audit, on-page optimization, content strategy, and link building to boost your organic rankings.', 'skills' => ['Technical SEO', 'Content Strategy', 'Google Analytics', 'Ahrefs', 'Keyword Research']],
                    ['name' => 'Social Media Management', 'price' => 1500, 'level' => 88, 'years_experience' => 5, 'details' => 'Full social media management across all platforms. Content creation, scheduling, community management, and performance reporting.', 'skills' => ['Content Creation', 'Community Management', 'Social Analytics', 'Paid Social']],
                    ['name' => 'PPC Campaign Management', 'price' => 2500, 'level' => 85, 'years_experience' => 4, 'details' => 'Google Ads and social media advertising management with ROI-focused strategy and continuous optimization.', 'skills' => ['Google Ads', 'Facebook Ads', 'A/B Testing', 'Conversion Optimization']],
                ],
            ],
            [
                'name' => 'Summit Strategy Group',
                'title' => 'Management Consulting Firm',
                'email' => 'info@summitstrategy.com',
                'phone' => '+966-50-555-4001',
                'address' => 'King Fahd Road, Tower 5',
                'city' => 'Riyadh',
                'country' => 'Saudi Arabia',
                'zip' => '11564',
                'company_size' => '10-50',
                'website' => 'https://summitstrategy.com',
                'linkedin' => 'https://linkedin.com/company/summitstrategy',
                'founding_year' => 2015,
                'is_company' => 1,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['Strategy Consulting', 'Operations Consulting', 'Digital Transformation', 'Financial Advisory'],
                'services' => [
                    ['name' => 'Digital Transformation Consulting', 'price' => 15000, 'level' => 95, 'years_experience' => 10, 'details' => 'End-to-end digital transformation strategy and implementation. We help organizations modernize their operations, processes, and customer experiences.', 'skills' => ['Digital Strategy', 'Change Management', 'Process Optimization', 'Technology Assessment']],
                    ['name' => 'Business Strategy Development', 'price' => 10000, 'level' => 92, 'years_experience' => 12, 'details' => 'Strategic planning and market analysis to help your business grow. Includes competitive analysis, market entry strategies, and growth roadmaps.', 'skills' => ['Strategic Planning', 'Market Analysis', 'Financial Modeling', 'Competitive Intelligence']],
                ],
            ],
            [
                'name' => 'FrameForge Media',
                'title' => 'Video & Media Production House',
                'email' => 'create@frameforge.tv',
                'phone' => '+20-122-555-5001',
                'address' => 'Maadi, Street 9',
                'city' => 'Cairo',
                'country' => 'Egypt',
                'zip' => '11728',
                'company_size' => '10-50',
                'website' => 'https://frameforge.tv',
                'youtube' => 'https://youtube.com/frameforge',
                'instagram' => 'https://instagram.com/frameforge',
                'founding_year' => 2017,
                'is_company' => 1,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['Video Production', 'Photography', 'Animation', 'Live Streaming'],
                'services' => [
                    ['name' => 'Corporate Video Production', 'price' => 5000, 'level' => 93, 'years_experience' => 8, 'details' => 'Professional video production from concept to final edit. Corporate films, promotional videos, product demos, and testimonial videos.', 'skills' => ['Cinematography', 'Video Editing', 'Color Grading', 'Sound Design', 'Storyboarding']],
                    ['name' => '2D/3D Animation', 'price' => 4000, 'level' => 88, 'years_experience' => 5, 'details' => 'Engaging animated content including explainer videos, motion graphics, character animation, and product visualizations.', 'skills' => ['After Effects', 'Cinema 4D', 'Blender', 'Motion Graphics']],
                    ['name' => 'Event Photography & Videography', 'price' => 2000, 'level' => 90, 'years_experience' => 7, 'details' => 'Full event coverage with professional photography and videography. Same-day highlights available.', 'skills' => ['Photography', 'Videography', 'Drone Footage', 'Live Editing']],
                ],
            ],
            [
                'name' => 'Sarah Mitchell',
                'title' => 'Senior UX Designer',
                'email' => 'sarah@sarahmitchell.design',
                'phone' => '+1-555-6001',
                'city' => 'San Francisco',
                'country' => 'USA',
                'company_size' => '1',
                'website' => 'https://sarahmitchell.design',
                'linkedin' => 'https://linkedin.com/in/sarahmitchell',
                'founding_year' => 2020,
                'is_company' => 0,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['UI/UX Design', 'Brand Identity'],
                'services' => [
                    ['name' => 'UX Research & Strategy', 'price' => 3000, 'level' => 92, 'years_experience' => 8, 'details' => 'In-depth user research, persona development, user journey mapping, and UX strategy that drives measurable improvements in user satisfaction and conversion.', 'skills' => ['User Research', 'Persona Development', 'Journey Mapping', 'A/B Testing', 'Analytics']],
                    ['name' => 'Product Design', 'price' => 4500, 'level' => 95, 'years_experience' => 8, 'details' => 'End-to-end product design from discovery to delivery. Wireframes, interactive prototypes, design systems, and developer handoff.', 'skills' => ['Figma', 'Design Systems', 'Prototyping', 'Interaction Design']],
                ],
            ],
            [
                'name' => 'Ahmed Al-Rashid',
                'title' => 'Full-Stack Developer',
                'email' => 'ahmed@alrashid.dev',
                'phone' => '+962-79-555-7001',
                'city' => 'Amman',
                'country' => 'Jordan',
                'company_size' => '1',
                'website' => 'https://alrashid.dev',
                'linkedin' => 'https://linkedin.com/in/ahmedalrashid',
                'founding_year' => 2019,
                'is_company' => 0,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['Web Development', 'Mobile App Development', 'API Development'],
                'services' => [
                    ['name' => 'Laravel Application Development', 'price' => 4000, 'level' => 95, 'years_experience' => 7, 'details' => 'Expert Laravel development for web applications, APIs, and SaaS products. Clean architecture, test-driven development, and performance optimization.', 'skills' => ['Laravel', 'PHP', 'MySQL', 'Redis', 'TDD']],
                    ['name' => 'React/Next.js Frontend Development', 'price' => 3500, 'level' => 88, 'years_experience' => 5, 'details' => 'Modern frontend development with React and Next.js. Server-side rendering, state management, and responsive design.', 'skills' => ['React', 'Next.js', 'TypeScript', 'Tailwind CSS']],
                ],
            ],
            [
                'name' => 'NexaGrowth Digital',
                'title' => 'Growth Marketing Agency',
                'email' => 'grow@nexagrowth.com',
                'phone' => '+971-55-555-8001',
                'address' => 'Abu Dhabi Global Market, Tower 3',
                'city' => 'Abu Dhabi',
                'country' => 'UAE',
                'zip' => '111000',
                'company_size' => '10-50',
                'website' => 'https://nexagrowth.com',
                'linkedin' => 'https://linkedin.com/company/nexagrowth',
                'founding_year' => 2020,
                'is_company' => 1,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['SEO', 'Content Marketing', 'Marketing Strategy', 'Email Marketing'],
                'services' => [
                    ['name' => 'Growth Hacking & Experimentation', 'price' => 3500, 'level' => 90, 'years_experience' => 5, 'details' => 'Data-driven growth strategies with rapid experimentation cycles. We identify and optimize the most impactful growth levers for your business.', 'skills' => ['Growth Strategy', 'A/B Testing', 'Analytics', 'Funnel Optimization']],
                    ['name' => 'Content Marketing Strategy', 'price' => 2500, 'level' => 88, 'years_experience' => 4, 'details' => 'Full content strategy development and execution. Blog content, whitepapers, case studies, and thought leadership pieces.', 'skills' => ['Content Strategy', 'SEO Writing', 'Editorial Planning', 'Content Distribution']],
                ],
            ],
            [
                'name' => 'BlueArc Architecture',
                'title' => 'Architecture & Design Firm',
                'email' => 'studio@bluearc.com',
                'phone' => '+20-100-555-9001',
                'address' => 'New Cairo, 5th Settlement',
                'city' => 'Cairo',
                'country' => 'Egypt',
                'zip' => '11835',
                'company_size' => '10-50',
                'website' => 'https://bluearc.com',
                'instagram' => 'https://instagram.com/bluearc',
                'founding_year' => 2014,
                'is_company' => 1,
                'is_active' => 1,
                'is_verified' => 1,
                'subcategories' => ['Architectural Design', 'Interior Design', '3D Visualization', 'Space Planning'],
                'services' => [
                    ['name' => 'Architectural Design', 'price' => 20000, 'level' => 96, 'years_experience' => 12, 'details' => 'Full architectural design services from concept through construction documents. Residential, commercial, and mixed-use projects.', 'skills' => ['AutoCAD', 'Revit', 'SketchUp', 'Sustainable Design']],
                    ['name' => '3D Visualization & Rendering', 'price' => 3000, 'level' => 92, 'years_experience' => 8, 'details' => 'Photorealistic 3D renders, walkthroughs, and virtual tours for architectural and interior design projects.', 'skills' => ['3ds Max', 'V-Ray', 'Lumion', 'Unreal Engine']],
                    ['name' => 'Interior Design', 'price' => 8000, 'level' => 90, 'years_experience' => 10, 'details' => 'Complete interior design services including space planning, material selection, furniture specification, and project supervision.', 'skills' => ['Space Planning', 'Material Selection', 'Furniture Design', 'Lighting Design']],
                ],
            ],
            [
                'name' => 'Maria Santos',
                'title' => 'Content Strategist & Writer',
                'email' => 'maria@mariasantos.co',
                'phone' => '+1-555-0010',
                'city' => 'Toronto',
                'country' => 'Canada',
                'company_size' => '1',
                'website' => 'https://mariasantos.co',
                'linkedin' => 'https://linkedin.com/in/mariasantos',
                'founding_year' => 2021,
                'is_company' => 0,
                'is_active' => 1,
                'is_verified' => 0,
                'subcategories' => ['Copywriting', 'Blog Writing', 'Content Marketing'],
                'services' => [
                    ['name' => 'Website Copywriting', 'price' => 1500, 'level' => 90, 'years_experience' => 6, 'details' => 'Compelling website copy that converts visitors into customers. Landing pages, about pages, service descriptions, and CTAs.', 'skills' => ['Copywriting', 'SEO Writing', 'Conversion Optimization', 'Brand Voice']],
                    ['name' => 'Blog Content Creation', 'price' => 800, 'level' => 92, 'years_experience' => 7, 'details' => 'SEO-optimized blog posts and articles that drive organic traffic and establish thought leadership.', 'skills' => ['Blog Writing', 'SEO', 'Research', 'Storytelling']],
                ],
            ],
        ];

        foreach ($clients as $data) {
            $subcatNames = $data['subcategories'];
            $servicesData = $data['services'];
            unset($data['subcategories'], $data['services']);

            $client = Client::create(array_merge($data, [
                'password' => bcrypt('password'),
                'email_verified_at' => $data['is_verified'] ? now() : null,
                'last_seen' => now()->subHours(rand(1, 72)),
                'is_decision_maker' => 1,
            ]));

            // Assign role
            if ($data['is_company']) {
                $client->assignRole('agency');
            } else {
                $client->assignRole('freelancer');
            }

            // Link subcategories
            $subcatIds = $subcategories->whereIn('name', $subcatNames)->pluck('id');
            $client->subcategories()->attach($subcatIds);

            // Create services and link to matching subcategories
            foreach ($servicesData as $serviceData) {
                $skills = $serviceData['skills'];
                unset($serviceData['skills']);

                $service = Service::create(array_merge($serviceData, [
                    'client_id' => $client->id,
                    'slug' => Str::slug($serviceData['name']),
                    'skills' => json_encode($skills),
                    'is_active' => 1,
                ]));

                // Link service to matching subcategories
                $matchingSubcats = $subcatIds->random(min(2, $subcatIds->count()));
                $service->subcategories()->attach($matchingSubcats);
            }

            // Create subscription
            $startDate = now()->subMonths(rand(1, 6));
            Subscription::create([
                'client_id' => $client->id,
                'starts_at' => $startDate->format('Y-m-d'),
                'ends_at' => $startDate->copy()->addYear()->format('Y-m-d'),
                'price' => [49.99, 99.99, 199.99][rand(0, 2)],
                'billing_cycle' => ['monthly', 'yearly'][rand(0, 1)],
                'is_active' => 1,
                'is_paid' => 1,
            ]);
        }
    }
}

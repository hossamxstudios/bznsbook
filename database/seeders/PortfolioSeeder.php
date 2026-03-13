<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            // PixelCraft Studio
            'hello@pixelcraft.com' => [
                [
                    'name' => 'TechFlow Brand Identity',
                    'client_name' => 'TechFlow Inc.',
                    'details' => 'Complete brand identity design for a B2B SaaS company, including logo, color system, typography, iconography, and comprehensive brand guidelines.',
                    'challenge' => 'The client needed to differentiate themselves in a crowded SaaS market while maintaining a professional yet approachable brand personality.',
                    'solution' => 'We developed a modern, dynamic brand identity using geometric shapes and a vibrant color palette that conveys innovation and reliability.',
                    'date' => '2024-08-15',
                    'project_url' => 'https://pixelcraft.com/work/techflow',
                    'location' => 'Remote',
                    'expertise' => ['Brand Identity', 'Logo Design', 'Brand Guidelines'],
                    'type' => 'branding',
                ],
                [
                    'name' => 'FoodieApp UI/UX Redesign',
                    'client_name' => 'FoodieApp',
                    'details' => 'Complete redesign of a food delivery mobile app serving 100K+ users. Improved user experience resulted in a 40% increase in order completion rate.',
                    'challenge' => 'The existing app had a complex checkout process and poor navigation, leading to high cart abandonment rates.',
                    'solution' => 'Simplified the user journey from 7 steps to 3, redesigned the menu browsing experience, and introduced a quick reorder feature.',
                    'date' => '2024-11-20',
                    'project_url' => 'https://pixelcraft.com/work/foodieapp',
                    'location' => 'Cairo, Egypt',
                    'expertise' => ['UI/UX Design', 'Mobile Design', 'User Research'],
                    'type' => 'ui-ux',
                ],
                [
                    'name' => 'GreenEnergy Annual Report',
                    'client_name' => 'GreenEnergy Corp',
                    'details' => 'Design of a 48-page annual report featuring data visualization, infographics, and editorial photography for a renewable energy company.',
                    'challenge' => 'Presenting complex financial and environmental data in an engaging, accessible format for diverse stakeholders.',
                    'solution' => 'Created a visually rich report with custom infographics, interactive PDF elements, and a cohesive design language that reflected the company\'s sustainability mission.',
                    'date' => '2025-01-10',
                    'project_url' => 'https://pixelcraft.com/work/greenenergy',
                    'location' => 'Dubai, UAE',
                    'expertise' => ['Print Design', 'Data Visualization', 'Editorial Design'],
                    'type' => 'print',
                ],
            ],
            // CodeNest Solutions
            'info@codenest.io' => [
                [
                    'name' => 'PayQuick Mobile Banking App',
                    'client_name' => 'PayQuick Financial',
                    'details' => 'Built a full-featured mobile banking application with account management, P2P transfers, bill payments, and investment portfolio tracking.',
                    'challenge' => 'Meeting strict financial security regulations while delivering a smooth, intuitive user experience across iOS and Android.',
                    'solution' => 'Developed using Flutter for cross-platform consistency, implemented biometric auth, end-to-end encryption, and PCI DSS compliance.',
                    'date' => '2024-06-20',
                    'project_url' => 'https://codenest.io/portfolio/payquick',
                    'location' => 'Dubai, UAE',
                    'expertise' => ['Mobile Development', 'FinTech', 'Flutter', 'Security'],
                    'type' => 'mobile-app',
                ],
                [
                    'name' => 'ShopSphere E-commerce Platform',
                    'client_name' => 'ShopSphere',
                    'details' => 'Custom e-commerce platform handling 10K+ daily transactions with real-time inventory, multi-vendor support, and advanced analytics dashboard.',
                    'challenge' => 'Scaling an existing monolithic system to handle growing traffic and multiple vendor operations without downtime.',
                    'solution' => 'Migrated to a microservices architecture using Laravel and Vue.js, implemented Redis caching and queue workers for optimal performance.',
                    'date' => '2024-09-15',
                    'project_url' => 'https://codenest.io/portfolio/shopsphere',
                    'location' => 'Remote',
                    'expertise' => ['Web Development', 'E-commerce', 'Laravel', 'Vue.js'],
                    'type' => 'web-app',
                ],
            ],
            // BrightWave Marketing
            'contact@brightwave.agency' => [
                [
                    'name' => 'MedCare SEO Growth Campaign',
                    'client_name' => 'MedCare Plus',
                    'details' => 'Comprehensive SEO campaign that increased organic traffic by 280% and generated 150+ qualified leads per month for a healthcare company.',
                    'challenge' => 'The client had zero organic visibility in a highly competitive healthcare market dominated by established players.',
                    'solution' => 'Implemented a multi-phase SEO strategy including technical optimization, content hub creation, local SEO, and strategic link building.',
                    'date' => '2024-10-05',
                    'project_url' => 'https://brightwave.agency/work/medcare',
                    'location' => 'Cairo, Egypt',
                    'expertise' => ['SEO', 'Content Strategy', 'Healthcare Marketing'],
                    'type' => 'seo',
                ],
                [
                    'name' => 'EduSpark Social Media Launch',
                    'client_name' => 'EduSpark Academy',
                    'details' => 'Social media launch campaign across Instagram, LinkedIn, and TikTok that built a 25K+ following and 500+ course enrollments in the first quarter.',
                    'challenge' => 'Launching a new EdTech brand from zero social presence in a market saturated with educational content.',
                    'solution' => 'Created a content strategy focused on bite-sized educational clips, student testimonials, and interactive challenges that drove viral engagement.',
                    'date' => '2025-01-20',
                    'project_url' => 'https://brightwave.agency/work/eduspark',
                    'location' => 'Dubai, UAE',
                    'expertise' => ['Social Media', 'Content Marketing', 'EdTech'],
                    'type' => 'social-media',
                ],
            ],
            // FrameForge Media
            'create@frameforge.tv' => [
                [
                    'name' => 'Sunrise Hotels Brand Film',
                    'client_name' => 'Sunrise Hotels & Resorts',
                    'details' => 'Cinematic brand film showcasing luxury resort properties across Egypt, featuring drone cinematography, interviews, and lifestyle footage.',
                    'challenge' => 'Capturing the essence of a luxury hospitality brand across 4 locations in 10 shooting days with consistent visual quality.',
                    'solution' => 'Deployed a professional crew with RED camera equipment, drone operators, and coordinated logistics across all properties for seamless production.',
                    'date' => '2024-12-01',
                    'project_url' => 'https://frameforge.tv/work/sunrise',
                    'location' => 'Multiple locations, Egypt',
                    'expertise' => ['Video Production', 'Cinematography', 'Drone Footage', 'Hospitality'],
                    'type' => 'video',
                ],
                [
                    'name' => 'NovaTech Product Animation',
                    'client_name' => 'NovaTech Electronics',
                    'details' => 'Series of 5 product animation videos for a consumer electronics brand, featuring detailed 3D renders and motion graphics.',
                    'challenge' => 'Creating visually stunning product reveals that highlight technical features without access to physical product prototypes.',
                    'solution' => 'Used CAD files to build photorealistic 3D models, created dynamic camera animations, and added informative motion graphics overlays.',
                    'date' => '2025-02-15',
                    'project_url' => 'https://frameforge.tv/work/novatech',
                    'location' => 'Remote',
                    'expertise' => ['Animation', '3D Modeling', 'Motion Graphics', 'Product Visualization'],
                    'type' => 'animation',
                ],
            ],
            // Sarah Mitchell (freelancer)
            'sarah@sarahmitchell.design' => [
                [
                    'name' => 'HealthTrack Wellness App',
                    'client_name' => 'HealthTrack Inc.',
                    'details' => 'End-to-end product design for a wellness tracking app. Conducted user research with 50+ participants, created design system, and delivered production-ready designs.',
                    'challenge' => 'Designing an app that feels personal and motivating while handling complex health data visualization.',
                    'solution' => 'Developed a warm, accessible design language with customizable dashboards and gamification elements that increased daily active users by 65%.',
                    'date' => '2024-07-10',
                    'project_url' => 'https://sarahmitchell.design/healthtrack',
                    'location' => 'Remote',
                    'expertise' => ['Product Design', 'UX Research', 'Design Systems', 'Health Tech'],
                    'type' => 'product-design',
                ],
            ],
            // BlueArc Architecture
            'studio@bluearc.com' => [
                [
                    'name' => 'Palm Hills Luxury Residence',
                    'client_name' => 'Palm Hills Developments',
                    'details' => 'Architectural and interior design for a 800 sqm luxury residence featuring modern minimalist aesthetics with traditional Egyptian design elements.',
                    'challenge' => 'Blending contemporary minimalist architecture with client\'s desire for cultural identity and warm hospitality spaces.',
                    'solution' => 'Created a design that uses clean lines and open spaces while incorporating traditional mashrabiya patterns, natural stone, and locally sourced materials.',
                    'date' => '2024-05-20',
                    'project_url' => 'https://bluearc.com/projects/palmhills',
                    'location' => 'New Cairo, Egypt',
                    'expertise' => ['Architectural Design', 'Interior Design', '3D Visualization'],
                    'type' => 'architecture',
                ],
                [
                    'name' => 'Nile View Co-working Space',
                    'client_name' => 'WorkHub Co.',
                    'details' => 'Design of a 2000 sqm co-working space on the Nile with flexible work areas, meeting rooms, event space, and a rooftop lounge.',
                    'challenge' => 'Maximizing the Nile views while creating diverse work zones that accommodate different work styles and maintain acoustic comfort.',
                    'solution' => 'Designed an open-plan layout with floor-to-ceiling glass walls, acoustic pods for focused work, and a terraced outdoor work area overlooking the Nile.',
                    'date' => '2025-01-05',
                    'project_url' => 'https://bluearc.com/projects/nileview',
                    'location' => 'Zamalek, Cairo',
                    'expertise' => ['Interior Design', 'Space Planning', 'Commercial Design'],
                    'type' => 'interior',
                ],
            ],
        ];

        foreach ($portfolios as $clientEmail => $items) {
            $client = Client::where('email', $clientEmail)->first();
            if (!$client) continue;

            $clientServices = Service::where('client_id', $client->id)->pluck('id');

            foreach ($items as $item) {
                $expertise = $item['expertise'];
                unset($item['expertise']);

                $portfolio = Portfolio::create(array_merge($item, [
                    'client_id' => $client->id,
                    'slug' => Str::slug($item['name']),
                    'expertise' => json_encode($expertise),
                ]));

                // Link to client's services
                if ($clientServices->count() > 0) {
                    $portfolio->services()->attach(
                        $clientServices->random(min(2, $clientServices->count()))
                    );
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Client;
use App\Models\Project;
use App\Models\Seat;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $clients = Client::all();
        $pixelCraft = $clients->firstWhere('email', 'hello@pixelcraft.com');
        $codeNest = $clients->firstWhere('email', 'info@codenest.io');
        $brightWave = $clients->firstWhere('email', 'contact@brightwave.agency');
        $frameForge = $clients->firstWhere('email', 'create@frameforge.tv');
        $summit = $clients->firstWhere('email', 'info@summitstrategy.com');
        $blueArc = $clients->firstWhere('email', 'studio@bluearc.com');

        $projects = [
            [
                'client' => $pixelCraft,
                'name' => 'E-commerce Platform Redesign',
                'details' => 'We need a complete UI/UX redesign for our e-commerce platform. The current design is outdated and conversion rates are dropping. Looking for a team that can handle user research, wireframing, visual design, and prototyping. The platform serves 50K+ monthly active users.',
                'skills' => ['UI/UX Design', 'E-commerce', 'User Research', 'Figma', 'Prototyping'],
                'more_details' => 'The project includes redesigning the product catalog, checkout flow, user dashboard, and mobile responsive views. We expect a modern, clean design that follows current e-commerce best practices.',
                'budget_min' => 5000,
                'budget_max' => 15000,
                'location' => 'Remote',
                'status' => 'active',
                'is_active' => 1,
                'applicants' => [$codeNest, $clients->firstWhere('email', 'sarah@sarahmitchell.design'), $clients->firstWhere('email', 'ahmed@alrashid.dev')],
            ],
            [
                'client' => $codeNest,
                'name' => 'Mobile Banking Application',
                'details' => 'Developing a mobile banking app for a fintech startup. The app needs to support account management, transfers, bill payments, and investment tracking. Must comply with financial regulations and security standards.',
                'skills' => ['Flutter', 'React Native', 'FinTech', 'API Integration', 'Security'],
                'more_details' => 'The app should support biometric authentication, push notifications, transaction history, and real-time balance updates. Integration with existing banking APIs is required.',
                'budget_min' => 20000,
                'budget_max' => 50000,
                'location' => 'Dubai, UAE',
                'status' => 'active',
                'is_active' => 1,
                'applicants' => [$clients->firstWhere('email', 'ahmed@alrashid.dev')],
            ],
            [
                'client' => $brightWave,
                'name' => 'SEO Campaign for Healthcare Startup',
                'details' => 'Looking for an experienced SEO specialist or agency to help a healthcare startup improve organic search visibility. The website is 6 months old with minimal organic traffic. Need comprehensive SEO strategy and execution.',
                'skills' => ['SEO', 'Content Strategy', 'Healthcare', 'Technical SEO', 'Link Building'],
                'more_details' => 'Target markets are Egypt, UAE, and Saudi Arabia. Content should be in both English and Arabic. Monthly reporting and analytics required.',
                'budget_min' => 2000,
                'budget_max' => 5000,
                'location' => 'Remote',
                'status' => 'active',
                'is_active' => 1,
                'applicants' => [$clients->firstWhere('email', 'grow@nexagrowth.com'), $clients->firstWhere('email', 'maria@mariasantos.co')],
            ],
            [
                'client' => $frameForge,
                'name' => 'Corporate Video Series Production',
                'details' => 'Producing a series of 6 corporate videos for a multinational company. Each video will be 3-5 minutes covering different aspects of the company: culture, innovation, sustainability, community, leadership, and vision.',
                'skills' => ['Video Production', 'Cinematography', 'Scriptwriting', 'Post-Production'],
                'more_details' => 'Videos will be shot at multiple locations in Cairo and Dubai. Professional equipment, crew, and post-production including color grading, motion graphics, and sound design.',
                'budget_min' => 15000,
                'budget_max' => 30000,
                'location' => 'Cairo & Dubai',
                'status' => 'awarded',
                'is_active' => 0,
                'winner_id' => null, // Will be set after creation
                'applicants' => [$pixelCraft],
            ],
            [
                'client' => $blueArc,
                'name' => 'Luxury Villa Interior Design',
                'details' => 'Complete interior design for a luxury villa in New Cairo. The project includes living areas, bedrooms, kitchen, bathrooms, outdoor spaces, and a home office. Modern minimalist style with warm accents.',
                'skills' => ['Interior Design', 'Space Planning', '3D Visualization', 'Furniture Selection'],
                'more_details' => 'Total area is approximately 600 sqm. The client expects 3D visualizations before execution. Budget includes design fees only, not materials or furniture procurement.',
                'budget_min' => 25000,
                'budget_max' => 45000,
                'location' => 'New Cairo, Egypt',
                'status' => 'completed',
                'is_active' => 0,
                'applicants' => [],
            ],
            [
                'client' => $summit,
                'name' => 'Digital Transformation Strategy for Retail Chain',
                'details' => 'A major retail chain with 50+ stores needs a comprehensive digital transformation strategy. The project covers e-commerce integration, inventory management modernization, customer data platform, and staff training programs.',
                'skills' => ['Digital Strategy', 'Retail', 'Change Management', 'E-commerce', 'Data Analytics'],
                'more_details' => 'The client operates across Saudi Arabia and UAE. The strategy should include a phased implementation roadmap spanning 18 months with clear KPIs and milestones.',
                'budget_min' => 30000,
                'budget_max' => 80000,
                'location' => 'Riyadh, Saudi Arabia',
                'status' => 'pending',
                'is_active' => 0,
                'applicants' => [$codeNest, $brightWave, $clients->firstWhere('email', 'grow@nexagrowth.com')],
            ],
        ];

        foreach ($projects as $projectData) {
            $client = $projectData['client'];
            $applicants = $projectData['applicants'];
            $winnerId = $projectData['winner_id'] ?? null;
            unset($projectData['client'], $projectData['applicants'], $projectData['winner_id']);

            $project = Project::create(array_merge($projectData, [
                'client_id' => $client->id,
                'slug' => Str::slug($projectData['name']),
                'skills' => json_encode($projectData['skills']),
                'winner_id' => $winnerId,
            ]));

            // Link services
            $clientServices = Service::where('client_id', $client->id)->take(2)->pluck('id');
            $project->services()->attach($clientServices);

            // Create batch with seats for applicants
            if (count($applicants) > 0) {
                $batch = Batch::create([
                    'client_id' => $client->id,
                    'project_id' => $project->id,
                    'name' => 'Batch 1',
                    'number' => 1,
                    'is_active' => $projectData['status'] === 'active' ? 1 : 0,
                ]);

                foreach ($applicants as $applicant) {
                    if (!$applicant) continue;

                    $statuses = ['pending', 'pending', 'contacted', 'proposal', 'accepted'];
                    $status = $statuses[array_rand($statuses)];

                    Seat::create([
                        'batch_id' => $batch->id,
                        'client_id' => $applicant->id,
                        'budget_min' => $projectData['budget_min'] * 0.8,
                        'budget_max' => $projectData['budget_max'] * 0.9,
                        'motivation' => 'We are excited about this project and believe our team has the perfect skill set to deliver outstanding results. Our experience with similar projects ensures we can meet your expectations.',
                        'experience' => 'We have completed over 20 similar projects in the past 3 years with a 95% client satisfaction rate.',
                        'timeline' => rand(4, 16),
                        'notes' => 'Available to start immediately.',
                        'status' => $status,
                        'is_applied' => 1,
                        'is_contacted' => in_array($status, ['contacted', 'proposal', 'accepted']) ? 1 : 0,
                        'is_proposal' => in_array($status, ['proposal', 'accepted']) ? 1 : 0,
                        'is_accepted' => $status === 'accepted' ? 1 : 0,
                        'is_rejected' => 0,
                    ]);
                }

                // Set winner for awarded project
                if ($projectData['status'] === 'awarded' && count($applicants) > 0) {
                    $winner = $applicants[0];
                    if ($winner) {
                        $project->update(['winner_id' => $winner->id]);
                    }
                }
            }
        }
    }
}

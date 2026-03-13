<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Complain;
use App\Models\Demand;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Database\Seeder;

class MarketplaceSeeder extends Seeder
{
    public function run(): void
    {
        $clients = Client::all();

        // --- Service Demands (cross-client requests) ---
        $demands = [
            [
                'from_email' => 'info@codenest.io',
                'to_email' => 'hello@pixelcraft.com',
                'service_name' => 'Brand Identity Design',
                'details' => 'We are launching a new product line and need a complete brand identity package including logo, color palette, typography guidelines, and brand book. Timeline is 6 weeks.',
                'budget_min' => 2000,
                'budget_max' => 4000,
                'weeks' => 6,
                'start_date' => now()->addWeeks(2)->format('Y-m-d'),
                'is_accepted' => 1,
                'is_rejected' => 0,
                'is_completed' => 0,
            ],
            [
                'from_email' => 'hello@pixelcraft.com',
                'to_email' => 'info@codenest.io',
                'service_name' => 'Custom Web Application Development',
                'details' => 'We need a client portal built for our design agency. Features include project tracking, file sharing, invoicing, and client feedback tools.',
                'budget_min' => 6000,
                'budget_max' => 10000,
                'weeks' => 10,
                'start_date' => now()->addWeeks(1)->format('Y-m-d'),
                'is_accepted' => 1,
                'is_rejected' => 0,
                'is_completed' => 1,
            ],
            [
                'from_email' => 'grow@nexagrowth.com',
                'to_email' => 'contact@brightwave.agency',
                'service_name' => 'SEO Strategy & Implementation',
                'details' => 'We have a client who needs urgent SEO help. Their website traffic dropped 60% after a Google algorithm update. Need a recovery strategy and implementation.',
                'budget_min' => 1500,
                'budget_max' => 3000,
                'weeks' => 8,
                'start_date' => now()->addDays(5)->format('Y-m-d'),
                'is_accepted' => 0,
                'is_rejected' => 0,
                'is_completed' => 0,
            ],
            [
                'from_email' => 'studio@bluearc.com',
                'to_email' => 'create@frameforge.tv',
                'service_name' => 'Corporate Video Production',
                'details' => 'We need a professional video walkthrough of our latest architectural project for our portfolio and client presentations. 3-4 minute video with drone footage.',
                'budget_min' => 3000,
                'budget_max' => 5000,
                'weeks' => 3,
                'start_date' => now()->addWeeks(3)->format('Y-m-d'),
                'is_accepted' => 1,
                'is_rejected' => 0,
                'is_completed' => 0,
            ],
            [
                'from_email' => 'sarah@sarahmitchell.design',
                'to_email' => 'ahmed@alrashid.dev',
                'service_name' => 'Laravel Application Development',
                'details' => 'I have a client who needs their approved UX designs implemented. It is a dashboard application with charts, data tables, and user management. I will provide all Figma files.',
                'budget_min' => 3000,
                'budget_max' => 5000,
                'weeks' => 6,
                'start_date' => now()->addWeeks(1)->format('Y-m-d'),
                'is_accepted' => 1,
                'is_rejected' => 0,
                'is_completed' => 0,
            ],
            [
                'from_email' => 'info@summitstrategy.com',
                'to_email' => 'maria@mariasantos.co',
                'service_name' => 'Website Copywriting',
                'details' => 'We are revamping our website and need professional copywriting for all pages. Approximately 12 pages including home, about, services, case studies, and team bios.',
                'budget_min' => 1200,
                'budget_max' => 2000,
                'weeks' => 4,
                'start_date' => now()->addWeeks(2)->format('Y-m-d'),
                'is_accepted' => 0,
                'is_rejected' => 1,
                'is_completed' => 0,
            ],
        ];

        foreach ($demands as $demandData) {
            $fromClient = Client::where('email', $demandData['from_email'])->first();
            $toClient = Client::where('email', $demandData['to_email'])->first();
            $service = Service::where('client_id', $toClient->id)
                ->where('name', $demandData['service_name'])
                ->first();

            if (!$fromClient || !$toClient || !$service) continue;

            unset($demandData['from_email'], $demandData['to_email'], $demandData['service_name']);

            Demand::create(array_merge($demandData, [
                'from_client_id' => $fromClient->id,
                'to_client_id' => $toClient->id,
                'service_id' => $service->id,
            ]));
        }

        // --- Reviews (on completed demands) ---
        $completedDemands = Demand::where('is_completed', 1)->get();
        foreach ($completedDemands as $demand) {
            Review::create([
                'client_id' => $demand->from_client_id,
                'reviewable_type' => 'App\\Models\\Demand',
                'reviewable_id' => $demand->id,
                'content' => 'Exceptional work! The team delivered beyond our expectations. Communication was clear throughout the project, deadlines were met, and the quality was outstanding. Highly recommended.',
                'rating' => 5,
                'is_approved' => 1,
            ]);
        }

        // Additional reviews on clients (agencies)
        $reviewData = [
            ['reviewer' => 'sarah@sarahmitchell.design', 'target' => 'hello@pixelcraft.com', 'content' => 'PixelCraft is a top-notch design agency. Their attention to detail and creative vision is unmatched. I have referred several clients to them and the feedback has always been positive.', 'rating' => 5],
            ['reviewer' => 'hello@pixelcraft.com', 'target' => 'info@codenest.io', 'content' => 'CodeNest delivered our client portal project on time and within budget. The code quality is excellent and they were very responsive to feedback. Will work with them again.', 'rating' => 5],
            ['reviewer' => 'ahmed@alrashid.dev', 'target' => 'info@codenest.io', 'content' => 'Great team to collaborate with. They have strong technical skills and good project management processes. The only improvement would be faster initial response times.', 'rating' => 4],
            ['reviewer' => 'grow@nexagrowth.com', 'target' => 'contact@brightwave.agency', 'content' => 'BrightWave helped us with a complex SEO campaign. They are knowledgeable and data-driven. Results took a bit longer than expected but were solid in the end.', 'rating' => 4],
            ['reviewer' => 'studio@bluearc.com', 'target' => 'create@frameforge.tv', 'content' => 'FrameForge produced stunning video content for our architectural projects. The quality of cinematography and post-production is world-class.', 'rating' => 5],
            ['reviewer' => 'info@codenest.io', 'target' => 'sarah@sarahmitchell.design', 'content' => 'Sarah is an incredibly talented UX designer. Her research-driven approach and attention to user needs resulted in a product our users love. Exceptional communication too.', 'rating' => 5],
            ['reviewer' => 'hello@pixelcraft.com', 'target' => 'maria@mariasantos.co', 'content' => 'Maria wrote excellent copy for our website redesign. She understood our brand voice quickly and delivered compelling content that our clients love.', 'rating' => 4],
            ['reviewer' => 'info@summitstrategy.com', 'target' => 'studio@bluearc.com', 'content' => 'BlueArc designed our new office space and it exceeded all expectations. The 3D visualizations were incredibly accurate to the final result. Professional and creative team.', 'rating' => 5],
        ];

        foreach ($reviewData as $data) {
            $reviewer = Client::where('email', $data['reviewer'])->first();
            $target = Client::where('email', $data['target'])->first();
            if (!$reviewer || !$target) continue;

            Review::create([
                'client_id' => $reviewer->id,
                'reviewable_type' => 'App\\Models\\Client',
                'reviewable_id' => $target->id,
                'content' => $data['content'],
                'rating' => $data['rating'],
                'is_approved' => 1,
            ]);
        }

        // --- Complains (just 1-2 for realism) ---
        $maria = Client::where('email', 'maria@mariasantos.co')->first();
        $summit = Client::where('email', 'info@summitstrategy.com')->first();
        if ($maria && $summit) {
            Complain::create([
                'from_client_id' => $maria->id,
                'to_client_id' => $summit->id,
                'content' => 'The service request was rejected without any explanation or feedback. I spent time preparing a detailed proposal and would have appreciated at least a brief reason for the rejection.',
            ]);
        }
    }
}

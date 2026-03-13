<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Deal;
use App\Models\Lead;
use App\Models\Log;
use App\Models\Note;
use App\Models\Pipeline;
use App\Models\Section;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Database\Seeder;

class CrmSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@bznsbook.com')->first();
        $manager = User::where('email', 'manager@bznsbook.com')->first();

        $salesPipeline = Pipeline::where('name', 'Sales Pipeline')->first();
        $marketingPipeline = Pipeline::where('name', 'Marketing Pipeline')->first();
        $partnershipPipeline = Pipeline::where('name', 'Partnership Pipeline')->first();

        $companies = Company::with('contacts')->get();
        $sections = Section::all();

        // --- Deals ---
        $dealsData = [
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Negotiation',
                'company_name' => 'TechVista Solutions',
                'name' => 'TechVista Platform Subscription',
                'amount' => 25000,
                'is_paid' => 0,
            ],
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Closed Won',
                'company_name' => 'GreenLeaf Organics',
                'name' => 'GreenLeaf Website Redesign',
                'amount' => 12000,
                'is_paid' => 1,
                'closed_at' => now()->subDays(15),
            ],
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Proposal',
                'company_name' => 'MedCare Plus',
                'name' => 'MedCare Digital Marketing Package',
                'amount' => 8500,
                'is_paid' => 0,
            ],
            [
                'pipeline' => $marketingPipeline,
                'stage_name' => 'Consideration',
                'company_name' => 'EduSpark Academy',
                'name' => 'EduSpark Content Strategy',
                'amount' => 6000,
                'is_paid' => 0,
            ],
            [
                'pipeline' => $marketingPipeline,
                'stage_name' => 'Conversion',
                'company_name' => 'Stellar Events Co',
                'name' => 'Stellar Events Branding Campaign',
                'amount' => 15000,
                'is_paid' => 1,
                'closed_at' => now()->subDays(30),
            ],
            [
                'pipeline' => $partnershipPipeline,
                'stage_name' => 'Discovery Meeting',
                'company_name' => 'FinanceFlow Corp',
                'name' => 'FinanceFlow Strategic Partnership',
                'amount' => 50000,
                'is_paid' => 0,
            ],
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Qualification',
                'company_name' => 'UrbanBuild Developments',
                'name' => 'UrbanBuild Portfolio Showcase',
                'amount' => 18000,
                'is_paid' => 0,
            ],
            [
                'pipeline' => $partnershipPipeline,
                'stage_name' => 'Signed',
                'company_name' => 'LegalEase Partners',
                'name' => 'LegalEase Referral Program',
                'amount' => 35000,
                'is_paid' => 1,
                'closed_at' => now()->subDays(7),
            ],
        ];

        foreach ($dealsData as $dealData) {
            $pipeline = $dealData['pipeline'];
            $stage = Stage::where('pipeline_id', $pipeline->id)
                ->where('name', $dealData['stage_name'])
                ->first();
            $company = $companies->firstWhere('name', $dealData['company_name']);

            $deal = Deal::create([
                'pipeline_id' => $pipeline->id,
                'stage_id' => $stage?->id,
                'company_id' => $company?->id,
                'name' => $dealData['name'],
                'amount' => $dealData['amount'],
                'is_paid' => $dealData['is_paid'],
                'closed_at' => $dealData['closed_at'] ?? null,
            ]);

            // Attach company and contacts to deal
            if ($company) {
                $deal->companies()->attach($company->id);
                $contacts = $company->contacts;
                if ($contacts->count() > 0) {
                    $deal->contacts()->attach($contacts->first()->id);
                }
            }

            // Add a note
            Note::create([
                'user_id' => $admin->id,
                'notable_type' => 'App\\Models\\Deal',
                'notable_id' => $deal->id,
                'details' => "Deal created for {$dealData['name']}. Initial contact established with {$dealData['company_name']}. Follow up scheduled for next week.",
            ]);

            // Add a log
            Log::create([
                'user_id' => $admin->id,
                'loggable_type' => 'App\\Models\\Deal',
                'loggable_id' => $deal->id,
                'title' => 'Deal Created',
                'details' => "New deal '{$dealData['name']}' worth \${$dealData['amount']} created in {$pipeline->name}.",
                'log_date' => now()->subDays(rand(1, 30)),
            ]);
        }

        // --- Leads ---
        $leadsData = [
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Prospecting',
                'company_name' => 'TechVista Solutions',
                'name' => 'Michael Torres',
                'email' => 'michael.torres@techvista.com',
                'phone' => '+1-555-1101',
                'title' => 'VP of Product',
                'company_email' => 'info@techvista.com',
                'company_size' => '50-100',
                'type' => 'inbound',
                'source' => 'website',
                'label' => 'hot',
            ],
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Qualification',
                'company_name' => 'GreenLeaf Organics',
                'name' => 'Emma Williams',
                'email' => 'emma.williams@greenleaf.com',
                'phone' => '+1-555-1201',
                'title' => 'Head of Digital',
                'company_email' => 'hello@greenleaf.com',
                'company_size' => '10-50',
                'type' => 'inbound',
                'source' => 'referral',
                'label' => 'warm',
            ],
            [
                'pipeline' => $marketingPipeline,
                'stage_name' => 'Interest',
                'company_name' => 'MedCare Plus',
                'name' => 'Dr. Layla Mahmoud',
                'email' => 'layla.mahmoud@medcareplus.com',
                'phone' => '+20-100-555-1301',
                'title' => 'Chief Marketing Officer',
                'company_email' => 'contact@medcareplus.com',
                'company_size' => '100-500',
                'type' => 'outbound',
                'source' => 'linkedin',
                'label' => 'warm',
            ],
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Proposal',
                'company_name' => 'UrbanBuild Developments',
                'name' => 'Kareem Mostafa',
                'email' => 'kareem.mostafa@urbanbuild.com',
                'phone' => '+20-100-555-1401',
                'title' => 'Project Manager',
                'company_email' => 'info@urbanbuild.com',
                'company_size' => '50-100',
                'type' => 'inbound',
                'source' => 'event',
                'label' => 'hot',
            ],
            [
                'pipeline' => $partnershipPipeline,
                'stage_name' => 'Initial Contact',
                'company_name' => 'EduSpark Academy',
                'name' => 'Hassan Jaber',
                'email' => 'hassan.jaber@eduspark.com',
                'phone' => '+971-55-555-1501',
                'title' => 'Business Development Manager',
                'company_email' => 'hello@eduspark.com',
                'company_size' => '10-50',
                'type' => 'outbound',
                'source' => 'cold outreach',
                'label' => 'cold',
            ],
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Negotiation',
                'name' => 'Rachel Park',
                'email' => 'rachel.park@innovatex.com',
                'phone' => '+1-555-1601',
                'title' => 'CEO',
                'company_name' => null,
                'company_email' => 'info@innovatex.com',
                'company_size' => '10-50',
                'type' => 'inbound',
                'source' => 'website',
                'label' => 'hot',
            ],
            [
                'pipeline' => $marketingPipeline,
                'stage_name' => 'Awareness',
                'name' => 'Tariq Al-Mansour',
                'email' => 'tariq@almansour-group.com',
                'phone' => '+966-50-555-1701',
                'title' => 'Marketing Director',
                'company_name' => null,
                'company_email' => 'info@almansour-group.com',
                'company_size' => '500+',
                'type' => 'outbound',
                'source' => 'referral',
                'label' => 'warm',
            ],
            [
                'pipeline' => $salesPipeline,
                'stage_name' => 'Closed Won',
                'company_name' => 'Stellar Events Co',
                'name' => 'Lina Farouk',
                'email' => 'lina.farouk@stellarevents.com',
                'phone' => '+20-100-555-1801',
                'title' => 'Event Director',
                'company_email' => 'book@stellarevents.com',
                'company_size' => '10-50',
                'type' => 'inbound',
                'source' => 'social media',
                'label' => 'hot',
                'last_contacted_at' => now()->subDays(3),
            ],
        ];

        foreach ($leadsData as $leadData) {
            $pipeline = $leadData['pipeline'];
            $stage = Stage::where('pipeline_id', $pipeline->id)
                ->where('name', $leadData['stage_name'])
                ->first();

            $company = null;
            $contact = null;
            $industry = null;

            if ($leadData['company_name']) {
                $company = $companies->firstWhere('name', $leadData['company_name']);
                if ($company) {
                    $contact = $company->contacts->first();
                    $industry = $company->industry_id;
                }
            }

            unset($leadData['pipeline'], $leadData['stage_name'], $leadData['company_name']);

            $lead = Lead::create(array_merge($leadData, [
                'pipeline_id' => $pipeline->id,
                'stage_id' => $stage?->id,
                'industry_id' => $industry,
                'company_id' => $company?->id,
                'contact_id' => $contact?->id,
                'last_contacted_at' => $leadData['last_contacted_at'] ?? now()->subDays(rand(1, 14)),
            ]));

            // Attach sections via DB (Lead model's sections() has wrong class reference)
            $randomSections = $sections->random(rand(1, 3));
            foreach ($randomSections as $section) {
                \DB::table('lead_section')->insert([
                    'lead_id' => $lead->id,
                    'section_id' => $section->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Add note from manager
            Note::create([
                'user_id' => $manager->id,
                'notable_type' => 'App\\Models\\Lead',
                'notable_id' => $lead->id,
                'details' => "Initial contact with {$leadData['name']}. They expressed interest in our services. Next step: schedule a discovery call.",
            ]);

            // Add log
            Log::create([
                'user_id' => $manager->id,
                'loggable_type' => 'App\\Models\\Lead',
                'loggable_id' => $lead->id,
                'title' => 'Lead Created',
                'details' => "New lead '{$leadData['name']}' ({$leadData['email']}) added from {$leadData['source']}.",
                'log_date' => now()->subDays(rand(1, 45)),
            ]);
        }

        // --- Additional Notes on Companies ---
        foreach ($companies->take(4) as $company) {
            Note::create([
                'user_id' => $admin->id,
                'notable_type' => 'App\\Models\\Company',
                'notable_id' => $company->id,
                'details' => "Initial meeting with {$company->name}. They are interested in our platform services. Key decision maker: {$company->decision_maker}. Follow up in 1 week.",
            ]);

            Log::create([
                'user_id' => $admin->id,
                'loggable_type' => 'App\\Models\\Company',
                'loggable_id' => $company->id,
                'title' => 'Company Added',
                'details' => "{$company->name} added to CRM from {$company->source} source.",
                'log_date' => now()->subDays(rand(5, 60)),
            ]);
        }
    }
}

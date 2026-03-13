<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Industry;
use App\Models\Section;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $industries = Industry::all();
        $sections = Section::all();

        $companies = [
            [
                'name' => 'TechVista Solutions',
                'industry' => 'Technology & IT',
                'email' => 'info@techvista.com',
                'decision_maker' => 'James Richardson',
                'website' => 'https://techvista.com',
                'capacity' => '50-100',
                'source' => 'referral',
                'contacts' => [
                    ['name' => 'James Richardson', 'email' => 'james@techvista.com', 'phone' => '+1-555-0101', 'title' => 'CEO', 'status' => 'active'],
                    ['name' => 'Linda Chen', 'email' => 'linda@techvista.com', 'phone' => '+1-555-0102', 'title' => 'CTO', 'status' => 'active'],
                ],
            ],
            [
                'name' => 'GreenLeaf Organics',
                'industry' => 'E-commerce & Retail',
                'email' => 'hello@greenleaf.com',
                'decision_maker' => 'Sara Thompson',
                'website' => 'https://greenleaf.com',
                'capacity' => '10-50',
                'source' => 'website',
                'contacts' => [
                    ['name' => 'Sara Thompson', 'email' => 'sara@greenleaf.com', 'phone' => '+1-555-0201', 'title' => 'Founder', 'status' => 'active'],
                    ['name' => 'Mike Johnson', 'email' => 'mike@greenleaf.com', 'phone' => '+1-555-0202', 'title' => 'Marketing Director', 'status' => 'active'],
                ],
            ],
            [
                'name' => 'MedCare Plus',
                'industry' => 'Healthcare & Medical',
                'email' => 'contact@medcareplus.com',
                'decision_maker' => 'Dr. Amira Hassan',
                'website' => 'https://medcareplus.com',
                'capacity' => '100-500',
                'source' => 'linkedin',
                'contacts' => [
                    ['name' => 'Dr. Amira Hassan', 'email' => 'amira@medcareplus.com', 'phone' => '+1-555-0301', 'title' => 'Medical Director', 'status' => 'active'],
                    ['name' => 'Robert Kim', 'email' => 'robert@medcareplus.com', 'phone' => '+1-555-0302', 'title' => 'IT Manager', 'status' => 'new'],
                ],
            ],
            [
                'name' => 'UrbanBuild Developments',
                'industry' => 'Real Estate & Construction',
                'email' => 'info@urbanbuild.com',
                'decision_maker' => 'Ahmed El-Sayed',
                'website' => 'https://urbanbuild.com',
                'capacity' => '50-100',
                'source' => 'event',
                'contacts' => [
                    ['name' => 'Ahmed El-Sayed', 'email' => 'ahmed@urbanbuild.com', 'phone' => '+20-100-555-0401', 'title' => 'Managing Director', 'status' => 'active'],
                ],
            ],
            [
                'name' => 'EduSpark Academy',
                'industry' => 'Education & Training',
                'email' => 'hello@eduspark.com',
                'decision_maker' => 'Fatima Al-Zahra',
                'website' => 'https://eduspark.com',
                'capacity' => '10-50',
                'source' => 'referral',
                'contacts' => [
                    ['name' => 'Fatima Al-Zahra', 'email' => 'fatima@eduspark.com', 'phone' => '+971-55-555-0501', 'title' => 'CEO', 'status' => 'active'],
                    ['name' => 'Omar Khalil', 'email' => 'omar@eduspark.com', 'phone' => '+971-55-555-0502', 'title' => 'Product Manager', 'status' => 'new'],
                ],
            ],
            [
                'name' => 'FinanceFlow Corp',
                'industry' => 'Finance & Accounting',
                'email' => 'info@financeflow.com',
                'decision_maker' => 'David Park',
                'website' => 'https://financeflow.com',
                'capacity' => '100-500',
                'source' => 'cold outreach',
                'contacts' => [
                    ['name' => 'David Park', 'email' => 'david@financeflow.com', 'phone' => '+1-555-0601', 'title' => 'VP Operations', 'status' => 'active'],
                ],
            ],
            [
                'name' => 'Stellar Events Co',
                'industry' => 'Hospitality & Tourism',
                'email' => 'book@stellarevents.com',
                'decision_maker' => 'Nadia Mansour',
                'website' => 'https://stellarevents.com',
                'capacity' => '10-50',
                'source' => 'social media',
                'contacts' => [
                    ['name' => 'Nadia Mansour', 'email' => 'nadia@stellarevents.com', 'phone' => '+20-100-555-0701', 'title' => 'Creative Director', 'status' => 'active'],
                    ['name' => 'Youssef Ibrahim', 'email' => 'youssef@stellarevents.com', 'phone' => '+20-100-555-0702', 'title' => 'Operations Manager', 'status' => 'active'],
                ],
            ],
            [
                'name' => 'LegalEase Partners',
                'industry' => 'Legal Services',
                'email' => 'info@legalease.com',
                'decision_maker' => 'Katherine Brooks',
                'website' => 'https://legalease.com',
                'capacity' => '10-50',
                'source' => 'referral',
                'contacts' => [
                    ['name' => 'Katherine Brooks', 'email' => 'katherine@legalease.com', 'phone' => '+1-555-0801', 'title' => 'Senior Partner', 'status' => 'active'],
                ],
            ],
        ];

        foreach ($companies as $companyData) {
            $industry = $industries->firstWhere('name', $companyData['industry']);

            $company = Company::create([
                'industry_id' => $industry?->id,
                'name' => $companyData['name'],
                'email' => $companyData['email'],
                'decision_maker' => $companyData['decision_maker'],
                'website' => $companyData['website'],
                'capacity' => $companyData['capacity'],
                'source' => $companyData['source'],
            ]);

            // Attach 2-3 random sections
            $company->sections()->attach($sections->random(rand(2, 3))->pluck('id'));

            foreach ($companyData['contacts'] as $contactData) {
                Contact::create(array_merge($contactData, [
                    'company_id' => $company->id,
                ]));
            }
        }
    }
}

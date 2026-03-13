<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = [
            'Technology & IT',
            'Marketing & Advertising',
            'Design & Creative',
            'Finance & Accounting',
            'Healthcare & Medical',
            'Education & Training',
            'Real Estate & Construction',
            'Legal Services',
            'Management Consulting',
            'Manufacturing & Industrial',
            'Media & Entertainment',
            'E-commerce & Retail',
            'Hospitality & Tourism',
            'Non-Profit & NGO',
            'Telecommunications',
        ];

        foreach ($industries as $name) {
            Industry::create(['name' => $name, 'is_active' => 1]);
        }
    }
}

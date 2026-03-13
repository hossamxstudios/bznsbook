<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['name' => 'About Us', 'details' => 'Company overview and mission statement'],
            ['name' => 'Our Services', 'details' => 'Core service offerings and capabilities'],
            ['name' => 'Our Work', 'details' => 'Portfolio and case studies showcase'],
            ['name' => 'Testimonials', 'details' => 'Client reviews and success stories'],
            ['name' => 'Team', 'details' => 'Team members and leadership'],
            ['name' => 'FAQ', 'details' => 'Frequently asked questions'],
            ['name' => 'Contact', 'details' => 'Contact information and inquiry form'],
            ['name' => 'Pricing', 'details' => 'Service pricing and packages'],
            ['name' => 'Process', 'details' => 'How we work methodology'],
            ['name' => 'Partners', 'details' => 'Strategic partnerships and affiliations'],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'AI & Machine Learning',
            'Blockchain',
            'Cloud Computing',
            'Mobile First',
            'E-commerce',
            'SaaS',
            'B2B',
            'B2C',
            'Startup',
            'Enterprise',
            'Healthcare Tech',
            'FinTech',
            'EdTech',
            'Sustainability',
            'Remote Work',
            'Agile',
            'Open Source',
            'Cybersecurity',
            'IoT',
            'AR/VR',
        ];

        foreach ($tags as $name) {
            Tag::create(['name' => $name]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Creative & Design' => [
                'Logo Design',
                'Brand Identity',
                'UI/UX Design',
                'Print Design',
                'Illustration',
                'Packaging Design',
                'Motion Graphics',
            ],
            'Digital Marketing' => [
                'SEO',
                'Social Media Marketing',
                'Content Marketing',
                'PPC Advertising',
                'Email Marketing',
                'Influencer Marketing',
                'Marketing Strategy',
            ],
            'Software Development' => [
                'Web Development',
                'Mobile App Development',
                'E-commerce Development',
                'SaaS Development',
                'API Development',
                'DevOps & Cloud',
                'QA & Testing',
            ],
            'Business Consulting' => [
                'Strategy Consulting',
                'Operations Consulting',
                'HR Consulting',
                'Financial Advisory',
                'Digital Transformation',
                'Change Management',
            ],
            'Media Production' => [
                'Video Production',
                'Photography',
                'Animation',
                'Podcast Production',
                'Audio Engineering',
                'Live Streaming',
            ],
            'Writing & Content' => [
                'Copywriting',
                'Technical Writing',
                'Blog Writing',
                'Ghostwriting',
                'Translation Services',
                'Script Writing',
            ],
            'Architecture & Interior' => [
                'Architectural Design',
                'Interior Design',
                '3D Visualization',
                'Landscape Design',
                'Space Planning',
            ],
            'Data & Analytics' => [
                'Data Analysis',
                'Business Intelligence',
                'Machine Learning',
                'Data Visualization',
                'Market Research',
            ],
        ];

        $materials = [
            'Logo Design' => [
                ['name' => 'Logo Design Brief Template', 'details' => 'A comprehensive template for gathering client requirements for logo projects.', 'link' => 'https://example.com/logo-brief'],
                ['name' => 'Color Psychology Guide', 'details' => 'Understanding color meanings in brand design.', 'link' => 'https://example.com/color-guide'],
            ],
            'UI/UX Design' => [
                ['name' => 'UX Research Checklist', 'details' => 'Step-by-step checklist for user research.', 'link' => 'https://example.com/ux-checklist'],
                ['name' => 'Wireframing Best Practices', 'details' => 'Guide to creating effective wireframes.', 'link' => 'https://example.com/wireframing'],
            ],
            'SEO' => [
                ['name' => 'SEO Audit Template', 'details' => 'Complete SEO audit checklist for websites.', 'link' => 'https://example.com/seo-audit'],
                ['name' => 'Keyword Research Guide', 'details' => 'How to conduct effective keyword research.', 'link' => 'https://example.com/keyword-guide'],
            ],
            'Web Development' => [
                ['name' => 'Web Dev Project Kickoff Template', 'details' => 'Template for starting web development projects.', 'link' => 'https://example.com/webdev-kickoff'],
                ['name' => 'Performance Optimization Guide', 'details' => 'Best practices for web performance.', 'link' => 'https://example.com/perf-guide'],
            ],
            'Video Production' => [
                ['name' => 'Video Production Brief', 'details' => 'Template for video project briefs.', 'link' => 'https://example.com/video-brief'],
            ],
            'Strategy Consulting' => [
                ['name' => 'SWOT Analysis Template', 'details' => 'Framework for strategic analysis.', 'link' => 'https://example.com/swot'],
            ],
        ];

        foreach ($categories as $categoryName => $subcategoryNames) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'details' => "Professional {$categoryName} services and solutions.",
            ]);

            foreach ($subcategoryNames as $subcategoryName) {
                $subcategory = Subcategory::create([
                    'category_id' => $category->id,
                    'name' => $subcategoryName,
                    'slug' => Str::slug($subcategoryName),
                    'details' => "{$subcategoryName} services under {$categoryName}.",
                ]);

                if (isset($materials[$subcategoryName])) {
                    foreach ($materials[$subcategoryName] as $material) {
                        Material::create([
                            'subcategory_id' => $subcategory->id,
                            'name' => $material['name'],
                            'slug' => Str::slug($material['name']),
                            'details' => $material['details'],
                            'link' => $material['link'],
                        ]);
                    }
                }
            }
        }
    }
}

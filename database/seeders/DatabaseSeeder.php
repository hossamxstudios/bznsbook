<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Order matters — respects foreign key dependencies.
     */
    public function run(): void
    {
        $this->call([
            // 1. Auth & Permissions
            RoleAndPermissionSeeder::class,
            UserSeeder::class,

            // 2. Lookup / reference tables
            IndustrySeeder::class,
            SectionSeeder::class,
            CategorySeeder::class,    // + subcategories + materials
            TagSeeder::class,

            // 3. CRM foundation
            PipelineSeeder::class,    // + stages
            CompanySeeder::class,     // + contacts

            // 4. Marketplace core
            ClientSeeder::class,      // + services + subscriptions
            ProjectSeeder::class,     // + batches + seats
            PortfolioSeeder::class,

            // 5. Marketplace interactions
            MarketplaceSeeder::class, // demands + reviews + complains

            // 6. CRM data
            CrmSeeder::class,         // deals + leads + notes + logs

            // 7. Content
            TopicAndBlogSeeder::class,
        ]);
    }
}

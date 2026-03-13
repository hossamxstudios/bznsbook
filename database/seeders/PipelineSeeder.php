<?php

namespace Database\Seeders;

use App\Models\Pipeline;
use App\Models\Stage;
use Illuminate\Database\Seeder;

class PipelineSeeder extends Seeder
{
    public function run(): void
    {
        $pipelines = [
            'Sales Pipeline' => [
                ['name' => 'Prospecting', 'percentage' => 10, 'place' => 1],
                ['name' => 'Qualification', 'percentage' => 25, 'place' => 2],
                ['name' => 'Proposal', 'percentage' => 50, 'place' => 3],
                ['name' => 'Negotiation', 'percentage' => 75, 'place' => 4],
                ['name' => 'Closed Won', 'percentage' => 100, 'place' => 5],
            ],
            'Marketing Pipeline' => [
                ['name' => 'Awareness', 'percentage' => 20, 'place' => 1],
                ['name' => 'Interest', 'percentage' => 40, 'place' => 2],
                ['name' => 'Consideration', 'percentage' => 60, 'place' => 3],
                ['name' => 'Intent', 'percentage' => 80, 'place' => 4],
                ['name' => 'Conversion', 'percentage' => 100, 'place' => 5],
            ],
            'Partnership Pipeline' => [
                ['name' => 'Initial Contact', 'percentage' => 15, 'place' => 1],
                ['name' => 'Discovery Meeting', 'percentage' => 35, 'place' => 2],
                ['name' => 'Due Diligence', 'percentage' => 55, 'place' => 3],
                ['name' => 'Agreement Draft', 'percentage' => 80, 'place' => 4],
                ['name' => 'Signed', 'percentage' => 100, 'place' => 5],
            ],
        ];

        foreach ($pipelines as $pipelineName => $stages) {
            $pipeline = Pipeline::create([
                'name' => $pipelineName,
                'type' => strtolower(explode(' ', $pipelineName)[0]),
            ]);

            foreach ($stages as $stage) {
                Stage::create([
                    'pipeline_id' => $pipeline->id,
                    'name' => $stage['name'],
                    'percentage' => $stage['percentage'],
                    'place' => $stage['place'],
                ]);
            }
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Models\TranslationKey;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ScanTranslatableStringsCommand extends Command
{
    protected $signature = 'translations:scan {--path= : Custom path to scan} {--prune : Remove orphaned keys}';
    protected $description = 'Scan source code for x_() calls and create missing translation keys';

    protected array $scanDirectories = [
        'resources/views',
        'app/Http/Controllers',
        'app/Services',
        'app/Helpers',
        'app/Http/Middleware',
        'app/Jobs',
        'app/Console/Commands',
        'app/Models',
        'app/Notifications',
        'app/Mail',
        'app/Livewire',
    ];

    public function handle(): int
    {
        $basePath = base_path();
        $customPath = $this->option('path');

        $directories = $customPath
            ? [$customPath]
            : array_map(fn($dir) => "{$basePath}/{$dir}", $this->scanDirectories);

        $this->info('Scanning for x_() calls...');

        // Phase 1: Collect all x_() calls
        $found = [];
        $pattern = '/x_\(\s*[\'"]([^\'"]+)[\'"]\s*(?:,\s*[\'"]([^\'"]*)[\'"])?\s*(?:,\s*[^)]+)?\)/';

        foreach ($directories as $dir) {
            if (!File::isDirectory($dir)) continue;

            $files = File::allFiles($dir);
            foreach ($files as $file) {
                $ext = $file->getExtension();
                if (!in_array($ext, ['php', 'blade.php'])) {
                    // Also allow .blade.php
                    if (!str_ends_with($file->getFilename(), '.blade.php') && $ext !== 'php') {
                        continue;
                    }
                }

                $content = $file->getContents();
                if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
                    foreach ($matches as $match) {
                        $param = $match[1];
                        $place = isset($match[2]) && $match[2] !== '' ? $match[2] : null;
                        $uniqueKey = $place ? "{$param}|{$place}" : $param;
                        $found[$uniqueKey] = ['param' => $param, 'place' => $place];
                    }
                }
            }
        }

        $this->info("Found " . count($found) . " unique x_() calls.");

        // Phase 2: Compare with DB
        $existingKeys = TranslationKey::all()->mapWithKeys(function ($key) {
            $uniqueKey = $key->place ? "{$key->param}|{$key->place}" : $key->param;
            return [$uniqueKey => $key->id];
        })->toArray();

        $missing = array_diff_key($found, $existingKeys);
        $this->info("New keys to create: " . count($missing));

        // Phase 3: Bulk insert new keys
        $chunks = array_chunk($missing, 200, true);
        $created = 0;

        foreach ($chunks as $chunk) {
            $rows = [];
            foreach ($chunk as $item) {
                $rows[] = [
                    'param'        => $item['param'],
                    'place'        => $item['place'],
                    'default_text' => $item['param'],
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ];
            }
            TranslationKey::insert($rows);
            $created += count($rows);
        }

        $this->info("Created {$created} new translation keys.");

        // Phase 4: Prune orphaned keys
        if ($this->option('prune')) {
            $orphanedCount = 0;
            foreach ($existingKeys as $uniqueKey => $id) {
                if (!isset($found[$uniqueKey])) {
                    TranslationKey::destroy($id);
                    $orphanedCount++;
                }
            }
            $this->info("Pruned {$orphanedCount} orphaned keys.");
        }

        return self::SUCCESS;
    }
}

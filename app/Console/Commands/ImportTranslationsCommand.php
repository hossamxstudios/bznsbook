<?php

namespace App\Console\Commands;

use App\Models\TranslationKey;
use App\Models\Translation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ImportTranslationsCommand extends Command
{
    protected $signature = 'translations:import
                            {locale? : Locale to import (default: all JSON files)}
                            {--force : Overwrite existing DB translations}';

    protected $description = 'Import translations from compiled JSON files back into the database';

    public function handle(): int
    {
        $compiledPath = config('translation.compiled_path', storage_path('translations'));
        $locale = $this->argument('locale');
        $force = $this->option('force');

        if ($locale) {
            $file = "{$compiledPath}/{$locale}.json";
            if (!File::exists($file)) {
                $this->error("JSON file not found: {$file}");
                return self::FAILURE;
            }
            $this->importLocale($locale, $file, $force);
        } else {
            // Import all JSON files found
            $files = File::glob("{$compiledPath}/*.json");
            if (empty($files)) {
                $this->error("No JSON files found in {$compiledPath}");
                return self::FAILURE;
            }
            foreach ($files as $file) {
                $loc = pathinfo($file, PATHINFO_FILENAME); // e.g. "ar"
                $this->importLocale($loc, $file, $force);
            }
        }

        $this->newLine();
        $this->info('Import completed.');
        return self::SUCCESS;
    }

    protected function importLocale(string $locale, string $file, bool $force): void
    {
        $this->info("Importing {$locale} from {$file}...");

        $json = json_decode(File::get($file), true);
        if (!is_array($json) || empty($json)) {
            $this->warn("  Skipping {$locale}: empty or invalid JSON.");
            return;
        }

        $created = 0;
        $updated = 0;
        $skipped = 0;

        // Group entries: "param|place" → param + place
        // Some entries are duplicated without place as fallback — skip bare keys
        // if the same text already exists with a place variant
        $processed = [];

        foreach ($json as $key => $text) {
            if (empty($text)) continue;

            // Parse key format: "param|place" or just "param"
            if (str_contains($key, '|')) {
                [$param, $place] = explode('|', $key, 2);
            } else {
                $param = $key;
                $place = null;
            }

            // Skip bare-param duplicates if we already imported the placed version with same text
            $uniqueKey = $param . '|' . ($place ?? '');
            if (isset($processed[$uniqueKey])) continue;
            $processed[$uniqueKey] = true;

            // Find or create the TranslationKey
            $translationKey = TranslationKey::firstOrCreate(
                ['param' => $param, 'place' => $place],
                ['default_text' => $param]
            );

            // Check existing translation
            $existing = Translation::where('translation_key_id', $translationKey->id)
                ->where('locale', $locale)
                ->first();

            if ($existing) {
                if ($force) {
                    $existing->update([
                        'text'            => $text,
                        'is_ai_generated' => true,
                        'is_approved'     => false,
                    ]);
                    $updated++;
                } else {
                    $skipped++;
                }
            } else {
                Translation::create([
                    'translation_key_id' => $translationKey->id,
                    'locale'             => $locale,
                    'text'               => $text,
                    'is_ai_generated'    => true,
                    'is_approved'        => false,
                ]);
                $created++;
            }
        }

        $this->line("  {$locale}: {$created} created, {$updated} updated, {$skipped} skipped (already exist)");
    }
}

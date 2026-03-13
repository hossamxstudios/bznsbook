<?php

namespace App\Console\Commands;

use App\Jobs\TranslatePhrase;
use App\Models\TranslationKey;
use Illuminate\Console\Command;

class GenerateTranslationsCommand extends Command
{
    protected $signature = 'translations:generate {locale} {--batch=50}';
    protected $description = 'Dispatch AI translation jobs for untranslated keys';

    public function handle(): int
    {
        $locale = $this->argument('locale');
        $batchSize = (int) $this->option('batch');

        $untranslated = TranslationKey::query()
            ->whereDoesntHave('translations', function ($q) use ($locale) {
                $q->where('locale', $locale);
            })
            ->pluck('id');

        if ($untranslated->isEmpty()) {
            $this->info("No untranslated keys found for locale: {$locale}");
            return self::SUCCESS;
        }

        $this->info("Dispatching {$untranslated->count()} translation jobs for '{$locale}'...");

        $chunks = $untranslated->chunk($batchSize);
        $bar = $this->output->createProgressBar($untranslated->count());

        foreach ($chunks as $chunk) {
            foreach ($chunk as $keyId) {
                TranslatePhrase::dispatch($keyId, $locale);
                $bar->advance();
            }
            sleep(1);
        }

        $bar->finish();
        $this->newLine();
        $this->info('All translation jobs dispatched.');

        return self::SUCCESS;
    }
}

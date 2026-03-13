<?php

namespace App\Console\Commands;

use App\Models\TranslationKey;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CompileTranslationsCommand extends Command
{
    protected $signature = 'translations:compile {locale?}';
    protected $description = 'Compile translations from DB into JSON files for runtime lookup';

    public function handle(): int
    {
        $compiledPath = config('translation.compiled_path', storage_path('translations'));

        if (!File::isDirectory($compiledPath)) {
            File::makeDirectory($compiledPath, 0755, true);
        }

        $locale = $this->argument('locale');

        if ($locale) {
            $this->compileLocale($locale, $compiledPath);
        } else {
            // Compile all active locales + English overrides
            $locales = array_keys(active_locales());
            foreach ($locales as $loc) {
                $this->compileLocale($loc, $compiledPath);
            }
            $this->compileEnglish($compiledPath);
        }

        $this->info('Translations compiled successfully.');
        return self::SUCCESS;
    }

    protected function compileLocale(string $locale, string $compiledPath): void
    {
        $translations = TranslationKey::query()
            ->join('translations', 'translations.translation_key_id', '=', 'translation_keys.id')
            ->where('translations.locale', $locale)
            ->select('translation_keys.param', 'translation_keys.place', 'translations.text')
            ->get();

        $map = [];
        foreach ($translations as $row) {
            $key = $row->place ? "{$row->param}|{$row->place}" : $row->param;
            $map[$key] = $row->text;

            // Also store without place as fallback
            if ($row->place && !isset($map[$row->param])) {
                $map[$row->param] = $row->text;
            }
        }

        File::put(
            "{$compiledPath}/{$locale}.json",
            json_encode($map, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        );

        $this->line("  Compiled {$locale}: " . count($map) . " entries");
    }

    protected function compileEnglish(string $compiledPath): void
    {
        // English overrides: only keys where default_text differs from param
        $overrides = TranslationKey::query()
            ->whereColumn('default_text', '!=', 'param')
            ->select('param', 'place', 'default_text')
            ->get();

        $map = [];
        foreach ($overrides as $row) {
            $key = $row->place ? "{$row->param}|{$row->place}" : $row->param;
            $map[$key] = $row->default_text;
        }

        if (!empty($map)) {
            File::put(
                "{$compiledPath}/en.json",
                json_encode($map, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
            );
            $this->line("  Compiled en: " . count($map) . " overrides");
        }
    }
}

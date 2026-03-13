<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

if (!function_exists('x_')) {
    function x_(string $param, ?string $place = null, ?string $modelClass = null, ?int $modelId = null): string
    {
        static $translations = null;
        static $enOverrides = null;
        static $locale = null;

        if ($locale === null) {
            $locale = app()->getLocale();
        }

        $compiledPath = config('translation.compiled_path', storage_path('translations'));

        // English: check en.json overrides first, then return $param as-is
        if ($locale === 'en' || $locale === config('translation.default_locale', 'en')) {
            if ($enOverrides === null) {
                $enPath = "{$compiledPath}/en.json";
                $enOverrides = file_exists($enPath)
                    ? (json_decode(file_get_contents($enPath), true) ?? [])
                    : [];
            }
            $keyWithPlace = $place ? "{$param}|{$place}" : null;
            if ($keyWithPlace && isset($enOverrides[$keyWithPlace])) return $enOverrides[$keyWithPlace];
            if (isset($enOverrides[$param])) return $enOverrides[$param];
            return $param;
        }

        // Non-English: load compiled JSON once per request
        if ($translations === null) {
            $path = "{$compiledPath}/{$locale}.json";
            $translations = file_exists($path)
                ? (json_decode(file_get_contents($path), true) ?? [])
                : [];

            // Self-healing: if JSON is empty but DB has translations, load from DB
            if (empty($translations)) {
                try {
                    $dbTranslations = DB::table('translation_keys')
                        ->join('translations', 'translations.translation_key_id', '=', 'translation_keys.id')
                        ->where('translations.locale', $locale)
                        ->select('translation_keys.param', 'translation_keys.place', 'translations.text')
                        ->get();

                    if ($dbTranslations->isNotEmpty()) {
                        foreach ($dbTranslations as $row) {
                            $key = $row->place ? "{$row->param}|{$row->place}" : $row->param;
                            $translations[$key] = $row->text;
                            if ($row->place && !isset($translations[$row->param])) {
                                $translations[$row->param] = $row->text;
                            }
                        }
                        Artisan::queue('translations:compile', ['locale' => $locale]);
                    }
                } catch (\Throwable $e) {
                    // Silently continue
                }
            }
        }

        // O(1) lookup
        $keyWithPlace = $place ? "{$param}|{$place}" : null;
        if ($keyWithPlace && isset($translations[$keyWithPlace])) return $translations[$keyWithPlace];
        if (isset($translations[$param])) return $translations[$param];

        // Missing — return English text and auto-create key in background
        try {
            \App\Jobs\CreateTranslationKey::dispatch($param, $place, $modelClass, $modelId, $locale);
        } catch (\Throwable $e) {}

        return $param;
    }
}

if (!function_exists('active_locales')) {
    function active_locales(): array
    {
        $registry    = config('translation.available_locales', []);
        $legacy      = config('translation.locales', []);
        $activeCodes = config('translation.active_locales', ['ar']);

        if (!is_array($activeCodes) || empty($activeCodes)) {
            $activeCodes = ['ar'];
        }

        $result = [];
        foreach ($activeCodes as $code) {
            $code = trim($code);
            if ($code === 'en' || empty($code)) continue;
            $result[$code] = $registry[$code] ?? $legacy[$code] ?? $code;
        }

        return $result ?: ['ar' => $registry['ar'] ?? $legacy['ar'] ?? 'العربية'];
    }
}

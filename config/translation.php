<?php

return [
    'locales' => [
        'en'    => 'English',
        'ar'    => 'العربية',
    ],

    'available_locales' => [
        'ar'    => 'العربية (Arabic)',
        'ar_eg' => 'عامية مصرية (Egyptian Arabic)',
        'ar_sa' => 'العربية السعودية (Saudi Arabic)',
        'fr'    => 'Français (French)',
        'es'    => 'Español (Spanish)',
        'de'    => 'Deutsch (German)',
        'tr'    => 'Türkçe (Turkish)',
        'zh'    => '中文 (Chinese Simplified)',
        'ja'    => '日本語 (Japanese)',
    ],

    'active_locales' => explode(',', env('TRANSLATION_ACTIVE_LOCALES', 'ar')),

    'default_locale' => 'en',

    'auto_translate' => (bool) env('TRANSLATION_AUTO_TRANSLATE', true),

    'compiled_path' => storage_path('translations'),

    'openai_model' => env('TRANSLATION_MODEL', 'gpt-4o-mini'),
];

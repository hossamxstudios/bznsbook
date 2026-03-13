# AI Translation System — Full Implementation Prompt

> **Purpose:** This document is a complete, self-contained specification for an AI coding agent (Windsurf, Cursor, etc.) to build a full translation/localization system for a Laravel admin panel. Hand this file to the agent as-is.

---

## 1. Project Context

- **Framework:** Laravel 12 (PHP 8.2+), MySQL/MariaDB
- **Admin theme:** Vona (Bootstrap 5, Blade templates, Lucide icons)
- **Queue driver:** `QUEUE_CONNECTION=database` (jobs stored in `jobs` table)
- **Existing helpers:** A `settings('group.key')` helper reads from a `settings` table (`group` + `key` columns, cached 300s). An `active_locales()` helper returns active locale codes from settings.
- **Auth:** Laravel Breeze + Spatie Permission (`role:owner` middleware exists)
- **Admin prefix:** All admin routes live under `/admin` (e.g., `/admin/translations`)
- **Layout partials:** `admin.main.html`, `admin.main.meta`, `admin.main.topbar`, `admin.main.sidebar`, `admin.main.scripts`, `admin.main.footer`, `admin.main.theme_settings`, `admin.main.messages`, `admin.components.page-header`

---

## 2. Architecture Overview

**The original English text IS the key.** This is a gettext-style approach — there are no dot-notation param codes. The first argument to `x_()` is always the literal English string.

```
┌────────────────────────────────────────────────────────┐
│  Blade / PHP                                           │
│  x_('Total Sales', 'dashboard')                        │
│        │                                               │
│        ▼                                               │
│  x_() helper  ──► compiled JSON (O(1) lookup)          │
│        │              ▲                                 │
│        │              │  translations:compile           │
│        │              │                                 │
│        ▼              │                                 │
│  Missing? ───► CreateTranslationKey job                 │
│                  │         ▲                            │
│                  ▼         │                            │
│            TranslatePhrase job ──► OpenAI API           │
│                  │                                      │
│                  ▼                                      │
│            DB: translation_keys + translations          │
│                  │                                      │
│                  ▼                                      │
│            Artisan::call('translations:compile')        │
│                  │                                      │
│                  ▼                                      │
│            storage/translations/{locale}.json           │
└────────────────────────────────────────────────────────┘
```

**Key principle — Hybrid DB/JSON:**
- The **database** is the source of truth (for CRUD, AI writes, approvals).
- At runtime, `x_()` reads from **compiled JSON files** (zero SQL queries).
- The `translations:compile` Artisan command rebuilds JSON from DB.
- The `param` column stores the **original English text** — it serves as both the lookup key and the English display value. There is no separate `default_text` column.

---

## 3. Database Schema

### 3.1 Migration: `create_translation_keys_table`

```php
Schema::create('translation_keys', function (Blueprint $table) {
    $table->id();
    $table->text('param');                        // The original English text IS the key (e.g. 'Total Sales')
    $table->string('place')->nullable();          // Contextual grouping (e.g. 'dashboard', 'sidebar', 'flash')
    $table->text('default_text');                 // English fallback / display text (initially same as param)
    $table->string('translatable_type')->nullable(); // polymorphic (for model-specific translations)
    $table->unsignedBigInteger('translatable_id')->nullable();
    $table->timestamps();

    // Index on a prefix of param (first 191 chars) + place for lookups
    $table->index([DB::raw('param(191)'), 'place'], 'tk_param_place_index');
    $table->index(['translatable_type', 'translatable_id'], 'tk_morph_index');
});
```

> **Key difference from a dot-notation system:** The `param` column stores the **original English text** (e.g., `'Total Sales'`) — NOT a coded key like `'dashboard.total_sales'`. The `default_text` column initially mirrors `param` but can be edited independently by admins (e.g., to refine the wording without changing the code-level key).

### 3.2 Migration: `create_translations_table`

```php
Schema::create('translations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('translation_key_id')->constrained('translation_keys')->cascadeOnDelete();
    $table->string('locale', 10)->index();       // e.g. 'ar', 'ar_eg', 'fr'
    $table->text('text');                         // translated string
    $table->boolean('is_ai_generated')->default(false);
    $table->boolean('is_approved')->default(false);
    $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
    $table->timestamp('approved_at')->nullable();
    $table->timestamps();

    $table->unique(['translation_key_id', 'locale']);
});
```

### 3.3 Migration: `add_locale_to_users_table`

```php
Schema::table('users', function (Blueprint $table) {
    $table->string('locale', 10)->default('en')->after('is_active');
});
```

### 3.4 Migration: `add_translation_settings_to_settings_table`

```php
// Seed the active_locales setting into the existing `settings` table
DB::table('settings')->insertOrIgnore([
    [
        'group'       => 'translation',
        'key'         => 'active_locales',
        'value'       => '["ar"]',
        'type'        => 'json',
        'description' => 'Locales that are active for translation, UI switching, and AI translation',
        'is_public'   => false,
        'created_at'  => now(),
        'updated_at'  => now(),
    ],
]);
```

---

## 4. Models

### 4.1 `TranslationKey`

```php
class TranslationKey extends Model
{
    protected $fillable = ['param', 'place', 'default_text', 'translatable_type', 'translatable_id'];

    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class);
    }

    public function translatable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getTranslation(string $locale): ?string
    {
        return $this->translations()->where('locale', $locale)->value('text');
    }
}
```

> **Key point:** `param` stores the original English text (e.g., `"Total Sales"`) and is the lookup key used in code. `default_text` is initially set to the same value as `param` but can be edited by admins to refine the English wording without touching source code.

### 4.2 `Translation`

```php
class Translation extends Model
{
    protected $fillable = ['translation_key_id', 'locale', 'text', 'is_ai_generated', 'is_approved', 'approved_by', 'approved_at'];

    protected $casts = [
        'is_ai_generated' => 'boolean',
        'is_approved'     => 'boolean',
        'approved_at'     => 'datetime',
    ];

    public function key(): BelongsTo
    {
        return $this->belongsTo(TranslationKey::class, 'translation_key_id');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
```

---

## 5. Config File — `config/translation.php`

```php
return [
    // Currently active locales (can also be managed from settings table)
    'locales' => [
        'en'    => 'English',
        'ar'    => 'العربية',
        'ar_eg' => 'عامية مصرية',
    ],

    // Master registry of all available languages (users pick from this list in Settings)
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
        // ... add as many as needed
    ],

    'default_locale' => 'en',

    // When true, missing translations auto-queue AI translation via OpenAI
    'auto_translate' => (bool) env('TRANSLATION_AUTO_TRANSLATE', true),

    // Compiled JSON files directory
    'compiled_path' => storage_path('translations'),

    // OpenAI model for AI translation
    'openai_model' => env('TRANSLATION_MODEL', 'gpt-4o-mini'),
];
```

Also add to `config/services.php`:

```php
'openai' => [
    'key' => env('OPENAI_API_KEY'),
],
```

---

## 6. Helper Functions (in `app/Helpers/helpers.php`)

### 6.1 `x_()` — The core translation function

Every translatable string in Blade/PHP uses `x_('English Text', 'optional_place')`. The first argument is the **literal English string**, not a coded key.

**Behavior:**
1. Loads compiled JSON once per request (static variable).
2. O(1) hash lookup: tries `"param|place"` first, then `"param"` alone.
3. If locale is `en`, checks `en.json` overrides first, then returns `$param` directly (since param IS the English text).
4. If translation is **missing** from JSON: returns `$param` (English text) and dispatches `CreateTranslationKey` job in the background.
5. **Self-healing**: If compiled JSON is empty but DB has translations, loads from DB on that request and queues a `translations:compile` to fix it for future requests.

```php
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
            return $param; // param IS the English text
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

        return $param; // param IS the English text
    }
}
```

### 6.2 `active_locales()` — Returns active locale codes from settings

```php
if (!function_exists('active_locales')) {
    function active_locales(): array
    {
        $registry    = config('translation.available_locales', []);
        $legacy      = config('translation.locales', []);
        $activeCodes = settings('translation.active_locales', ['ar']);

        if (!is_array($activeCodes) || empty($activeCodes)) {
            $activeCodes = ['ar'];
        }

        $result = [];
        foreach ($activeCodes as $code) {
            if ($code === 'en') continue; // English is always base, not a target
            $result[$code] = $registry[$code] ?? $legacy[$code] ?? $code;
        }

        return $result ?: ['ar' => $registry['ar'] ?? $legacy['ar'] ?? 'العربية'];
    }
}
```

---

## 7. Jobs

### 7.1 `CreateTranslationKey` — Auto-create key + dispatch AI translation

```php
class CreateTranslationKey implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public int $tries = 1;

    public function __construct(
        public string $param,       // The original English text (IS the key)
        public ?string $place,
        public ?string $modelClass,
        public ?int $modelId,
        public string $locale,
    ) {}

    public function handle(): void
    {
        $key = TranslationKey::firstOrCreate(
            ['param' => $this->param, 'place' => $this->place,
             'translatable_type' => $this->modelClass, 'translatable_id' => $this->modelId],
            ['default_text' => $this->param]  // default_text = param (the English text)
        );

        if (config('translation.auto_translate', true) && $this->locale !== 'en') {
            if (!$key->translations()->where('locale', $this->locale)->exists()) {
                TranslatePhrase::dispatch($key->id, $this->locale);
            }
        }
    }
}
```

### 7.2 `TranslatePhrase` — AI-translate a single key

```php
class TranslatePhrase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(
        public int $translationKeyId,
        public string $locale,
    ) {}

    public function handle(TranslationService $service): void
    {
        $key = TranslationKey::find($this->translationKeyId);
        if (!$key) return;
        if ($key->translations()->where('locale', $this->locale)->exists()) return;

        $translated = $service->translate($key->default_text, $this->locale, $key->place);

        if ($translated) {
            $key->translations()->create([
                'locale'          => $this->locale,
                'text'            => $translated,
                'is_ai_generated' => true,
            ]);
            Artisan::call('translations:compile', ['locale' => $this->locale]);
        }
    }
}
```

> **IMPORTANT:** Do NOT use `->onQueue('translations')` — dispatch to the default queue so the standard queue worker processes them.

---

## 8. Service — `TranslationService`

Uses the **OpenAI API** directly for translation.

### 8.1 `translate()` — Single phrase

- System prompt instructs it to translate UI text for a POS/business management software
- Temperature `0.1` for consistency
- Returns only the translated text, no explanations

### 8.2 `translateBatch()` — Multiple phrases in one API call

- Sends a JSON map of `{id: text}` pairs
- Requests `response_format: json_object` for structured output
- Returns a map of `{id: translated_text}`
- Used by the "Translate All" batch feature in the admin UI

### 8.3 Locale name mapping

The service maintains a `$localeNames` map (e.g., `'ar_eg' => 'Egyptian Arabic dialect (عامية مصرية)'`) to give the AI model proper context about which dialect/language to use.

---

## 9. Middleware — `SetLocale`

Registered in `bootstrap/app.php` under the `web` middleware group.

**Priority order:** User DB record (`$user->locale`) > Session > Config default.

```php
class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = null;
        if ($request->user()) {
            $locale = $request->user()->locale;
        }
        if (empty($locale)) {
            $locale = session('locale', config('app.locale', 'en'));
        }

        // Validate against available locales
        $supported = array_merge(
            array_keys(config('translation.available_locales', [])),
            array_keys(config('translation.locales', ['en' => 'English']))
        );
        $supported[] = 'en';
        if (!in_array($locale, $supported)) {
            $locale = config('app.locale', 'en');
        }

        app()->setLocale($locale);
        session(['locale' => $locale]);

        return $next($request);
    }
}
```

---

## 10. Artisan Commands

### 10.1 `translations:compile` — DB → JSON compiler

```
php artisan translations:compile {locale?}
```

- If no locale given, compiles **all** active locales + English overrides.
- If locale specified, compiles only that locale.
- **English JSON:** Only includes keys where `default_text` differs from `param` — these are admin overrides of the English wording.
- **Non-English JSON:** Key format is `"param|place"` (or just `"param"` if no place). Also stores a fallback without place for lookups.
- Output: `storage/translations/{locale}.json`
- Scheduled every 6 hours in `bootstrap/app.php`.

### 10.2 `translations:scan` — Scan source code for `x_()` calls

```
php artisan translations:scan [--path=] [--prune]
```

- **Scans directories:** `resources/views`, `app/Http/Controllers`, `app/Services`, `app/Helpers`, `app/Http/Middleware`, `app/Jobs`, `app/Console/Commands`, `app/Models`, `app/Notifications`, `app/Mail`, `app/Livewire`
- **Regex pattern:** `/x_\(\s*['\"]([^'\"]+)['\"]\s*(?:,\s*['\"]([^'\"]*)['\"])?\s*(?:,\s*[^)]+)?\)/`
- **Phase 1:** Collect all `x_()` calls from source → deduplicate by `param|place`
- **Phase 2:** Compare with DB to find missing keys
- **Phase 3:** Bulk insert new keys (chunks of 200)
- **Phase 4 (--prune):** Remove orphaned keys no longer found in source
- Sets `default_text` = `param` (the captured English text) for new keys

### 10.3 `translations:generate` — Dispatch AI translation jobs

```
php artisan translations:generate {locale} [--batch=50]
```

- Finds all `TranslationKey` records without a translation for the given locale
- Dispatches `TranslatePhrase` jobs for each, in batches with 1-second delays

---

## 11. Controller — `TranslationController`

Located at `app/Http/Controllers/AdminControllers/TranslationController.php`.

### Routes (all under `/admin`, auth required):

| Method | URI | Name | Access | Description |
|--------|-----|------|--------|-------------|
| POST | `/locale/switch` | `locale.switch` | All auth users | Switch user's locale (saves to session + user DB record) |
| GET | `/translations` | `translations.index` | Owner only | List all keys with per-locale columns, stats, filters |
| GET | `/translations/{key}/edit` | `translations.edit` | Owner only | Edit a specific key's translations |
| PUT | `/translations/{key}` | `translations.update` | Owner only | Save edited translations |
| POST | `/translations/{key}/inline-update` | `translations.inline-update` | Owner only | AJAX inline edit from the index table |
| POST | `/translations/bulk-approve` | `translations.bulk-approve` | Owner only | Bulk approve selected AI translations |
| POST | `/translations/approve-all` | `translations.approve-all` | Owner only | Approve ALL unapproved AI translations |
| POST | `/translations/{key}/retranslate/{locale}` | `translations.retranslate` | Owner only | Delete + re-queue AI translation |
| POST | `/translations/compile` | `translations.compile` | Owner only | Manual full JSON recompile |
| POST | `/translations/scan-translate` | `translations.scan-translate` | Owner only | Scan source + create missing keys |
| POST | `/translations/translate-all/start` | `translations.translate-all-start` | Owner only | Start batch translation |
| POST | `/translations/translate-all/next` | `translations.translate-all-next` | Owner only | Process next chunk |
| POST | `/translations/translate-all/cancel` | `translations.translate-all-cancel` | Owner only | Cancel batch |

### Controller methods:

#### `index()` — Main listing
- LEFT JOINs on the selected filter locale for status filtering
- Status tabs: All, Missing, AI Pending, Approved, Manual
- Per-locale stat cards with SVG progress rings
- Per-locale columns showing translation text + status dots
- Pagination (50 per page)
- Filters: locale selector, place/group dropdown, text search

#### `inlineUpdate()` — AJAX inline edit
- Accepts `{ translations: [{ locale, text }] }`
- Creates/updates translations, marks as manual + approved
- Auto-compiles affected locales
- Returns JSON

#### `edit()` / `update()` — Full edit page
- Side-by-side English reference + locale textarea
- Per-locale status indicators (missing/ai/approved/manual)
- AI retranslate button per locale
- Previous/Next key navigation
- Ctrl+S keyboard shortcut
- Auto-compiles affected locales on save

#### `bulkApprove()` / `approveAll()` — Approval
- Bulk approve by checkbox selection
- Or approve all AI-generated translations at once

#### `scanAndTranslate()` — Source scan
- Scans all directories for `x_()` calls
- Bulk-inserts missing keys
- Reports counts: total calls, new keys, missing translations

#### `translateAllStart()` / `translateAllNext()` / `translateAllCancel()` — Batch AI translation
- **Start:** Gathers untranslated key IDs for a locale, caches batch state
- **Next:** Pops chunks of 100, sends to `TranslationService::translateBatch()`, saves results, returns progress JSON
- **Cancel:** Sets cancelled flag, compiles what was translated so far
- Frontend polls `translateAllNext` in a loop, displays real-time progress modal

#### `switchLocale()` — Locale switching
- Validates against supported locales
- Saves to session AND user DB record (survives session expiry)

---

## 12. Views

### 12.1 `translations/index.blade.php` — Main listing page

**Structure:**
1. Per-locale stat cards with SVG progress rings (% translated, missing count, AI pending)
2. Total keys stat card
3. Main card with:
   - **Tab bar:** All | Missing | AI Pending | Approved | Manual (with counts)
   - **Action buttons:** Recompile JSON, Scan & Translate, Approve All, Translate All AI
   - **Filter bar:** Locale dropdown, Place/group dropdown, Search input
   - **Table:** Checkbox | English Text (the param) | Place badge | Per-locale columns (clickable for inline edit) | Edit button
4. **Floating bulk toolbar:** Appears when checkboxes selected — "N selected" + Approve button
5. **Inline edit modal:** Opens on cell click, shows all locale textareas, Ctrl+Enter to save
6. **Translate All progress modal:** Real-time progress bar, stats (total/succeeded/failed), current batch indicator, cancel button

**JavaScript features:**
- Bulk select/deselect with floating toolbar
- AJAX inline edit with instant table cell update
- Translate All: start → poll loop → progress updates → finish/cancel
- Ctrl+Enter keyboard shortcut in edit modal

### 12.2 `translations/edit.blade.php` — Single key edit page

**Structure:**
1. Source key info card: English text (param), place badge, created date, prev/next navigation, editable default_text (admin can refine English wording)
2. Per-locale cards with:
   - Status header (color-coded: red=missing, yellow=AI, green=approved, blue=manual)
   - Side-by-side: English reference (readonly) + locale textarea
   - AI retranslate button
   - Meta info (AI translated date, approved by, last updated)
3. Sticky footer: Back button + Ctrl+S hint + Save All button

**Full dark mode support** for both views.

---

## 13. Layout Modifications

### 13.1 `html.blade.php` — Dynamic `lang` and `dir`

```html
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ str_starts_with(app()->getLocale(), 'ar') ? 'rtl' : 'ltr' }}">
```

### 13.2 `meta.blade.php` — RTL CSS + JS translations bridge

```blade
@if(str_starts_with(app()->getLocale(), 'ar'))
<link href="{{ asset('admin/assets/css/rtl.css') }}" rel="stylesheet">
@endif

<!-- JS Translations bridge for static JS files -->
@php
    $jsTranslations = [
        'Success'              => x_('Success', 'js'),
        'Error'                => x_('Error', 'js'),
        'Warning'              => x_('Warning', 'js'),
        'Info'                 => x_('Info', 'js'),
        'Just now'             => x_('Just now', 'js'),
        'Something went wrong' => x_('Something went wrong', 'js'),
        'Session expired'      => x_('Session expired', 'js'),
        'No permission'        => x_('No permission', 'js'),
        'Network error'        => x_('Network error', 'js'),
        'Session expiring'     => x_('Session expiring', 'js'),
    ];
@endphp
<script>
    window.__translations = @json($jsTranslations);
    window.__ = function(key, fallback) {
        return (window.__translations && window.__translations[key]) || fallback || key;
    };
</script>
```

### 13.3 `topbar.blade.php` — Locale switcher dropdown

Add a dropdown in the topbar that shows a globe/languages icon + current locale code. Lists all locales (`['en' => 'English'] + active_locales()`). Each item is a `<form>` POSTing to `locale.switch`.

### 13.4 `sidebar.blade.php` — Translations link

Under the "Configuration" section, add a link to `translations.index` — visible only to `@role('owner')`.

---

## 14. Scheduler (in `bootstrap/app.php`)

```php
$schedule->command('translations:compile')->everySixHours();
```

Also register the `SetLocale` middleware in the `web` group:

```php
$middleware->appendToGroup('web', [
    \App\Http\Middleware\SetLocale::class,
]);
```

---

## 15. Environment Variables

Add to `.env` and `.env.example`:

```env
OPENAI_API_KEY=sk-your-key-here
TRANSLATION_AUTO_TRANSLATE=true
TRANSLATION_MODEL=gpt-4o-mini
```

---

## 16. Directory Structure

Create `storage/translations/.gitkeep` for the compiled JSON output directory.

---

## 17. How to Use `x_()` in Code

### In Blade templates:

```blade
<h1>{{ x_('Total Sales', 'dashboard') }}</h1>
<button>{{ x_('Save', 'common') }}</button>
<p>{{ x_('No products found', 'products') }}</p>
<label>{{ x_('Customer Name') }}</label>  {{-- place is optional --}}
```

### In PHP (controllers, services, etc.):

```php
throw new \Exception(x_('Insufficient stock', 'flash'));
return back()->with('success', x_('Product created successfully', 'flash'));
```

### Convention:

- **First argument** = the literal English text displayed to the user. This IS the key.
- **Second argument** (`place`) = optional contextual grouping: `'dashboard'`, `'sidebar'`, `'flash'`, `'common'`, `'products'`, etc.
- The same English text with different `place` values creates separate translation keys (allowing context-specific translations).
- `default_text` in the DB is initially set to the same value as `param` but can be edited by admins.

---

## 18. Testing Checklist

After implementation, verify:

- [ ] `php artisan migrate` — all 4 migrations run cleanly
- [ ] `php artisan translations:scan` — finds and creates keys from `x_()` calls
- [ ] `php artisan translations:compile` — generates JSON files in `storage/translations/`
- [ ] `php artisan translations:generate ar` — dispatches AI translation jobs
- [ ] Queue worker processes `CreateTranslationKey` and `TranslatePhrase` jobs
- [ ] Locale switcher in topbar changes language immediately
- [ ] RTL layout activates for Arabic locales
- [ ] Translation admin page loads with stats, filters, tabs
- [ ] Inline edit modal saves and updates table cells via AJAX
- [ ] Full edit page with side-by-side English reference works
- [ ] Bulk approve and approve-all work
- [ ] AI retranslate button deletes old translation and re-queues
- [ ] "Translate All" batch shows real-time progress and can be cancelled
- [ ] "Scan & Translate" finds new keys from source code
- [ ] Compiled JSON recompiles after every edit/translation
- [ ] Self-healing: if JSON is deleted, next page load recovers from DB
- [ ] Dark mode works on both translation views
- [ ] User locale persists across sessions (saved to DB)

---

## 19. Critical Implementation Notes

1. **Never use `->onQueue('translations')`** — all jobs must go to the default queue so `php artisan queue:work` processes them.
2. **JSON compilation happens after every write** — inline edit, full edit, AI translation, retranslate all call `Artisan::call('translations:compile', ['locale' => $locale])`.
3. **The `x_()` function must never throw** — all errors are silently caught. The translation system should never crash the application.
4. **Static variables in `x_()`** — translations are loaded once per request (not per call). This is critical for performance.
5. **The "Translate All" feature uses chunked synchronous HTTP calls** — NOT queued jobs. It calls `TranslationService::translateBatch()` directly in chunks of 100, with the frontend polling for progress. This gives real-time feedback.
6. **Scan & Translate in the controller** duplicates some logic from the `translations:scan` command but runs synchronously in the web request context (with `set_time_limit(120)`).
7. **Active locales** are managed via the `settings` table (`translation.active_locales` JSON array), not hardcoded. The admin Settings page should have a UI for managing this.

---

## 20. File Inventory

### New files to create:

| # | File | Purpose |
|---|------|---------|
| 1 | `database/migrations/xxxx_create_translation_keys_table.php` | Schema |
| 2 | `database/migrations/xxxx_create_translations_table.php` | Schema |
| 3 | `database/migrations/xxxx_add_locale_to_users_table.php` | User locale column |
| 4 | `database/migrations/xxxx_add_translation_settings.php` | Seed active_locales setting |
| 5 | `app/Models/TranslationKey.php` | Model |
| 6 | `app/Models/Translation.php` | Model |
| 7 | `config/translation.php` | Config |
| 8 | `app/Services/TranslationService.php` | OpenAI translation service |
| 9 | `app/Jobs/CreateTranslationKey.php` | Queue job |
| 10 | `app/Jobs/TranslatePhrase.php` | Queue job |
| 11 | `app/Http/Middleware/SetLocale.php` | Middleware |
| 12 | `app/Http/Controllers/AdminControllers/TranslationController.php` | Full controller |
| 13 | `app/Console/Commands/CompileTranslationsCommand.php` | Artisan command |
| 14 | `app/Console/Commands/GenerateTranslationsCommand.php` | Artisan command |
| 15 | `app/Console/Commands/ScanTranslatableStringsCommand.php` | Artisan command |
| 16 | `resources/views/admin/translations/index.blade.php` | Admin listing view |
| 17 | `resources/views/admin/translations/edit.blade.php` | Admin edit view |
| 18 | `storage/translations/.gitkeep` | Compiled JSON directory |

### Files to modify:

| # | File | Change |
|---|------|--------|
| 1 | `app/Helpers/helpers.php` | Add `x_()` and `active_locales()` functions |
| 2 | `config/services.php` | Add `openai` key |
| 3 | `bootstrap/app.php` | Register `SetLocale` middleware + schedule `translations:compile` every 6 hours |
| 4 | `resources/views/admin/main/html.blade.php` | Dynamic `lang` + `dir` attributes |
| 5 | `resources/views/admin/main/meta.blade.php` | Conditional RTL CSS + JS translations bridge (`window.__()`) |
| 6 | `resources/views/admin/main/topbar.blade.php` | Locale switcher dropdown |
| 7 | `resources/views/admin/main/sidebar.blade.php` | Translations link (owner only) |
| 8 | `routes/web.php` | 13 new routes (12 translations + 1 locale switch) |
| 9 | `.env.example` | Add `OPENAI_API_KEY`, `TRANSLATION_AUTO_TRANSLATE`, `TRANSLATION_MODEL` |

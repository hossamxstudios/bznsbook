<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Models\TranslationKey;
use App\Services\TranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    public function index(Request $request)
    {
        $locales = active_locales();
        $filterLocale = $request->get('locale', array_key_first($locales) ?? 'ar');
        $status = $request->get('status', 'all');
        $place = $request->get('place');
        $search = $request->get('search');

        $query = TranslationKey::query()
            ->leftJoin('translations as t_filter', function ($join) use ($filterLocale) {
                $join->on('t_filter.translation_key_id', '=', 'translation_keys.id')
                     ->where('t_filter.locale', '=', $filterLocale);
            })
            ->select('translation_keys.*', 't_filter.text as filter_text', 't_filter.is_ai_generated as filter_ai', 't_filter.is_approved as filter_approved');

        // Status filter
        switch ($status) {
            case 'missing':
                $query->whereNull('t_filter.id');
                break;
            case 'ai_pending':
                $query->whereNotNull('t_filter.id')
                      ->where('t_filter.is_ai_generated', true)
                      ->where('t_filter.is_approved', false);
                break;
            case 'approved':
                $query->whereNotNull('t_filter.id')
                      ->where('t_filter.is_approved', true);
                break;
            case 'manual':
                $query->whereNotNull('t_filter.id')
                      ->where('t_filter.is_ai_generated', false);
                break;
        }

        if ($place) {
            $query->where('translation_keys.place', $place);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('translation_keys.param', 'like', "%{$search}%")
                  ->orWhere('t_filter.text', 'like', "%{$search}%");
            });
        }

        $keys = $query->orderBy('translation_keys.id', 'desc')->paginate(50)->withQueryString();

        // Eager-load translations for the per-locale columns in the view
        $keys->load('translations');

        // Stats per locale
        $totalKeys = TranslationKey::count();
        $stats = [];
        foreach ($locales as $code => $name) {
            $translated = Translation::where('locale', $code)->count();
            $aiPending = Translation::where('locale', $code)->where('is_ai_generated', true)->where('is_approved', false)->count();
            $approved = Translation::where('locale', $code)->where('is_approved', true)->count();
            $stats[$code] = [
                'name'       => $name,
                'translated' => $translated,
                'missing'    => $totalKeys - $translated,
                'ai_pending' => $aiPending,
                'approved'   => $approved,
                'percentage' => $totalKeys > 0 ? round(($translated / $totalKeys) * 100) : 0,
            ];
        }

        // Status counts for tabs
        $statusCounts = [
            'all'        => $totalKeys,
            'missing'    => TranslationKey::whereDoesntHave('translations', fn($q) => $q->where('locale', $filterLocale))->count(),
            'ai_pending' => Translation::where('locale', $filterLocale)->where('is_ai_generated', true)->where('is_approved', false)->count(),
            'approved'   => Translation::where('locale', $filterLocale)->where('is_approved', true)->count(),
            'manual'     => Translation::where('locale', $filterLocale)->where('is_ai_generated', false)->count(),
        ];

        // Unique places for filter dropdown
        $places = TranslationKey::whereNotNull('place')->distinct()->pluck('place')->sort()->values();

        return view('admin.translations.index', compact(
            'keys', 'locales', 'filterLocale', 'status', 'place', 'search',
            'totalKeys', 'stats', 'statusCounts', 'places'
        ));
    }

    public function edit(TranslationKey $key)
    {
        $key->load('translations');
        $locales = active_locales();

        // Previous/Next navigation
        $prev = TranslationKey::where('id', '<', $key->id)->orderBy('id', 'desc')->first();
        $next = TranslationKey::where('id', '>', $key->id)->orderBy('id', 'asc')->first();

        return view('admin.translations.edit', compact('key', 'locales', 'prev', 'next'));
    }

    public function update(Request $request, TranslationKey $key)
    {
        $locales = active_locales();
        $compiledLocales = [];

        // Update default_text if changed
        if ($request->has('default_text') && $request->default_text !== $key->default_text) {
            $key->update(['default_text' => $request->default_text]);
        }

        // Update translations per locale
        foreach ($locales as $code => $name) {
            $text = $request->input("translations.{$code}");
            if ($text === null || $text === '') continue;

            Translation::updateOrCreate(
                ['translation_key_id' => $key->id, 'locale' => $code],
                [
                    'text'            => $text,
                    'is_ai_generated' => false,
                    'is_approved'     => true,
                    'approved_by'     => Auth::id(),
                    'approved_at'     => now(),
                ]
            );
            $compiledLocales[] = $code;
        }

        // Recompile affected locales
        foreach (array_unique($compiledLocales) as $loc) {
            Artisan::call('translations:compile', ['locale' => $loc]);
        }

        return back()->with('success', x_('Translation updated successfully.', 'controller'));
    }

    public function inlineUpdate(Request $request, TranslationKey $key)
    {
        $translations = $request->input('translations', []);
        $compiledLocales = [];

        foreach ($translations as $item) {
            $locale = $item['locale'] ?? null;
            $text = $item['text'] ?? null;
            if (!$locale || !$text) continue;

            Translation::updateOrCreate(
                ['translation_key_id' => $key->id, 'locale' => $locale],
                [
                    'text'            => $text,
                    'is_ai_generated' => false,
                    'is_approved'     => true,
                    'approved_by'     => Auth::id(),
                    'approved_at'     => now(),
                ]
            );
            $compiledLocales[] = $locale;
        }

        foreach (array_unique($compiledLocales) as $loc) {
            Artisan::call('translations:compile', ['locale' => $loc]);
        }

        return response()->json(['success' => true, 'message' => 'Translation saved.']);
    }

    public function bulkApprove(Request $request)
    {
        $raw = $request->input('ids', '');
        $ids = is_array($raw) ? $raw : array_filter(explode(',', $raw));

        if (empty($ids)) {
            return back()->with('error', x_('No translations selected.', 'controller'));
        }

        $count = Translation::whereIn('translation_key_id', $ids)
            ->where('is_ai_generated', true)
            ->where('is_approved', false)
            ->update([
                'is_approved' => true,
                'approved_by' => Auth::id(),
                'approved_at' => now(),
            ]);

        // Recompile affected locales
        Artisan::call('translations:compile');

        return back()->with('success', $count . ' ' . x_('translations approved.', 'controller'));
    }

    public function approveAll()
    {
        $count = Translation::where('is_ai_generated', true)
            ->where('is_approved', false)
            ->update([
                'is_approved' => true,
                'approved_by' => Auth::id(),
                'approved_at' => now(),
            ]);

        Artisan::call('translations:compile');

        return back()->with('success', $count . ' ' . x_('AI translations approved.', 'controller'));
    }

    public function retranslate(TranslationKey $key, string $locale)
    {
        $key->translations()->where('locale', $locale)->delete();

        $service = app(TranslationService::class);
        $translated = $service->translate($key->default_text, $locale, $key->place);

        if ($translated) {
            $key->translations()->create([
                'locale'          => $locale,
                'text'            => $translated,
                'is_ai_generated' => true,
                'is_approved'     => false,
            ]);
            Artisan::call('translations:compile', ['locale' => $locale]);
            return back()->with('success', x_('Re-translated successfully.', 'controller'));
        }

        return back()->with('error', x_('AI translation failed. Check your OPENAI_API_KEY.', 'controller'));
    }

    public function compile()
    {
        Artisan::call('translations:compile');
        return back()->with('success', x_('Translations recompiled successfully.', 'controller'));
    }

    public function scanAndTranslate()
    {
        set_time_limit(120);

        $basePath = base_path();
        $scanDirs = [
            'resources/views', 'app/Http/Controllers', 'app/Services',
            'app/Helpers', 'app/Http/Middleware', 'app/Jobs',
            'app/Console/Commands', 'app/Models',
        ];

        $found = [];
        $pattern = '/x_\(\s*[\'"]([^\'"]+)[\'"]\s*(?:,\s*[\'"]([^\'"]*)[\'"])?\s*(?:,\s*[^)]+)?\)/';

        foreach ($scanDirs as $dir) {
            $fullDir = "{$basePath}/{$dir}";
            if (!File::isDirectory($fullDir)) continue;

            foreach (File::allFiles($fullDir) as $file) {
                if (!str_ends_with($file->getFilename(), '.php')) continue;
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

        $existingKeys = TranslationKey::all()->mapWithKeys(function ($key) {
            $uk = $key->place ? "{$key->param}|{$key->place}" : $key->param;
            return [$uk => $key->id];
        })->toArray();

        $missing = array_diff_key($found, $existingKeys);
        $created = 0;

        foreach (array_chunk($missing, 200, true) as $chunk) {
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

        // Count missing translations
        $locales = active_locales();
        $missingTranslations = 0;
        foreach ($locales as $code => $name) {
            $missingTranslations += TranslationKey::whereDoesntHave('translations', fn($q) => $q->where('locale', $code))->count();
        }

        return back()->with('success', x_('Scan complete:', 'controller') . ' ' . count($found) . ' ' . x_('calls found,', 'controller') . ' ' . $created . ' ' . x_('new keys created,', 'controller') . ' ' . $missingTranslations . ' ' . x_('translations missing.', 'controller'));
    }

    public function translateAllStart(Request $request)
    {
        $locale = $request->input('locale');
        if (!$locale) {
            return response()->json(['error' => 'No locale specified'], 400);
        }

        $untranslatedIds = TranslationKey::whereDoesntHave('translations', fn($q) => $q->where('locale', $locale))
            ->pluck('id')
            ->toArray();

        if (empty($untranslatedIds)) {
            return response()->json(['error' => 'No untranslated keys found.'], 400);
        }

        $batchKey = 'translate_all_' . Auth::id();
        Cache::put($batchKey, [
            'ids'        => $untranslatedIds,
            'locale'     => $locale,
            'total'      => count($untranslatedIds),
            'processed'  => 0,
            'succeeded'  => 0,
            'failed'     => 0,
            'cancelled'  => false,
        ], 3600);

        return response()->json([
            'success' => true,
            'total'   => count($untranslatedIds),
        ]);
    }

    public function translateAllNext(Request $request)
    {
        $batchKey = 'translate_all_' . Auth::id();
        $batch = Cache::get($batchKey);

        if (!$batch || $batch['cancelled']) {
            return response()->json(['done' => true, 'cancelled' => true]);
        }

        $chunkSize = 20;
        $locale = $batch['locale'];
        $ids = $batch['ids'];
        $offset = $batch['processed'];

        $chunk = array_slice($ids, $offset, $chunkSize);
        if (empty($chunk)) {
            // Done — compile
            Artisan::call('translations:compile', ['locale' => $locale]);
            Cache::forget($batchKey);
            return response()->json([
                'done'      => true,
                'total'     => $batch['total'],
                'succeeded' => $batch['succeeded'],
                'failed'    => $batch['failed'],
            ]);
        }

        // Fetch keys for this chunk
        $keys = TranslationKey::whereIn('id', $chunk)->get();
        $items = [];
        foreach ($keys as $key) {
            $items[$key->id] = $key->default_text;
        }

        $succeeded = 0;
        $failed = 0;

        try {
            $service = app(TranslationService::class);

            // Check if API key is configured
            if (empty(config('services.openai.key'))) {
                Cache::forget($batchKey);
                return response()->json([
                    'done'  => true,
                    'error' => 'OpenAI API key is not configured. Set OPENAI_API_KEY in your .env file.',
                    'total' => $batch['total'],
                    'succeeded' => $batch['succeeded'],
                    'failed'    => $batch['total'] - $batch['succeeded'],
                ]);
            }

            $results = $service->translateBatch($items, $locale);

            foreach ($keys as $key) {
                $translated = $results[(string) $key->id] ?? null;
                if ($translated) {
                    Translation::updateOrCreate(
                        ['translation_key_id' => $key->id, 'locale' => $locale],
                        [
                            'text'            => $translated,
                            'is_ai_generated' => true,
                            'is_approved'     => false,
                        ]
                    );
                    $succeeded++;
                } else {
                    $failed++;
                }
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('translateAllNext error: ' . $e->getMessage());
            $failed = count($chunk);
        }

        $batch['processed'] += count($chunk);
        $batch['succeeded'] += $succeeded;
        $batch['failed'] += $failed;
        Cache::put($batchKey, $batch, 3600);

        return response()->json([
            'done'      => false,
            'total'     => $batch['total'],
            'processed' => $batch['processed'],
            'succeeded' => $batch['succeeded'],
            'failed'    => $batch['failed'],
        ]);
    }

    public function translateAllCancel()
    {
        $batchKey = 'translate_all_' . Auth::id();
        $batch = Cache::get($batchKey);

        if ($batch) {
            $batch['cancelled'] = true;
            Cache::put($batchKey, $batch, 3600);

            // Compile what we have so far
            Artisan::call('translations:compile', ['locale' => $batch['locale']]);
        }

        return response()->json(['success' => true, 'message' => 'Batch cancelled.']);
    }

    public function processQueue()
    {
        set_time_limit(300);

        $processed = 0;
        $maxJobs = 200;

        // Process pending jobs from the queue synchronously
        while ($processed < $maxJobs) {
            $job = DB::table('jobs')
                ->where(function ($q) {
                    $q->where('payload', 'like', '%CreateTranslationKey%')
                      ->orWhere('payload', 'like', '%TranslatePhrase%');
                })
                ->orderBy('id')
                ->first();

            if (!$job) break;

            try {
                $payload = json_decode($job->payload, true);
                $command = unserialize($payload['data']['command']);

                if ($command instanceof \App\Jobs\CreateTranslationKey) {
                    $command->handle();
                } elseif ($command instanceof \App\Jobs\TranslatePhrase) {
                    $command->handle(app(TranslationService::class));
                }

                DB::table('jobs')->where('id', $job->id)->delete();
                $processed++;
            } catch (\Throwable $e) {
                // Move to failed or just delete to avoid infinite loop
                DB::table('jobs')->where('id', $job->id)->delete();
                \Illuminate\Support\Facades\Log::error('processQueue: ' . $e->getMessage());
                $processed++;
            }
        }

        if ($processed > 0) {
            // Recompile all active locales after processing
            Artisan::call('translations:compile');
        }

        return back()->with('success', x_('Processed', 'controller') . ' ' . $processed . ' ' . x_('pending translation jobs.', 'controller'));
    }

    public function switchLocale(Request $request)
    {
        $locale = $request->input('locale', 'en');

        $supported = array_merge(
            array_keys(config('translation.available_locales', [])),
            array_keys(config('translation.locales', ['en' => 'English']))
        );
        $supported[] = 'en';

        if (!in_array($locale, $supported)) {
            $locale = 'en';
        }

        session(['locale' => $locale]);
        app()->setLocale($locale);

        if (Auth::check()) {
            Auth::user()->update(['locale' => $locale]);
        }

        return back()->with('success', x_('Language changed.', 'controller'));
    }
}

<?php

namespace App\Jobs;

use App\Models\TranslationKey;
use App\Services\TranslationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

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

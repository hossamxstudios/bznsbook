<?php

namespace App\Jobs;

use App\Models\TranslationKey;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTranslationKey implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;

    public function __construct(
        public string $param,
        public ?string $place,
        public ?string $modelClass,
        public ?int $modelId,
        public string $locale,
    ) {}

    public function handle(): void
    {
        $key = TranslationKey::firstOrCreate(
            [
                'param' => $this->param,
                'place' => $this->place,
                'translatable_type' => $this->modelClass,
                'translatable_id' => $this->modelId,
            ],
            ['default_text' => $this->param]
        );

        if (config('translation.auto_translate', true) && $this->locale !== 'en') {
            if (!$key->translations()->where('locale', $this->locale)->exists()) {
                TranslatePhrase::dispatch($key->id, $this->locale);
            }
        }
    }
}

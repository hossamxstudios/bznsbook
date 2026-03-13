<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TranslationService
{
    protected string $apiKey;
    protected string $model;

    protected array $localeNames = [
        'ar'    => 'Modern Standard Arabic (العربية الفصحى)',
        'ar_eg' => 'Egyptian Arabic dialect (عامية مصرية)',
        'ar_sa' => 'Saudi Arabic dialect (العربية السعودية)',
        'fr'    => 'French (Français)',
        'es'    => 'Spanish (Español)',
        'de'    => 'German (Deutsch)',
        'tr'    => 'Turkish (Türkçe)',
        'zh'    => 'Chinese Simplified (简体中文)',
        'ja'    => 'Japanese (日本語)',
    ];

    public function __construct()
    {
        $this->apiKey = config('services.openai.key', '');
        $this->model = config('translation.openai_model', 'gpt-4o-mini');
    }

    public function translate(string $text, string $locale, ?string $place = null): ?string
    {
        if (empty($this->apiKey)) {
            Log::warning('TranslationService: OpenAI API key is not set.');
            return null;
        }

        $localeName = $this->localeNames[$locale] ?? $locale;
        $contextHint = $place ? " This text appears in the '{$place}' section of the UI." : '';

        $systemPrompt = "You are a professional translator for a business services marketplace platform (BznsBook). "
            . "Translate the following UI text from English to {$localeName}. "
            . "Return ONLY the translated text, no explanations, no quotes, no extra formatting."
            . $contextHint;

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$this->apiKey}",
                'Content-Type'  => 'application/json',
            ])->timeout(30)->post('https://api.openai.com/v1/chat/completions', [
                'model'       => $this->model,
                'temperature' => 0.1,
                'max_tokens'  => 500,
                'messages'    => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $text],
                ],
            ]);

            if ($response->successful()) {
                $result = $response->json('choices.0.message.content');
                return $result ? trim($result) : null;
            }

            Log::error('TranslationService: API error', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
            return null;
        } catch (\Throwable $e) {
            Log::error('TranslationService: Exception', ['message' => $e->getMessage()]);
            return null;
        }
    }

    public function translateBatch(array $items, string $locale): array
    {
        if (empty($this->apiKey) || empty($items)) {
            return [];
        }

        $localeName = $this->localeNames[$locale] ?? $locale;

        $systemPrompt = "You are a professional translator for a business services marketplace platform (BznsBook). "
            . "Translate the following UI texts from English to {$localeName}. "
            . "You will receive a JSON object where keys are IDs and values are English texts. "
            . "Return a JSON object with the same keys and translated values. "
            . "Return ONLY valid JSON, no explanations.";

        $payload = [];
        foreach ($items as $id => $text) {
            $payload[(string) $id] = $text;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$this->apiKey}",
                'Content-Type'  => 'application/json',
            ])->timeout(120)->post('https://api.openai.com/v1/chat/completions', [
                'model'           => $this->model,
                'temperature'     => 0.1,
                'max_tokens'      => 4000,
                'response_format' => ['type' => 'json_object'],
                'messages'        => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => json_encode($payload, JSON_UNESCAPED_UNICODE)],
                ],
            ]);

            if ($response->successful()) {
                $content = $response->json('choices.0.message.content');
                $decoded = json_decode($content, true);
                return is_array($decoded) ? $decoded : [];
            }

            Log::error('TranslationService::translateBatch: API error', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
            return [];
        } catch (\Throwable $e) {
            Log::error('TranslationService::translateBatch: Exception', ['message' => $e->getMessage()]);
            return [];
        }
    }
}

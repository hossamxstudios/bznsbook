<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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

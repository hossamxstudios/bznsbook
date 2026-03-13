<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

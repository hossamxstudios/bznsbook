<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', true)->where('ends_at', '>=', now());
    }
}

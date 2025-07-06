<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Portfolio extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'portfolio_service');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('portfolio')
            ->singleFile();
    }

    protected $casts = [
        'expertise' => 'array',
    ];
}

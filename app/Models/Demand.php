<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Demand extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];

    public function from_client(){
        return $this->belongsTo(Client::class, 'from_client_id');
    }

    public function to_client(){
        return $this->belongsTo(Client::class, 'to_client_id');
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
        
        $this->addMediaCollection('proposal')
            ->singleFile()
            ->acceptsMimeTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
    }
    
    /**
     * Get all reviews for this service request
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}

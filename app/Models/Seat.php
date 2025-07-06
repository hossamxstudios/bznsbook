<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Seat extends Model implements HasMedia
{
    protected $guarded = [];
    use InteractsWithMedia;

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    // Helper methods
    public function getStatusBadgeAttribute()
    {
        $colors = [
            'pending' => 'bg-warning',
            'contacted' => 'bg-info',
            'proposal' => 'bg-primary',
            'accepted' => 'bg-success',
            'rejected' => 'bg-danger'
        ];

        return '<span class="badge ' . ($colors[$this->status] ?? 'bg-secondary') . '">' . ucfirst($this->status) . '</span>';
    }

    public function getProjectAttribute()
    {
        return $this->batch->project;
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('seat')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
        
        // Collection for proposal documents
        $this->addMediaCollection('proposals')
            ->singleFile()
            ->acceptsMimeTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
    }
}

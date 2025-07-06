<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia {

    protected $guarded = [];
    use InteractsWithMedia, SoftDeletes;

    protected $casts = [
        'skills' => 'array',
    ];

    // Constants for project status
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_AWARDED = 'awarded';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function winner(){
        return $this->belongsTo(Client::class, 'winner_id','id');
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'project_service');
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }

    // Convenience methods for batch management
    public function getActiveSeatsCount(){
        return $this->batches()->where('is_active', 1)->withCount('seats')->get()->sum('seats_count');
    }

    public function getActiveBatch(){
        return $this->batches()->where('is_active', 1)->first();
    }

    public function hasWinner(){
        return !is_null($this->winner);
    }

    public function getAllSeats(){
        return Seat::whereHas('batch', function($query) { $query->where('project_id', $this->id);})->get();
    }

    // Check if a client has already applied to this project
    public function clientHasApplied($clientId){
        return Seat::whereHas('batch', function($query) {
            $query->where('project_id', $this->id);
        })->where('client_id', $clientId)->exists();
    }

    // Status helpers
    public function getStatusBadgeAttribute(){
        $colors = [
            self::STATUS_PENDING => 'bg-warning',
            self::STATUS_ACTIVE => 'bg-success',
            self::STATUS_AWARDED => 'bg-primary',
            self::STATUS_COMPLETED => 'bg-info',
            self::STATUS_CANCELLED => 'bg-danger'
        ];

        return '<span class="badge' . ($colors[$this->status] ?? 'bg-secondary') . '">' . ucfirst($this->status) . '</span>';
    }

    public function registerMediaCollections(): void{
        $this->addMediaCollection('projects')->singleFile();
    }
}

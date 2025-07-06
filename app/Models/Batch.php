<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'project_id',
        'name',
        'number',
        'is_active'
    ];

    // Constants
    const MAX_SEATS = 5;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    // Seat management helper methods
    public function hasAvailableSeats()
    {
        return $this->seats()->count() < self::MAX_SEATS;
    }

    public function getAvailableSeatsCount()
    {
        return self::MAX_SEATS - $this->seats()->count();
    }

    public function isFull()
    {
        return $this->seats()->count() >= self::MAX_SEATS;
    }

    // Status helpers
    public function getProgressAttribute()
    {
        $totalSeats = self::MAX_SEATS;
        $filledSeats = $this->seats()->count();

        return ($filledSeats / $totalSeats) * 100;
    }
}

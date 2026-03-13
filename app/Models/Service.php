<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $guarded = [];


    public function clients(){
        return $this->belongsTo(Client::class);
    }

    public function subcategories(){
        return $this->belongsToMany(Subcategory::class, 'service_subcategory');
    }

    public function projects(){
        return $this->belongsToMany(Project::class, 'project_service');
    }

    public function portfolios(){
        return $this->belongsToMany(Portfolio::class, 'portfolio_service');
    }

    public function demands(){
        return $this->hasMany(Demand::class);
    }

    public function getSkillsAttribute($value): array
    {
        if (is_array($value)) {
            return $value;
        }

        if (empty($value)) {
            return [];
        }

        // Try JSON decode first
        $decoded = json_decode($value, true);
        if (is_array($decoded)) {
            return $decoded;
        }

        // Fallback: comma-separated string
        return array_map('trim', explode(',', $value));
    }

    public function setSkillsAttribute($value): void
    {
        $this->attributes['skills'] = is_array($value) ? json_encode($value) : $value;
    }


}

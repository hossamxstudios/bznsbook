<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model {

    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function deals(){
        return $this->belongsToMany(Deal::class, 'contact_deal');
    }

    public function sections(){
        return $this->belongsToMany(Section::class, 'company_section');
    }

    public function leads(){
        return $this->hasMany(Lead::class);
    }

    public function notes(){
        return $this->morphMany(Note::class, 'notable')->latest();
    }

    public function logs(){
        return $this->morphMany(Log::class, 'loggable')->latest();
    }

    public function members(){
        return $this->hasMany(Member::class);
    }

    public function job_requests(){
        return $this->hasMany(Job_request::class);
    }

    public function jobs(){
        return $this->hasMany(Career::class);
    }

    public function interviews() {
        return $this->hasMany(Interview::class);
    }

    public function batches() {
        return $this->hasMany(Batch::class);
    }
}

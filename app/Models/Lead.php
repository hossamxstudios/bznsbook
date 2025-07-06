<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Log;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function deal()
    {
        return $this->hasMany(Deal::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable')->latest();
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable')->latest();
    }

    public function sections(){
        return $this->belongsToMany(Service::class, 'lead_section');
    }

}

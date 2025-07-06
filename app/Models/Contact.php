<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function deals()
    {
        return $this->belongsToMany(Deal::class, 'contact_deal');
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable')->latest();
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable')->latest();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Industry extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function pipelines()
    {
        return $this->hasMany(Pipeline::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class);
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

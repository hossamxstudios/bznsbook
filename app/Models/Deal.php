<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model {

    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function pipeline(){
        return $this->belongsTo(Pipeline::class);
    }

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function companies(){
        return $this->belongsToMany(Company::class, 'company_deal');
    }

    public function contacts(){
        return $this->belongsToMany(Contact::class, 'contact_deal');
    }

    public function notes(){
        return $this->morphMany(Note::class, 'notable')->latest();
    }

    public function logs(){
        return $this->morphMany(Log::class, 'loggable')->latest();
    }

}

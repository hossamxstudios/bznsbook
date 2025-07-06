<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Section extends Model implements HasMedia {

    use  InteractsWithMedia,SoftDeletes;

    protected $guarded = [];

    public function companies(){
        return $this->belongsToMany(Company::class, 'company_section');
    }

    public function leads(){
        return $this->belongsToMany(Lead::class, 'lead_section');
    }

}

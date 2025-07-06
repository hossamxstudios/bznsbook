<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia {

    use InteractsWithMedia, SoftDeletes;
    
    protected $guarded = [];

    public function topic(){
        return $this->belongsTo(Topic::class);
    }
}

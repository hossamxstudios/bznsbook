<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model {

    use SoftDeletes;
    
    protected $guarded = [];
    
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}

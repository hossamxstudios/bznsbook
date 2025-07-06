<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model {

    use SoftDeletes ;
    protected $guarded = [];

    // jobs and candidates relationships

    public function jobs() {
        return $this->morphedByMany(Career::class , 'taggable');
    }

    public function candidates() {
        return $this->morphedByMany(Candidate::class , 'taggable');
    }
}

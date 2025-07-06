<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model{

    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function pipeline(){
        return $this->belongsTo(Pipeline::class);
    }

    public function deals(){
        return $this->hasMany(Deal::class);
    }

    public function leads(){
        return $this->hasMany(Lead::class);
    }

    public function applications() {
        return $this->hasMany(Application::class);
    }


}

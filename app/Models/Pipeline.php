<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pipeline extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function jobs() {
        return $this->hasMany(Career::class);
    }

    public function applications() {
        return $this->hasMany(Application::class);
    }
}

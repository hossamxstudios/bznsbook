<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $guarded = [];


    public function clients(){
        return $this->belongsTo(Client::class);
    }

    public function subcategories(){
        return $this->belongsToMany(Subcategory::class, 'service_subcategory');
    }

    public function projects(){
        return $this->belongsToMany(Project::class, 'project_service');
    }

    public function portfolios(){
        return $this->belongsToMany(Portfolio::class, 'portfolio_service');
    }

    public function demands(){
        return $this->hasMany(Demand::class);
    }

    protected $casts = [
        'skills' => 'array',
    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // clients
    public function clients(){
        return $this->belongsToMany(Client::class, 'client_subcategory');
    }

    // services
    public function services(){
        return $this->belongsToMany(Service::class, 'service_subcategory');
    }

    // materials
    public function materials(){
        return $this->hasMany(Material::class);
    }
}

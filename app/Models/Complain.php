<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $guarded = [];

    public function from_client(){
        return $this->belongsTo(Client::class, 'from_client_id');
    }
    public function to_client(){
        return $this->belongsTo(Client::class, 'to_client_id');
    }
}

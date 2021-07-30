<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

     public function plats()
    {
        return $this->hasMany('App\Models\Plat');
    }

     public function ventes()
    {
        return $this->hasMany('App\Models\Vente');
    }

}

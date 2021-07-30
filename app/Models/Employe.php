<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = "employes";

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'restaurant_id', 'id');
    }
}

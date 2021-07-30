<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function restaurants()
    {
        return $this->belongsTo('App\Models\Restaurant', 'restaurant_id', 'id');
    }

    public function clients()
    {
        return $this->belongsTo('App\Models\Client', 'client_id', 'id');
    }

    public function nombreCommande()
    {
        $count = Commande::where('quantite', 1)->count();

    }

    public function scopeCommandes($query)
    {
        return $query->orderBy('created_at', 'DESC')->get();

    }

    public function getFakeMontantAttribute($query)
    {
        return $this->attributes['prix'] = $this->attributes['prix']++;
    }

}

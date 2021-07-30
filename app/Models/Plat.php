<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $table = "plats";

    protected $fillable = ['quantite'];


     public function restaurants()
    {
        return $this->belongsTo('App\Models\Restaurant', 'restaurant_id', 'id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Models\Categorie', 'categorie_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }



    public function getPrix()
    {
        $prix = $this->prix / 1000;
        return number_format($prix, 3, '.', ' ') . ' GNF';
    }
}

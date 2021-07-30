<?php

namespace App\Http\Livewire;

use App\Models\Plat;
use Livewire\Component;
use Livewire\WithPagination;

class Acceuil extends Component
{
    public $searchTerm;

    use WithPagination;
    public function render()
    {
        // $plats = Plat::where('id', 'LIKE', $searchTerm);

        // $searchTerm = '%' . $this->searchTerm . '%';
        // $plats = DB::table('restaurants')
        //     ->join('plats', 'restaurants.id', '=', 'plats.restaurant_id')
        //     ->select('restaurants.*', 'plats.*')
        //     ->where('restaurants.adresse_restaurant', 'LIKE', $searchTerm)
        //     ->orderBy('restaurants.created_at', 'DESC')->get();
        //  dd($plats);
        $searchTerm = '%' . $this->searchTerm . '%';
        $plats = Plat::where('designation', 'LIKE', $searchTerm)
            ->orWhere('description', 'LIKE', $searchTerm)
            ->orWhere('quantite', 'LIKE', $searchTerm)
            ->orWhere('prix', 'LIKE', $searchTerm)
            ->orderBy('id', 'DESC')->paginate(5);

        return view('livewire.test', ['plats' => $plats]);
    }
}

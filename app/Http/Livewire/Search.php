<?php

namespace App\Http\Livewire;

use App\Models\Plat;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    public $query;

    public function updatingQuery()
    {
        $this->resetPage();
    }

    use WithPagination;
    public function render()
    {
        $works = '%' . $this->query . '%';
        $plats=DB::table('restaurants')
                ->join('plats', 'restaurants.id', '=', 'plats.restaurant_id')
                ->select('restaurants.*', 'plats.*')
                ->where('restaurants.adresse_restaurant', 'LIKE', $works)
                ->orWhere('plats.designation', 'LIKE', $works)
                ->orderBy('restaurants.created_at', 'DESC')
                ->paginate(4);
        return view('livewire.search', ['plats' => $plats]);

    }
}

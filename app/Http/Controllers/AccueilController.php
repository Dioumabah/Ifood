<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public $query;

    public function index()
    {
        $works = '%' . request()->input('query') . '%';
        $plats = DB::table('restaurants')
                ->join('plats', 'restaurants.id', '=', 'plats.restaurant_id')
                ->select('restaurants.*', 'plats.*')
                ->where('restaurants.adresse_restaurant', 'LIKE', $works)
                ->orWhere('plats.designation', 'LIKE', $works)
                ->orderBy('restaurants.created_at', 'DESC')
                ->paginate(4);

                // dd($plats);

        return view('site.index', compact('plats'));
    }


     public function show(Plat $id)
    {
        return view('site.show', [
            'plat'=>$id
        ]);
    }


}

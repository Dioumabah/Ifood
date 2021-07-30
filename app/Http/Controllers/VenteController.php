<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $ventes = Vente::all();

        return view('admin.ventes.index', compact('ventes', 'restaurant'));
    }

    public function showDetailsFormVente($id)
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $vente = Vente::find($id);
        $plats = unserialize($vente->plats);
        return view('admin.ventes.show', compact('vente', 'plats', 'restaurant'));

    }

    public function store(Request $request)
    {

        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FournisseurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $fournisseurs = Fournisseur::all();

        return view('admin.fournisseurs.add', compact('fournisseurs', 'restaurant'));
    }

    public function showDetailsFormFournisseur($id)
    {
        $fournisseur = Fournisseur::find($id);

        return view('admin.fournisseurs.show', compact('fournisseur'));

    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'libelle' => ['required', 'string', 'min:3'],
            'contact' => ['required', 'string', 'min:3', 'unique:fournisseurs'],
            'email' => ['required', 'string', 'min:3', 'email', 'unique:fournisseurs'],
            'bp' => ['required', 'string'],

        ]);
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $fournisseur = new Fournisseur();

        $fournisseur->libelle = $request->libelle;
        $fournisseur->contact = $request->contact;
        $fournisseur->bp = $request->bp;
        $fournisseur->email = $request->email;
        $fournisseur->restaurant_id = $restaurant->id;

        $fournisseur->save();

        if ($fournisseur != null) {
            return Redirect::back()->with('fournisseur_created', 'Fournisseur créer avec success');
        }
    }

    public function showEditFormFournisseur($id)
    {
        $fournisseur = Fournisseur::find($id);

        return view('admin.fournisseurs.edit', compact('fournisseur'));

    }

    public function updateFournisseur(Request $request)
    {

        $validateData = $request->validate([
            'libelle' => ['required', 'string', 'min:3'],
            'contact' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'min:3', 'email'],
            'bp' => ['required', 'string'],

        ]);
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $fournisseur = Fournisseur::find($request->id);

        $fournisseur->libelle = $request->libelle;
        $fournisseur->contact = $request->contact;
        $fournisseur->bp = $request->bp;
        $fournisseur->email = $request->email;
        $fournisseur->restaurant_id = $restaurant->id;

        $fournisseur->save();

        if ($fournisseur != null) {
            return Redirect::back()->with('fournisseur_updated', 'Fournisseur modifié avec success');

        }

    }

    public function supprimerFournisseur($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        $fournisseur->delete();

        return Redirect::back()->with('fournisseur_deleted', 'Fournisseur  supprimer avec success ');

    }
}

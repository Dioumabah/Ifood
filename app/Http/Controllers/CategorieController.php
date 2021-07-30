<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $categories = Categorie::all();

        return view('admin.categories.index', compact('categories', 'restaurant'));
    }

    public function showDetailsFormCategorie($id)
    {
        $categorie = Categorie::find($id);

        return view('admin.categories.show', compact('categorie'));

    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'designation' => ['required', 'string', 'min:3', 'unique:categories'],
            'libelle' => ['required', 'string', 'min:3'],

        ]);
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $categorie = new Categorie();

        $categorie->designation = $request->designation;
        $categorie->libelle = $request->libelle;
        $categorie->restaurant_id = $restaurant->id;

        $categorie->save();

        if ($categorie != null) {
            Flashy::primary('Categorie créer avec success!', 'http://your-awesome-link.com');
            return Redirect::back()->with('categorie_created', 'Categorie créer avec success');
        }
    }

    public function showEditFormCategorie($id)
    {
        $categorie = Categorie::find($id);

        return view('admin.categories.edit', compact('categorie'));

    }

    public function updateCategorie(Request $request)
    {

        $validateData = $request->validate([
            'designation' => ['required', 'string', 'min:3'],
            'libelle' => ['required', 'string', 'min:3'],
        ]);

        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();


        $categorie = Categorie::find($request->id);

        $categorie->designation = $request->designation;
        $categorie->libelle = $request->libelle;
        $categorie->restaurant_id = $restaurant->id;

        $categorie->save();
        if ($categorie != null) {
            Flashy::success('Categorie modifiée avec success!', 'material-icons');
            return Redirect::back()->with('categorie_updated', 'Categorie modifiée avec success');

        }

    }

    public function supprimerCategorie($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        Flashy::error('Catégorie  supprimée avec success!', 'http://your-awesome-link.com');

        return Redirect::back()->with('categorie_deleted', 'Catégorie  supprimée avec success ');

    }
}

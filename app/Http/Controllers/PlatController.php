<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Plat;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;

class PlatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $plats = Plat::all();
        $categorie = Categorie::all();
        return view('admin.plats.index', compact('plats', 'categorie', 'restaurant'));
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'designation' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:6'],
            'quantite' => ['required'],
            'prix' => ['required'],
            'photo' => 'file|mimes:jpeg,png,jpg|max:5000',
        ]);

        $plat = new Plat();
        $user = Auth::user()->code_restaurant;
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();


        if ($request->file('photo')) {
            $file = $request->photo;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $request->photo->move('uploads/plats/' . $restaurant->code_restaurant, $filename);
            $plat->photo = $filename;

            $plat->designation = $request->designation;
            $plat->description = $request->description;
            $plat->quantite = $request->quantite;
            $plat->prix = $request->prix;
            $plat->categorie_id = $request->categorie_id;
            $plat->restaurant_id = $restaurant->id;
            $plat->save();
            Flashy::success('Plat ajouté avec success!', 'material-icons');

            session()->flash('message', 'Plat créer avec success');

        }

        return redirect()->back();

    }

    public function showFormEditPlat($id)
    {
        $plat = Plat::find($id);
        $categorie = Categorie::all();

        return view('admin.plats.edit', compact('plat', 'categorie'));
    }

    public function updatePlat(Request $request)
    {
        $validateData = $request->validate([
            'designation' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:6'],
            'quantite' => ['required'],
            'prix' => ['required'],
            'photo' => 'file|mimes:jpeg,png,jpg|max:5000',
        ]);
       $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $plat = Plat::find($request->id);

        if ($request->file('photo')) {
            unlink(public_path('uploads/plats' . '/' . $restaurant->code_restaurant . '/' . $plat->photo));
            $file = $request->photo;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $request->photo->move('uploads/plats/' . $restaurant->code_restaurant, $filename);
            $plat->photo = $filename;

        }

        $plat->designation = $request->designation;
        $plat->description = $request->description;
        $plat->quantite = $request->quantite;
        $plat->prix = $request->prix;
        $plat->categorie_id = $request->categorie_id;
        $plat->restaurant_id = Auth::user()->id;
        $plat->save();
        Flashy::success('Plat modifié avec success!', 'material-icons');

        return redirect('plat')->with('plat_update', 'Plat modifié avec success');

    }

    public function supprimerPlat($id)
    {
        $user = Auth::user()->code_restaurant;

        $plat = Plat::findOrFail($id);
        unlink(public_path('uploads/plats' . '/' . $user . '/' . $plat->photo));
        $plat->delete();

        Flashy::error('Plat supprimer avec success!', 'material-icons');

        return Redirect::back()->with('plat_delete', 'Votre plat a été supprimer avec success ');

    }
    public function plat()
    {
        return view('admin.plats.plat');
    }
}

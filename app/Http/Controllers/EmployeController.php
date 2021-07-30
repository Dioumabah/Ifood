<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmployeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $employes = Employe::all();

        return view('admin.employes.add', compact('employes', 'restaurant'));
    }

    public function showDetailsFormEmploye($id)
    {
        $employe = Employe::find($id);

        return view('admin.employes.show', compact('employe'));

    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'code_em' => ['required', 'string', 'min:3', 'unique:employes'],
            'nom_complet' => ['required', 'string', 'min:3'],
            'contact' => ['required', 'string', 'min:3', 'unique:employes'],
            'email' => ['required', 'string', 'min:3', 'email', 'unique:employes'],
            'adresse' => ['required', 'string'],

        ]);
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $employe = new Employe();

        $employe->code_em = $request->code_em;
        $employe->nom_complet = $request->nom_complet;
        $employe->genre = $request->genre;
        $employe->role = $request->role;
        $employe->contact = $request->contact;
        $employe->email = $request->email;
        $employe->adresse = $request->adresse;
        $employe->restaurant_id = $restaurant->id;

        $employe->save();

        if ($employe != null) {
            return Redirect::back()->with('em_created', 'Employé créer avec success');
        }
    }

    public function showEditFormEmploye($id)
    {
        $employe = Employe::find($id);

        return view('admin.employes.edit', compact('employe'));

    }

    public function updateEmploye(Request $request)
    {

        $validateData = $request->validate([
            'nom_complet' => ['required', 'string', 'min:3'],
            'adresse' => ['required', 'string'],
        ]);

        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $employe = Employe::find($request->id);

        $employe->code_em = $request->code_em;
        $employe->nom_complet = $request->nom_complet;
        $employe->genre = $request->genre;
        $employe->role = $request->role;
        $employe->contact = $request->contact;
        $employe->email = $request->email;
        $employe->adresse = $request->adresse;
        $employe->restaurant_id = $restaurant->id;

        $employe->save();

        if ($employe != null) {
            return Redirect::back()->with('employe_updated', 'Employé modifié avec success');

        }

    }

    public function supprimerEmploye($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return Redirect::back()->with('employe_deleted', 'Employé  supprimer avec success ');

    }

}

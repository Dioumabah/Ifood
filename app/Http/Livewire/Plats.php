<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Plats extends Component
{

    public $ids;
    public $designation;
    public $description;
    public $quantite;
    public $prix;
    public $photo;
    public $categorie_id;
    public $restaurant_id;
    public $searchTerm;

    public function resetInputFields()
    {
        $this->designation = '';
        $this->description = '';
        $this->quantite = '';
        $this->prix = '';
        $this->photo = '';
        $this->categorie_id = '';
        $this->restaurant_id = '';
    }

    public function store(Request $request)
    {
        $validateData = $this->validate([
            'designation' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:6'],
            'quantite' => ['required'],
            'prix' => ['required'],
            'photo' => 'file|mimes:jpeg,png,jpg|max:5000',
        ]);

        $plat = new Plat();
        $user = Auth::user()->code_restaurant;

        if ($request->file('photo')) {
            $file = $request->photo;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $request->photo->move('uploads/plats/' . $user, $filename);
            $plat->photo = $filename;

            $plat->designation = $request->designation;
            $plat->description = $request->description;
            $plat->quantite = $request->quantite;
            $plat->prix = $request->prix;
            $plat->categorie_id = $request->categorie_id;
            $plat->restaurant_id = Auth::user()->id;
            $plat->save();
        }
        session()->flash('message', 'Plat created Successfully');
        $this->resetInputFields();
        $this->emit('platAdded');

    }

    public function render()
    {
        $plats = Plat::all();
        $categorie = Categorie::all();

        return view('livewire.plats', ['plats' => $plats, 'categorie' => $categorie])->layout('layouts.masteradmin');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $clients = Client::all();

        return view('admin.clients.add', compact('clients', 'restaurant'));
    }

    public function showDetailsFormClient($id)
    {
        $client = Client::find($id);

        return view('admin.clients.show', compact('client'));

    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'code_client' => ['required', 'string', 'min:3', 'unique:clients'],
            'nom_complet' => ['required', 'string', 'min:3'],
            'etat' => ['required', 'string'],
            'localite' => ['required', 'string'],
            'contact' => ['required', 'string', 'min:3', 'unique:clients'],
            'genre' => ['required', 'string'],

        ]);
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $client = new Client();

        $client->code_client = $request->code_client;
        $client->nom_complet = $request->nom_complet;
        $client->etat = $request->etat;
        $client->contact = $request->contact;
        $client->localite = $request->localite;
        $client->genre = $request->genre;
        $client->restaurant_id = $restaurant->id;

        $client->save();

        if ($client != null) {
            return Redirect::back()->with('client_created', 'Client créer avec success');
        }
    }

    public function showEditFormClient($id)
    {
        $client = Client::find($id);

        return view('admin.clients.edit', compact('client'));

    }

    public function updateClient(Request $request)
    {

        $validateData = $request->validate([
            'nom_complet' => ['required', 'string', 'min:3'],
            'etat' => ['required', 'string'],
            'localite' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'genre' => ['required', 'string'],

        ]);
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $client = Client::find($request->id);

        $client->nom_complet = $request->nom_complet;
        $client->etat = $request->etat;
        $client->contact = $request->contact;
        $client->localite = $request->localite;
        $client->genre = $request->genre;
        $client->restaurant_id = $restaurant->id;

        $client->save();

        if ($client != null) {
            return Redirect::back()->with('client_updated', 'Client modifié avec success');

        }

    }

    public function supprimerClient($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return Redirect::back()->with('client_deleted', 'Client  supprimer avec success ');

    }
}

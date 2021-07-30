<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;

class TableController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $tables = Table::all();
        return view('admin.table.index', compact('tables', 'restaurant'));
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'libelle' => ['required', 'string', 'min:3'],
            'code_table' => ['required', 'string', 'min:3', 'unique:tables'],
            'nombre_plat' => ['required'],
        ]);
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $table = new Table();

        $table->libelle = $request->libelle;
        $table->code_table = $request->code_table;
        $table->nombre_plat = $request->nombre_plat;
        $table->restaurant_id = $restaurant->id;

        $table->save();

        return Redirect::back()->with('table_created', 'Table créer avec success');

    }

    public function showEditFormTable($id)
    {
        $table = Table::find($id);

        return view('admin.table.edit', compact('table'));

    }

    public function updateTable(Request $request)
    {

        $validateData = $request->validate([
            'libelle' => ['required', 'string', 'min:3'],
            'nombre_plat' => ['required'],
        ]);

        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $table = Table::find($request->id);

        $table->libelle = $request->libelle;
        $table->nombre_plat = $request->nombre_plat;
        $table->restaurant_id = $restaurant->id;

        $table->save();

        return Redirect::back()->with('table_updated', 'Table modifiée avec success');

    }

    public function supprimerTable($id)
    {
        $plat = Table::findOrFail($id);
        $plat->delete();

        return Redirect::back()->with('table_deleted', 'Votre table a été supprimer avec success ');

    }

    public function listes()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $tables = Table::all();
        return view('admin.table.listes', compact('tables', 'restaurant'));

    }

    public function libreTable($id, Request $request)
    {
        $table = Table::find($request->id);

        $table->status = 'Libre';

        $table->save();
        Flashy::primary('La Table est maintenant à : ' . $table['status'], 'material-icons');

        return Redirect::back();

    }

    public function occupeTable($id, Request $request)
    {
        $table = Table::find($request->id);

        $table->status = 'Occupé';

        $table->save();
        Flashy::primary('La Table est maintenant à : ' . $table['status'], 'material-icons');

        return Redirect::back();

    }

}

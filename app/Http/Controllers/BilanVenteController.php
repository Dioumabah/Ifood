<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilanVenteController extends Controller
{
    public function vente()
    {
        return view('admin.ventes.vendre');
    }
    public function bilan()
    {
        return view('admin.ventes.bilan');
    }
}

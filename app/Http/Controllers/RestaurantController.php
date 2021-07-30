<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('admin.restaurant.index');
    }

    public function showRegistrationFormResto()
    {
        return view('restaurant.create');
    }

    public function registerResto(Request $request)
    {
        $validateData = $request->validate([
            'code_restaurant' => ['required', 'string', 'max:255', 'unique:restaurants'],
            'adresse_restaurant' => ['required', 'string', 'max:255'],
            'bp' => ['required', 'string', 'max:255'],
            'immatriculation' => ['required', 'string', 'max:255', 'unique:restaurants'],
            'tel' => ['required', 'string', 'max:255', 'unique:restaurants'],
        ]);

        $user = Auth::user()->id;

        $user_utype = User::find(Auth::user()->id);
        $user_utype->utype = 'RESTO';
        $user_utype->save();

        $resto = new Restaurant();
        $resto->code_restaurant = $request->code_restaurant;
        $resto->adresse_restaurant = $request->adresse_restaurant;
        $resto->bp = $request->bp;
        $resto->immatriculation = $request->immatriculation;
        $resto->tel = $request->tel;
        $resto->user_id = $user;

        $resto->save();

        if ($resto != null) {
            Flashy::success('Votre compte a été créer en tant que restaurant. !', 'material-icons');
            return Redirect::route('home');

        }
    }
}

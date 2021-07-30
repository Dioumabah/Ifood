<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Visiteur;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['isVerified' => 1]);

    }

    public function redirectTo()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $visiteur = Visiteur::Where('user_id', Auth::user()->id)->first();

        if (Auth::user()->utype == "RESTO" && !$restaurant) {
            return '/resto';
        } elseif (Auth::user()->utype == "RESTO" && $restaurant) {
            return '/home';
        } elseif (Auth::user()->utype == "VIST" && !$visiteur) {
            return '/visiteur';
        } elseif (Auth::user()->utype == "VIST" && $visiteur) {
            return '/site';
        } else {

        }
    }
}

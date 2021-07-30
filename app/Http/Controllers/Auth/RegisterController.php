<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Visiteur;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'min:3', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function register(Request $request)
    {

        $validateData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->isVerified = 1;
        $user->save();
        if ($user != null) {
            //Send Email
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            //Show a message
            Flashy::success('Votre compte a été créer. Ouvrer votre email pour verifier le lien d\'activation!', 'material-icons');

            return redirect()->route('login')->with(session()->flash('alert alert-success', "Votre compte a été créer. Ouvrer votre email pour verifier le lien d'activation"));
        }
        else{
            //Show error message
            Flashy::error('Ce lien a expiré!', 'material-icons');

            return redirect()->back()->with(session()->flash('alert alert-danger', "Ce lien a expiré"));

        }


    }

    public function verifyUser(Request $request)
    {
        $verification_code = FacadesRequest::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if ($user != null) {
            $user->isVerified = 1;
            $user->save();
            Flashy::success('Votre compte a été activé avec success', 'material-icons');
            return redirect()->route('login')->with(session()->flash('alert-success', "Votre compte a été activé avec success."));

        }
        Flashy::danger('Echéc d\'activation.', 'material-icons');

        return redirect()->route('login')->with(session()->flash('alert-success', "Echéc d'activation."));

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
        } elseif (Auth::user()->utype == "ADMIN") {
            return '/home';
        } else {

        }
    }
}

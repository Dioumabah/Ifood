<?php

namespace App\Http\Controllers;

use App\Models\CommandeVisiteur;
use App\Models\Plat;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Visiteur;
use Darryldecode\Cart\Validators\Validator;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MercurySeries\Flashy\Flashy;

class VisiteurController extends Controller
{

    public function showRegistrationFormVisit()
    {
        return view('visiteur.create');
    }

    public function registerVisit(Request $request)
    {
        $validateData = $request->validate([
            'nom_complet' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255', 'unique:visiteurs'],
        ]);

        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $user = Auth::user()->id;

        $user_utype = User::find(Auth::user()->id);
        $user_utype->utype = 'VIST';
        $user_utype->save();

        $visit = new Visiteur();
        $visit->nom_complet = $request->nom_complet;
        $visit->tel = $request->tel;
        $visit->user_id = $user;

        $visit->save();

        if ($visit != null) {
            Flashy::success('Votre compte a été créer en tant que visiteur. !', 'material-icons');
            return Redirect::route('site');

        }
    }

    public function store(Request $request)
    {

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->plat_id;
        });

        if ($duplicata->isNotEmpty()) {
            Flashy::error('La commande a été déjà ajouté!', 'http://your-awesome-link.com');

        }

        $plat = Plat::find($request->plat_id);

        Cart::add($plat->id, $plat->designation, 1, $plat->prix)
            ->associate('App\Models\Plat');

        Flashy::success('Commande  ajoutée avec success!', 'http://your-awesome-link.com');

        return redirect()->back();
    }

    public function panier()
    {

        return view('visiteur.panier');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Flashy::error('Plat  supprimée avec success!', 'http://your-awesome-link.com');
        return redirect()->back();

    }

    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        $validateData = Validator::make($request->all(), [
            'qty' => 'required|numeric|between:1,10',

        ]);
        if ($validateData->fails()) {
            Flashy::danger('La Quantité  ne doit pas depasser 10!', 'http://your-awesome-link.com');

        }

        if ($data['qty'] > $data['quantite']) {
            Flashy::danger('La Quantité de la commande n\'est pas disponible !', 'http://your-awesome-link.com');

        }

        Cart::update($rowId, $data['qty']);
        Flashy::success('Quantité  de la commande est passé à : ' . $data['qty'], 'http://your-awesome-link.com');

        return response()->json(['success' => 'Quantité  modifié avec success']);
    }

    public function validerVente(Request $request)
    {

        if ($this->checkIfNotAvailable()) {
            Flashy::danger('Un plat dans votre panier n\'est plus disponible !', 'http://your-awesome-link.com');

        }

        $data = $request->json()->all();
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();


        $commande = new CommandeVisiteur();

        $commande->numero = $restaurant->code_restaurant . NOW()->format('ydms');

        $plats = [];
        $i = 0;

        foreach (Cart::content() as $plat) {
            $plats['plat_' . $i][] = $plat->model->designation;
            $plats['plat_' . $i][] = $plat->model->prix;
            $plats['plat_' . $i][] = $plat->qty;
            $i++;
        }

        $commande->plats = serialize($plats);
        $commande->date_commande = new DateTime();
        $commande->status = 'Non livré';
        $commande->restaurant_id = $plat->model->restaurants->id;
        $visiteur = Visiteur::Where('user_id', Auth::user()->id)->first();
        $commande->visiteur_id = $visiteur->id;
        $commande->save();

        if ($commande) {
            $this->updateStock();
            Cart::destroy();
            Flashy::success('Commande effectuée avec success!', 'http://your-awesome-link.com');
        }

        return redirect()->back();

    }

    public function checkIfNotAvailable()
    {
        foreach (Cart::content() as $item) {
            $plat = Plat::find($item->model->id);
            if ($plat->quantite < $item->qty) {
                return true;
            }
        }

        return false;

    }

    public function updateStock()
    {
        foreach (Cart::content() as $item) {
            $plat = Plat::find($item->model->id);
            $plat->update(['quantite' => $plat->quantite - $item->qty]);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Plat;
use App\Models\Restaurant;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class CommandeController extends Controller
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

        return view('admin.commande.index', compact('plats', 'categorie', 'restaurant'));
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

    public function commandeAfficher()
    {
        $client = Client::all();
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        return view('admin.commande.commande', compact('client', 'restaurant'));
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Flashy::error('Commande  supprimé avec success!', 'http://your-awesome-link.com');
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

    public function validerCommande(Request $request)
    {

        if ($this->checkIfNotAvailable()) {
            Flashy::danger('Une commande dans votre panier n\'est plus disponible !', 'http://your-awesome-link.com');

        }

        $data = $request->json()->all();
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $commande = new Commande();

        $commande->code_commande = substr($restaurant->code_restaurant, 0, -10) . NOW()->format('ydms');

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
        $commande->restaurant_id = $restaurant->id;
        $commande->client_id = $request->client_id;
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

    public function indexCommande()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $commandes = Commande::commandes();

        return view('admin.commande.indexCommande', compact('commandes', 'restaurant'));
    }

    public function showDetailsFormCommande($id)
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $commande = Commande::find($id);
        $plats = unserialize($commande->plats);
        return view('admin.commande.show', compact('commande', 'plats', 'restaurant'));

    }

    public function livrerCommande($id, Request $request)
    {

        $commande = Commande::find($request->id);

        $commande->status = 'Déjà Livré';

        $commande->save();
        Flashy::primary('La Commande est maintenant à : ' . $commande['status'], 'material-icons');

        return Redirect::back();

    }

    public function commandeNonLivrer()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $commandes = Commande::all();

        return view('admin.commande.nonlivrer', compact('commandes', 'restaurant'));
    }
    public function commandeLivrer()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $commandes = Commande::all();

        return view('admin.commande.livrer', compact('commandes', 'restaurant'));
    }

    public function bilanCommande()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();

        $commandes = Commande::all();
        return view('admin.commande.bilan', compact('commandes', 'restaurant'));
    }

}

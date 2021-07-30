<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Client;
use App\Models\Plat;
use App\Models\Restaurant;
use App\Models\Vente;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class CartController extends Controller
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

        return view('admin.cart.index', compact('plats', 'categorie', 'restaurant'));
    }

    public function store(Request $request)
    {

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->plat_id;
        });

        if ($duplicata->isNotEmpty()) {
            Flashy::error('Le Plat a été déjà ajouté!', 'http://your-awesome-link.com');

        }

        $plat = Plat::find($request->plat_id);

        Cart::add($plat->id, $plat->designation, 1, $plat->prix)
            ->associate('App\Models\Plat');

        Flashy::success('Plat  ajouté avec success!', 'http://your-awesome-link.com');

        return redirect()->back();
    }

    public function panier()
    {
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();
        $client = Client::all();

        return view('admin.cart.panier', compact('client', 'restaurant'));
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Flashy::error('Plat  supprimée avec success!', 'http://your-awesome-link.com');
        return redirect()->back();

    }

    public function search()
    {
        $q = '%' . $this->q . '%';

        $q = request()->input('q');
        $plats = Plat::where('designation', 'LIKE', $q)
            ->orWhere('description', 'LIKE', $q)
            ->paginate(6);
        return view('admin.cart.search', compact('plats'));
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
            Flashy::danger('La Quantité de plat n\'est pas disponible !', 'http://your-awesome-link.com');

        }

        Cart::update($rowId, $data['qty']);
        Flashy::success('Quantité  du plat est passé à : ' . $data['qty'], 'http://your-awesome-link.com');

        return response()->json(['success' => 'Quantité  modifié avec success']);
    }

    public function validerVente(Request $request)
    {

        if ($this->checkIfNotAvailable()) {
            Flashy::danger('Un plat dans votre panier n\'est plus disponible !', 'http://your-awesome-link.com');

        }

        $data = $request->json()->all();
        $restaurant = Restaurant::Where('user_id', Auth::user()->id)->first();


        $vente = new Vente();

        $vente->numero = substr($restaurant->code_restaurant, 0, -10) . NOW()->format('ydms');

        $plats = [];
        $i = 0;

        foreach (Cart::content() as $plat) {
            $plats['plat_' . $i][] = $plat->model->designation;
            $plats['plat_' . $i][] = $plat->model->prix;
            $plats['plat_' . $i][] = $plat->qty;
            $i++;
        }

        $vente->plats = serialize($plats);
        $vente->date_vente = new DateTime();
        $vente->restaurant_id = $restaurant->id;
        $vente->client_id = $request->client_id;
        $vente->save();

        if ($vente) {
            $this->updateStock();
            Cart::destroy();
            Flashy::success('Vente effectuée avec success!', 'http://your-awesome-link.com');
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

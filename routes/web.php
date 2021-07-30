<?php

use App\Http\Livewire\Acceuil;
use App\Http\Livewire\Plats;
use App\Http\Livewire\Search;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
});

// Plat
Route::get('/plat', 'App\Http\Controllers\PlatController@index');
Route::post('/create-plat', 'App\Http\Controllers\PlatController@store')->name('plat.create');
Route::get('/edit-plat/{id}', 'App\Http\Controllers\PlatController@showFormEditPlat');
Route::post('/update-plat', 'App\Http\Controllers\PlatController@updatePlat')->name('plat.update');
Route::get('/delete-plat/{id}', 'App\Http\Controllers\PlatController@supprimerPlat');

//VENTE
Route::get('/liste-vente', 'App\Http\Controllers\VenteController@index');
Route::post('/create-vente', 'App\Http\Controllers\VenteController@store')->name('vente.create');
Route::get('/detail-vente/{id}', 'App\Http\Controllers\VenteController@showDetailsFormVente');

//TABLE
Route::get('/table', 'App\Http\Controllers\TableController@index');
Route::post('/create-table', 'App\Http\Controllers\TableController@store')->name('table.create');
Route::get('/listes', 'App\Http\Controllers\TableController@listes');
Route::get('/edit-table/{id}', 'App\Http\Controllers\TableController@showEditFormTable');
Route::post('/update-table', 'App\Http\Controllers\TableController@updateTable')->name('table.update');
Route::get('/table-libre/{id}', 'App\Http\Controllers\TableController@libreTable');
Route::get('/table-occupe/{id}', 'App\Http\Controllers\TableController@occupeTable');
Route::get('/delete-table/{id}', 'App\Http\Controllers\TableController@supprimerTable');

// Commande
Route::get('/commande', 'App\Http\Controllers\CommandeController@index');
Route::post('/create-commande', 'App\Http\Controllers\CommandeController@store')->name('commande.store');
Route::post('/commande-valider', 'App\Http\Controllers\CommandeController@validerCommande')->name('commande.panier');
Route::get('/commande-afficher', 'App\Http\Controllers\CommandeController@commandeAfficher');
Route::post('/commande-edit/{rowId}', 'App\Http\Controllers\CommandeController@update')->name('commande.update');
Route::get('/vider-commande/{rowId}', 'App\Http\Controllers\CommandeController@destroy');
Route::get('/liste-commande', 'App\Http\Controllers\CommandeController@indexCommande');
Route::get('/detail-commande/{id}', 'App\Http\Controllers\CommandeController@showDetailsFormCommande');
Route::get('/commande-non/{id}', 'App\Http\Controllers\CommandeController@livrerCommande');
Route::get('/liste-livrer', 'App\Http\Controllers\CommandeController@commandeLivrer');
Route::get('/liste-nonlivrer', 'App\Http\Controllers\CommandeController@commandeNonLivrer');
Route::get('/bilan-commande', 'App\Http\Controllers\CommandeController@bilanCommande');

Route::get('/commande-livrer', 'App\Http\Controllers\CommandeController@livrer');
Route::get('/commande-nonlivrer', 'App\Http\Controllers\CommandeController@nonlivrer');
Route::get('/bvente', 'App\Http\Controllers\BilanVenteController@vente');
Route::get('/bilanvente', 'App\Http\Controllers\BilanVenteController@bilan');

// Employe
Route::get('/employe', 'App\Http\Controllers\EmployeController@index');
Route::post('/create-employe', 'App\Http\Controllers\EmployeController@store')->name('employe.create');
Route::get('/edit-employe/{id}', 'App\Http\Controllers\EmployeController@showEditFormEmploye');
Route::post('/update-employe', 'App\Http\Controllers\EmployeController@updateEmploye')->name('employe.update');
Route::get('/delete-employe/{id}', 'App\Http\Controllers\EmployeController@supprimerEmploye');
Route::get('/detail-employe/{id}', 'App\Http\Controllers\EmployeController@showDetailsFormEmploye');

// Categorie
Route::get('/categorie', 'App\Http\Controllers\CategorieController@index');
Route::post('/create-categorie', 'App\Http\Controllers\CategorieController@store')->name('categorie.create');
Route::get('/edit-categorie/{id}', 'App\Http\Controllers\CategorieController@showEditFormCategorie');
Route::post('/update-categorie', 'App\Http\Controllers\CategorieController@updateCategorie')->name('categorie.update');
Route::get('/delete-categorie/{id}', 'App\Http\Controllers\CategorieController@supprimerCategorie');
Route::get('/detail-categorie/{id}', 'App\Http\Controllers\CategorieController@showDetailsFormCategorie');

// Fournisseur
Route::get('/fournisseur', 'App\Http\Controllers\FournisseurController@index');
Route::post('/create-fournisseur', 'App\Http\Controllers\FournisseurController@store')->name('fournisseur.create');
Route::get('/edit-fournisseur/{id}', 'App\Http\Controllers\FournisseurController@showEditFormFournisseur');
Route::post('/update-fournisseur', 'App\Http\Controllers\FournisseurController@updateFournisseur')->name('fournisseur.update');
Route::get('/delete-fournisseur/{id}', 'App\Http\Controllers\FournisseurController@supprimerFournisseur');
Route::get('/detail-fournisseur/{id}', 'App\Http\Controllers\FournisseurController@showDetailsFormFournisseur');

// Client
Route::get('/client', 'App\Http\Controllers\ClientController@index');
Route::post('/create-client', 'App\Http\Controllers\ClientController@store')->name('client.create');
Route::get('/edit-client/{id}', 'App\Http\Controllers\ClientController@showEditFormClient');
Route::post('/update-client', 'App\Http\Controllers\ClientController@updateClient')->name('client.update');
Route::get('/delete-client/{id}', 'App\Http\Controllers\ClientController@supprimerClient');
Route::get('/detail-client/{id}', 'App\Http\Controllers\ClientController@showDetailsFormClient');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/plat-live', Plats::class);



// Route Cart

Route::get('/panier', 'App\Http\Controllers\CartController@panier');
Route::post('/mon-panier', 'App\Http\Controllers\CartController@validerVente')->name('cart.panier');
Route::get('/vente', 'App\Http\Controllers\CartController@index');
Route::post('/create-panier', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::post('/panier-edit/{rowId}', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::get('/vider-panier/{rowId}', 'App\Http\Controllers\CartController@destroy');
Route::get('/search', 'App\Http\Controllers\CartController@search')->name('plat.search');

//Pour les le site
Route::get('/site', 'App\Http\Controllers\AccueilController@index')->name('site.search');
Route::get('/site/{id}', 'App\Http\Controllers\AccueilController@show')->name('site.show');

// Route::get('/site', Search::class);
// Route::get('/index', Search::class);

Route::get('/compte', 'App\Http\Controllers\AccueilController@compte')->name('compte');

Route::get('/verify', [App\Http\Controllers\Auth\RegisterController::class, 'verifyUser'])->name('verify.user');

Route::get('/resto', [App\Http\Controllers\RestaurantController::class, 'showRegistrationFormResto']);
Route::post('/register-resto', [App\Http\Controllers\RestaurantController::class, 'registerResto'])->name('register-resto');

Route::get('/visiteur', [App\Http\Controllers\VisiteurController::class, 'showRegistrationFormVisit']);
Route::post('/register-visit', [App\Http\Controllers\VisiteurController::class, 'registerVisit'])->name('register-visit');

// VISITEURS
Route::post('/commande-visiteur', 'App\Http\Controllers\VisiteurController@store')->name('commande.visiteur');
Route::post('/panier-visiteur', 'App\Http\Controllers\VisiteurController@validerVente')->name('visiteur.panier');
Route::get('/visiteur-panier', 'App\Http\Controllers\VisiteurController@panier');
Route::post('/vpanier-edit/{rowId}', 'App\Http\Controllers\VisiteurController@update')->name('vpanier.update');
Route::get('/vvider-panier/{rowId}', 'App\Http\Controllers\VisiteurController@destroy');

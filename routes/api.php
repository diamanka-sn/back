<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvCommandePersonnaliseer within a group which
| is assigned the "api" mCommandePersonnalisedleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('api/mon', function () {
//     return response()->json(["utilisateur"=>"Ama"]);
// });
//Route::get('/listeBovinAvecRace',[App\Http\Controllers\bovinController::class,"listBovinAvecRace"]);
Route::get('/listBovinMalade',[App\Http\Controllers\bovinController::class,"listBovinMalade"]);
Route::get('/listBovinSain',[App\Http\Controllers\bovinController::class,"listBovinSain"]);
Route::get('/listBovinEnVente',[App\Http\Controllers\bovinController::class,"listBovinEnVente"]);
Route::get('/listBovinPasEnVente',[App\Http\Controllers\bovinController::class,"listBovinPasEnVente"]);
Route::get('/listBovinVivant',[App\Http\Controllers\bovinController::class,"listBovinVivant"]);
Route::get('/listBovinMort',[App\Http\Controllers\bovinController::class,"listBovinMort"]);
Route::get('/nombreBovin',[App\Http\Controllers\bovinController::class,"nombreBovin"]);
Route::get('/listBovinAvecDetaille',[App\Http\Controllers\bovinController::class,"listBovinAvecDetaille"]);


Route::get('/listVelleMalade',[App\Http\Controllers\velleController::class,"listVelleMalade"]);
Route::get('/listVelleSain',[App\Http\Controllers\velleController::class,"listVelleSain"]);
Route::get('/listVelleEnVente',[App\Http\Controllers\velleController::class,"listVelleEnVente"]);
Route::get('/listVellePasEnVente',[App\Http\Controllers\velleController::class,"listVellePasEnVente"]);
Route::get('/listVelleVivant',[App\Http\Controllers\velleController::class,"listVelleVivant"]);
Route::get('/listVelleMort',[App\Http\Controllers\velleController::class,"listVelleMort"]);
Route::get('/nombreVelle',[App\Http\Controllers\velleController::class,"nombreVelle"]);
Route::get('/listVelleAvecDetaille',[App\Http\Controllers\velleController::class,"listVelleAvecDetaille"]);


//bloc Veau
Route::get('/listVeauMalade',[App\Http\Controllers\veauController::class,"listVeauMalade"]);
Route::get('/listVeauSain',[App\Http\Controllers\veauController::class,"listVeauSain"]);
Route::get('/listVeauEnVente',[App\Http\Controllers\veauController::class,"listVeauEnVente"]);
Route::get('/listVeauPasEnVente',[App\Http\Controllers\veauController::class,"listVeauPasEnVente"]);
Route::get('/listVeauVivant',[App\Http\Controllers\veauController::class,"listVeauVivant"]);
Route::get('/listVeauMort',[App\Http\Controllers\veauController::class,"listVeauMort"]);
Route::get('/nombreVeau',[App\Http\Controllers\veauController::class,"nombreVeau"]);
Route::get('/listVeauAvecDetaille',[App\Http\Controllers\veauController::class,"listVeauAvecDetaille"]);
Route::get('/listVeauEnVenteAvecDetaille',[App\Http\Controllers\veauController::class,"listVeauEnVenteAvecDetaille"]);


//bloc taureau

Route::get('/listTaureauMalade',[App\Http\Controllers\taureauController::class,"listTaureauMalade"]);
Route::get('/listTaureauSain',[App\Http\Controllers\taureauController::class,"listTaureauSain"]);
Route::get('/listTaureauEnVente',[App\Http\Controllers\taureauController::class,"listTaureauEnVente"]);
Route::get('/listTaureauPasEnVente',[App\Http\Controllers\taureauController::class,"listTaureauPasEnVente"]);
Route::get('/listTaureauVivant',[App\Http\Controllers\taureauController::class,"listTaureauVivant"]);
Route::get('/nombreTaureauEnVente',[App\Http\Controllers\taureauController::class,"nombreTaureauEnVente"]);
Route::get('/listTaureauMort',[App\Http\Controllers\taureauController::class,"listTaureauMort"]);
Route::get('/nombreTaureau',[App\Http\Controllers\taureauController::class,"nombreTaureau"]);
Route::get('/listTaureauAvecDetaille',[App\Http\Controllers\taureauController::class,"listTaureauAvecDetaille"]);
Route::get('/listTaureauEnVenteAvecDetaille',[App\Http\Controllers\taureauController::class,"listTaureauEnVenteAvecDetaille"]);
Route::get('/nombreTaureauSain',[App\Http\Controllers\taureauController::class,"nombreTaureauSain"]);
Route::get('/nombreTaureauMalade',[App\Http\Controllers\taureauController::class,"nombreTaureauMalade"]);

//bloc commandePersonnaliseDetaille

Route::get('/commandePersonnaliseDetaille',[App\Http\Controllers\CommandePersonnaliseController::class,"commandePersonnaliseDetaille"]);
Route::get('/nombreCommandePersonnalise',[App\Http\Controllers\CommandePersonnaliseController::class,"nombreCommandePersonnalise"]);
Route::get('/commandePersoDetailleSuppression',[App\Http\Controllers\CommandePersonnaliseController::class,"commandePersoDetailleSuppression"]);


//bloc genisse

Route::get('/listGenisseMalade',[App\Http\Controllers\genisseController::class,"listGenisseMalade"]);
Route::get('/listGenisseSain',[App\Http\Controllers\genisseController::class,"listGenisseSain"]);
Route::get('/listGenisseEnVente',[App\Http\Controllers\genisseController::class,"listGenisseEnVente"]);
Route::get('/listGenissePasEnVente',[App\Http\Controllers\genisseController::class,"listGenissePasEnVente"]);
Route::get('/listGenisseVivant',[App\Http\Controllers\genisseController::class,"listGenisseVivant"]);
Route::get('/listGenisseMort',[App\Http\Controllers\genisseController::class,"listGenisseMort"]);
Route::get('/nombreGenisse',[App\Http\Controllers\genisseController::class,"nombreGenisse"]);
Route::get('/listGenisseAvecDetaille',[App\Http\Controllers\genisseController::class,"listGenisseAvecDetaille"]);
Route::get('/listGenisseEnVenteAvecDetaille',[App\Http\Controllers\genisseController::class,"listGenisseEnVenteAvecDetaille"]);

//bloc autreDepense
Route::get('/listDepense',[App\Http\Controllers\autreDepenseController::class,"listDepense"]);
//bloc Utilisateur  

Route::get('/nombreUtilisateur',[App\Http\Controllers\utilisateurController::class,"nombreUtilisateur"]);
Route::get('/nombreFermier',[App\Http\Controllers\utilisateurController::class,"nombreFermier"]);
Route::get('/listClient',[App\Http\Controllers\utilisateurController::class,"listClient"]);
Route::get('/listFermier',[App\Http\Controllers\utilisateurController::class,"listFermier"]);

//bloc Client
Route::get('/nombreClient',[App\Http\Controllers\clientController::class,"nombreClient"]);

//bloc AchatBovin

Route::get('/nombreBovinAcheter',[App\Http\Controllers\achatBovinController::class,"nombreBovinAcheter"]);
Route::get('/listBovinAcheter',[App\Http\Controllers\achatBovinController::class,"listBovinAcheter"]);
Route::get('/SommeAchatBovin',[App\Http\Controllers\achatBovinController::class,"SommeAchatBovin"]);

//bloc AchatAliment
Route::get('/listAchatAliment',[App\Http\Controllers\achatAlimentController::class,"listAchatAliment"]);
Route::get('/SommeAchatAliment',[App\Http\Controllers\achatAlimentController::class,"SommeAchatAliment"]);

//bloc bouteille
Route::get('/listBouteilleEnligne',[App\Http\Controllers\bouteilleController::class,"listBouteilleEnligne"]);
Route::get('/nombreBouteilleEnligne',[App\Http\Controllers\bouteilleController::class,"nombreBouteilleEnligne"]);

//bloc VenteBovin  

Route::get('/nombreBovinVendue',[App\Http\Controllers\venteBovinController::class,"nombreBovinVendue"]);
Route::get('/listBovinVendue',[App\Http\Controllers\venteBovinController::class,"listBovinVendue"]);
Route::get('/SommeVenteBovin',[App\Http\Controllers\venteBovinController::class,"SommeVenteBovin"]);

//bloc VenteLait 

Route::get('/sommeVenteLait',[App\Http\Controllers\venteLaitController::class,"sommeVenteLait"]);

//bloc Facture  
Route::get('/nombreFacture',[App\Http\Controllers\factureController::class,"nombreFacture"]);
Route::get('/listFacture',[App\Http\Controllers\factureController::class,"listFacture"]);\
Route::get('/SommeFacture',[App\Http\Controllers\factureController::class,"SommeFacture"]);
Route::get('/listFactureDetaille',[App\Http\Controllers\factureController::class,"listFactureDetaille"]);

//bloc Vache
Route::get('/listVacheMalade',[App\Http\Controllers\vacheController::class,"listVacheMalade"]);
Route::get('/listVacheSain',[App\Http\Controllers\vacheController::class,"listVacheSain"]);
Route::get('/listVacheEnVente',[App\Http\Controllers\vacheController::class,"listVacheEnVente"]);
Route::get('/listVachePasEnVente',[App\Http\Controllers\vacheController::class,"listVachePasEnVente"]);
Route::get('/listVacheVivant',[App\Http\Controllers\vacheController::class,"listVacheVivant"]);
Route::get('/listVacheMort',[App\Http\Controllers\vacheController::class,"listVacheMort"]);
Route::get('/nombreVache',[App\Http\Controllers\vacheController::class,"nombreVache"]);
Route::get('/listVacheAvecDetaille',[App\Http\Controllers\vacheController::class,"listVacheAvecDetaille"]);
Route::get('/detailleProductionLaitVache',[App\Http\Controllers\vacheController::class,"detailleProductionLaitVache"]);
Route::get('/nombreVacheEnLactation',[App\Http\Controllers\vacheController::class,"nombreVacheEnLactation"]);
Route::get('/listeVacheEnLactation',[App\Http\Controllers\vacheController::class,"listeVacheEnLactation"]);
Route::get('/nombreVacheEnTarissement',[App\Http\Controllers\vacheController::class,"nombreVacheEnTarissement"]);
Route::get('/listeVacheEnTarissement',[App\Http\Controllers\vacheController::class,"listeVacheEnTarissement"]);
Route::get('/nombreVacheEnGestation',[App\Http\Controllers\vacheController::class,"nombreVacheEnGestation"]);
Route::get('/listeVacheEnGestation',[App\Http\Controllers\vacheController::class,"listeVacheEnGestation"]);
Route::get('/nombreVacheNonGestant',[App\Http\Controllers\vacheController::class,"nombreVacheNonGestant"]);
Route::get('/listeVacheNonGestant',[App\Http\Controllers\vacheController::class,"listeVacheNonGestant"]);
Route::get('/listVacheEnVenteAvecDetaille',[App\Http\Controllers\vacheController::class,"listVacheEnVenteAvecDetaille"]);




Route::apiResource('bovin','App\Http\Controllers\bovinController');
Route::apiResource('client','App\Http\Controllers\clientController');
Route::apiResource('achatAliment','App\Http\Controllers\achatAlimentController');
Route::apiResource('achatBovin','App\Http\Controllers\achatBovinController');
Route::apiResource('admin','App\Http\Controllers\adminController');
Route::apiResource('alimentationDuJour','App\Http\Controllers\alimentationDuJourController');
Route::apiResource('autreDepense','App\Http\Controllers\autreDepenseController');
Route::apiResource('bouteille','App\Http\Controllers\bouteilleController');


Route::apiResource('commande','App\Http\Controllers\commandeController');
Route::apiResource('diagnostic','App\Http\Controllers\diagnosticController');
Route::apiResource('facture','App\Http\Controllers\factureController');
Route::apiResource('fermier','App\Http\Controllers\fermierController');
Route::apiResource('genisse','App\Http\Controllers\genisseController');
Route::apiResource('maladie','App\Http\Controllers\maladieController');
Route::apiResource('periode','App\Http\Controllers\periodeController');
Route::apiResource('pesage','App\Http\Controllers\pesageController');
Route::apiResource('productionLait','App\Http\Controllers\productionLaitController');
Route::apiResource('race','App\Http\Controllers\raceController');
Route::apiResource('stockLait','App\Http\Controllers\stockLaitController');
Route::apiResource('taureau','App\Http\Controllers\taureauController');
Route::apiResource('traiteDuJour','App\Http\Controllers\traiteDuJourController');
Route::apiResource('utilisateur','App\Http\Controllers\utilisateurController');
Route::apiResource('vache','App\Http\Controllers\vacheController');
Route::apiResource('veau','App\Http\Controllers\veauController');
Route::apiResource('velle','App\Http\Controllers\velleController');
Route::apiResource('venteBovin','App\Http\Controllers\venteBovinController');
Route::apiResource('venteLait','App\Http\Controllers\venteLaitController');
Route::apiResource('commandePersonnalise','App\Http\Controllers\commandePersonnaliseController');



<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('api/mon', function () {
//     return response()->json(["utilisateur"=>"Ama"]);
// });
//bloc Bovin
//Route::get('/listeBovinAvecRace',[App\Http\Controllers\bovinController::class,"listBovinAvecRace"]);
Route::get('/listBovinMalade',[App\Http\Controllers\bovinController::class,"listBovinMalade"]);
Route::get('/listBovinSain',[App\Http\Controllers\bovinController::class,"listBovinSain"]);
Route::get('/listBovinEnVente',[App\Http\Controllers\bovinController::class,"listBovinEnVente"]);
Route::get('/listBovinPasEnVente',[App\Http\Controllers\bovinController::class,"listBovinPasEnVente"]);
Route::get('/listBovinVivant',[App\Http\Controllers\bovinController::class,"listBovinVivant"]);
Route::get('/listBovinMort',[App\Http\Controllers\bovinController::class,"listBovinMort"]);
Route::get('/nombreBovin',[App\Http\Controllers\bovinController::class,"nombreBovin"]);
Route::get('/listBovinAvecDetaille/{idBovin}',[App\Http\Controllers\bovinController::class,"listBovinAvecDetaille"]);

//bloc velle 
Route::get('/listVelleMalade',[App\Http\Controllers\velleController::class,"listVelleMalade"]);
Route::get('/listVelleSain',[App\Http\Controllers\velleController::class,"listVelleSain"]);
Route::get('/listVelleEnVente',[App\Http\Controllers\velleController::class,"listVelleEnVente"]);
Route::get('/listVellePasEnVente',[App\Http\Controllers\velleController::class,"listVellePasEnVente"]);
Route::get('/listVelleVivant',[App\Http\Controllers\velleController::class,"listVelleVivant"]);
Route::get('/listVelleMort',[App\Http\Controllers\velleController::class,"listVelleMort"]);
Route::get('/nombreVelle',[App\Http\Controllers\velleController::class,"nombreVelle"]);
Route::get('/listVelleAvecDetaille',[App\Http\Controllers\velleController::class,"listVelleAvecDetaille"]);
Route::get('/nombreVelleMois',[App\Http\Controllers\velleController::class,"nombreVelleMois"]);

//bloc veau 

Route::get('/listVeauMalade',[App\Http\Controllers\veauController::class,"listVeauMalade"]);
Route::get('/listVeauSain',[App\Http\Controllers\veauController::class,"listVeauSain"]);
Route::get('/listVeauEnVente',[App\Http\Controllers\veauController::class,"listVeauEnVente"]);
Route::get('/listVeauPasEnVente',[App\Http\Controllers\veauController::class,"listVeauPasEnVente"]);
Route::get('/listVeauVivant',[App\Http\Controllers\veauController::class,"listVeauVivant"]);
Route::get('/listVeauMort',[App\Http\Controllers\veauController::class,"listVeauMort"]);
Route::get('/nombreVeau',[App\Http\Controllers\veauController::class,"nombreVeau"]);
Route::get('/listVeauAvecDetaille',[App\Http\Controllers\veauController::class,"listVeauAvecDetaille"]);
Route::get('/nombreVeauMois',[App\Http\Controllers\veauController::class,"nombreVeauMois"]);


//bloc taureau

Route::get('/listTaureauMalade',[App\Http\Controllers\taureauController::class,"listTaureauMalade"]);
Route::get('/listTaureauSain',[App\Http\Controllers\taureauController::class,"listTaureauSain"]);
Route::get('/listTaureauEnVente',[App\Http\Controllers\taureauController::class,"listTaureauEnVente"]);
Route::get('/listTaureauPasEnVente',[App\Http\Controllers\taureauController::class,"listTaureauPasEnVente"]);
Route::get('/listTaureauVivant',[App\Http\Controllers\taureauController::class,"listTaureauVivant"]);
Route::get('/listTaureauMort',[App\Http\Controllers\taureauController::class,"listTaureauMort"]);
Route::get('/nombreTaureau',[App\Http\Controllers\taureauController::class,"nombreTaureau"]);
Route::get('/listTaureauAvecDetaille',[App\Http\Controllers\taureauController::class,"listTaureauAvecDetaille"]);
Route::get('/evolutionTaureau',[App\Http\Controllers\taureauController::class,"evolutionTaureau"]);


//bloc genisse

Route::get('/listGenisseMalade',[App\Http\Controllers\genisseController::class,"listGenisseMalade"]);
Route::get('/listGenisseSain',[App\Http\Controllers\genisseController::class,"listGenisseSain"]);
Route::get('/listGenisseEnVente',[App\Http\Controllers\genisseController::class,"listGenisseEnVente"]);
Route::get('/listGenissePasEnVente',[App\Http\Controllers\genisseController::class,"listGenissePasEnVente"]);
Route::get('/listGenisseVivant',[App\Http\Controllers\genisseController::class,"listGenisseVivant"]);
Route::get('/listGenisseMort',[App\Http\Controllers\genisseController::class,"listGenisseMort"]);
Route::get('/nombreGenisse',[App\Http\Controllers\genisseController::class,"nombreGenisse"]);
Route::get('/listGenisseAvecDetaille',[App\Http\Controllers\genisseController::class,"listGenisseAvecDetaille"]);
Route::get('/nombreGenisseMois',[App\Http\Controllers\genisseController::class,"nombreGenisseMois"]);

//sante bovin santeBovin
Route::get('/santeBovin',[App\Http\Controllers\bovinController::class,"santeBovin"]);

//bloc vache 

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
Route::get('/evolutionVache',[App\Http\Controllers\vacheController::class,"evolutionVache"]);
Route::get('/phaseVache',[App\Http\Controllers\vacheController::class,"phaseVache"]);
Route::get('/periodeVache',[App\Http\Controllers\vacheController::class,"periodeVache"]);
Route::get('/periodeMois',[App\Http\Controllers\vacheController::class,"periodeMois"]);


//bloc commande chiffreLait
Route::get('/nombreCommande',[\App\Http\Controllers\commandeController::class,"nombreCommande"]);
Route::get('/listClient',[\App\Http\Controllers\commandeController::class,"listClient"]);
Route::get('/listClientBovinAvecDetails',[\App\Http\Controllers\commandeController::class,"listClientBovinAvecDetails"]);
Route::get('/listClientLaitAvecDetails',[\App\Http\Controllers\commandeController::class,"listClientLaitAvecDetails"]);
Route::get('/nombreCommandeParMois',[\App\Http\Controllers\commandeController::class,"nombreCommandeParMois"]);
Route::get('/nombreCommandeParSemaine',[\App\Http\Controllers\commandeController::class,"nombreCommandeParSemaine"]);
Route::get('/listeCommandeParMois',[\App\Http\Controllers\commandeController::class,"listeCommandeParMois"]);
Route::get('/nombreCommandeLait',[\App\Http\Controllers\commandeController::class,"nombreCommandeLait"]);
Route::get('/nombreCommandeBovin',[\App\Http\Controllers\commandeController::class,"nombreCommandeBovin"]);
Route::get('/litreVendu',[\App\Http\Controllers\commandeController::class,"litreVendu"]);
Route::get('/chiffreAffaireLait',[\App\Http\Controllers\commandeController::class,"chiffreAffaireLait"]);
Route::get('/chiffreAffaireBovin',[\App\Http\Controllers\commandeController::class,"chiffreAffaireBovin"]);
Route::get('/chiffreAnnuelleLait',[\App\Http\Controllers\commandeController::class,"chiffreAnnuelleLait"]);
Route::get('/chiffreAnnuelleBovin',[\App\Http\Controllers\commandeController::class,"chiffreAnnuelleBovin"]);



//vente lait 
Route::get('/chiffreLait/{dateCom}',[\App\Http\Controllers\venteLaitController::class,"chiffreLait"]);
Route::get('/chiffreAnnuelleLait/{dateCom}',[\App\Http\Controllers\venteLaitController::class,"chiffreAnnuelleLait"]);

//vente bovin  
Route::get('/chiffreBovin/{dateCom}',[\App\Http\Controllers\venteBovinController::class,"chiffreBovin"]);
Route::get('/chiffreAnnuelleBovin/{dateCom}',[\App\Http\Controllers\venteBovinController::class,"chiffreAnnuelleBovin"]);

//productionLait
Route::get('/production',[\App\Http\Controllers\traiteDuJourController::class,"productionLait"]);
Route::get('/quantiteLaitProduite',[\App\Http\Controllers\traiteDuJourController::class,"quantiteLaitProduite"]);


Route::apiResource('bovin','App\Http\Controllers\bovinController');
//Routes nombre de bovin
Route::get('nbrebovin','App\Http\Controllers\bovinController@nbreBovin');
//Routes get nombres de vaches
Route::get('nbrevache','App\Http\Controllers\vacheController@nbreVache');
//Routes get nombre de bovin achetes
Route::get('nbreachatbovin','App\Http\Controllers\achatBovinController@nbreBovinAchete');
Route::get('coutBovin','App\Http\Controllers\achatBovinController@coutBovin');
//bloc achat aliment  
Route::get('/chargeAlimentation',[\App\Http\Controllers\achatAlimentController::class,"chargeAlimentation"]);
Route::get('/listeAlimentationJour',[\App\Http\Controllers\alimentationDuJourController::class,"listeAlimentationJour"]);
//charges autres depense total 
Route::get('/chargeAutreDepense',[\App\Http\Controllers\autreDepenseController::class,"chargeAutreDepense"]);

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
//Nombre de Race dans la ferme
Route::get('nbrerace','App\Http\Controllers\raceController@nbreRace');
Route::get('bovins','App\Http\Controllers\raceController@raceExistant');

Route::apiResource('stockLait','App\Http\Controllers\stockLaitController');
Route::apiResource('taureau','App\Http\Controllers\taureauController');
Route::apiResource('traiteDuJour','App\Http\Controllers\traiteDuJourController');
Route::apiResource('utilisateur','App\Http\Controllers\utilisateurController');
Route::apiResource('vache','App\Http\Controllers\vacheController');
Route::apiResource('veau','App\Http\Controllers\veauController');
Route::apiResource('velle','App\Http\Controllers\velleController');
Route::apiResource('venteBovin','App\Http\Controllers\venteBovinController');
Route::apiResource('venteLait','App\Http\Controllers\venteLaitController');

Route::get('/stockDisponible',[\App\Http\Controllers\stockLaitController::class,"stockDisponible"]);

//bloc alimentation stockAliment stockAliment  
// Route::apiResource('stockAliment','App\Http\Controllers\achatAlimentController@stockAliment');
//Route::apiResource('stockAliment','App\Http\Controllers\achatAlimentController@stockAliment');

Route::get('/quantiteAchetes',[\App\Http\Controllers\achatAlimentController::class,"quantiteAchetes"]);
Route::get('/typeAliment',[\App\Http\Controllers\achatAlimentController::class,"typeAliment"]);
Route::get('/quantiteConsommes',[\App\Http\Controllers\alimentationDuJourController::class,"quantiteConsommes"]);
Route::get('/consommationMois',[\App\Http\Controllers\alimentationDuJourController::class,"consommationMois"]);

Route::get('/stock',[\App\Http\Controllers\alimentationDuJourController::class,"stockAliment"]);

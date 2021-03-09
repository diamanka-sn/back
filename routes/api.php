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

Route::apiResource('bovin','App\Http\Controllers\bovinController');
//Routes nombre de bovin
Route::get('nbrebovin','App\Http\Controllers\bovinController@nbreBovin');
//Routes get nombres de vaches
Route::get('nbrevache','App\Http\Controllers\vacheController@nbreVache');
//Routes get nombre de bovin achetes
Route::get('nbreachatbovin','App\Http\Controllers\achatBovinController@nbreBovinAchete');

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

Route::apiResource('stockLait','App\Http\Controllers\stockLaitController');
Route::apiResource('taureau','App\Http\Controllers\taureauController');
Route::apiResource('traiteDuJour','App\Http\Controllers\traiteDuJourController');
Route::apiResource('utilisateur','App\Http\Controllers\utilisateurController');
Route::apiResource('vache','App\Http\Controllers\vacheController');
Route::apiResource('veau','App\Http\Controllers\veauController');
Route::apiResource('velle','App\Http\Controllers\velleController');
Route::apiResource('venteBovin','App\Http\Controllers\venteBovinController');
Route::apiResource('venteLait','App\Http\Controllers\venteLaitController');



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
<<<<<<< HEAD
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


=======
Route::apiResource('race','App\Http\Controllers\raceController');
Route::apiResource('utilisateur','App\Http\Controllers\utilisateurController');
Route::apiResource('periode','App\Http\Controllers\periodeController');
Route::apiResource('achatAliment','App\Http\Controllers\achatAlimentController');
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d

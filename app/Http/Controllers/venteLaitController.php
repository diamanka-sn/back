<?php

namespace App\Http\Controllers;

use App\Models\venteLait;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class venteLaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $venteLait = venteLait::all();
        //return $venteLait->toJson(JSON_PRETTY_PRINT);
        return venteLait::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (venteLait::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venteLait  $venteLait
     * @return \Illuminate\Http\Response
     */
    public function show(venteLait $venteLait)
    {
        return $venteLait;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venteLait  $venteLait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venteLait $venteLait)
    {
        if ($venteLait->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\venteLait  $venteLait
     * @return \Illuminate\Http\Response
     */
    public function destroy(venteLait $venteLait)
    {
        if ($venteLait->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

<<<<<<< HEAD
    public function sommeVenteLait()
    {
        return venteLait::select('prixBouteille')->get();
        //return venteLait::orderByDesc('created_at')->get();
    }

    
=======
    public function chiffreLait($annee)
    {
        $bovin = DB::table('vente_laits')
            ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.idBouteille')
            ->join('commandes', 'commandes.idCom', '=', 'vente_laits.idCom')
            ->select(DB::raw("sum(bouteilles.capacite * vente_laits.prixBouteille * vente_laits.nbrBouteille) as 'vente'"), DB::raw('MONTH(commandes.dateCom) as mois'))
            ->whereYear('commandes.dateCom', $annee)
            ->groupBy('mois')
            ->get();
        return $bovin;
    }

    public function chiffreAnnuelleLait($annee)
    {

        $bovin = DB::table('vente_laits')
            ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.idBouteille')
            ->join('commandes', 'commandes.idCom', '=', 'vente_laits.idCom')
            ->select(DB::raw("sum(bouteilles.capacite * vente_laits.prixBouteille * vente_laits.nbrBouteille) as 'vente'"))
            ->whereYear('commandes.dateCom', $annee)
            ->get();
        return $bovin;
    }
>>>>>>> e002d398770c5357c27be6e9961d44c180864b04
}

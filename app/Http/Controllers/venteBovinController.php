<?php

namespace App\Http\Controllers;

use App\Models\venteBovin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class venteBovinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $venteBovin = venteBovin::all();
        //return $venteBovin->toJson(JSON_PRETTY_PRINT);
        return venteBovin::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (venteBovin::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venteBovin  $venteBovin
     * @return \Illuminate\Http\Response
     */
    public function show(venteBovin $venteBovin)
    {
        return $venteBovin;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venteBovin  $venteBovin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venteBovin $venteBovin)
    {
        if ($venteBovin->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\venteBovin  $venteBovin
     * @return \Illuminate\Http\Response
     */
    public function destroy(venteBovin $venteBovin)
    {
        if ($venteBovin->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }
    public function chiffreBovin($annee)
    {
        $bovin = DB::table('vente_bovins')
            ->join('bovins', 'vente_bovins.bovin_id', '=', 'bovins.idBovin')
            ->join('commandes', 'commandes.idCom', '=', 'vente_bovins.commande_id')
            ->select(DB::raw("sum(vente_bovins.prixBovin) as 'vente'"), DB::raw('MONTH(commandes.dateCom) as mois'))
            ->whereYear('commandes.dateCom', $annee)
            ->groupBy('mois')
            ->get();
        return $bovin;
    }
    public function chiffreAnnuelleBovin($annee)
    {
        $bovin = DB::table('vente_bovins')
            ->join('bovins', 'vente_bovins.bovin_id', '=', 'bovins.idBovin')
            ->join('commandes', 'commandes.idCom', '=', 'vente_bovins.commande_id')
            ->select(DB::raw("sum(vente_bovins.prixBovin) as 'vente'"))
            ->whereYear('commandes.dateCom', $annee)
            ->get();
        return $bovin;
    }
}

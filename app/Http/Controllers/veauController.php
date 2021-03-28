<?php

namespace App\Http\Controllers;

use App\Models\veau;
use App\Models\race;
use App\Models\productionLait;
use App\Models\traiteDuJour;
use App\Models\pesage;
use App\Models\periode;
use App\Models\maladie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class veauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $veau = veau::all();
        //return $veau->toJson(JSON_PRETTY_PRINT);
        return veau::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (veau::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\veau  $veau
     * @return \Illuminate\Http\Response
     */
    public function show(veau $veau)
    {
        return $veau;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\veau  $veau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, veau $veau)
    {
        if ($veau->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\veau  $veau
     * @return \Illuminate\Http\Response
     */
    public function destroy(veau $veau)
    {
        if ($veau->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function nombreVeau()
    {
        $commandeLait = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            // ->select(DB::raw("sum(factures.montant) as 'chiffrel'"), DB::raw('YEAR(factures.datePaiement) annee'))
            ->where("etat", "Vivant")
            ->count();
        return $commandeLait;
    }
    public function listVeauMalade()
    {
        $commandeLait = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Malade")
            ->get();
        return $commandeLait;
    }

    public function listVeauSain()
    {
        $commandeLait = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Sain")
            ->get();
        return $commandeLait;
    }
    public function listVeauEnVente()
    {
        $commandeLait = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listVeauPasEnVente()
    {
        $commandeLait = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "pas en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::->orderByDesc('idBovin')->get();
    }
    public function listVeauVivant()
    {
        $commandeLait = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Vivant")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listVeauMort()
    {
        $commandeLait = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("bovins.etat", "Mort")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listVeauAvecDetaille()
    {
        $veaus = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->join('races', 'bovins.race_id', '=', 'races.idRace')
            ->join('pesages', 'veaus.idBovin', '=', 'pesages.bovin_id')
            ->select('bovins.*', 'races.nomRace', 'pesages.*')
            ->where("bovins.etat", "Mort")
            ->get();

        return $veaus;
    }

    public function nombreVeauMois()
    {
        $veau = DB::table('veaus')
            ->join('bovins', 'veaus.idBovin', '=', 'bovins.idBovin')
            ->where("bovins.etat", "Vivant")
            ->select(DB::raw("count(veaus.idBovin) as 'nombre'"), DB::raw('YEAR(veaus.created_at) annee,MONTH(veaus.created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();

        return $veau->groupBy('annee');
    }
}

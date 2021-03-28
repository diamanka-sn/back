<?php

namespace App\Http\Controllers;


use App\Models\velle;
use App\Models\race;
use App\Models\productionLait;
use App\Models\traiteDuJour;
use App\Models\pesage;
use App\Models\periode;
use App\Models\maladie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class velleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $velle = velle::all();
        //return $velle->toJson(JSON_PRETTY_PRINT);
        return velle::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (velle::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\velle  $velle
     * @return \Illuminate\Http\Response
     */
    public function show(velle $velle)
    {
        return $velle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\velle  $velle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, velle $velle)
    {
        if ($velle->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\velle  $velle
     * @return \Illuminate\Http\Response
     */
    public function destroy(velle $velle)
    {
        if ($velle->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function nombreVelle()
    {
        $commandeLait = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            // ->select(DB::raw("sum(factures.montant) as 'chiffrel'"), DB::raw('YEAR(factures.datePaiement) annee'))
            ->where("etat", "Vivant")
            ->count();
        return $commandeLait;
    }
    public function listVelleMalade()
    {
        $commandeLait = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Malade")
            ->get();
        return $commandeLait;
    }

    public function listVelleSain()
    {
        $commandeLait = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Sain")
            ->get();
        return $commandeLait;
    }
    public function listVelleEnVente()
    {
        $commandeLait = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listVellePasEnVente()
    {
        $commandeLait = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "pas en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::->orderByDesc('idBovin')->get();
    }
    public function listVelleVivant()
    {
        $commandeLait = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Vivant")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listVelleMort()
    {
        $commandeLait = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("bovins.etat", "Mort")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listVelleAvecDetaille()
    {
        $veaus = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->join('races', 'bovins.race_id', '=', 'races.idRace')
            ->join('pesages', 'veaus.idBovin', '=', 'pesages.bovin_id')
            ->select('bovins.*', 'races.nomRace', 'pesages.*')
            ->where("bovins.etat", "Mort")
            ->get();

        return $veaus;
    }

    public function nombreVelleMois()
    {
        $veau = DB::table('velles')
            ->join('bovins', 'velles.idBovin', '=', 'bovins.idBovin')
            ->where("bovins.etat", "Vivant")
            ->select(DB::raw("count(velles.idBovin) as 'nombre'"), DB::raw('YEAR(velles.created_at) annee,MONTH(velles.created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();

        return $veau->groupBy('annee');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\genisse;
use App\Models\race;
use App\Models\productionLait;
use App\Models\traiteDuJour;
use App\Models\pesage;
use App\Models\periode;
use App\Models\maladie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class genisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $genisse = genisse::all();
        //return $genisse->toJson(JSON_PRETTY_PRINT);
        return genisse::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (genisse::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genisse  $genisse
     * @return \Illuminate\Http\Response
     */
    public function show(genisse $genisse)
    {
        return $genisse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\genisse  $genisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, genisse $genisse)
    {
        if ($genisse->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genisse  $genisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(genisse $genisse)
    {
        if ($genisse->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function nombreGenisse()
    {
        $commandeLait = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            // ->select(DB::raw("sum(factures.montant) as 'chiffrel'"), DB::raw('YEAR(factures.datePaiement) annee'))
            ->where("etat", "Vivant")
            ->count();
        return $commandeLait;
    }
    public function listGenisseMalade()
    {
        $commandeLait = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Malade")
            ->get();
        return $commandeLait;
    }

    public function listGenisseSain()
    {
        $commandeLait = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Sain")
            ->get();
        return $commandeLait;
    }
    public function listGenisseEnVente()
    {
        $commandeLait = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Genisse::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listGenissePasEnVente()
    {
        $commandeLait = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "pas en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Genisse::->orderByDesc('idBovin')->get();
    }
    public function listGenisseVivant()
    {
        $commandeLait = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Vivant")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Genisse::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listGenisseMort()
    {
        $commandeLait = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Mort")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Genisse::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listGenisseAvecDetaille()
    {
        $genisses = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->join('races', 'bovins.race_id', '=', 'races.idRace')
            ->join('pesages', 'genisses.idBovin', '=', 'pesages.bovin_id')
            ->select('bovins.*', 'races.nomRace', 'pesages.*')
            ->get();

        return $genisses;
    }
    public function nombreGenisseMois()
    {
        $genisses = DB::table('genisses')
            ->join('bovins', 'genisses.idBovin', '=', 'bovins.idBovin')
            ->where("etat", "vivant")
            ->select(DB::raw("count(genisses.idBovin) as 'nombre'"), DB::raw('YEAR(genisses.created_at) annee , MONTH(genisses.created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();

        return $genisses->groupBy('annee');
    }

    public function listGenisseEnVenteAvecDetaille()
    {
        $races=race::All();
        $pesages=pesage::All();
    

        $genisses=DB::table('genisses')
        ->join('races','genisses.idRace','=','races.idRace')
        ->join('pesages','genisses.idBovin','=','pesages.idBovin')
       ->select('genisses.*','races.nomRace','pesages.*')
       ->where("situation","en Vente")
       ->where("etat","vivant")
        ->get();
    
    return $genisses;
         
    }

}

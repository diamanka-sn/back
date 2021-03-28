<?php

namespace App\Http\Controllers;

use App\Http\Controllers\bovinController;

use App\Models\taureau;
use App\Models\bovin;
use App\Models\race;
use App\Models\productionLait;
use App\Models\traiteDuJour;
use App\Models\pesage;
use App\Models\periode;
use App\Models\maladie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class taureauController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $taureau = taureau::all();
        //return $taureau->toJson(JSON_PRETTY_PRINT);
        return taureau::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (bovin::create($request->all())) {
            if (taureau::create($request->all())) {
                return response()->json([
                    'success' => 'enregistre avec succes dans bovin et Taureau'
                ], 200);
            };
        };
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\taureau  $taureau
     * @return \Illuminate\Http\Response
     */
    public function show(taureau $taureau)
    {
        return $taureau;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @param  \App\Models\taureau  $taureau
     * @param  \App\Models\bovin  $bovin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, taureau $taureau, bovin $bovin)
    {
        if ($bovin->update($request->all())) {
            if ($taureau->update($request->all())) {
                return response()->json([
                    'success' => 'modifier avec succes dans Bovin et Taureau'
                ], 200);
            };

            //    if($taureau->update($request->all())){
            //                 return response()->json([
            //                'success' => 'modifier avec succes dans Bovin et Taureau'
            //            ],200);            
            //    };
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovin  $bovin
     * @param  \App\Models\taureau  $taureau
     * @return \Illuminate\Http\Response
     */
    public function destroy(taureau $taureau)
    {

        if ($taureau->delete()) {
            return response()->json([
                'success' => 'Suppression reussie dans bovin'
            ], 200);
        };


        // if($taureau->delete()){
        //     return response()->json([
        //         'success' => 'Suppression reussie dans Taureau'
        //     ],200);
        // };
    }

    public function evolutionTaureau()
    {
        $commandeMois = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->where("etat", "Vivant")
            ->select(DB::raw("count(taureaus.idBovin) as 'nombre'"), DB::raw('YEAR(taureaus.created_at) annee,MONTH(taureaus.created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();

        return $commandeMois->groupBy('annee');
    }

    public function nombreTaureau()
    {
        $commandeLait = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            // ->select(DB::raw("sum(factures.montant) as 'chiffrel'"), DB::raw('YEAR(factures.datePaiement) annee'))
            ->where("etat", "Vivant")
            ->count();
        return $commandeLait;
    }
    public function listTaureauMalade()
    {
        $commandeLait = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Malade")
            ->get();
        return $commandeLait;
    }

    public function listTaureauSain()
    {
        $commandeLait = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Sain")
            ->get();
        return $commandeLait;
    }
    public function listTaureauEnVente()
    {
        $commandeLait = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listTaureauPasEnVente()
    {
        $commandeLait = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "pas en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::->orderByDesc('idBovin')->get();
    }
    public function listTaureauVivant()
    {
        $commandeLait = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Vivant")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listTaureauMort()
    {
        $commandeLait = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Mort")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listTaureauAvecDetaille()
    {
        $genisses = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->join('races', 'bovins.race_id', '=', 'races.idRace')
            ->join('pesages', 'taureaus.idBovin', '=', 'pesages.bovin_id')
            ->select('bovins.*', 'races.nomRace', 'pesages.*')
            ->get();

        return $genisses;
    }
    public function nombreTaureauMois()
    {
        $genisses = DB::table('taureaus')
            ->join('bovins', 'taureaus.idBovin', '=', 'bovins.idBovin')
            ->where("etat", "vivant")
            ->select(DB::raw("count(taureaus.idBovin) as 'nombre'"), DB::raw('YEAR(taureaus.created_at) annee , MONTH(taureaus.created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();

        return $genisses->groupBy('annee');
    }
}

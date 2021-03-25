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
<<<<<<< HEAD
    public function update(Request $request,taureau $taureau)
    {
       if($taureau->update($request->all())){
            if($taureau->update($request->all())){
                return response()->json([
                    'success' => 'modifier avec succes dans Taureau'
                ],200);
            };
    
       
      }
=======
    public function update(Request $request, taureau $taureau, bovin $bovin)
    {
        if ($bovin->update($request->all())) {
            if ($taureau->update($request->all())) {
                return response()->json([
                    'success' => 'modifier avec succes dans Bovin et Taureau'
                ], 200);
            };
>>>>>>> e002d398770c5357c27be6e9961d44c180864b04

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
<<<<<<< HEAD
       
            if($taureau->delete()){
                return response()->json([
                    'success' => 'Suppression reussie dans bovin'
                ],200);
            };
        
        
=======

        if ($taureau->delete()) {
            return response()->json([
                'success' => 'Suppression reussie dans bovin'
            ], 200);
        };


>>>>>>> e002d398770c5357c27be6e9961d44c180864b04
        // if($taureau->delete()){
        //     return response()->json([
        //         'success' => 'Suppression reussie dans Taureau'
        //     ],200);
        // };
    }

    public function nombreTaureau()
    {
        return taureau::where("etat", "vivant")->count();
    }
    public function nombreTaureauSain()
    {
        return taureau::where("etatDeSante","Sain")->orderByDesc('idBovin')->count();
    }
    public function nombreTaureauMalade()
    {
        return taureau::where("etatDeSante","souffrant")->orderByDesc('idBovin')->count();
    }

    
    public function listTaureauMalade()
    {
        return taureau::where("etatDeSante", "souffrant")->orderByDesc('idBovin')->get();
    }

    public function listTaureauSain()
    {
        return taureau::where("etatDeSante", "Sain")->orderByDesc('idBovin')->get();
    }
    public function listTaureauEnVente()
    {
        return taureau::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listTaureauPasEnVente()
    {
        return taureau::where("situation", "pas en vente")->orderByDesc('idBovin')->get();
    }
    public function listTaureauVivant()
    {
        return taureau::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listTaureauMort()
    {
        return taureau::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listTaureauAvecDetaille()
    {
        $taureaus = DB::table('taureaus')
            ->join('races', 'taureaus.idRace', '=', 'races.idRace')
            ->join('pesages', 'taureaus.idBovin', '=', 'pesages.idBovin')
            ->select('taureaus.*', 'races.nomRace', 'pesages.*')
            ->get();

        return $taureaus;
    }
    public function evolutionTaureau(){
        $commandeMois = DB::table('taureaus')
        ->where("etat", "vivant")
        ->select(DB::raw("count(idBovin) as 'nombre'"), DB::raw('YEAR(created_at) annee,MONTH(created_at) mois'))
        ->groupBy('annee', 'mois')
        ->orderBy('mois')
        ->get();

    return $commandeMois->groupBy('annee');
    }

    public function listTaureauEnVenteAvecDetaille()
    {
        $races=race::All();
        $pesages=pesage::All();

        $taureaus=DB::table('taureaus')
        ->join('races','taureaus.idRace','=','races.idRace')
        ->join('pesages','taureaus.idBovin','=','pesages.idBovin')
        ->select('taureaus.*','races.nomRace','pesages.*')
        ->where("situation","en Vente")
        ->where("etat","vivant")
        
        ->get();
    
    return $taureaus;
         
    }
    public function nombreTaureauEnVente()
    {
        return taureau::where("situation","en vente")->count();
    }

}

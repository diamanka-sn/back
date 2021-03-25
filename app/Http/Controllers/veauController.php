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
        return veau::where("etat", "vivant")->count();
    }
    public function listVeauMalade()
    {
        return veau::where("etatDeSante", "souffrant")->orderByDesc('idBovin')->get();
    }

    public function listVeauSain()
    {
        return veau::where("etatDeSante", "Sain")->orderByDesc('idBovin')->get();
    }
    public function listVeauEnVente()
    {
        return veau::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listVeauPasEnVente()
    {
        return veau::where("situation", "pas en vente")->orderByDesc('idBovin')->get();
    }
    public function listVeauVivant()
    {
        return veau::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listVeauMort()
    {
        return veau::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listVeauAvecDetaille()
    {
        $veaus = DB::table('veaus')
            ->join('races', 'veaus.idRace', '=', 'races.idRace')
            ->join('pesages', 'veaus.idBovin', '=', 'pesages.idBovin')
            ->select('veaus.*', 'races.nomRace', 'pesages.*')
            ->get();

        return $veaus;
    }

<<<<<<< HEAD
    public function listVeauEnVenteAvecDetaille()
    {
        $races=race::All();
        $pesages=pesage::All();
    

        $veaus=DB::table('veaus')
        ->join('races','veaus.idRace','=','races.idRace')
        ->join('pesages','veaus.idBovin','=','pesages.idBovin')
       ->select('veaus.*','races.nomRace','pesages.*')
       ->where("situation","en Vente")
       ->where("etat","vivant")
        ->get();
    
    return $veaus;
         
    }

=======
    public function nombreVeauMois()
    {
        $veau = DB::table('veaus')
            ->where("etat", "vivant")
            ->select(DB::raw("count(idBovin) as 'nombre'"), DB::raw('YEAR(created_at) annee,MONTH(created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();

        return $veau->groupBy('annee');
    }
>>>>>>> e002d398770c5357c27be6e9961d44c180864b04
}

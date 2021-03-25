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
        return velle::where("etat", "vivant")->count();
    }
    public function listVelleMalade()
    {
        return velle::where("etatDeSante", "souffrant")->orderByDesc('idBovin')->get();
    }

    public function listVelleSain()
    {
        return velle::where("etatDeSante", "Sain")->orderByDesc('idBovin')->get();
    }
    public function listVelleEnVente()
    {
        return velle::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listVellePasEnVente()
    {
        return velle::where("situation", "pas en vente")->orderByDesc('idBovin')->get();
    }
    public function listVelleVivant()
    {
        return velle::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listVelleMort()
    {
        return velle::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listVelleAvecDetaille()
    {


        $velles = DB::table('velles')
            ->join('races', 'velles.idRace', '=', 'races.idRace')
            ->join('pesages', 'velles.idBovin', '=', 'pesages.idBovin')
            ->select('velles.*', 'races.nomRace', 'pesages.*')
            ->get();

        return $velles;
    }

    public function nombreVelleMois(){
        $veau = DB::table('velles')
        ->where("etat", "vivant")
        ->select(DB::raw("count(idBovin) as 'nombre'"), DB::raw('YEAR(created_at) annee,MONTH(created_at) mois'))
        ->groupBy('annee','mois')
        ->orderBy('mois')
        ->get();
        
        return $veau->groupBy('annee');
    }
}

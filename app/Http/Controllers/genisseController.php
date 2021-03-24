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
        return Genisse::where("etat", "vivant")->count();
    }
    public function listGenisseMalade()
    {
        return Genisse::where("etatDeSante", "souffrant")->orderByDesc('idBovin')->get();
    }

    public function listGenisseSain()
    {
        return Genisse::where("etatDeSante", "Sain")->orderByDesc('idBovin')->get();
    }
    public function listGenisseEnVente()
    {
        return Genisse::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listGenissePasEnVente()
    {
        return Genisse::where("situation", "pas en vente")->orderByDesc('idBovin')->get();
    }
    public function listGenisseVivant()
    {
        return Genisse::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listGenisseMort()
    {
        return Genisse::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listGenisseAvecDetaille()
    {
        $genisses = DB::table('genisses')
            ->join('races', 'genisses.idRace', '=', 'races.idRace')
            ->join('pesages', 'genisses.idBovin', '=', 'pesages.idBovin')
            ->select('genisses.*', 'races.nomRace', 'pesages.*')
            ->get();

        return $genisses;
    }
    public function nombreGenisseMois()
    {
        $genisses = DB::table('genisses')
            ->where("etat", "vivant")
            ->select(DB::raw("count(idBovin) as 'nombre'"),DB::raw('YEAR(created_at) annee , MONTH(created_at) mois'))
            ->groupBy('annee','mois')
            ->orderBy('mois')
            ->get();

        return $genisses ->groupBy('annee');
    }
}

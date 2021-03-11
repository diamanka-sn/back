<?php

namespace App\Http\Controllers;

use App\Models\bovin;
use App\Models\race;
use App\Models\pesage;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class bovinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $bovin = bovin::all();
        //return $bovin->toJson(JSON_PRETTY_PRINT);
        return bovin::orderByDesc('idBovin')->get();
    }
    public function nbreBovin()
    {
        return bovin::orderByDesc('idBovin')->count();
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
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovin  $bovin
     * @return \Illuminate\Http\Response
     */
    public function show(bovin $bovin)
    {
        return $bovin;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovin  $bovin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bovin $bovin)
    {
        if ($bovin->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovin  $bovin
     * @return \Illuminate\Http\Response
     */
    public function destroy(bovin $bovin)
    {
        if ($bovin->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function nombreBovin(Request $request)
    // {
    //     $request="select count(*) from bovins";
    //     if (bovin::create($request->all())) {
    //         return response()->json([
    //             'success' => 'enregistre avec succes'
    //         ], 200);
    //     };

    // }

    public function nombreBovin()
    {
        return bovin::All()->count();
    }
    public function listBovinMalade()
    {
        return bovin::where("etatDeSante", "souffrant")->orderByDesc('idBovin')->get();
    }

    public function listBovinSain()
    {
        return bovin::where("etatDeSante", "Sain")->orderByDesc('idBovin')->get();
    }
    public function listBovinEnVente()
    {
        return bovin::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listBovinPasEnVente()
    {
        return bovin::where("situation", "pas en vente")->orderByDesc('idBovin')->get();
    }
    public function listBovinVivant()
    {
        return bovin::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listBovinMort()
    {
        return bovin::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
     
    public function listBovinAvecDetaille($idBovin)
    {
        $bovin = DB::table('bovins')
            ->join('races', 'bovins.idRace', '=', 'races.idRace')
            ->join('pesages', 'bovins.idBovin', '=', 'pesages.idBovin')
            ->select('bovins.*', 'races.nomRace', 'pesages.*')
            ->where('bovins.idBovin', $idBovin)
            ->get();

        return $bovin;
    }
}

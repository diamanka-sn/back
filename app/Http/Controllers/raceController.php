<?php

namespace App\Http\Controllers;

use App\Models\race;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class raceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $race = race::all();
        //return $race->toJson(JSON_PRETTY_PRINT);
        return race::orderByDesc('created_at')->get();
    }

    public function nbreRace()
    {
        return race::all('idRace')->count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (race::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(race $race)
    {
        return $race;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, race $race)
    {
        if ($race->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(race $race)
    {
        if ($race->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function raceExistant()
    {
        $commandeMois = DB::table('races')
            ->join('bovins', 'bovins.race_id', '=', 'races.idRace')
            ->where('bovins.etat', 'vivant')
            ->select(DB::raw("count(bovins.idBovin) as 'nombre'"), DB::raw("races.nomRace as 'race'"))
            ->groupBy('race')
            ->get();

        return $commandeMois;
    }
}

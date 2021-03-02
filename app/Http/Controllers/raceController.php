<?php

namespace App\Http\Controllers;

use App\Models\race;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(race::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
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
        if($race->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
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
        if($race->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

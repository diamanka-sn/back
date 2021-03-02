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
<<<<<<< HEAD
      //  $race = race::all();
        //return $race->toJson(JSON_PRETTY_PRINT);
=======
         //  $bovin = bovin::all();
        //return $bovin->toJson(JSON_PRETTY_PRINT);
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
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
<<<<<<< HEAD
      if(race::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
=======
        if(race::create($request->all())){
            return response()->json([
                'success' => 'enregistre avec succes'
            ],200);
        };
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
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
<<<<<<< HEAD
        if($race->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
=======
        if ($race->update($request->all())) {
            return response()->json([
                'success' => 'Modifier avec succes'
            ], 200);
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
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
<<<<<<< HEAD
        if($race->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
=======
        if ($race->delete()) {
            return response()->json([
                'success' => 'Supprimer avec succes'
            ], 200);
        }
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    }
}

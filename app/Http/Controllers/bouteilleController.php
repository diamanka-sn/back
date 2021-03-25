<?php

namespace App\Http\Controllers;

use App\Models\bouteille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $bouteille = bouteille::all();
        //return $bouteille->toJson(JSON_PRETTY_PRINT);
        return bouteille::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(bouteille::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function show(bouteille $bouteille)
    {
        return $bouteille;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bouteille $bouteille)
    {
        if($bouteille->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function destroy(bouteille $bouteille)
    {
        if($bouteille->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
    public function listBouteilleEnligne()
    {
        return bouteille::where('nombreDispo', '>' ,0)->get();
    }
    public function nombreBouteilleEnligne()
    {
        return bouteille::where('nombreDispo', '>' ,0)->count();
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\fermier;
use Illuminate\Http\Request;

class fermierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $fermier = fermier::all();
        //return $fermier->toJson(JSON_PRETTY_PRINT);
        return fermier::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(fermier::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fermier  $fermier
     * @return \Illuminate\Http\Response
     */
    public function show(fermier $fermier)
    {
        return $fermier;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fermier  $fermier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fermier $fermier)
    {
        if($fermier->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fermier  $fermier
     * @return \Illuminate\Http\Response
     */
    public function destroy(fermier $fermier)
    {
        if($fermier->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

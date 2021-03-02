<?php

namespace App\Http\Controllers;

use App\Models\alimentationDuJour;
use Illuminate\Http\Request;

class alimentationDuJourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $alimentationDuJour = alimentationDuJour::all();
        //return $alimentationDuJour->toJson(JSON_PRETTY_PRINT);
        return alimentationDuJour::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(alimentationDuJour::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alimentationDuJour  $alimentationDuJour
     * @return \Illuminate\Http\Response
     */
    public function show(alimentationDuJour $alimentationDuJour)
    {
        return $alimentationDuJour;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alimentationDuJour  $alimentationDuJour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alimentationDuJour $alimentationDuJour)
    {
        if($alimentationDuJour->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alimentationDuJour  $alimentationDuJour
     * @return \Illuminate\Http\Response
     */
    public function destroy(alimentationDuJour $alimentationDuJour)
    {
        if($alimentationDuJour->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

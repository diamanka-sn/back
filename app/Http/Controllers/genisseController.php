<?php

namespace App\Http\Controllers;

use App\Models\genisse;
use Illuminate\Http\Request;

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
      if(genisse::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
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
        if($genisse->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
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
        if($genisse->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

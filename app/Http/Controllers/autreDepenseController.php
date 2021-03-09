<?php

namespace App\Http\Controllers;

use App\Models\autreDepense;
use Illuminate\Http\Request;

class autreDepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $autreDepense = autreDepense::all();
        //return $autreDepense->toJson(JSON_PRETTY_PRINT);
        return autreDepense::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(autreDepense::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\autreDepense  $autreDepense
     * @return \Illuminate\Http\Response
     */
    public function show(autreDepense $autreDepense)
    {
        return $autreDepense;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\autreDepense  $autreDepense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, autreDepense $autreDepense)
    {
        if($autreDepense->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\autreDepense  $autreDepense
     * @return \Illuminate\Http\Response
     */
    public function destroy(autreDepense $autreDepense)
    {
        if($autreDepense->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}


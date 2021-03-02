<?php

namespace App\Http\Controllers;

use App\Models\facture;
use Illuminate\Http\Request;

class factureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $facture = facture::all();
        //return $facture->toJson(JSON_PRETTY_PRINT);
        return facture::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(facture::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(facture $facture)
    {
        return $facture;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facture $facture)
    {
        if($facture->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(facture $facture)
    {
        if($facture->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

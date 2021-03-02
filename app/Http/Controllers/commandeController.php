<?php

namespace App\Http\Controllers;

use App\Models\commande;
use Illuminate\Http\Request;

class commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $commande = commande::all();
        //return $commande->toJson(JSON_PRETTY_PRINT);
        return commande::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(commande::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(commande $commande)
    {
        return $commande;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commande $commande)
    {
        if($commande->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(commande $commande)
    {
        if($commande->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

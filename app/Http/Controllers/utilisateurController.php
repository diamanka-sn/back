<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;

class utilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $utilisateur = utilisateur::all();
        //return $utilisateur->toJson(JSON_PRETTY_PRINT);
        return utilisateur::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(utilisateur::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(utilisateur $utilisateur)
    {
        return $utilisateur;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, utilisateur $utilisateur)
    {
        if($utilisateur->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(utilisateur $utilisateur)
    {
        if($utilisateur->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

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
<<<<<<< HEAD
      //  $utilisateur = utilisateur::all();
        //return $utilisateur->toJson(JSON_PRETTY_PRINT);
        return utilisateur::orderByDesc('created_at')->get();
=======
            //  $bovin = bovin::all();
        //return $bovin->toJson(JSON_PRETTY_PRINT);
        return utilisateur::orderBy('created_at')->get();
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
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
      if(utilisateur::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
=======
        if(utilisateur::create($request->all())){
            return response()->json([
                'success' => 'enregistre avec succes'
            ],200);
        };
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
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
<<<<<<< HEAD
        if($utilisateur->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
=======
        if ($utilisateur->update($request->all())) {
            return response()->json([
                'success' => 'Modifier avec succes'
            ], 200);
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
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
<<<<<<< HEAD
        if($utilisateur->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
=======
        if ($utilisateur->delete()) {
            return response()->json([
                'success' => 'Supprimer avec succes'
            ], 200);
        }
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    }
}

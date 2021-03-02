<?php

namespace App\Http\Controllers;

use App\Models\achatAliment;
use Illuminate\Http\Request;

class achatAlimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
      //  $achatAliment = achatAliment::all();
        //return $achatAliment->toJson(JSON_PRETTY_PRINT);
        return achatAliment::orderByDesc('created_at')->get();
=======
        return achatAliment::orderByDesc('idAchatAliment')->get();
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
      if(achatAliment::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
=======
        if (achatAliment::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\achatAliment  $achatAliment
     * @return \Illuminate\Http\Response
     */
    public function show(achatAliment $achatAliment)
    {
        return $achatAliment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\achatAliment  $achatAliment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, achatAliment $achatAliment)
    {
<<<<<<< HEAD
        if($achatAliment->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
=======
        if ($achatAliment->update($request->all())) {
            return response()->json([
                'success' => 'Modifier avec succes'
            ], 200);
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\achatAliment  $achatAliment
     * @return \Illuminate\Http\Response
     */
    public function destroy(achatAliment $achatAliment)
    {
<<<<<<< HEAD
        if($achatAliment->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
=======
        if ($achatAliment->delete()) {
            return response()->json([
                'success' => 'Supprimer avec succes'
            ], 200);
        }
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\periode;
use Illuminate\Http\Request;

class periodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
      //  $periode = periode::all();
        //return $periode->toJson(JSON_PRETTY_PRINT);
        return periode::orderByDesc('created_at')->get();
=======
          //  $bovin = bovin::all();
        //return $bovin->toJson(JSON_PRETTY_PRINT);
        return periode::orderByDesc('idPeriode')->get();
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
      if(periode::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
=======
        if (periode::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(periode $periode)
    {
        return $periode;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, periode $periode)
    {
<<<<<<< HEAD
        if($periode->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
=======
        if ($periode->update($request->all())) {
            return response()->json([
                'success' => 'Modifier avec succes'
            ], 200);
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(periode $periode)
    {
<<<<<<< HEAD
        if($periode->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
=======
        if ($periode->delete()) {
            return response()->json([
                'success' => 'Supprimer avec succes'
            ], 200);
        }
>>>>>>> e0a4ad4cda9138b6bcd878d92f370f6dc62db06d
    }
}

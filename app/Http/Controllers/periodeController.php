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
          //  $bovin = bovin::all();
        //return $bovin->toJson(JSON_PRETTY_PRINT);
        return periode::orderByDesc('idPeriode')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (periode::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
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
        if ($periode->update($request->all())) {
            return response()->json([
                'success' => 'Modifier avec succes'
            ], 200);
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
        if ($periode->delete()) {
            return response()->json([
                'success' => 'Supprimer avec succes'
            ], 200);
        }
    }
}

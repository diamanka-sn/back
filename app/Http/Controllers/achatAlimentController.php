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
        return achatAliment::orderByDesc('idAchatAliment')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (achatAliment::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
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
        if ($achatAliment->update($request->all())) {
            return response()->json([
                'success' => 'Modifier avec succes'
            ], 200);
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
        if ($achatAliment->delete()) {
            return response()->json([
                'success' => 'Supprimer avec succes'
            ], 200);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\bovin;
use Illuminate\Http\Request;

class bovinController extends Controller
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
        return bovin::orderByDesc('idBovin')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (bovin::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovin  $bovin
     * @return \Illuminate\Http\Response
     */
    public function show(bovin $bovin)
    {
        return $bovin;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovin  $bovin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bovin $bovin)
    {
        if($bovin->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovin  $bovin
     * @return \Illuminate\Http\Response
     */
    public function destroy(bovin $bovin)
    {
        if($bovin->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

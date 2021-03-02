<?php

namespace App\Http\Controllers;

use App\Models\taureau;
use Illuminate\Http\Request;

class taureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $taureau = taureau::all();
        //return $taureau->toJson(JSON_PRETTY_PRINT);
        return taureau::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(taureau::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\taureau  $taureau
     * @return \Illuminate\Http\Response
     */
    public function show(taureau $taureau)
    {
        return $taureau;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\taureau  $taureau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, taureau $taureau)
    {
        if($taureau->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\taureau  $taureau
     * @return \Illuminate\Http\Response
     */
    public function destroy(taureau $taureau)
    {
        if($taureau->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

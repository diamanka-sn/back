<?php

namespace App\Http\Controllers;

use App\Models\veau;
use Illuminate\Http\Request;

class veauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $veau = veau::all();
        //return $veau->toJson(JSON_PRETTY_PRINT);
        return veau::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(veau::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\veau  $veau
     * @return \Illuminate\Http\Response
     */
    public function show(veau $veau)
    {
        return $veau;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\veau  $veau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, veau $veau)
    {
        if($veau->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\veau  $veau
     * @return \Illuminate\Http\Response
     */
    public function destroy(veau $veau)
    {
        if($veau->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

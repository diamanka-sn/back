<?php

namespace App\Http\Controllers;

use App\Models\velle;
use Illuminate\Http\Request;

class velleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $velle = velle::all();
        //return $velle->toJson(JSON_PRETTY_PRINT);
        return velle::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(velle::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\velle  $velle
     * @return \Illuminate\Http\Response
     */
    public function show(velle $velle)
    {
        return $velle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\velle  $velle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, velle $velle)
    {
        if($velle->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\velle  $velle
     * @return \Illuminate\Http\Response
     */
    public function destroy(velle $velle)
    {
        if($velle->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

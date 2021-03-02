<?php

namespace App\Http\Controllers;

use App\Models\vache;
use Illuminate\Http\Request;

class vacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $vache = vache::all();
        //return $vache->toJson(JSON_PRETTY_PRINT);
        return vache::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(vache::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vache  $vache
     * @return \Illuminate\Http\Response
     */
    public function show(vache $vache)
    {
        return $vache;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vache  $vache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vache $vache)
    {
        if($vache->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vache  $vache
     * @return \Illuminate\Http\Response
     */
    public function destroy(vache $vache)
    {
        if($vache->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

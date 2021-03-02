<?php

namespace App\Http\Controllers;

use App\Models\pesage;
use Illuminate\Http\Request;

class pesageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $pesage = pesage::all();
        //return $pesage->toJson(JSON_PRETTY_PRINT);
        return pesage::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(pesage::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pesage  $pesage
     * @return \Illuminate\Http\Response
     */
    public function show(pesage $pesage)
    {
        return $pesage;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pesage  $pesage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesage $pesage)
    {
        if($pesage->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesage  $pesage
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesage $pesage)
    {
        if($pesage->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

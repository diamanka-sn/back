<?php

namespace App\Http\Controllers;

use App\Models\productionLait;
use Illuminate\Http\Request;

class productionLaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $productionLait = productionLait::all();
        //return $productionLait->toJson(JSON_PRETTY_PRINT);
        return productionLait::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(productionLait::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productionLait  $productionLait
     * @return \Illuminate\Http\Response
     */
    public function show(productionLait $productionLait)
    {
        return $productionLait;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productionLait  $productionLait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productionLait $productionLait)
    {
        if($productionLait->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productionLait  $productionLait
     * @return \Illuminate\Http\Response
     */
    public function destroy(productionLait $productionLait)
    {
        if($productionLait->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

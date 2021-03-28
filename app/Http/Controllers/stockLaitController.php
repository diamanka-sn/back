<?php

namespace App\Http\Controllers;

use App\Models\stockLait;
use Illuminate\Http\Request;

class stockLaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $stockLait = stockLait::all();
        //return $stockLait->toJson(JSON_PRETTY_PRINT);
        return stockLait::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(stockLait::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stockLait  $stockLait
     * @return \Illuminate\Http\Response
     */
    public function show(stockLait $stockLait)
    {
        return $stockLait;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stockLait  $stockLait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stockLait $stockLait)
    {
        if($stockLait->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stockLait  $stockLait
     * @return \Illuminate\Http\Response
     */
    public function destroy(stockLait $stockLait)
    {
        if($stockLait->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }

    public function stockDisponible(){
        return stockLait::sum('quantiteDispo');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\maladie;
use Illuminate\Http\Request;

class maladieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $maladie = maladie::all();
        //return $maladie->toJson(JSON_PRETTY_PRINT);
        return maladie::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(maladie::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function show(maladie $maladie)
    {
        return $maladie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maladie $maladie)
    {
        if($maladie->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function destroy(maladie $maladie)
    {
        if($maladie->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

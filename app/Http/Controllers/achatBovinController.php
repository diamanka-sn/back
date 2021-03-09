<?php

namespace App\Http\Controllers;

use App\Models\achatBovin;
use Illuminate\Http\Request;

class achatBovinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $achatBovin = achatBovin::all();
        //return $achatBovin->toJson(JSON_PRETTY_PRINT);
        return achatBovin::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(achatBovin::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\achatBovin  $achatBovin
     * @return \Illuminate\Http\Response
     */
    public function show(achatBovin $achatBovin)
    {
        return $achatBovin;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\achatBovin  $achatBovin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, achatBovin $achatBovin)
    {
        if($achatBovin->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\achatBovin  $achatBovin
     * @return \Illuminate\Http\Response
     */
    public function destroy(achatBovin $achatBovin)
    {
        if($achatBovin->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
    
}

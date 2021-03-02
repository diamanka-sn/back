<?php

namespace App\Http\Controllers;

use App\Models\diagnostic;
use Illuminate\Http\Request;

class diagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $diagnostic = diagnostic::all();
        //return $diagnostic->toJson(JSON_PRETTY_PRINT);
        return diagnostic::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(diagnostic::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diagnostic  $diagnostic
     * @return \Illuminate\Http\Response
     */
    public function show(diagnostic $diagnostic)
    {
        return $diagnostic;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diagnostic  $diagnostic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diagnostic $diagnostic)
    {
        if($diagnostic->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diagnostic  $diagnostic
     * @return \Illuminate\Http\Response
     */
    public function destroy(diagnostic $diagnostic)
    {
        if($diagnostic->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }
}

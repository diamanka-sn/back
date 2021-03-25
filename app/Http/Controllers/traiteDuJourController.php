<?php

namespace App\Http\Controllers;

use App\Models\traiteDuJour;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class traiteDuJourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $traiteDuJour = traiteDuJour::all();
        //return $traiteDuJour->toJson(JSON_PRETTY_PRINT);
        return traiteDuJour::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (traiteDuJour::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\traiteDuJour  $traiteDuJour
     * @return \Illuminate\Http\Response
     */
    public function show(traiteDuJour $traiteDuJour)
    {
        return $traiteDuJour;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\traiteDuJour  $traiteDuJour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, traiteDuJour $traiteDuJour)
    {
        if ($traiteDuJour->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\traiteDuJour  $traiteDuJour
     * @return \Illuminate\Http\Response
     */
    public function destroy(traiteDuJour $traiteDuJour)
    {
        if ($traiteDuJour->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function productionLait()
    {
        $bovin = DB::table('traite_du_jours')
            // ->join('production_laits', 'production_laits.idProductionLait', '=', 'traite_du_jours.idProductionLait')
            ->select(
                DB::raw("sum(traiteMatin) as 'matin'"),
                DB::raw("sum(traiteSoir) as 'soir'"),
                DB::raw("sum(traiteSoir + traiteMatin) as 'total'"),
                DB::raw('YEAR(dateTraite) annee'),
                DB::raw("MONTH(dateTraite) as mois")
            )
            ->groupBy('annee', 'mois')
            ->get();
        return $bovin->groupBy('annee');
    }

    public function quantiteLaitProduite()
    {
        $bovin = DB::table('traite_du_jours')
            ->select(DB::raw("sum(traiteSoir + traiteMatin) as 'total'"))
            ->get();
        return $bovin;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\achatAliment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class achatAlimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $achatAliment = achatAliment::all();
        //return $achatAliment->toJson(JSON_PRETTY_PRINT);
        return achatAliment::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (achatAliment::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\achatAliment  $achatAliment
     * @return \Illuminate\Http\Response
     */
    public function show(achatAliment $achatAliment)
    {
        return $achatAliment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\achatAliment  $achatAliment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, achatAliment $achatAliment)
    {
        if ($achatAliment->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\achatAliment  $achatAliment
     * @return \Illuminate\Http\Response
     */
    public function destroy(achatAliment $achatAliment)
    {
        if ($achatAliment->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }



    public function quantiteAchetes()
    {
        $stock = DB::table('achat_aliments')
            // ->join('achat_aliments', 'achat_aliments.nomAliment', '=', 'alimentation_du_jours.nomAlimentation')
            ->where('nomAliment', 'sorgo')
            ->select(DB::raw("sum(quantite) as 'achetes'"))

            ->get();

        return $stock;
    }

    public function typeAliment()
    {
        $stock = DB::table('achat_aliments')
            ->select('nomAliment as type')
            ->distinct()
            ->get();
        return $stock;
    }

    public function chargeAlimentation()
    {
        $stock = DB::table('achat_aliments')
            // ->join('achat_aliments', 'achat_aliments.nomAliment', '=', 'alimentation_du_jours.nomAlimentation')
            ->select(DB::raw("sum(montant) as 'achetes'"), DB::raw('YEAR(dateAchatAliment) as annee'))
            ->groupBy('annee')
            ->get();

        return $stock->groupBy('annee');
    }
}

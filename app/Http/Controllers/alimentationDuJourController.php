<?php

namespace App\Http\Controllers;

use App\Models\alimentationDuJour;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class alimentationDuJourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $alimentationDuJour = alimentationDuJour::all();
        //return $alimentationDuJour->toJson(JSON_PRETTY_PRINT);
        return alimentationDuJour::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (alimentationDuJour::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alimentationDuJour  $alimentationDuJour
     * @return \Illuminate\Http\Response
     */
    public function show(alimentationDuJour $alimentationDuJour)
    {
        return $alimentationDuJour;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alimentationDuJour  $alimentationDuJour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alimentationDuJour $alimentationDuJour)
    {
        if ($alimentationDuJour->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alimentationDuJour  $alimentationDuJour
     * @return \Illuminate\Http\Response
     */
    public function destroy(alimentationDuJour $alimentationDuJour)
    {
        if ($alimentationDuJour->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function quantiteConsommes()
    {
        $stock = DB::table('alimentation_du_jours')
            // ->join('achat_aliments', 'achat_aliments.nomAliment', '=', 'alimentation_du_jours.nomAlimentation')
            ->where('nomAlimentation', 'sorgo')
            ->select(DB::raw("sum(quantite) as 'consommees'"))

            ->get();

        return $stock;
    }

    public function stockAliment()
    {
        $stock = DB::table('alimentation_du_jours')
            ->join('achat_aliments', 'achat_aliments.nomAliment', '=', 'alimentation_du_jours.nomAlimentation')
            ->select(DB::raw("sum(achat_aliments.quantite - alimentation_du_jours.quantite) as 'stock'"), DB::raw("achat_aliments.nomAliment as 'aliment'"), DB::raw('YEAR(date) as annee'))
            ->groupBy('annee', 'aliment')
            ->get();

        return $stock->groupBy('annee');
    }

    public function consommationMois()
    {
        $stock = DB::table('alimentation_du_jours')
            ->select(DB::raw("sum(quantite) as 'consommation'"), DB::raw("nomAlimentation    as 'aliment'"), DB::raw('YEAR(date) as annee,MONTH(date) mois'))
            ->groupBy('annee', 'mois', 'aliment')
            ->get();

        return $stock->groupBy('annee');
    }

    public function listeAlimentationJour()
    {
        $date = \Carbon\Carbon::now()->format('y.m.d');
        $stock = DB::table('alimentation_du_jours')
            ->where('date', $date)
            ->select('nomAlimentation', 'quantite', 'date')
            ->get();

        return $stock;
    }   

}

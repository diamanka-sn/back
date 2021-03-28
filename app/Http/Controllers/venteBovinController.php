<?php

namespace App\Http\Controllers;

use App\Models\venteBovin;
use App\Models\bovin;
use App\Models\client;
use App\Models\commande;
use App\Models\race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class venteBovinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $venteBovin = venteBovin::all();
        //return $venteBovin->toJson(JSON_PRETTY_PRINT);
        return venteBovin::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (venteBovin::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venteBovin  $venteBovin
     * @return \Illuminate\Http\Response
     */
    public function show(venteBovin $venteBovin)
    {
        return $venteBovin;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venteBovin  $venteBovin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venteBovin $venteBovin)
    {
        if ($venteBovin->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\venteBovin  $venteBovin
     * @return \Illuminate\Http\Response
     */
    public function destroy(venteBovin $venteBovin)
    {
        if ($venteBovin->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }


    public function nombreBovinVendue()
    {
        return venteBovin::count();
    }
    public function listBovinVendue()
    {    
        $bovins=bovin::All();
        $races=race::All();
        $commandes=commande::All();
        $clients=client::All();

        $BovinVendue=DB::table('vente_bovins')
        ->join('bovins','vente_bovins.idBovin','=','bovins.idBovin')
        ->join('races','bovins.idRace','=','races.idRace')
        //->join('vente_bovins','commandes.idCom','=','vente_bovins.idCom')
        //->join('vente_bovins','commandes.idCom','=','vente_bovins.idCom')
       ->select('vente_bovins.*','bovins.*','races.nomRace')
        ->get();
         
    return $BovinVendue;
    }


    public function SommeVenteBovin()
    {
      
        return DB::table("vente_bovins")->sum("prixBovin");
    }

}

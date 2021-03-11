<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\client;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $commande = commande::all();
        //return $commande->toJson(JSON_PRETTY_PRINT);
        return commande::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (commande::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(commande $commande)
    {
        return $commande;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commande $commande)
    {
        if ($commande->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(commande $commande)
    {
        if ($commande->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function nombreCommande()
    {
        return commande::orderByDesc('created_at')->count();
    }

    public function nombreCommandeLait()
    {
        $commandeLait = DB::table('commandes')
            ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.idCom')
            ->select('commandes.*', 'vente_laits.*')
            ->get();

        return $commandeLait->count();
    }
    public function litreVendu(){
        $commandeBovin = DB::table('commandes')
        ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.idCom')
        ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.idBouteille')
        ->select('bouteilles.capacite')
        ->get();

    return $commandeBovin->sum('capacite');
    }
    public function nombreCommandeBovin()
    {
        $commandeBovin = DB::table('commandes')
            ->join('vente_bovins', 'commandes.idCom', '=', 'vente_bovins.idCom')
            ->join('bovins', 'vente_bovins.idBovin', '=', 'bovins.idBovin')
            ->get();

        return $commandeBovin->count();
    }
    public function nombreCommandeParSemaine()
    {
        $commandeMois = DB::table('commandes')
            ->select(DB::raw("count(idCom) as 'nombre'"), DB::raw('WEEK(dateCom) semaine,DAY(dateCom) jour'))
            ->groupBy('semaine', 'jour')
            ->get();

        return $commandeMois;
    }

    public function nombreCommandeParMois()
    {
        $commandeMois = DB::table('commandes')
            ->select(DB::raw("count(idCom) as 'nombre'"),DB::raw('YEAR(dateCom) annee, MONTH(dateCom) mois'))
            ->groupBy('annee', 'mois')
            ->get();

        return $commandeMois;
    }

    public function listClient()
    {
        $commande = DB::table('commandes')
            ->join('clients', 'commandes.idUtilisateur', '=', 'clients.idUtilisateur')
            ->select('commandes.*', 'clients.nom')
            ->get();

        return $commande;
    }

    public function listClientBovinAvecDetails()
    {
        $commandeBovin = DB::table('commandes')
            ->join('clients', 'commandes.idUtilisateur', '=', 'clients.idUtilisateur')
            ->join('vente_bovins', 'commandes.idCom', '=', 'vente_bovins.idCom')
            ->join('bovins', 'vente_bovins.idBovin', '=', 'bovins.idBovin')
            ->select('commandes.*', 'clients.*', 'vente_bovins.*', 'bovins.nom')
            ->get();

        return $commandeBovin;
    }

    public function listClientLaitAvecDetails()
    {
        $commandeLait = DB::table('commandes')
            ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.idCom')
            ->join('clients', 'commandes.idUtilisateur', '=', 'clients.idUtilisateur')
            ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.idBouteille')
            ->select('commandes.*', 'vente_laits.*','clients.*', 'bouteilles.capacite')
            ->get();

        return $commandeLait;
    }
}

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
            ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.commande_id')
            ->select('commandes.*', 'vente_laits.*')
            ->get();

        return $commandeLait->count();
    }
    public function litreVendu()
    {
        $commandeBovin = DB::table('commandes')
            ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.commande_id')
            ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
            ->select('bouteilles.capacite')
            ->get();

        return $commandeBovin->sum('capacite');
    }
    public function nombreCommandeBovinM()
    {
        $commandeBovin = DB::table('commandes')
            ->join('vente_bovins', 'commandes.idCom', '=', 'vente_bovins.commande_id')
            ->join('bovins', 'vente_bovins.bovin_id', '=', 'bovins.idBovin')
            ->get();

        return $commandeBovin->count();
    }
    public function nombreCommandeParSemaine()
    {
        $commandeMois = DB::table('commandes')
            ->select(DB::raw("count(idCom) as 'nombre'"), DB::raw('YEAR(dateCom) annee,WEEK(dateCom) semaine'))
            ->groupBy('annee', 'semaine')
            ->orderBy('semaine')
            ->get();

        return $commandeMois->groupBy('annee');
    }

    public function nombreCommandeParMois()
    {
        $commandeMois = DB::table('commandes')
            ->select(DB::raw("count(idCom) as 'nombre'"), DB::raw('YEAR(dateCom) annee, MONTH(dateCom) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();

        return $commandeMois->groupBy('annee');
    }

    public function listClient()
    {
        $commande = DB::table('commandes')
            ->join('clients', 'commandes.client_id', '=', 'clients.user_id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('commandes.*', 'users.nom')
            ->get();

        return $commande;
    }

    public function listClientBovinAvecDetails()
    {
        $commandeBovin = DB::table('commandes')
            ->join('clients', 'commandes.client_id', '=', 'clients.user_id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('vente_bovins', 'commandes.idCom', '=', 'vente_bovins.commande_id')
            ->join('bovins', 'vente_bovins.bovin_id', '=', 'bovins.idBovin')
            ->select('commandes.*', 'users.*', 'vente_bovins.*', 'bovins.nom')
            ->get();

        return $commandeBovin;
    }

    public function listClientLaitAvecDetails()
    {
        $commandeLait = DB::table('commandes')
            ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.commande_id')
            ->join('clients', 'commandes.client_id', '=', 'clients.user_id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
            ->select('commandes.*', 'vente_laits.*', 'users.*', 'bouteilles.capacite')
            ->get();

        return $commandeLait;
    }

    public function chiffreAffaireLait()
    {
        $commandeLait = DB::table('commandes')
            ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.commande_id')
            ->join('factures', 'commandes.idCom', '=', 'factures.commande_id')
            ->select(DB::raw("sum(factures.montant) as 'chiffre'"), DB::raw('YEAR(factures.datePaiement) annee'), DB::raw("MONTH(factures.datePaiement) as mois"))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();
        return $commandeLait->groupBy('annee');
    }
    public function chiffreAffaireBovin()
    {
        $commandeLait = DB::table('commandes')
            ->join('vente_bovins', 'commandes.idCom', '=', 'vente_bovins.commande_id')
            ->join('factures', 'commandes.idCom', '=', 'factures.commande_id')
            ->select(DB::raw("sum(factures.montant) as 'chiffre'"), DB::raw('YEAR(factures.datePaiement) annee'), DB::raw("MONTH(factures.datePaiement) as mois"))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->get();
        return $commandeLait->groupBy('annee');
    }

    public function chiffreAnnuelleLait()
    {
        $commandeLait = DB::table('commandes')
            ->join('vente_laits', 'commandes.idCom', '=', 'vente_laits.commande_id')
            ->join('factures', 'commandes.idCom', '=', 'factures.commande_id')
            ->select(DB::raw("sum(factures.montant) as 'chiffrel'"), DB::raw('YEAR(factures.datePaiement) annee'))
            ->groupBy('annee')
            ->get();
        return $commandeLait;
    }

    public function chiffreAnnuelleBovin()
    {
        $commandeLait = DB::table('commandes')
            ->join('vente_bovins', 'commandes.idCom', '=', 'vente_bovins.commande_id')
            ->join('factures', 'commandes.idCom', '=', 'factures.commande_id')
            ->select(DB::raw("sum(factures.montant) as 'chiffreb'"), DB::raw('YEAR(factures.datePaiement) annee'))
            ->groupBy('annee')
            ->get();
        return $commandeLait;
    }
   
   
    public function nombreCommandeBovin()
    {
        $commandeBovin = DB::table('commandes')
            ->join('vente_bovins', 'commandes.idCom', '=', 'vente_bovins.commande_id')
            ->join('bovins', 'vente_bovins.bovin_id', '=', 'bovins.idBovin')
            ->get();

        return $commandeBovin->count();
    }
   

    
   

}
 
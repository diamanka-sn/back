<?php

namespace App\Http\Controllers;

use App\Models\vache;
use App\Models\race;
use App\Models\productionLait;
use App\Models\traiteDuJour;
use App\Models\pesage;
use App\Models\periode;
use App\Models\maladie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $vache = vache::all();
        //return $vache->toJson(JSON_PRETTY_PRINT);
        return vache::orderByDesc('created_at')->get();
    }

    public function nbreVache()
    {
        return vache::orderByDesc('idBovin')->count();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (vache::create($request->all())) {
            return response()->json([
                'success' => 'enregistre avec succes'
            ], 200);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vache  $vache
     * @return \Illuminate\Http\Response
     */
    public function show(vache $vache)
    {
        return $vache;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vache  $vache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vache $vache)
    {
        if ($vache->update($request->all())) {
            return response()->json([
                'success' => 'modifier avec succes'
            ], 200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vache  $vache
     * @return \Illuminate\Http\Response
     */
    public function destroy(vache $vache)
    {
        if ($vache->delete()) {
            return response()->json([
                'success' => 'Suppression reussie'
            ], 200);
        };
    }

    public function nombreVache()
    {
        $commandeLait = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            // ->select(DB::raw("sum(factures.montant) as 'chiffrel'"), DB::raw('YEAR(factures.datePaiement) annee'))
            ->where("etat", "Vivant")
            ->count();
        return $commandeLait;
    }
    public function listVacheMalade()
    {
        $commandeLait = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Malade")
            ->get();
        return $commandeLait;
    }

    public function listVacheSain()
    {
        $commandeLait = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Sain")
            ->get();
        return $commandeLait;
    }
    public function listVacheEnVente()
    {
        $commandeLait = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listVachePasEnVente()
    {
        $commandeLait = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("situation", "pas en vente")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::->orderByDesc('idBovin')->get();
    }
    public function listVacheVivant()
    {
        $commandeLait = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Vivant")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listVacheMort()
    {
        $commandeLait = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->select('bovins.*')
            ->where("etat", "Mort")
            ->orderByDesc('idBovin')
            ->get();

        return $commandeLait;
        // return Taureau::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listVacheAvecDetaille()
    {
        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('races', 'bovins.race_id', '=', 'races.idRace')
            ->join('pesages', 'vaches.idBovin', '=', 'pesages.bovin_id')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'races.nomRace', 'periodes.*', 'pesages.*')
            ->where("etat", "Vivant")
            ->get();

        return $Vaches;
    }

    public function detailleProductionLaitVache()
    {

        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('production_laits', 'vaches.idBovin', '=', 'production_laits.bovin_id')
            ->join('traite_du_jours', 'production_laits.idProductionLait', '=', 'traite_du_jours.productionLait_id')
            ->select('bovins.*', 'traite_du_jours.*', 'production_laits.*')
            ->get();

        return $Vaches;
    }

    public function nombreVacheEnLactation()
    {
        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("periodes.nomPeriode", "Lactation")->count();
    }
    public function listeVacheEnLactation()
    {     
     

        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("periodes.nomPeriode", "Lactation");
    }
    public function listeVacheEnTarissement()
    {
        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("periodes.nomPeriode", "Tarissement");
    }
    public function nombreVacheEnTarissement()
    {
        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("periodes.nomPeriode", "Tarissement")->count();
    }

    public function listeVacheEnGestation()
    {
        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->where("bovins.etat", "Vivant")
            ->get();
        return $Vaches->where("periodes.phase", "gestation");
    }
    public function nombreVacheEnGestation()
    {

        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->where("bovins.etat", "Vivant")
            ->get();
        return $Vaches->where("periodes.phase", "gestation")->count();
    }
    public function listeVacheNonGestant()
    {

        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->where("bovins.etat", "Vivant")
            ->get();
        return $Vaches->where("periodes.phase", "non gestant");
    }
    public function nombreVacheNonGestant()
    {

        $Vaches = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select('bovins.*', 'periodes.nomPeriode')
            ->where("bovins.etat", "Vivant")
            ->get();
        return $Vaches->where("periodes.phase", "non gestant")->count();
    }

    public function evolutionVache()
    {
        $commandeMois = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->where('bovins.etat', 'Vivant')
            ->select(DB::raw("count(vaches.idBovin) as 'nombre'"), DB::raw('YEAR(vaches.created_at) annee,MONTH(vaches.created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->where("etat", "vivant")
            ->get();

        return $commandeMois->groupBy('annee');
    }

    public function phaseVache()
    {
        $phase = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->where('bovins.etat', 'Vivant')
            ->select(DB::raw("count(vaches.periode_id) as 'nombre'"), DB::raw("periodes.phase as 'phase'"))
            ->groupBy('phase')
            ->get();

        return $phase;
    }

    public function periodeVache()
    {
        $phase = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->where('bovins.etat', 'Vivant')
            ->select(DB::raw("count(vaches.idBovin) as 'nombre'"), DB::raw("periodes.nomPeriode as 'periode'"))
            ->groupBy('periode')
            ->get();

        return $phase;
    }

    public function listVacheEnVenteAvecDetaille()
    {
        

        $Vaches=DB::table('Vaches')
        ->join('races','Vaches.idRace','=','races.idRace')
        ->join('pesages','Vaches.idBovin','=','pesages.idBovin')
        ->join('periodes','Vaches.idPeriode','=','periodes.idPeriode')
        ->select('Vaches.*','races.nomRace','periodes.*','pesages.*')
        ->where("situation","en vente")
        ->get();
    
    return $Vaches;
         
    } 

    public function periodeMois()
    {
        $phase = DB::table('vaches')
            ->join('bovins', 'vaches.idBovin', '=', 'bovins.idBovin')
            ->join('periodes', 'vaches.periode_id', '=', 'periodes.idPeriode')
            ->select(DB::raw("count(vaches.idBovin) as 'nombre'"), DB::raw("periodes.nomPeriode as 'periode'"), DB::raw('YEAR(periodes.created_at) annee,MONTH(periodes.created_at) mois'))
            ->where('bovins.etat', 'Vivant')
            ->groupBy('annee', 'periode', 'mois')
            ->orderBy('mois')
            ->get();

        return $phase->groupBy('periode');
    }
    
}

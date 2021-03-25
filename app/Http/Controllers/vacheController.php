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
        return Vache::where("etat", "vivant")->count();
    }
    public function listVacheMalade()
    {
        return Vache::where("etatDeSante", "souffrant")->orderByDesc('idBovin')->get();
    }

    public function listVacheSain()
    {
        return Vache::where("etatDeSante", "Sain")->orderByDesc('idBovin')->get();
    }
    public function listVacheEnVente()
    {
        return Vache::where("situation", "en vente")->orderByDesc('idBovin')->get();
    }
    public function listVachePasEnVente()
    {
        return Vache::where("situation", "pas en vente")->orderByDesc('idBovin')->get();
    }
    public function listVacheVivant()
    {
        return Vache::where("etat", "vivant")->orderByDesc('idBovin')->get();
    }
    public function listVacheMort()
    {
        return Vache::where("etat", "mort")->orderByDesc('idBovin')->get();
    }
    public function listVacheAvecDetaille()
    {
        $Vaches = DB::table('vaches')
            ->join('races', 'vaches.idRace', '=', 'races.idRace')
            ->join('pesages', 'vaches.idBovin', '=', 'pesages.idBovin')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'races.nomRace', 'periodes.*', 'pesages.*')
            ->where("etat", "vivant")
            ->get();

        return $Vaches;
    }

    public function detailleProductionLaitVache()
    {

        $Vaches = DB::table('vaches')
            ->join('production_laits', 'vaches.idBovin', '=', 'production_laits.idBovin')
            ->join('traite_du_jours', 'production_laits.idProductionLait', '=', 'traite_du_jours.idProductionLait')
            ->select('vaches.*', 'traite_du_jours.*', 'production_laits.*')
            ->get();

        return $Vaches;
    }

    public function nombreVacheEnLactation()
    {
        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("nomPeriode", "Lactation")->count();
    }
    public function listeVacheEnLactation()
<<<<<<< HEAD
    {     
        $periodes=periode::All();
        $races=race::All();
        $periodes=periode::All();
        $pesages=pesage::All();


        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
        ->join('pesages','vaches.idPesage','=','pesage.idPesage')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
        ->join('races','vaches.idRace','=','races.idRace')


       ->select('vaches.*','periodes.nomPeriode','races.*','pesages.*')
        ->get();
        return $Vaches->where("nomPeriode","Lactation");        
=======
    {

        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("nomPeriode", "Lactation");
>>>>>>> e002d398770c5357c27be6e9961d44c180864b04
    }
    public function listeVacheEnTarissement()
    {
        $periodes = periode::All();
        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("nomPeriode", "Tarissement");
    }
    public function nombreVacheEnTarissement()
    {
        $periodes = periode::All();
        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.nomPeriode')
            ->get();
        return $Vaches->where("nomPeriode", "Tarissement")->count();
    }

    public function listeVacheEnGestation()
    {
        $periodes = periode::All();
        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.phase')
            ->where("etat", "vivant")
            ->get();
        return $Vaches->where("phase", "gestation");
    }
    public function nombreVacheEnGestation()
    {

        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.phase')
            ->where("etat", "vivant")
            ->get();
        return $Vaches->where("phase", "gestation")->count();
    }
    public function listeVacheNonGestant()
    {

        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.phase')
            ->where("etat", "vivant")
            ->get();
        return $Vaches->where("phase", "non gestant");
    }
    public function nombreVacheNonGestant()
    {

        $Vaches = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select('vaches.*', 'periodes.phase')
            ->where("etat", "vivant")
            ->get();
        return $Vaches->where("phase", "non gestant")->count();
    }

    public function evolutionVache()
    {
        $commandeMois = DB::table('vaches')
            ->where('etat', 'vivant')
            ->select(DB::raw("count(idBovin) as 'nombre'"), DB::raw('YEAR(created_at) annee,MONTH(created_at) mois'))
            ->groupBy('annee', 'mois')
            ->orderBy('mois')
            ->where("etat", "vivant")
            ->get();

        return $commandeMois->groupBy('annee');
    }

    public function phaseVache()
    {
        $phase = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->where('etat', 'vivant')
            ->select(DB::raw("count(vaches.idBovin) as 'nombre'"), DB::raw("periodes.phase as 'phase'"))
            ->groupBy('phase')
            ->where("etat", "vivant")
            ->get();

        return $phase;
    }

    public function periodeVache()
    {
        $phase = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->where('etat', 'vivant')
            ->select(DB::raw("count(vaches.idBovin) as 'nombre'"), DB::raw("periodes.nomPeriode as 'periode'"))
            ->groupBy('periode')
            ->get();

        return $phase;
    }

<<<<<<< HEAD
    public function listVacheEnVenteAvecDetaille()
    {
        $races=race::All();
        $pesages=pesage::All();
        $periodes=periode::All();

        $Vaches=DB::table('Vaches')
        ->join('races','Vaches.idRace','=','races.idRace')
        ->join('pesages','Vaches.idBovin','=','pesages.idBovin')
        ->join('periodes','Vaches.idPeriode','=','periodes.idPeriode')
        ->select('Vaches.*','races.nomRace','periodes.*','pesages.*')
        ->where("situation","en vente")
        ->get();
    
    return $Vaches;
         
    }
    
=======
    public function periodeMois()
    {
        $phase = DB::table('vaches')
            ->join('periodes', 'vaches.idPeriode', '=', 'periodes.idPeriode')
            ->select(DB::raw("count(vaches.idBovin) as 'nombre'"), DB::raw("periodes.nomPeriode as 'periode'"), DB::raw('YEAR(periodes.created_at) annee,MONTH(periodes.created_at) mois'))
            ->where('etat', 'vivant')
            ->groupBy( 'annee','periode', 'mois')
            ->orderBy('mois')
            ->get();

        return $phase->groupBy( 'periode');
    }
>>>>>>> e002d398770c5357c27be6e9961d44c180864b04
}

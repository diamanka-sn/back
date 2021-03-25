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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(vache::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
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
        if($vache->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
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
        if($vache->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }


    public function nombreVache()
    {
        return Vache::All()->count();
    }
    public function listVacheMalade()
    {
        return Vache::where("etatDeSante","souffrant")->orderByDesc('idBovin')->get();
    }

    public function listVacheSain()
    {
        return Vache::where("etatDeSante","Sain")->orderByDesc('idBovin')->get();
    }
    public function listVacheEnVente()
    {
        return Vache::where("situation","en vente")->orderByDesc('idBovin')->get();
    }
    public function listVachePasEnVente()
    {
        return Vache::where("situation","pas en vente")->orderByDesc('idBovin')->get();
    }
    public function listVacheVivant()
    {
        return Vache::where("etat","vivant")->orderByDesc('idBovin')->get();
    }
    public function listVacheMort()
    {
        return Vache::where("etat","mort")->orderByDesc('idBovin')->get();
    }
    public function listVacheAvecDetaille()
    {
        $races=race::All();
        $pesages=pesage::All();
        $periodes=periode::All();

        $Vaches=DB::table('Vaches')
        ->join('races','Vaches.idRace','=','races.idRace')
        ->join('pesages','Vaches.idBovin','=','pesages.idBovin')
        ->join('periodes','Vaches.idPeriode','=','periodes.idPeriode')
       ->select('Vaches.*','races.nomRace','periodes.*','pesages.*')
        ->get();
    
    return $Vaches;
         
    }

    public function detailleProductionLaitVache()
    {
        $productionLaits=productionLait::All();
        $traiteDuJours=traiteDuJour::All();
        

        $Vaches=DB::table('vaches')
        ->join('production_laits','vaches.idBovin','=','production_laits.idBovin')
        ->join('traite_du_jours','production_laits.idProductionLait','=','traite_du_jours.idProductionLait')
        
       ->select('vaches.*','traite_du_jours.*','production_laits.*')
        ->get();
    
    return $Vaches;
         
    }

    public function nombreVacheEnLactation()
    {     
        $periodes=periode::All();
        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
       ->select('vaches.*','periodes.nomPeriode')
        ->get();
        return $Vaches->where("nomPeriode","Lactation")->count();        
    }
    public function listeVacheEnLactation()
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
    }
    public function listeVacheEnTarissement()
    {     
        $periodes=periode::All();
        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
       ->select('vaches.*','periodes.nomPeriode')
        ->get();
        return $Vaches->where("nomPeriode","Tarissement");        
    }
    public function nombreVacheEnTarissement()
    {     
        $periodes=periode::All();
        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
       ->select('vaches.*','periodes.nomPeriode')
        ->get();
        return $Vaches->where("nomPeriode","Tarissement")->count();        
    }

    public function listeVacheEnGestation()
    {     
        $periodes=periode::All();
        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
       ->select('vaches.*','periodes.phase')
        ->get();
        return $Vaches->where("phase","gestation");        
    }
    public function nombreVacheEnGestation()
    {     
        $periodes=periode::All();
        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
       ->select('vaches.*','periodes.phase')
        ->get();
        return $Vaches->where("phase","gestation")->count();        
    }
    public function listeVacheNonGestant()
    {     
        $periodes=periode::All();
        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
       ->select('vaches.*','periodes.phase')
        ->get();
        return $Vaches->where("phase","non gestant");        
    }
    public function nombreVacheNonGestant()
    {     
        $periodes=periode::All();
        $Vaches=DB::table('vaches')
        ->join('periodes','vaches.idPeriode','=','periodes.idPeriode')
       ->select('vaches.*','periodes.phase')
        ->get();
        return $Vaches->where("phase","non gestant")->count();        
    }

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
    
}

<?php

namespace App\Http\Controllers;

use App\Models\CommandePersonnalise;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandePersonnaliseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CommandePersonnalise = CommandePersonnalise::all();
        //return $CommandePersonnalise->toJson(JSON_PRETTY_PRINT);
        return $CommandePersonnalise;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(CommandePersonnalise::create($request->all())){
          return response()->json([
              'success' => 'enregistre avec succes'
          ],200);
      };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommandePersonnalise  $CommandePersonnalise
     * @return \Illuminate\Http\Response
     */
    public function show(CommandePersonnalise $CommandePersonnalise)
    {
        return $CommandePersonnalise;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommandePersonnalise  $CommandePersonnalise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandePersonnalise $CommandePersonnalise)
    {
        if($CommandePersonnalise->update($request->all())){
            return response()->json([
                'success' => 'modifier avec succes'
            ],200);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommandePersonnalise  $CommandePersonnalise
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandePersonnalise $CommandePersonnalise)
    {
        if($CommandePersonnalise->delete()){
            return response()->json([
                'success' => 'Suppression reussie'
            ],200);
        };
    }


    public function commandePersonnaliseDetaille()
    {           
        $client=client::All();
       
        $CommandePersonnalise=DB::table('Commande_personnalises')
       ->join('clients','clients.idUtilisateur','=','Commande_personnalises.idUtilisateur')     
       ->select('Commande_personnalises.*','clients.*')
        ->get();
         
    return $CommandePersonnalise;
    }
    public function nombreCommandePersonnalise()
    {
        return CommandePersonnalise::count();
    }


    public function commandePersoDetailleSuppression(CommandePersonnalise $CommandePersonnalise)
    {           
     
       
        $CommandePersonnalise->delete();

        // if($CommandePersonnalise->delete()){
        //     return response()->json([
        //         'success' => 'Suppression reussie'
        //     ],200);
        // };        
  
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TypeActivite;
use App\Models\Rapport;
use App\Models\TempsType;
use App\Models\LivretPositionnement;
use App\Models\Historique;

class TempsTypeController extends Controller
{
    public function edit(TempsType $temps_type)
    {
        try
        {
          $temps_types = DB::table('type_activites')
          ->join('temps_types','type_activites.id','=','temps_types.type_activite_id')
          ->where('temps_types.id','=', $temps_type->id)
          ->select('temps_types.*','type_activites.LibelleType')
          ->get();
  
          return view('temps_types.edit', compact('temps_types'));
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
    }

    public function update(TempsType $temps_type)
    {
      try
      {
         $livret_id = request('livret_id');

         $temps_type->update(['TempsPost'=> request('TempsPost')]);

         $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
         /** historiques des actions sur le systeme **/
         $historique = Historique::create([
           'user'=> $huser,
           'table'=> 'TempsType',
           'attribute' =>  request('TempsPost'),
           'action'=> 'modification',
         ]);
   
         return redirect('livret_positionnements/' . $livret_id)->with('message', "Livret de positionnement mise à jour");
       }
       catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }
}

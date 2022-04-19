<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Activite;
use App\Models\Historique;
use App\Models\TypeActivite;


class ActivityController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth'); 
    }
             /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
     // Afficher les activites appartenants a la personne qui s'est connecter
     public function index()
     {
       try
       {
         $activites = DB::table('type_activites')
         ->join('activites','type_activites.id','=','activites.type_activite_id')
         ->select('activites.*','type_activites.LibelleType')
         ->orderBy('type_activites.id')
         ->get();

         return view('activites.index', compact('activites'));
       }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
  
     }
  
       /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
  
     public function create()
     {
       try
       {
         $activite = new Activite();
         $type_activites = TypeActivite::all();
  
         return view('activites.create',compact('activite','type_activites'));

        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
     }
    
  
       /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
  
     public function store()
     {  
        $this->validator();

       try
       {

         $activite = Activite::create([
          'LibelleActivite'=> request('LibelleActivite'),
          'identifiant_activite'=> request('identifiant_activite'),
          'type_activite_id'=> request('type_activite_id'),
          ]);
          
          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
              $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Activite',
              'attribute' => request('LibelleActivite'),
              'action'=> 'ajout',
          ]);
          
    
          return redirect('activites/create')->with('message', 'Informations bien enregistrées.');

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
     }
  
     // return redirect('rapports')->with('message', 'Rapport bien ajoutée.');
      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
  
     public function show(Activite $activite)
     {
        try
        {
           return view('activites.show',compact('activite'));
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
     }
  
    /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
  
     public function edit(Activite $activite)
     {
       try
       {
        $type_activites = TypeActivite::all();

        return view('activites.edit', compact('activite','type_activites'));
       }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
     }
  
        /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
  
     public function update(Activite $activite)
     {
      try
      {

              /** actualisation de l'activite **/
              $activite->update([
                'LibelleActivite'=> request('LibelleActivite'),
                'identifiant_activite'=> request('identifiant_activite'),
                'type_activite_id'=> request('type_activite_id'),
                ]);
                
                $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
                /** historiques des actions sur le systeme **/
                    $historique = Historique::create([
                    'user'=> $huser,
                    'table'=> 'Activite',
                    'attribute' => request('LibelleActivite'),
                    'action'=> 'modification',
                ]);

            return redirect('activites/' . $activite->id)->with('message', 'Activité bien mise à jour.');

        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }

     }
  
      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
  
     public function destroy(Activite $activite)
     {
       try
       {
          
            $activite->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Activite',
                'attribute' => $activite->LibelleActivite,
                'action'=> 'suppression',
            ]);
      
            return redirect('activites');
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }

     }

     
     private  function validator()
     {
         return request()->validate([
            'LibelleActivite'=> 'required|min:5',
            'identifiant_activite'=> 'required|integer|min:2',
            'type_activite_id' =>'required|integer',
         ]); 
     } 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeActivite;
use App\Models\Fonction;
use App\Models\Historique;
use App\Models\User;

class TypeActiviteController extends Controller
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
     // Afficher les types utilisateurs
     public function index()
     {
       try
       {
           $this->authorize('view', User::class);
 
            $type_activites = TypeActivite::all();
    
            return view('TypeActivites.index', compact('type_activites'));
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
          $this->authorize('view', User::class);

          $fonctions = Fonction::all();
          $type_activite = new TypeActivite();
    
          return view('TypeActivites.create',compact('type_activite','fonctions'));
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
       try
       {
          $this->authorize('view', User::class);

          $libelle = request('LibelleType');

          $type_activite = TypeActivite::create($this->validator());

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Type_Activite',
            'attribute' => $libelle,
            'action'=> 'ajout',
          ]);
    
          return redirect('type_activites')->with('message', 'Type Activité bien ajouté.');
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
     }
  
      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
  
     public function show(TypeActivite $type_activite)
     {
       try
       {
          $this->authorize('view', User::class);

          return view('TypeActivites.show',compact('type_activite'));
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
  
     public function edit(TypeActivite $type_activite)
     {
       try
       {
          $this->authorize('view', User::class);

          $fonctions = Fonction::all();
          return view('TypeActivites.edit', compact('type_activite','fonctions'));
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
  
     public function update(TypeActivite $type_activite)
     {
       try
       {
          $this->authorize('view', User::class);

          $type_activite->update([
              'LibelleType'=> request('LibelleType'),
              'fonction_id'=> request('fonction_id'),
          ]);

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Type_Activite',
            'attribute' => request('LibelleType'),
            'action'=> 'modification',
          ]);
    
          return redirect('type_activites/' . $type_activite->id);
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
  
     public function destroy(TypeActivite $type_activite)
     {
       try
       {
          $this->authorize('view', User::class);
          
            $type_activite->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Type_Activite',
              'attribute' => $type_activite->LibelleType,
              'action'=> 'suppression',
            ]);
    
            return redirect('type_activites');   
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       } 
     }
  
     private  function validator()
     {
         return request()->validate([
             'LibelleType'=>'required|min:5',
             'fonction_id'=>'required|integer',
         ]); 
     } 
}

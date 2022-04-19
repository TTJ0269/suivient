<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeEvaluation;
use App\Models\Historique;
use App\Models\User;

class TypeEvaluationController extends Controller
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
 
            $type_evaluations = TypeEvaluation::all();
    
            return view('TypeEvaluations.index', compact('type_evaluations'));
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

          $type_evaluation = new TypeEvaluation();
    
          return view('TypeEvaluations.create',compact('type_evaluation'));
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

          $libelle = request('LibelleEvaluation');

          $type_evaluation = TypeEvaluation::create($this->validator());

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Type_Evaluation',
            'attribute' => $libelle,
            'action'=> 'ajout',
          ]);
    
          return redirect('type_evaluations')->with('message', 'Type Evaluation bien ajouté.');
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
  
     public function show(TypeEvaluation $type_evaluation)
     {
       try
       {
          $this->authorize('view', User::class);

          return view('TypeEvaluations.show',compact('type_evaluation'));
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
  
     public function edit(TypeEvaluation $type_evaluation)
     {
       try
       {
          $this->authorize('view', User::class);

          return view('TypeEvaluations.edit', compact('type_evaluation'));
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
  
     public function update(TypeEvaluation $type_evaluation)
     {
       try
       {
          $this->authorize('view', User::class);

          $type_evaluation->update([
              'LibelleEvaluation'=> request('LibelleEvaluation'),
          ]);

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Type_Evaluation',
            'attribute' => request('LibelleEvaluation'),
            'action'=> 'modification',
          ]);
    
          return redirect('type_evaluations/' . $type_evaluation->id);
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
  
     public function destroy(TypeEvaluation $type_evaluation)
     {
       try
       {
          $this->authorize('view', User::class);
          
            $type_evaluation->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Type_Activite',
              'attribute' => $type_evaluation->LibelleEvaluation,
              'action'=> 'suppression',
            ]);
    
            return redirect('type_evaluations');   
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       } 
     }
  
     private  function validator()
     {
         return request()->validate([
             'LibelleEvaluation'=>'required|min:3',
         ]); 
     } 
}

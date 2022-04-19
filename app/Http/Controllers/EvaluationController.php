<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TypeEvaluation;
use App\Models\Evaluation;
use App\Models\Historique;
use App\Models\User;

class EvaluationController extends Controller
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
 
            $evaluations = DB::table('type_evaluations')
            ->join('evaluations','type_evaluations.id','=','evaluations.type_evaluation_id')
            ->select('evaluations.*','type_evaluations.LibelleEvaluation')
            ->orderBy('evaluations.id')
            ->get();
    
            return view('Evaluations.index', compact('evaluations'));
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

          $type_evaluations = TypeEvaluation::all();
          $evaluation = new Evaluation();
    
          return view('Evaluations.create',compact('evaluation','type_evaluations'));
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

          $libelle = request('LibelleEval');

          $evaluation = Evaluation::create($this->validator());

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Evaluation',
            'attribute' => $libelle,
            'action'=> 'ajout',
          ]);
    
          return redirect('evaluations')->with('message', 'Evaluation bien ajoutée.');
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
  
     public function show(Evaluation $evaluation)
     {
       try
       {
          $this->authorize('view', User::class);

          return view('Evaluations.show',compact('evaluation'));
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
  
     public function edit(Evaluation $evaluation)
     {
       try
       {
          $this->authorize('view', User::class);

          $type_evaluations = TypeEvaluation::all();
          return view('Evaluations.edit', compact('evaluation','type_evaluations'));
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
  
     public function update(Evaluation $evaluation)
     {
       try
       {
          $this->authorize('view', User::class);

          $evaluation->update([
              'LibelleEval'=> request('LibelleEval'),
              'valeur'=> request('valeur'),
              'type_evaluation_id'=> request('type_evaluation_id'),
          ]);

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Evaluation',
            'attribute' => request('LibelleEval'),
            'action'=> 'modification',
          ]);
    
          return redirect('evaluations/' . $evaluation->id);
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
  
     public function destroy(Evaluation $evaluation)
     {
       try
       {
          $this->authorize('view', User::class);
          
            $evaluation->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Evaluation',
              'attribute' => $evaluation->LibelleEval,
              'action'=> 'suppression',
            ]);
    
            return redirect('evaluations');   
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       } 
     }
  
     private  function validator()
     {
         return request()->validate([
             'LibelleEval'=>'required|min:3',
             'type_evaluation_id'=>'required|integer',
             'valeur'=>'required|integer',
         ]); 
     } 
}

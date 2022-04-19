<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fonction;
use App\Models\Historique;
use App\Models\User;

class FonctionController extends Controller
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
            $fonctions = Fonction::all();
    
            return view('fonctions.index', compact('fonctions'));
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
          $fonction = new Fonction();
    
          return view('fonctions.create',compact('fonction'));
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

        $users_id = (Auth::user())->id;

        $fonction = Fonction::create([
                'LibelleFonction'=> request('LibelleFonction'),
                'user_id'=> $users_id,
                ]);

        $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
        /** historiques des actions sur le systeme **/
         $historique = Historique::create([
          'user'=> $huser,
          'table'=> 'Fonction',
          'attribute' => request('LibelleFonction'),
          'action'=> 'ajout',
        ]);
  
        return redirect('fonctions')->with('message', 'Fonction bien ajoutée.');
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
  
     public function show(Fonction $fonction)
     {
        try
        {
          $this->authorize('view', User::class);
          return view('fonctions.show',compact('fonction'));
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
  
     public function edit(Fonction $fonction)
     {
        try
        {
         $this->authorize('view', User::class);
         return view('fonctions.edit', compact('fonction'));
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
  
     public function update(Fonction $fonction)
     {
        try
        {
          $this->authorize('view', User::class);
          $fonction->update([
              'LibelleFonction'=> request('LibelleFonction'),
          ]);

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Fonction',
            'attribute' => request('LibelleFonction'),
            'action'=> 'modification',
          ]);
    
          return redirect('fonctions/' . $fonction->id);
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
  
     public function destroy(Fonction $fonction)
     {
       try
       {
          $this->authorize('view', User::class);
            $fonction->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Fonction',
              'attribute' => $fonction->LibelleFonction,
              'action'=> 'suppression',
            ]);
    
            return redirect('fonctions');    
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
     }
  
     private  function validator()
     {
         return request()->validate([
             'LibelleFonction'=>'required|min:5',
         ]); 
     } 
}

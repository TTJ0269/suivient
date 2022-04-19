<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ifad;
use App\Models\User;

class IFADController extends Controller
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

            $ifads = Ifad::all();
    
            return view('ifads.index', compact('ifads'));
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

          $ifad = new Ifad();
    
          return view('ifads.create',compact('ifad'));
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

          $libelle = request('LibelleIfad');

          $ifad = Ifad::create($this->validator());

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Ifad',
            'attribute' => $libelle,
            'action'=> 'ajout',
          ]);
    
          return redirect('ifads')->with('message', 'IFAD bien ajouté.');
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
  
     public function show(Ifad $ifad)
     {
        try
        {
          $this->authorize('view', User::class);

          return view('ifads.show',compact('ifad'));
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
  
     public function edit(Ifad $ifad)
     {
        try
        {
          $this->authorize('view', User::class);

          return view('ifads.edit', compact('ifad'));
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
  
     public function update(Ifad $ifad)
     {
       try
       {
          $this->authorize('view', User::class);

          $libelle = request('LibelleIfad');

          $ifad->update($this->validator());

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Ifad',
            'attribute' => $libelle,
            'action'=> 'modification',
          ]);
    
          return redirect('ifads/' . $ifad->id);
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
  
     public function destroy(Ifad $ifad)
     {
       try
       {
          $this->authorize('view', User::class);
          
            $ifad->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Ifad',
            'attribute' => $ifad->LibelleIfad,
            'action'=> 'suppression',
          ]);
    
            return redirect('ifads');    
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
     }
  
     private  function validator()
     {
         return request()->validate([
             'LibelleIfad'=>'required',
         ]); 
     } 
}

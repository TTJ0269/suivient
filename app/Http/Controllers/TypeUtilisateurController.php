<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeUtilisateur;
use App\Models\User;

class TypeUtilisateurController extends Controller
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

            $type_utilisateurs = TypeUtilisateur::all();
    
            return view('TypeUtilisateur.index', compact('type_utilisateurs'));
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

          $type_utilisateur = new TypeUtilisateur();
    
          return view('TypeUtilisateur.create',compact('type_utilisateur'));
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

          $type_user = request('libelletype');

          $type_utilisateur = TypeUtilisateur::create($this->validator());

          $user = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);

          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $user,
            'table'=> 'Type_Utilisateur',
            'attribute' => $type_user,
            'action'=> 'ajout',
          ]);
    
          return redirect('type_utilisateurs')->with('message', 'type bien ajouté.');
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
  
     public function show(TypeUtilisateur $type_utilisateur)
     {
       try
       {
          $this->authorize('view', User::class);

          return view('TypeUtilisateur.show',compact('type_utilisateur'));
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
  
     public function edit(TypeUtilisateur $type_utilisateur)
     {
       try
       {
          $this->authorize('view', User::class);

          return view('TypeUtilisateur.edit', compact('type_utilisateur'));
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
  
     public function update(TypeUtilisateur $type_utilisateur)
     {
       try
       {
          $this->authorize('view', User::class);

          $type_user = request('libelletype');

          $type_utilisateur->update($this->validator());

          $user = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $user,
            'table'=> 'Type_Utilisateur',
            'attribute' => $type_user,
            'action'=> 'modification',
          ]);
    
          return redirect('type_utilisateurs/' . $type_utilisateur->id);
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
  
     public function destroy(TypeUtilisateur $type_utilisateur)
     {
        try
        {
            $this->authorize('view', User::class);
            
            $reference = DB::table('users')
            ->where('users.type_utilisateur_id','=',$type_utilisateur->id)
            ->select('users.id')
            ->first();
      
            if($reference->id == null)
            {
              $type_utilisateur->delete();

              $user = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
              /** historiques des actions sur le systeme **/
              $historique = Historique::create([
                'user'=> $user,
                'table'=> 'Type_Utilisateur',
                'attribute' => $type_utilisateur->libelletype,
                'action'=> 'suppression',
              ]);
      
              return redirect('type_utilisateurs');
            }

            return redirect('type_utilisateurs')->with('messagealert','Ce type est referencé dans une autre table');
        }
          catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
        
     }
  
     private  function validator()
     {
         return request()->validate([
             'libelletype'=>'required|min:5'
         ]); 
     } 
}

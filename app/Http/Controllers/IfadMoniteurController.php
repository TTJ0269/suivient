<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\IfadMoniteur;
use App\Models\Ifad;
use App\Models\User;

class IfadMoniteurController extends Controller
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

            $ifad_moniteurs = IfadMoniteur::all();
   
            return view('ifad_moniteurs.index', compact('ifad_moniteurs'));
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
            $ifad_moniteur = new IfadMoniteur();
            $ifads = Ifad::all();
            $users = DB::table('type_utilisateurs')
            ->join('users','type_utilisateurs.id','=','users.type_utilisateur_id')
            ->where('type_utilisateurs.libelletype','=','Moniteur ENT')
            ->orWhere('type_utilisateurs.libelletype','=','DG IFAD')
            ->select('users.*','type_utilisateurs.libelletype')
            ->get();
      
            return view('ifad_moniteurs.create',compact('ifad_moniteur','users','ifads'));
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
         $date = now();
         $user_id = request('user_id');
         $ifad_id = request('ifad_id');
            /** dans le else du deuxieme if si l'utilisateurs existe et que la datefin different de null alors creation   **/

            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->where('ifad_id', $ifad_id)->exists())
            {
               /** recuperation de la date de fin dans la table ifad moniteur **/
               $ifad_moniteur_datefin = DB::table('ifad_moniteurs')
               ->where('ifad_moniteurs.user_id','=',$user_id)
               ->select('ifad_moniteurs.datefin')
               ->get()->last()->datefin;


               if($ifad_moniteur_datefin == null)
               {
                  return redirect('ifad_moniteurs')->with('messagealert', "Désolé le moniteur concerné n'a pas fini son service.");
               }
               else
               {
                  $ifad_moniteur = IfadMoniteur::create([
                  'datedebut'=> $date,
                  'user_id'=> request('user_id'),
                  'ifad_id'=> request('ifad_id'),
                  ]);
      
                  return redirect('ifad_moniteurs')->with('message', 'Informations bien enregistrées.');
               }
            }
            
            else
            {
               $ifad_moniteur = IfadMoniteur::create([
               'datedebut'=> $date,
               'user_id'=> request('user_id'),
               'ifad_id'=> request('ifad_id'),
               ]);

               return redirect('ifad_moniteurs')->with('message', 'Informations bien enregistrées.');
            }    
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
  
     public function show(IfadMoniteur $ifad_moniteur)
     {
        try
        {
            $this->authorize('view', User::class);

            return view('ifad_moniteurs.show',compact('ifad_moniteur'));
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
  
     public function edit(IfadMoniteur $ifad_moniteur)
     {
        //
     }
  
        /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
  
     public function update(IfadMoniteur $ifad_moniteur)
     {
        try
        {
         $date = now();

         if($ifad_moniteur->datefin != null)
         {
            return redirect('ifad_moniteurs/' . $ifad_moniteur->id)->with('messagealert', 'Désolé le moniteur ENT a déjà fini son service.');
         }
         else
         {
            $ifad_moniteur->update([
            'datefin'=> $date,
            ]);

            return redirect('ifad_moniteurs/' . $ifad_moniteur->id)->with('message', 'Information bien enregistrée.');
         }
   

         return redirect('ifad_moniteurs/' . $ifad_moniteur->id);
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
  
     public function destroy(IfadMoniteur $ifad_moniteur)
     {
        //
     }
  
}

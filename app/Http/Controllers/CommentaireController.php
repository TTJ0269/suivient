<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Commentaire;
use App\Models\Activite;
use App\Models\Historique;
use App\Notifications\GeneralNotification;


class CommentaireController extends Controller
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
            $user_id = (Auth::user()->id);
            $type_utilisateur = (Auth::user()->type_utilisateur_id);

            $type_utilisateur = DB::table('type_utilisateurs')
            ->where('type_utilisateurs.id','=',$type_utilisateur)
            ->select('type_utilisateurs.*')
            ->first();


            if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi')
            {
                $commentaires = DB::table('users')
                ->join('commentaires','users.id','=','commentaires.user_id')
                ->join('activites','activites.id','=','commentaires.activite_id')
                ->select('commentaires.*','activites.LibelleActivite')
                ->orderBy('commentaires.id','DESC')
                ->get();

                return view('commentaires.index', compact('commentaires'));
            }
            else
            {
                if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
            {
                return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
            }
            else
            {
                /** recuperation de ifad_id selon l'utilisateur **/
                $ifad_id = DB::table('ifads')
                ->join('ifad_moniteurs','ifads.id','=','ifad_moniteurs.ifad_id')
                ->join('users','users.id','=','ifad_moniteurs.user_id')
                ->where('users.id','=',$user_id)
                ->select('ifad_moniteurs.ifad_id')
                ->get()->last()->ifad_id;

                $commentaires = DB::table('ifad_moniteurs')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('activites','rapports.id','=','activites.rapport_id')
                ->join('commentaires','activites.id','=','commentaires.activite_id')
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->select('commentaires.*','activites.LibelleActivite')
                ->orderBy('commentaires.id','DESC')
                ->get();

                return view('commentaires.index', compact('commentaires'));
            }
            }
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
            $activites = Activite::all();
            $commentaire = new Commentaire();
    
            return view('commentaires.create',compact('commentaire','activites'));
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
            $users_id = (Auth::user())->id;
            $activite_name = request('activite_name');
            $rapport_id = request('rapport_id');
            $activite_id = request('activite_id');

            $commentaire = Commentaire::create([
                    'DescriptionCommentaire'=> request('DescriptionCommentaire'),
                    'activite_id'=> request('activite_id'),
                    'user_id'=> $users_id,
                    ]);

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Commentaire',
                'attribute' => request('DescriptionCommentaire'),
                'action'=> 'ajout',
            ]);

            /* $LibelleActivite = DB::table('activites')
                    ->where('activites.id','=',$activite_id)
                    ->select('activites.LibelleActivite')
                    ->first()->LibelleActivite;

                $commet = "Commentaire de l'activité: ".$LibelleActivite;
                
                $post = ['titre' => $commet];

                $commentaire->notify(new GeneralNotification($commentaire, $post));*/
            

            return redirect('rapports/'. $rapport_id)->with('message', 'Commentaire de l activité: '.$activite_name.' bien envoyé.');
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
  
     public function show(Commentaire $commentaire)
     {
         try
         {
          return view('commentaires.show',compact('commentaire'));
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
  
     public function edit(Commentaire $commentaire)
     {
         try
         {
            $activites = Activite::all();
            return view('commentaires.edit', compact('commentaire','activites'));
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
  
     public function update(Commentaire $commentaire)
     {
         try
         {
            $commentaire->update([
                'DescriptionCommentaire'=> request('DescriptionCommentaire'),
            ]);

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Commentaire',
                'attribute' => request('DescriptionCommentaire'),
                'action'=> 'modification',
            ]);
    
            return redirect('commentaires/' . $commentaire->id);
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
  
     public function destroy(Commentaire $commentaire)
     {
         try
         {
            $commentaire->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Commentaire',
                'attribute' => $commentaire->DescriptionCommentaire,
                'action'=> 'suppression',
            ]);
    
            return redirect('commentaires');    
         }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
     }
  
     public function bord()
     {
       try
       {
         return view('commentaires.bord');
       }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
     }
}

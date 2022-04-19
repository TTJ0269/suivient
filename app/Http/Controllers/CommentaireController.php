<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Commentaire;
use App\Models\ActiviteSaisie;
use App\Models\User;
use App\Models\Historique;
use App\Notifications\NewCommentaire;


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


           // dd(DB::table('notifications')->select('*')->get());
           /* $notification_id = DB::table('notifications')->where('data->idcommentaire','=',1)
            ->select('data')
            ->first()->array();
            dd($notification_id);*/


            if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi')
            {
                $commentaires = DB::table('users')
                ->join('commentaires','users.id','=','commentaires.user_id')
                ->join('activite_saisies','activite_saisies.id','=','commentaires.activite_saisie_id')
                ->select('commentaires.*','activite_saisies.TitreActiviteSaisie')
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
                ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
                ->join('commentaires','activite_saisies.id','=','commentaires.activite_saisie_id')
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->select('commentaires.*','activite_saisies.TitreActiviteSaisie')
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
  
     public function create($activite_saisie_id)
     {
         try
         {
             /** recuperation de id du rapport **/
            $rapport_id = DB::table('activite_saisies')
            ->where('activite_saisies.id','=',$activite_saisie_id)->select('activite_saisies.rapport_id')->first()->rapport_id;
            
            if(DB::table('rapports')->where('rapports.id','=',$rapport_id)->select('rapports.etat')->first()->etat == 1)
            {
                return  redirect('rapports/'. $rapport_id)->with('messagealert','Rapport déjà validé vous ne pouvez plus faire de commentaire.');
            }
            else
            {
                $activite_saisies = ActiviteSaisie::select('*')->where('id','=',$activite_saisie_id)->get();
                $commentaire = new Commentaire();
        
                return view('commentaires.create',compact('commentaire','activite_saisies'));
            }
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
            $activite_saisie_name = request('activite_saisie_name');
            $activite_saisie_id = request('activite_saisie_id');

            /** recuperation de id du rapport **/
            $rapport_id = DB::table('activite_saisies')
            ->where('activite_saisies.id','=',$activite_saisie_id)->select('activite_saisies.rapport_id')->first()->rapport_id;

            /** Recuperation de idcommentaire et enregistrement du commentaire qui est enregistre **/
            $commentaire = Commentaire::insertGetId([
                    'DescriptionCommentaire'=> request('DescriptionCommentaire'),
                    'activite_saisie_id'=> $activite_saisie_id,
                    'user_id'=> $users_id,
                    'etatsup'=> 0,
                    ]);

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Commentaire',
                'attribute' => request('DescriptionCommentaire'),
                'action'=> 'ajout',
            ]);
             //recuperation de id de l'utilisateur à qui le commentaire est destiné
                /*$id_commentaire_destine_enregistre = DB::table('users')
                ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
                ->join('commentaires','activite_saisies.id','=','commentaires.activite_saisie_id')
                ->where('commentaires.id','=',$commentaire)
                ->select('users.id')
                ->first()->id;*/


                //Notification
               /* $dernier_commentaire_enregistre = Commentaire::get()->last();

                $dernier_commentaire_enregistre->user->notify(new NewCommentaire($dernier_commentaire_enregistre, auth()->user()));*/

                /*//recuperation de dermier id de la notification
                $notification_id = DB::table('notifications')->select('id')->get()->last()->id;
               
                //mise a jour de notifiable_id qui contient id de l'utilisateur a qui la notification est destinee
                $update_notification_id = DB::table('notifications')->where('id','=',$notification_id)->update(['notifiable_id' => $id_commentaire_destine_enregistre]);*/
            

            return redirect('rapports/'. $rapport_id)->with('message', 'Commentaire de l activité: '.$activite_saisie_name.' bien envoyé.');
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

     public function ShowNotification(Commentaire $commentaire , DatabaseNotification $notification)
     {
        try
        {
           $notification->markAsRead();

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
            $activite_saisies = ActiviteSaisie::all();
            return view('commentaires.edit', compact('commentaire','activite_saisies'));
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

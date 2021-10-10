<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Rapport;
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
          $user_id = (Auth::user()->id);
          $type_utilisateur = (Auth::user()->type_utilisateur_id);


          $activites = DB::table('type_utilisateurs')
          ->where('type_utilisateurs.id','=',$type_utilisateur)
          ->select('type_utilisateurs.*')
          ->first();

          if($activites->libelletype == 'Administrateur' || $activites->libelletype == 'Responsable du suivi')
          {
            $activites = DB::table('ifad_moniteurs')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('activites','rapports.id','=','activites.rapport_id')
            ->select('activites.*','rapports.LibelleRapport')
            ->orderBy('activites.id','DESC')
            ->get();

            return view('activites.index', compact('activites'));
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

              $activites = DB::table('ifad_moniteurs')
              ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
              ->join('activites','rapports.id','=','activites.rapport_id')
              ->where('ifad_moniteurs.user_id','=',$user_id)
              ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
              ->select('activites.*','rapports.LibelleRapport')
              ->orderBy('activites.id','DESC')
              ->get();

              return view('activites.index', compact('activites'));
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
         $date = now()->format('d/m/y');

         $activite = new Activite();
         $type_activites = TypeActivite::all();
  
         return view('activites.create',compact('activite','date','type_activites'));

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
          /** Recuperation de l'utilisateur en cours **/
          $users_id = (Auth::user())->id;
          $users_tel = (Auth::user())->telutilisateur;

          /** Recuperation du dernier en cours **/
          $ifad_id = DB::table('ifad_moniteurs')
          ->where('ifad_moniteurs.user_id','=',$users_id)
          ->select('ifad_moniteurs.ifad_id')
          ->get()->last()->ifad_id;


        /** Recuperation des infromations du formulaire Activite.form sauf $second  **/
          $Libelle = request('LibelleRapport');
          $LibelleRapport = 'Rapport '.$ifad_id.' '.$Libelle.' '.$users_tel;
          $date = request('Date');
          $heuredebut = request('heuredebut');
          $heurefin = request('heurefin');
          $second = now()->format('s');
          $dateaujourdhui= now()->format('Y-m-d');

        

          /** Transformation des valeurs de la date pour avoir un format datetime **/
          $datedebutvr = ($date .' '. $heuredebut .':'. $second);
          $datefinvr = ($date .' '. $heurefin .':'. $second);
    
          $datevrai = Date::make($date);
          $dateaujourdhuivrai = Date::make($dateaujourdhui);
          $datedebutvrai =  Date::make($datedebutvr);
          $datefinvrai =  Date::make($datefinvr);
          $dateverification = Date::make('2021-01-01 00:00:00');

        
          /** recuperation de l'id du rapport qui vient d'etre enregistre  **/
          $recuperation_id = DB::table('rapports')
          ->where('rapports.LibelleRapport','=',$LibelleRapport)
          ->select('rapports.id')
          ->first();

            /** recuperation le dernier id de ifad_moniteur par rapport a l'utilisateur **/
          $ifad_moniteur_id = DB::table('ifad_moniteurs')
          ->where('ifad_moniteurs.user_id','=',$users_id)
          ->select('ifad_moniteurs.id')
          ->get()->last();
          
          $this->validator();
          /** format annee longue : Y , annee courte y , mois m , jour d,
           *  heure H , munite i , second s **/

          /** si id du rapport qui vient d'etre enregistre est null
           * fait l'enregistrement du rapport , recupere l'id du rapport du vient d'etre 
           * enregistre et enregistre l'activite avec l'id du rapport recupere
           * sinon id du rapport est different de null cela veut dire que c'est le meme
           * jour du coup l'administrateur n'a pas encore fini d'enregistre 
           * les activites de la semaine vu que le libelle du rapport est la date du jour 
           * on garde alors le id du rapport en cours en le selectionnant grace 
           * au libelle et on fait l'enregistrement **/

          if($datevrai > $dateaujourdhuivrai)
          {
            return back()->with('messagealert', "Veuillez vérifier la date. Vous avez choisi une date supérieur à la date d'aujourd'hui.");
          }
          if($datedebutvrai < $dateverification || $datefinvrai < $dateverification)
          {
            return back()->with('messagealert', 'Veuillez vérifier la date. Vous avez choisi une date inférieur à 01-01-2021.');
          }
          elseif($datedebutvrai > $datefinvrai || $datedebutvrai == $datefinvrai)
          {
            return back()->with('messagealert', 'Veuillez vérifier les heures du début et de fin.');
          }
          elseif($recuperation_id == null && $datedebutvrai < $datefinvrai)
          {
            /** enregistrement du rapport **/
            $rapport = Rapport::create([
              'LibelleRapport'=> $LibelleRapport,
              'ifad_moniteur_id'=> $ifad_moniteur_id->id,
              ]);
            $rapport_id = DB::table('rapports')
            ->where('rapports.LibelleRapport','=',$LibelleRapport)
            ->select('rapports.id')
            ->first()->id;
              /** enregistrement de l'activite **/
            $activite = Activite::create([
              'LibelleActivite'=> request('LibelleActivite'),
              'DescriptionActivite'=> request('DescriptionActivite'),
              'LieuActivite'=> request('LieuActivite'),
              'DateDebut'=> $datedebutvrai,
              'DateFin'=> $datefinvrai,
              'type_activite_id'=> request('type_activite_id'),
              'rapport_id'=> $rapport_id,
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
          elseif($recuperation_id->id != null && $datedebutvrai < $datefinvrai)
          {
              $rapport_id = DB::table('rapports')
              ->where('rapports.LibelleRapport','=',$LibelleRapport)
              ->select('rapports.id')
              ->first()->id;

            $activite = Activite::create([
              'LibelleActivite'=> request('LibelleActivite'),
              'DescriptionActivite'=> request('DescriptionActivite'),
              'LieuActivite'=> request('LieuActivite'),
              'DateDebut'=> $datedebutvrai,
              'DateFin'=> ($datefinvrai),
              'type_activite_id'=> request('type_activite_id'),
              'rapport_id'=> $rapport_id,
              ]);


              $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Activite',
                'attribute' => request('LibelleActivite'),
                'action'=> 'ajout',
            ]);
          }
    
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
          $user_id = (Auth::user()->id);

          $fichers = DB::table('ifad_moniteurs')
          ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
          ->join('activites','rapports.id','=','activites.rapport_id')
          ->join('fichers','activites.id','=','fichers.activite_id')
          ->where('ifad_moniteurs.user_id','=',$user_id)
          ->where('activites.id','=',$activite->id)
          ->select('fichers.*')
          ->get();

            return view('activites.show',compact('activite','fichers'));
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
          $rapports = DB::table('rapports')
          ->join('activites','rapports.id','=','activites.rapport_id')
          ->where('activites.id','=',$activite->id)
          ->select('rapports.*')
          ->get();

          $etat_rapport = DB::table('rapports')
          ->join('activites','rapports.id','=','activites.rapport_id')
          ->where('activites.id','=',$activite->id)
          ->select('rapports.etat')
          ->first();


          if($etat_rapport->etat == 1)
          {
            return redirect('activites/' . $activite->id)->with('messagealert', 'Le rapport associé à l’activité a été validé, vous ne pouvez plus faire la modification.');
          }
          else
          {
            return view('activites.edit', compact('activite','type_activites','rapports'));
          }

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
        /** Recuperation des infromations du formulaire Activite.form sauf $second  **/
         $date = request('Date');
         $heuredebut = request('heuredebut');
         $heurefin = request('heurefin');
         $second = now()->format('s');
 
         /** Transformation des valeurs de la date pour avoir un format datetime **/
         $datedebutvr = ($date .' '. $heuredebut .':'. $second);
         $datefinvr = ($date .' '. $heurefin .':'. $second);
   
         $datedebutvrai =  Date::make($datedebutvr);
         $datefinvrai =  Date::make($datefinvr);
         $dateverification = Date::make('2021-01-01 00:00:00');
 
 
         /** format annee longue : Y , annee courte y , mois m , jour d,
          *  heure H , munite i , second s**/
          
         if($datedebutvrai < $dateverification || $datefinvrai < $dateverification)
         {
           return redirect('activites/create')->with('messagealert', 'Veuillez vérifier la date. Vous avez choisi une date inférieur à 01-01-2021.');
         }
         if($datedebutvrai > $datefinvrai || $datedebutvrai == $datefinvrai)
         {
           return redirect('activites/' . $activite->id)->with('messagealert', 'Veuillez vérifier les heures du début et de fin.');
         }
         elseif($datedebutvrai < $datefinvrai)
         {

              /** actualisation de l'activite **/
              $activite->update([
                'LibelleActivite'=> request('LibelleActivite'),
                'DescriptionActivite'=> request('DescriptionActivite'),
                'LieuActivite'=> request('LieuActivite'),
                'DateDebut'=> $datedebutvrai,
                'DateFin'=> $datefinvrai,
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
          $etat_rapport = DB::table('rapports')
          ->join('activites','rapports.id','=','activites.rapport_id')
          ->where('activites.id','=',$activite->id)
          ->select('rapports.etat')
          ->first();

          if($etat_rapport->etat == 1)
          {
            return redirect('activites/' . $activite->id)->with('messagealert', 'Le rapport associé à l’activité a été validé, vous ne pouvez plus faire la suppression.');
          }
          else
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
            'LieuActivite'=> 'required|min:3',
         ]); 
     } 
}

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
use App\Models\ActiviteSaisie;
use App\Models\Fonction;
use App\Models\Ficher;

class ActiviteSaisieController extends Controller
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

          $semaines = $this->semaine();


          $activite_saisies = DB::table('type_utilisateurs')
          ->where('type_utilisateurs.id','=',$type_utilisateur)
          ->select('type_utilisateurs.*')
          ->first();

          if($activite_saisies->libelletype == 'Administrateur' || $activite_saisies->libelletype == 'Responsable du suivi')
          {
            $activite_saisies = DB::table('ifad_moniteurs')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
            ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
            ->select('activite_saisies.*','rapports.LibelleRapport','rapports.id as id_rapport','fonctions.LibelleFonction')
            ->orderBy('activite_saisies.id','DESC')
            ->get();

            return view('activite_saisies.index', compact('activite_saisies','semaines'));
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

              $activite_saisies = DB::table('ifad_moniteurs')
              ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
              ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
              ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
              ->select('activite_saisies.*','rapports.LibelleRapport','rapports.id as id_rapport','fonctions.LibelleFonction')
              ->where('ifad_moniteurs.user_id','=',$user_id)
              ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
              ->orderBy('activite_saisies.id','DESC')
              ->get();

              return view('activite_saisies.index', compact('activite_saisies','semaines'));
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

     public function create($rapport_id)
     {
       try
       {
        if(DB::table('rapports')->where('rapports.id','=',$rapport_id)->select('rapports.etat')->first()->etat == 1)
        {
          return  redirect('rapports')->with('messagealert',"Rapport déjà validé vous ne pouvez plus ajouter d'activité.");
        }
        else
        {
          $activite_saisy = new Activite();
          $fonctions = Fonction::all();
          $rapports = Rapport::select('*')->where('id','=',$rapport_id)->get();

          return view('activite_saisies.create',compact('activite_saisy','fonctions','rapports'));
        }

       }
       catch(\Exception $exception)
       {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
     }

     public function create_rapport()
     {
       try
       {
        /** Recuperation de l'utilisateur en cours **/
        $users_id = (Auth::user())->id;
        $users_tel = (Auth::user())->telutilisateur;


        /** Recuperation du dernier  en cours **/
        $ifad_moniteur_id = DB::table('ifad_moniteurs')
        ->where('ifad_moniteurs.user_id','=',$users_id)
        ->select('ifad_moniteurs.id')->get()->last()->id;

        $ifad_id = DB::table('ifad_moniteurs')
        ->where('ifad_moniteurs.user_id','=',$users_id)
        ->select('ifad_moniteurs.ifad_id')->get()->last()->ifad_id;

        $date = request('semaine_rapport');
        $LibelleRapport = 'Rapport '.$date.' _'.$users_tel.' '.$ifad_id.'_';

        if(DB::table('rapports')->where('rapports.LibelleRapport','=',$LibelleRapport)->exists())
        {
          if(DB::table('rapports')->where('rapports.LibelleRapport','=',$LibelleRapport)->select('rapports.etat')->first()->etat == 1)
          {
            return  back()->with('messagealert',"Rapport déjà validé vous ne pouvez plus ajouter d'activité.");
          }
          else
          {
            return back()->with('messagealert',"Le rapport de cette semaine existe déjà");
          }
        }
        else
        {
           /** enregistrement des donnees dans Rapport et recuperation de id **/
            $rapport = Rapport::insertGetId([
            'LibelleRapport'=> $LibelleRapport,
            'ifad_moniteur_id'=> $ifad_moniteur_id,
            'etat'=> 0,'etatsup'=> 0]);

            $activite_saisy = new Activite();
            $fonctions = Fonction::all();
            $rapports = Rapport::select('*')->where('rapports.id','=',$rapport)->get();

          return view('activite_saisies.create',compact('activite_saisy','fonctions','rapports'));
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

     public function store(Request  $request)
     {
       $this->validator();

       try
       {
         /** Enregistrement de l'activite **/
         $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
         $rapport_id = request('rapport_id');
         $fonction_id = request('fonction_id');
         $ficher = request('libelleficher');

         $activite_saisy = ActiviteSaisie::insertGetId([
          'TitreActiviteSaisie'=> request('TitreActiviteSaisie'),
          'DescriptionActiviteSaisie'=> request('DescriptionActiviteSaisie'),
          'fonction_id'=> $fonction_id,
          'rapport_id' => $rapport_id,
          'etatsup' => 0,
          ]);

          /** Enregistrement du fichier **/
          if($request->file('urlficher') && $ficher =! null)
          {
              $fichers = new Ficher;

              $fichers->libelleficher = request('libelleficher');
              $fichers->activite_saisie_id = $activite_saisy;

              $file=$request->file('urlficher');
              $filename=time().'.'.$file->getClientOriginalExtension();
              $request->urlficher->move('storage/fichier/', $filename);

              $fichers->urlficher=$filename;

              $fichers->save();

            /** historiques des actions sur le systeme **/
            $historique = Historique::create(['user'=> $huser,'table'=> 'Fichier',
            'attribute' => request('libelleficher'),'action'=> 'ajout']);
          }
          /** historiques des actions sur le systeme **/
            $historique = Historique::create(['user'=> $huser,'table'=> 'ActiviteSaisie',
            'attribute' => request('TitreActiviteSaisie'),'action'=> 'ajout']);

        return redirect('activitesaisie_rapport/' .$rapport_id)->with('message', 'Informations bien enregistrées.');
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

     public function show(ActiviteSaisie $activite_saisy)
     {
       try
       {
          $user_id = (Auth::user()->id);

          $fichers = DB::table('ifad_moniteurs')
          ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
          ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
          ->join('fichers','activite_saisies.id','=','fichers.activite_saisie_id')
          ->where('ifad_moniteurs.user_id','=',$user_id)
          ->where('activite_saisies.id','=',$activite_saisy->id)
          ->select('fichers.*')
          ->get();

            return view('activite_saisies.show',compact('activite_saisy','fichers'));
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

     public function edit(ActiviteSaisie $activite_saisy)
     {
       try
       {
          $fonctions = Fonction::all();
          $rapports = DB::table('rapports')
          ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
          ->where('activite_saisies.id','=',$activite_saisy->id)
          ->select('rapports.*')
          ->get();

          $etat_rapport = DB::table('rapports')
          ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
          ->where('activite_saisies.id','=',$activite_saisy->id)
          ->select('rapports.etat')
          ->first();


          if($etat_rapport->etat == 1)
          {
            return redirect('activite_saisies/' . $activite_saisy->id)->with('messagealert', 'Le rapport associé à l’activité a été validé, vous ne pouvez plus faire la modification.');
          }
          else
          {
            return view('activite_saisies.edit', compact('activite_saisy','fonctions','rapports'));
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

     public function update(ActiviteSaisie $activite_saisy)
     {
      try
      {
            $rapport_id = request('rapport_id');
            $fonction_id = request('fonction_id');
              /** actualisation de l'activite **/
              $activite_saisy->update([
                'TitreActiviteSaisie'=> request('TitreActiviteSaisie'),
                'DescriptionActiviteSaisie'=> request('DescriptionActiviteSaisie'),
                'fonction_id'=> $fonction_id,
                'rapport_id' => $rapport_id,
               ]);

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
           /** historiques des actions sur le systeme **/
              $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'ActiviteSaisie',
              'attribute' => request('TitreActiviteSaisie'),
              'action'=> 'modification',
               ]);

            return redirect('activite_saisies/' . $activite_saisy->id)->with('message', 'Activité bien mise à jour.');

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

     public function destroy(ActiviteSaisie $activite_saisy)
     {
       try
       {
          $etat_rapport = DB::table('rapports')
          ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
          ->where('activite_saisies.id','=',$activite_saisy->id)
          ->select('rapports.etat')
          ->first();

          if($etat_rapport->etat == 1)
          {
            return redirect('activite_saisies/' . $activite_saisy->id)->with('messagealert', 'Le rapport associé à l’activité a été validé, vous ne pouvez plus faire la suppression.');
          }
          else
          {
            $activite_saisy->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'ActiviteSaisie',
                'attribute' => $activite_saisy->TitreActiviteSaisie,
                'action'=> 'suppression',
            ]);

            return redirect('activite_saisies');
          }
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }

     }

     public function activite_rapport(Rapport $id_rapport)
     {
         /** recuperation des activite_saisies associees au rapport selectionnne classées par fonction **/
         $fonctions = DB::table('rapports')
         ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
         ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
         ->where('rapports.id','=',$id_rapport->id)
         ->select('activite_saisies.*','fonctions.LibelleFonction')
         ->orderBy('fonctions.id')
         ->get();

           return view('activite_saisies.activite_rapport',compact('fonctions'));
        // dd($fonction_activites);
     }

     private  function validator()
     {
         return request()->validate([
            'TitreActiviteSaisie'=> 'required|min:2',
            'DescriptionActiviteSaisie'=> 'required|min:2',
            'fonction_id' =>'required|integer',
            'rapport_id' =>'required|integer',
         ]);
     }

     private function semaine()
     {
        //$annee_debut = strtotime($annee.'-01-1 00:00:00');
        //$annee_fin = strtotime($annee.'-12-31 24:59:59');
        //$nombre_dejour = round(($annee_fin - $annee_debut)/60/60/24,0);

        $annee = (int)(now()->format('Y'));
        $date_test = now()->format('d-m-Y');
        $good_format=strtotime($date_test);
        $numero_semaine = (int)(date('W',$good_format));

           if($numero_semaine == 1)
           {
             $valeur1= $this->get_lundi_vendredi_from_week(50, $annee-1);
             $valeur2= $this->get_lundi_vendredi_from_week(51, $annee-1);
             $valeur3= $this->get_lundi_vendredi_from_week(52, $annee-1);
             $valeur4= $this->get_lundi_vendredi_from_week($numero_semaine, $annee);

             $tab = collect([$valeur4,$valeur3,$valeur2,$valeur1]);
           }
           elseif($numero_semaine == 2)
           {
              $valeur1= $this->get_lundi_vendredi_from_week(51, $annee-1);
              $valeur2= $this->get_lundi_vendredi_from_week(52, $annee-1);
              $valeur3= $this->get_lundi_vendredi_from_week($numero_semaine-1, $annee);
              $valeur4= $this->get_lundi_vendredi_from_week($numero_semaine, $annee);

              $tab = collect([$valeur4,$valeur3,$valeur2,$valeur1]);
           }
           elseif($numero_semaine == 3)
           {
              $valeur1= $this->get_lundi_vendredi_from_week(52, $annee-1);
              $valeur2= $this->get_lundi_vendredi_from_week($numero_semaine-2, $annee);
              $valeur3= $this->get_lundi_vendredi_from_week($numero_semaine-1, $annee);
              $valeur4= $this->get_lundi_vendredi_from_week($numero_semaine, $annee);

              $tab = collect([$valeur4,$valeur3,$valeur2,$valeur1]);
           }
           else
           {
              $valeur1= $this->get_lundi_vendredi_from_week($numero_semaine-3, $annee);
              $valeur2= $this->get_lundi_vendredi_from_week($numero_semaine-2, $annee);
              $valeur3= $this->get_lundi_vendredi_from_week($numero_semaine-1, $annee);
              $valeur4= $this->get_lundi_vendredi_from_week($numero_semaine, $annee);

              $tab = collect([$valeur4,$valeur3,$valeur2,$valeur1]);
           }
        return $tab;

     }

    private function get_lundi_vendredi_from_week($week,$year,$format="d/m/Y")
    {

      $firstDayInYear=date("N",mktime(0,0,0,1,1,$year));
      if ($firstDayInYear<5)
      $shift=-($firstDayInYear-1)*86400;
      else
      $shift=(8-$firstDayInYear)*86400;
      if ($week>1) $weekInSeconds=($week-1)*604800; else $weekInSeconds=0;
      $timestamp=mktime(0,0,0,1,1,$year)+$weekInSeconds+$shift;
      $timestamp_vendredi=mktime(0,0,0,1,5,$year)+$weekInSeconds+$shift;

      return date($format,$timestamp)." - " .date($format,$timestamp_vendredi);

    }

}

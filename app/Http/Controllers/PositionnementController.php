<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Fonction;
use App\Models\TypeActivite;
use App\Models\Activite;
use App\Models\Rapport;
use App\Models\TempsType;
use App\Models\LivretPositionnement;
use App\Models\Positionnement;
use App\Models\Historique;

class PositionnementController extends Controller
{

    public function __construct()
    {
          $this->middleware('auth');//->except(['index'])
    }
    
    public function index()
    {
      try
      {
        $user_id = (Auth::user()->id);
        $type_utilisateur = (Auth::user()->type_utilisateur_id);

        $semaines = $this->semaine();

        $type_utilisateur = DB::table('type_utilisateurs')
        ->where('type_utilisateurs.id','=',$type_utilisateur)
        ->select('type_utilisateurs.*')
        ->first();

        if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi')
        {
  
            return view('positionnements.index', compact('semaines'));
        }
        else
        {
          if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
          {
              return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
          }
          else
          {
              return view('positionnements.index', compact('semaines'));
          }

        }
      }
      catch(\Exception $exception)
      {
        return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }

    public function create()
    {
        try
        {
          /** Recuperation de l'utilisateur en cours **/
          $users_id = (Auth::user())->id;
          $users_tel = (Auth::user())->telutilisateur;


          /** Recuperation du dernier  en cours **/
          $ifad_id = DB::table('ifad_moniteurs')
          ->where('ifad_moniteurs.user_id','=',$users_id)
          ->select('ifad_moniteurs.ifad_id')->get()->last()->ifad_id;

          /** Semaine du livret, transformation de la date et Libelle livret **/
          $semaine_livret = request('semaine_livret');
          $Livret_positionnement = 'Livret de positionnement '.$semaine_livret.' _'.$users_tel.' '.$ifad_id.'_';

           if($semaine_livret == null)
           {
               return back()->with('messagealert', 'Sélectionner une semaine');
           }
           elseif(DB::table('livret_positionnements')->where('LibelleLivret','=',$Livret_positionnement)->select('LibelleLivret')->first())
           {
            return back()->with('messagealert', 'Vous vous êtes déjà positionner par rapport à la semaine sélectionnée');
           }
           else
           {
              $positionnement = new Positionnement();

              /** selection des types d'activite classes par fonction **/
              $fonctions = Fonction::select('*')->orderBy('fonctions.id')->get();
              $f = 0;
              foreach($fonctions as $fonction)
              {
                  $tab_fonction_id[$f] = $fonction->id;
                  $tab_fonction_Libelle[$f] = $fonction->LibelleFonction;

        
                  $tab_type_activite[$f] = DB::table('fonctions')
                  ->join('type_activites','fonctions.id','=','type_activites.fonction_id')
                  ->select('type_activites.id','type_activites.LibelleType')
                  ->where('fonctions.id','=',$tab_fonction_id[$f])
                  ->orderBy('fonctions.id')
                  ->get();
                
                  $fonction_type_activites[$f] = collect([$tab_fonction_Libelle[$f],$tab_type_activite[$f]])->all();
                  $f++;
              }

              /** selection des activites classes par type d'activite **/
              $type_activites = TypeActivite::select('*')->orderBy('type_activites.id')->get();
          
              $i = 0;
              foreach($type_activites as $type_activite)
              {
                  $tab_typeactivite_id[$i] = $type_activite->id;
                  $tab_typeactivite_Libelle[$i] = $type_activite->LibelleType;

        
                  $tab_activite[$i] = DB::table('type_activites')
                  ->join('activites','type_activites.id','=','activites.type_activite_id')
                  ->select('activites.id','activites.LibelleActivite')
                  ->where('type_activites.id','=',$tab_typeactivite_id[$i])
                  ->orderBy('type_activites.id')
                  ->get();
                
                  $collections[$i] = collect([$tab_typeactivite_id[$i],$tab_typeactivite_Libelle[$i],$tab_activite[$i]])->all();
        
                  $i++;
              } 

              return view('positionnements.create',compact('collections','fonction_type_activites','semaine_livret'));
        }
  
        }
        catch(\Exception $exception)
        {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    public function store()
    {
      try
      {
          /** Recuperation de l'utilisateur en cours **/
          $users_id = (Auth::user())->id;
          $users_tel = (Auth::user())->telutilisateur;


          /** Recuperation du dernier  en cours **/
          $ifad_id = DB::table('ifad_moniteurs')
          ->where('ifad_moniteurs.user_id','=',$users_id)
          ->select('ifad_moniteurs.ifad_id')->get()->last()->ifad_id;


        /** Recuperation des infromations du formulaire Positionnement.form sauf $second  **/
          $date = request('semaine_livret');
          $LibelleRapport = 'Rapport '.$date.' _'.$users_tel.' '.$ifad_id.'_';
          $Livret_positionnement = 'Livret de positionnement '.$date.' _'.$users_tel.' '.$ifad_id.'_';

        
          /** recuperation de l'id du rapport qui vient d'etre enregistre  **/
          $recuperation_id = DB::table('rapports')
          ->where('rapports.LibelleRapport','=',$LibelleRapport)
          ->select('rapports.id')->first();

          /** recuperation de l'id du Livret de positionnement qui vient d'etre enregistre  **/
          $Livret_positionnement_id = DB::table('livret_positionnements')
          ->where('livret_positionnements.LibelleLivret','=',$Livret_positionnement)
          ->select('livret_positionnements.id')->first();

            /** recuperation le dernier id de ifad_moniteur par rapport a l'utilisateur **/
          $ifad_moniteur_id = DB::table('ifad_moniteurs')
          ->where('ifad_moniteurs.user_id','=',$users_id)
          ->select('ifad_moniteurs.id')->get()->last();

        
         if($recuperation_id == null)
         {
            /** enregistrement des donnees dans Rapport et recuperation de id **/
            $rapport = Rapport::insertGetId([
              'LibelleRapport'=> $LibelleRapport,
              'ifad_moniteur_id'=> $ifad_moniteur_id->id,
              'etat'=> 0,'etatsup'=> 0]);

           /** Enregistrement du livret de positionnement et recuperation de id **/
            $livret = LivretPositionnement::insertGetId([
             'LibelleLivret'=> $Livret_positionnement,
             'DateEnregistrement'=>now(),
             'rapport_id'=> $rapport,'etatsup'=> 0]);

            /** Recuperation des valeurs **/
             $activite_values = DB::table('activites')->select('id')->get();
             $i = 1;
             foreach($activite_values as $activite_value)
             {
               $value[$i]= request('ValeurPost_'.$activite_value->id);
               /** enregistrement des positionnements **/
               $positionnement = Positionnement::create([
                 'ValeurPost'=> $value[$i],
                 'livret_positionnement_id'=> $livret,
                 'activite_id'=> $activite_value->id,]);
                 $i++;
             }

             $type_values = DB::table('type_activites')->select('id')->get();
             $t = 1;
             foreach($type_values as $type_value)
             {
               $temps[$t]= request('TempsPost_'.$type_value->id);
                 /** enregistrement des temps_type **/
               $temps_type = TempsType::create([
                 'TempsPost'=> $temps[$t],
                 'livret_positionnement_id'=> $livret,
                 'type_activite_id'=> $type_value->id,]);
                 $t++;
             }
            /** Fin Recuperation des valeurs **/

             $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
             /** historiques des actions sur le systeme **/
             $historique = Historique::create([
             'user'=> $huser,
             'table'=> 'Rapport',
             'attribute' => $LibelleRapport,
             'action'=> 'ajout',]);

             return redirect('activitesaisie_rapport/' .$rapport)->with('message', "Livret de positionnement bien enregistré. Veillez Saisir les activités du rapport.");

         }
         elseif($recuperation_id->id != null)
         {
           /** recuperation de id du rapport **/
           $rapport = Rapport::select('id')->where('LibelleRapport','=',$LibelleRapport)->first()->id;

           /** Enregistrement du livret de positionnement et recuperation de id **/
           $livret = LivretPositionnement::insertGetId([
            'LibelleLivret'=> $Livret_positionnement,
            'DateEnregistrement'=>now(),
            'rapport_id'=> $rapport,'etatsup'=> 0]);

           /** Recuperation des valeurs **/
            $activite_values = DB::table('activites')->select('id')->get();
            $i = 1;
            foreach($activite_values as $activite_value)
            {
              $value[$i]= request('ValeurPost_'.$activite_value->id);
              /** enregistrement des positionnements **/
              $positionnement = Positionnement::create([
                'ValeurPost'=> $value[$i],
                'livret_positionnement_id'=> $livret,
                'activite_id'=> $activite_value->id,]);
                $i++;
            }

            $type_values = DB::table('type_activites')->select('id')->get();
            $t = 1;
            foreach($type_values as $type_value)
            {
              $temps[$t]= request('TempsPost_'.$type_value->id);
                /** enregistrement des temps_type **/
              $temps_type = TempsType::create([
                'TempsPost'=> $temps[$t],
                'livret_positionnement_id'=> $livret,
                'type_activite_id'=> $type_value->id,]);
                $t++;
            }
           /** Fin Recuperation des valeurs **/

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Rapport',
            'attribute' => $LibelleRapport,
            'action'=> 'ajout',]);

            return redirect('activitesaisie_rapport/' .$rapport)->with('message', "Livret de positionnement bien enregistré. Veillez Saisir les activités du rapport.");
         }

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }


    public function edit(Positionnement $positionnement)
    {
      try
      {
        $activites = DB::table('activites')
        ->join('positionnements','activites.id','=','positionnements.activite_id')
        ->where('positionnements.id','=', $positionnement->id)
        ->select('positionnements.*','activites.LibelleActivite')
        ->get();

        return view('positionnements.edit', compact('activites'));
      }
      catch(\Exception $exception)
     {
         return redirect('erreur')->with('messageerreur',$exception->getMessage());
     }
    }

    public function update(Positionnement $positionnement)
     {
       try
       {
          $livret_id = request('livret_id');

          $positionnement->update(['ValeurPost'=> request('ValeurPost')]);

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Positionnement',
            'attribute' =>  request('ValeurPost'),
            'action'=> 'modification',
          ]);
    
          return redirect('livret_positionnements/' . $livret_id)->with('message', "Livret de positionnement mise à jour");
        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
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

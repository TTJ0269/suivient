<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use App\Models\Fonction;

class TempsActiviteController extends Controller
{
    public function TempsFonctionGet()
    {
      try
      {
        $users = DB::table('type_utilisateurs')
          ->join('users','type_utilisateurs.id','=','users.type_utilisateur_id')
          ->where('type_utilisateurs.libelletype','=','Moniteur ENT')
          ->select('users.*')
          ->get();

        return view('Resultats.Tempsfonctionget',compact('users'));
      }
      catch(\Exception $exception)
      {
        return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }

    public function TempsFonction()
    {
     try
      {
        $user_id = request('user_id');

          /** recuperation distincte de toutes les fonctions **/
        $fonctionsdistinct = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->select(DB::raw('distinct fonctions.LibelleFonction'))
        ->get();

        /**recuperation de toutes les fonctions ainsi que la date de debut et de fin des activites conernants les fonctions **/
        $fonctions = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->select('fonctions.LibelleFonction','activites.DateFin','activites.DateDebut')
        ->get();

        /**Le premier foreach récupère les fonctions distinctes et les mettes dans un tableau
        Le deuxième foreach récupère toutes les fonctions associées aux activités
        Le if veut dire si la première fonction distincte correspond à la fonction associée a une activité alors
        on calcule le temps passe dans l’activité que l’on garde dans une variable et si en parcourent le if,
        il trouve la même fonction, il calcule le temps passe et l’ajoute à la variable pour avoir le temps total
        Ainsi de suite.
        Après il sort de la boucle et passe à la deuxième fonction distincts et recommence le processus 
       **/
          $fd = 1;
        foreach($fonctionsdistinct as $foncdist)
        {
          $fontd[$fd] = $foncdist->LibelleFonction;
          $tempsreel = 0;


          foreach($fonctions as $fonction)
          {
             $i = 1;
             $font[$i] = $fonction->LibelleFonction;

             if($fontd[$fd] == $font[$i])
             {
              $tabfonction[$i] = $fonction->LibelleFonction;
              $DatefinHeure[$i] = Date::make($fonction->DateFin)->format('H');
              $DateDebutHeure[$i] = Date::make($fonction->DateDebut)->format('H');
              $DatefinMinute[$i] = Date::make($fonction->DateFin)->format('i');
              $DateDebutMinute[$i] = Date::make($fonction->DateDebut)->format('i');

              $timeH[$i] = ($DatefinHeure[$i] - $DateDebutHeure[$i]);
              $timeM[$i] = ($DatefinMinute[$i] - $DateDebutMinute[$i]);
              $time[$i]  = (($timeH[$i]*60) + $timeM[$i]);

              $tempsreel = $tempsreel + $time[$i];
             }
             $i++;
          }
          $fontdtemps[$fd] = $tempsreel;
          $fd++;
        }

         /** pour conter le nombre de resultat trouve **/
        $fonction_first = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->rightjoin('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->select('fonctions.LibelleFonction', DB::raw('(SUM(activites.DateFin - activites.DateDebut)) as temps'))
        ->groupBy('fonctions.LibelleFonction')
        ->get()->count();


        if($fonction_first == 0)
        {
          return redirect('dashboard')->with('messagealert', "Pas d'activité realisée par ce moniteur ENT");
        }
        elseif($fonction_first == 1)
        {
          $LibelleFonction1 = $fontd[1];
          $LibelleFonction2 = '';
          $LibelleFonction3 = '';
          $LibelleFonction4 = '';
          $LibelleFonction5 = '';
          $TempsFonction1  = $fontdtemps[1];
          $TempsFonction2  = 0;
          $TempsFonction3  = 0;
          $TempsFonction4  = 0;
          $TempsFonction5  = 0;

          $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
          $tabvaleurtemps   = [$TempsFonction1,$TempsFonction2,$TempsFonction3,$TempsFonction4,$TempsFonction5];

          return view ('charts.bar', compact('tabvaleurfonction','tabvaleurtemps'));
        }
        elseif($fonction_first == 2)
        {
          $LibelleFonction1 = $fontd[1];
          $LibelleFonction2 = $fontd[2];
          $LibelleFonction3 = '';
          $LibelleFonction4 = '';
          $LibelleFonction5 = '';
          $TempsFonction1  = $fontdtemps[1];
          $TempsFonction2  = $fontdtemps[2];
          $TempsFonction3  = 0;
          $TempsFonction4  = 0;
          $TempsFonction5  = 0;

          $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
          $tabvaleurtemps   = [$TempsFonction1,$TempsFonction2,$TempsFonction3,$TempsFonction4,$TempsFonction5];

          return view ('charts.bar', compact('tabvaleurfonction','tabvaleurtemps'));
        }
        elseif($fonction_first == 3)
        {
          $LibelleFonction1 = $fontd[1];
          $LibelleFonction2 = $fontd[2];
          $LibelleFonction3 = $fontd[3];
          $LibelleFonction4 = '';
          $LibelleFonction5 = '';
          $TempsFonction1  = $fontdtemps[1];
          $TempsFonction2  = $fontdtemps[2];
          $TempsFonction3  = $fontdtemps[3];
          $TempsFonction4  = 0;
          $TempsFonction5  = 0;

          $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
          $tabvaleurtemps   = [$TempsFonction1,$TempsFonction2,$TempsFonction3,$TempsFonction4,$TempsFonction5];

          return view ('charts.bar', compact('tabvaleurfonction','tabvaleurtemps'));
        }
        elseif($fonction_first == 4)
        {
          $LibelleFonction1 = $fontd[1];
          $LibelleFonction2 = $fontd[2];
          $LibelleFonction3 = $fontd[3];
          $LibelleFonction4 = $fontd[4];
          $LibelleFonction5 = '';
          $TempsFonction1  = $fontdtemps[1];
          $TempsFonction2  = $fontdtemps[2];
          $TempsFonction3  = $fontdtemps[3];
          $TempsFonction4  = $fontdtemps[4];
          $TempsFonction5  = 0;

          $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
          $tabvaleurtemps   = [$TempsFonction1,$TempsFonction2,$TempsFonction3,$TempsFonction4,$TempsFonction5];

          return view ('charts.bar', compact('tabvaleurfonction','tabvaleurtemps'));
        }
        else
        {
          $LibelleFonction1 = $fontd[1];
          $LibelleFonction2 = $fontd[2];
          $LibelleFonction3 = $fontd[3];
          $LibelleFonction4 = $fontd[4];
          $LibelleFonction5 = $fontd[5];
          $TempsFonction1  = $fontdtemps[1];
          $TempsFonction2  = $fontdtemps[2];
          $TempsFonction3  = $fontdtemps[3];
          $TempsFonction4  = $fontdtemps[4];
          $TempsFonction5  = $fontdtemps[5];

          $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
          $tabvaleurtemps   = [$TempsFonction1,$TempsFonction2,$TempsFonction3,$TempsFonction4,$TempsFonction5];

          return view ('charts.bar', compact('tabvaleurfonction','tabvaleurtemps'));
        }
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }
}

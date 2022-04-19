<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Fonction;
use App\Models\TypeActivite;
use App\Models\LivretPositionnement;

class StatistiqueMoisController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');//->except(['index'])
    }

    public function mois_index()
    {
        try
        {
            $users = DB::table('type_utilisateurs')
            ->join('users','type_utilisateurs.id','=','users.type_utilisateur_id')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->select('users.*')
            ->where('type_utilisateurs.libelletype','=','Moniteur ENT')
            ->distinct('users.id')
            ->get();

          return view('statistiques.index',compact('users'));
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }


    public function StatistiqueMoisGeneral()
    {
        try
        {
            $user = request('user_id');
            $mois = request('mois');
            $annee = request('annee');
            $date = $annee.'-'.$mois;
            $format = Date::make($date.'-01 00:00:00')->format('m-Y');
            
            if($date == null || $user == null)
            {
                return back()->with('messagealert', "Choisir l'utilisateur.");
            }
            else
            {
                if(DB::table('users')
                ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                ->where('livret_positionnements.DateEnregistrement','like',"%$date%")
                ->where('users.id','=',$user)
                ->doesntExist())
                {
                    return back()->with('messagealert', 'Aucune information pour cette requête.');
                }
                else
                {

                    /** Recuperation user a qui appartient le livret **/

                 $users = DB::table('users')->select('users.*')->where('id','=',$user)->get();
                 /** Fin Recuperation user a qui appartient le livret **/

                 /** recuperation de l'ifad de l'utilisateur a qui appartient le livret **/
                 $ifad = DB::table('ifads')
                 ->join('ifad_moniteurs','ifads.id','=','ifad_moniteurs.ifad_id')
                 ->join('users','users.id','=','ifad_moniteurs.user_id')
                 ->where('users.id','=',$user)
                 ->select('ifads.*')->get()->last()->LibelleIfad;

                    /** positionnements par type_activites **/
                    $fonctions = Fonction::select('*')->get();

                    $f= 1;

                    foreach($fonctions as $fonction)
                    {

                        $fonction_libelle[$f] = $fonction->LibelleFonction;
                        $fonction_id[$f] = $fonction->id;


                        $activite_positionnements[$f] = DB::table('users')
                        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                        ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id') 
                        ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                        ->join('activites','activites.id','=','positionnements.activite_id')
                        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                        ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                        ->select('fonctions.id as fonction_id','type_activites.LibelleType',DB::raw('AVG (positionnements.ValeurPost) as position'))
                        ->where('fonctions.id','=',$fonction_id[$f])
                        ->where('livret_positionnements.DateEnregistrement','like',"%$date%")
                        ->where('users.id','=',$user)
                        ->groupBy('type_activites.id','fonctions.id','type_activites.LibelleType')
                        ->get(); 
                        
                        

                        $collection_fonctions[$f] = collect([$fonction_id[$f],$fonction_libelle[$f],$activite_positionnements[$f]])->all();

                        $f++;
                    }
                    $fonction_une = $collection_fonctions[1];
                    $fonction_deux = $collection_fonctions[2];
                    $fonction_trois = $collection_fonctions[3];
                    $fonction_quatre = $collection_fonctions[4];
                    $fonction_cinq = $collection_fonctions[5];
                    /** HeureActivite **/
                    $nombre_heures = $this->HeureActivite();

                    /** Calcul du temps total d'un livret **/
                    $tempstotal = DB::table('users')
                    ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                    ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                    ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id') 
                    ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
                    ->select(DB::raw('SUM(temps_types.TempsPost)*60 as tempstotal'))
                    ->where('users.id','=',$user)
                    ->where('livret_positionnements.DateEnregistrement','like',"%$date%")->first()->tempstotal;

                    /** Evaluation **/
                    $evaluations = $this->Evaluation();

                    /** Activites confiees **/

                    $activites = $this->ActivitesConfiees();


                    return view('statistiques.mois_generale',compact('fonction_une','fonction_deux','fonction_trois','fonction_quatre','fonction_cinq','nombre_heures','activites','users','evaluations','tempstotal','ifad','format'));

                }
                
            }
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }


    private function HeureActivite()
    {
        try
        {
            $user = request('user_id');
            $mois = request('mois');
            $annee = request('annee');
            $date = $annee.'-'.$mois;

            /** Calcul du temps total d'un livret **/
            $tempstotal = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id') 
            ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
            ->select(DB::raw('SUM(temps_types.TempsPost) as tempstotal'))
            ->where('users.id','=',$user)
            ->where('livret_positionnements.DateEnregistrement','like',"%$date%")->first()->tempstotal;

            /** Converstion du temps en int **/
            $livret_tempstotal = (int)$tempstotal;

            $fonction_temps = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id') 
            ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
            ->join('type_activites','type_activites.id','=','temps_types.type_activite_id')
            ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
            ->select('fonctions.id as fonction_id','fonctions.LibelleFonction',
                     DB::raw('(SUM(temps_types.TempsPost)/'.$livret_tempstotal.')*100 as temps'),
                     DB::raw('SUM(temps_types.TempsPost)*60 as seconde'))
            ->where('livret_positionnements.DateEnregistrement','like',"%$date%")
            ->where('users.id','=',$user)
            ->groupBy('fonctions.id','fonctions.LibelleFonction')
            ->get();

            return $fonction_temps;  
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    private function Evaluation()
    {
        try
        {
            $user = request('user_id');
            $mois = request('mois');
            $annee = request('annee');
            $date = $annee.'-'.$mois;
            
            $evaluation_livret = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('placements','ifad_moniteurs.id','=','placements.ifad_moniteur_id')
            ->join('type_evaluations','type_evaluations.id','=','placements.type_evaluation_id')
            ->select('type_evaluations.LibelleEvaluation',DB::raw('AVG(placements.ValeurPlace) as ValeurPlace'))
            ->where('placements.DateEnregistrement','like',"%$date%")
            ->where('users.id','=',$user)
            ->groupBy('type_evaluations.LibelleEvaluation')
            ->distinct('type_evaluations.LibelleEvaluation')
            ->get();

            return $evaluation_livret;

        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    private function ActivitesConfiees()
    {
        try
        {

            $user = request('user_id');
            $mois = request('mois');
            $annee = request('annee');
            $date = $annee.'-'.$mois;

            $fonctions = Fonction::select('*')->get();

                $f= 1;

                foreach($fonctions as $fonction)
                {
                    $fonction_id[$f] = $fonction->id;
                    $fonction_libelle[$f] = $fonction->LibelleFonction;


                    $activites_confiees_fonction[$f] = DB::table('users')
                    ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                    ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                    ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id') 
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                    ->select('fonctions.id','fonctions.LibelleFonction',DB::raw('COUNT(positionnements.ValeurPost) as valeur'))
                    ->where('fonctions.id','=',$fonction_id[$f])
                    ->where('users.id','=',$user)
                    ->where('livret_positionnements.DateEnregistrement','like',"%$date%")
                    ->groupBy('fonctions.id','fonctions.LibelleFonction') 
                    ->first()->valeur; 

                    if(DB::table('users')
                    ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                    ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                    ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id') 
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                    ->select('fonctions.id','fonctions.LibelleFonction',DB::raw('COUNT(positionnements.ValeurPost) as valeur_activite'))
                    ->where('fonctions.id','=',$fonction_id[$f])
                    ->where('livret_positionnements.DateEnregistrement','like',"%$date%")
                    ->where('users.id','=',$user)
                    ->where('positionnements.ValeurPost','<>',0)
                    ->groupBy('fonctions.id','fonctions.LibelleFonction')->doesntExist())
                    {
                        $activites_confiees[$f] = 0;
                    }
                    else
                    {
                        $activites_confiees[$f] = DB::table('users')
                        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                        ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id') 
                        ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                        ->join('activites','activites.id','=','positionnements.activite_id')
                        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                        ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                        ->select('fonctions.id','fonctions.LibelleFonction',DB::raw('COUNT(positionnements.ValeurPost) as valeur_activite'))
                        ->where('fonctions.id','=',$fonction_id[$f])
                        ->where('livret_positionnements.DateEnregistrement','like',"%$date%")
                        ->where('users.id','=',$user)
                        ->where('positionnements.ValeurPost','<>',0)
                        ->groupBy('fonctions.id','fonctions.LibelleFonction') 
                        ->first()->valeur_activite; 
                    }

                    $operations[$f] = round((($activites_confiees[$f]/$activites_confiees_fonction[$f])*100),2);

                    $activites_conf[$f] = collect([$fonction_libelle[$f],$operations[$f]]);

                    $f++;
                }       

            return $activites_conf;
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }
}

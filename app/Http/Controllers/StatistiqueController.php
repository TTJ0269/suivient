<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Fonction;
use App\Models\TypeActivite;
use App\Models\LivretPositionnement;

class StatistiqueController extends Controller
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

          $type_utilisateur = DB::table('type_utilisateurs')
          ->where('type_utilisateurs.id','=',$type_utilisateur)
          ->select('type_utilisateurs.*')
          ->first();

          if($type_utilisateur->libelletype == 'DG IFAD')
          {
            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
            {
                return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
            }
            else
            {
                /** recuperation de ifad_id selon l'utilisateur **/
                $ifad_id = DB::table('ifad_moniteurs')
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->select('ifad_moniteurs.ifad_id')
                ->get()->last()->ifad_id;

                $users = DB::table('type_utilisateurs')
                ->join('users','type_utilisateurs.id','=','users.type_utilisateur_id')
                ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                ->select('users.*')
                ->where('type_utilisateurs.libelletype','=','Moniteur ENT')
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->distinct('users.id')
                ->get();

                return view('statistiques.index',compact('users'));
            }
          }
         else
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
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getLivret(Request $request)
    {
        try
        {
          $user_id = (Auth::user()->id);
          $type_utilisateur = (Auth::user()->type_utilisateur_id);

          $type_utilisateur = DB::table('type_utilisateurs')
          ->where('type_utilisateurs.id','=',$type_utilisateur)
          ->select('type_utilisateurs.*')
          ->first();

          if($type_utilisateur->libelletype == 'DG IFAD')
          {
            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
            {
                return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
            }
            else
            {
                /** recuperation de ifad_id selon l'utilisateur **/
                $ifad_id = DB::table('ifad_moniteurs')
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->select('ifad_moniteurs.ifad_id')
                ->get()->last()->ifad_id;

                $livrets = DB::table('users')
                ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                ->select('livret_positionnements.id','livret_positionnements.LibelleLivret','livret_positionnements.DateEnregistrement','rapports.etat')
                ->where('users.id', $request->user_id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->orderBy('livret_positionnements.id','DESC')
                ->limit(10)->get();
            }
          }
          else
          {
            $livrets = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
            ->select('livret_positionnements.id','livret_positionnements.LibelleLivret','livret_positionnements.DateEnregistrement','rapports.etat')
            ->where('users.id', $request->user_id)
            ->orderBy('livret_positionnements.id','DESC')
            ->limit(10)->get();
          }

            if (count($livrets) > 0)
            {
                return response()->json($livrets);
            }

        }
            catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    public function StatistiqueGenerale()
    {
        try
        {
            $livret_id = request('livret_id');

            if($livret_id == null)
            {
                return back()->with('messagealert', 'Sélectionner un livret.');
            }
            else
            {
                /** Recuperation user a qui appartient le livret **/

                 $users = DB::table('users')
                 ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                 ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                 ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                 ->select('users.*','livret_positionnements.id as livret_id','livret_positionnements.LibelleLivret','livret_positionnements.DateEnregistrement')
                 ->where('livret_positionnements.id','=',$livret_id)
                 ->get();
                 /** Fin Recuperation user a qui appartient le livret **/

                 /** recuperation de l'ifad de l'utilisateur a qui appartient le livret **/
                   $id_user = $users->last()->id;
                   $ifad = DB::table('ifads')
                   ->join('ifad_moniteurs','ifads.id','=','ifad_moniteurs.ifad_id')
                   ->join('users','users.id','=','ifad_moniteurs.user_id')
                   ->where('users.id','=',$id_user)
                   ->select('ifads.*')->get()->last()->LibelleIfad;

                /** positionnements par type_activites **/
                $fonctions = Fonction::select('*')->get();

                $f= 1;

                foreach($fonctions as $fonction)
                {

                    $fonction_libelle[$f] = $fonction->LibelleFonction;
                    $fonction_id[$f] = $fonction->id;


                    $activite_positionnements[$f] = DB::table('livret_positionnements')
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                    ->select('fonctions.id as fonction_id','type_activites.LibelleType',DB::raw('AVG (positionnements.ValeurPost) as position'))
                    ->where('fonctions.id','=',$fonction_id[$f])
                    ->where('livret_positionnements.id','=',$livret_id)
                    ->groupBy('type_activites.id','fonctions.id','type_activites.LibelleType')
                    ->get();



                    $collection_fonctions[$f] = collect(['fonction_id' => $fonction_id[$f], 'fonction_libelle' => $fonction_libelle[$f], 'activite_posits' => $activite_positionnements[$f]])->all();

                    $f++;
            }
            /** HeureActivite **/
            $nombre_heures = $this->HeureActivite();

            /** Calcul du temps total d'un livret **/
            $tempstotal = DB::table('livret_positionnements')
            ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
            ->select(DB::raw('SUM(temps_types.TempsPost)*60 as tempstotal'))
            ->where('livret_positionnements.id','=',$livret_id)->first()->tempstotal;

            /** Evaluation **/
            //$evaluations = $this->Evaluation();

            /** numero semaine livret **/
            //$this->numero_semaine();

            /** Activites confiees **/

            $activites = $this->ActivitesConfiees();


            return view('statistiques.generale',compact('collection_fonctions','nombre_heures','activites','users','tempstotal','ifad'));

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
            $livret_id = request('livret_id');

            /** Calcul du temps total d'un livret **/
            $tempstotal = DB::table('livret_positionnements')
            ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
            ->select(DB::raw('SUM(temps_types.TempsPost) as tempstotal'))
            ->where('livret_positionnements.id','=',$livret_id)->first()->tempstotal;

            /** Converstion du temps en int **/
            $livret_tempstotal = (int)$tempstotal;

            $fonction_temps = DB::table('livret_positionnements')
            ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
            ->join('type_activites','type_activites.id','=','temps_types.type_activite_id')
            ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
            ->select('fonctions.id as fonction_id','fonctions.LibelleFonction',
                     DB::raw('(SUM(temps_types.TempsPost)/'.$livret_tempstotal.')*100 as temps'),
                     DB::raw('SUM(temps_types.TempsPost)*60 as seconde'))
            ->where('livret_positionnements.id','=',$livret_id)
            ->groupBy('fonctions.id','fonctions.LibelleFonction')
            ->get();

            return $fonction_temps;
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

            $livret_id = request('livret_id');

            $fonctions = Fonction::select('*')->get();

                $f= 1;

                foreach($fonctions as $fonction)
                {
                    $fonction_id[$f] = $fonction->id;
                    $fonction_libelle[$f] = $fonction->LibelleFonction;


                    $activites_confiees_fonction[$f] = DB::table('livret_positionnements')
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                    ->select('fonctions.id','fonctions.LibelleFonction',DB::raw('COUNT(positionnements.ValeurPost) as valeur'))
                    ->where('fonctions.id','=',$fonction_id[$f])
                    ->where('livret_positionnements.id','=',$livret_id)
                    ->groupBy('fonctions.id','fonctions.LibelleFonction')
                    ->first()->valeur;

                    if(DB::table('livret_positionnements')
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                    ->select('fonctions.id','fonctions.LibelleFonction',DB::raw('COUNT(positionnements.ValeurPost) as valeur_activite'))
                    ->where('fonctions.id','=',$fonction_id[$f])
                    ->where('livret_positionnements.id','=',$livret_id)
                    ->where('positionnements.ValeurPost','<>',0)
                    ->groupBy('fonctions.id','fonctions.LibelleFonction')->doesntExist())
                    {
                        $activites_confiees[$f] = 0;
                    }
                    else
                    {
                        $activites_confiees[$f] = DB::table('livret_positionnements')
                        ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                        ->join('activites','activites.id','=','positionnements.activite_id')
                        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                        ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
                        ->select('fonctions.id','fonctions.LibelleFonction',DB::raw('COUNT(positionnements.ValeurPost) as valeur_activite'))
                        ->where('fonctions.id','=',$fonction_id[$f])
                        ->where('livret_positionnements.id','=',$livret_id)
                        ->where('positionnements.ValeurPost','<>',0)
                        ->groupBy('fonctions.id','fonctions.LibelleFonction')
                        ->first()->valeur_activite;
                    }


                    $operations[$f] = round((($activites_confiees[$f]/$activites_confiees_fonction[$f])*100),2);

                    $activites_conf[$f] = collect(['fonction_libelle' => $fonction_libelle[$f], 'operation' => $operations[$f]]);

                    $f++;
                }

            return $activites_conf;
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

    private function numero_semaine()
    {
        try
        {
            $livret_id = request('livret_id');

            $livret = DB::table('livret_positionnements')
            ->where('livret_positionnements.id','=',$livret_id)
            ->select('livret_positionnements.DateEnregistrement')
            ->first()->DateEnregistrement;

            $converstion = strtotime($livret.' 00:00:00');
            $numero_semaine = (int)(date('W',$converstion));

            return $numero_semaine;
        }
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
    }

}

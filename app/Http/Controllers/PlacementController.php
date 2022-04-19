<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TypeEvaluation;
use App\Models\Evaluation;
use App\Models\Placement;
use App\Models\Historique;
use App\Models\User;

class PlacementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//->except(['index'])
    }

    public function index()
    {
      $this->authorize('dgifad', User::class);

        $user_id = (Auth::user()->id);
        $type_utilisateur = (Auth::user()->type_utilisateur_id);


        $type_utilisateur = DB::table('type_utilisateurs')
        ->where('type_utilisateurs.id','=',$type_utilisateur)
        ->select('type_utilisateurs.*')
        ->first();

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

           $users = DB::table('type_utilisateurs')
              ->join('users','type_utilisateurs.id','=','users.type_utilisateur_id')
              ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
              ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
              ->where('ifads.id','=',$ifad_id)
              ->where('type_utilisateurs.libelletype','=','Moniteur ENT')
              ->select('users.*')
              ->distinct('users.id')
              ->get();

           $placements = DB::table('users')
           ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
           ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
           ->join('placements','ifad_moniteurs.id','=','placements.ifad_moniteur_id')
           ->join('type_evaluations','type_evaluations.id','=','placements.type_evaluation_id')
           ->join('evaluations','type_evaluations.id','=','evaluations.type_evaluation_id')
           ->select('placements.DateEnregistrement','users.nomutilisateur','users.prenomutilisateur','ifad_moniteurs.id as ifad_moniteur_id')
           ->distinct('placements.DateEnregistrement','users.nomutilisateur','users.prenomutilisateur')
           ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
           ->orderBy('placements.DateEnregistrement','DESC')
           ->get();

           return view('placements.index', compact('placements','users'));
      }
    }

    public function create()
    {
        try
        {
              $id_user = request('user_id');

              if($id_user == null)
              {
                return back()->with('messagealert', "Administrateur ENT non sélectionné.");
              }
              else
              {
                $placement = new Placement();

                /** recuperation de ifad_id selon l'utilisateur **/
                $user_id = (Auth::user()->id);
                $date = now()->format('d/m/Y');
                $date_now = now()->format('Y-m-d');
  
                $Responsable_ifad_id = DB::table('ifad_moniteurs')
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->select('ifad_moniteurs.ifad_id')
                ->get()->last()->ifad_id;
  
                $AdministrateurENT_ifad_id = DB::table('ifad_moniteurs')
                ->where('ifad_moniteurs.user_id','=',$id_user)
                ->select('ifad_moniteurs.ifad_id')
                ->get()->last()->ifad_id;

                $ifad_moniteur_id = DB::table('ifad_moniteurs')
                ->where('ifad_moniteurs.user_id','=',$id_user)
                ->where('ifad_moniteurs.ifad_id','=',$AdministrateurENT_ifad_id)
                ->select('ifad_moniteurs.id')->get()->last()->id;


                if($Responsable_ifad_id != $AdministrateurENT_ifad_id)
                {
                  return back()->with('messagealert', "L'Administrateur ENT sélectionné n'est pas dans le même IFAD que vous.");
                }
                elseif(DB::table('placements')->where('DateEnregistrement','=',$date_now)->where('ifad_moniteur_id','=',$ifad_moniteur_id)->exists())
                {
                  return back()->with('messagealert', "L'Administrateur ENT sélectionné a déjà été évalué aujourd'hui");
                }
                else
                {
                    /** selection des types evaluations **/
                  $type_evaluations = TypeEvaluation::select('*')->orderBy('id')->get();

                  $t = 0;
                  foreach($type_evaluations as $type_evaluation)
                  {
                      $tab_type_evaluation_id[$t] = $type_evaluation->id;
                      $tab_type_evaluation_Libelle[$t] = $type_evaluation->LibelleEvaluation;

            
                      $tab_type_evaluation[$t] = DB::table('type_evaluations')
                      ->join('evaluations','type_evaluations.id','=','evaluations.type_evaluation_id')
                      ->select('evaluations.id','evaluations.LibelleEval','evaluations.valeur')
                      ->where('type_evaluations.id','=',$tab_type_evaluation_id[$t])
                      ->orderBy('evaluations.valeur')
                      ->get();
                    
                      $collections[$t] = collect([$tab_type_evaluation_id[$t],$tab_type_evaluation_Libelle[$t],$tab_type_evaluation[$t]])->all();
                      $t++;
                  }

                  return view('placements.create',compact('collections','date','id_user'));
                }
  
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
          $users_id = request('user_id');

           /** recuperation le dernier id de ifad_moniteur par rapport a l'utilisateur **/
           $ifad_moniteur_id = DB::table('ifad_moniteurs')
           ->where('ifad_moniteurs.user_id','=',$users_id)
           ->select('ifad_moniteurs.id')->get()->last()->id;


          /** Recuperation des valeurs **/
            $type_evaluations_values = DB::table('type_evaluations')->select('id')->orderBy('id')->get();

            $i = 1;
            foreach($type_evaluations_values as $type_evaluations_value)
            {
              $value[$i]= request('ValeurPlace_'.$type_evaluations_value->id);
              /** enregistrement des positionnements **/
              $placements = Placement::create([
                'ValeurPlace'=> $value[$i],
                'ifad_moniteur_id'=> $ifad_moniteur_id,
                'DateEnregistrement'=> now(),
                'type_evaluation_id'=> $type_evaluations_value->id,]);
                $i++;
            }
            /** Fin Recuperation des valeurs **/

             $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
             /** historiques des actions sur le systeme **/
             $historique = Historique::create([
             'user'=> $huser,
             'table'=> 'Placement',
             'attribute' => 'Evaluation',
             'action'=> 'ajout',]);

             return redirect('placements')->with('message', 'Informations bien enregistrées.');

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }

    public function show($placement_ifad_moniteur, $placement_date)
     {
       try
       {
            $placements =  DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('placements','ifad_moniteurs.id','=','placements.ifad_moniteur_id')
            ->join('type_evaluations','type_evaluations.id','=','placements.type_evaluation_id')
            ->select('type_evaluations.id','placements.ValeurPlace','type_evaluations.LibelleEvaluation')
            ->where('placements.DateEnregistrement','=',$placement_date)
            ->where('ifad_moniteurs.id','=',$placement_ifad_moniteur)
            ->groupBy('type_evaluations.LibelleEvaluation','placements.ValeurPlace','type_evaluations.id')
            ->distinct('type_evaluations.LibelleEvaluation')
            ->orderBy('type_evaluations.id')
            ->get();

            $i = 0;
            foreach($placements as $placement)
            {
              $LibelleEvaluation[$i] = $placement->LibelleEvaluation;
              $type_evaluation_id[$i] = $placement->id;
              $place_valeur[$i] = $placement->ValeurPlace;

              $evaluations[$i] = DB::table('type_evaluations')
              ->join('evaluations','type_evaluations.id','=','evaluations.type_evaluation_id')
              ->where('type_evaluations.id','=',$type_evaluation_id[$i])
              ->where('evaluations.valeur','=',$place_valeur[$i])
              ->select('evaluations.*')->first()->LibelleEval;

               $collections[$i] = collect([$LibelleEvaluation[$i],$evaluations[$i],$place_valeur[$i]])->all();

               $i++;
            }

          return view('placements.show',compact('collections'));

        }
        catch(\Exception $exception)
       {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
       }
     }
}

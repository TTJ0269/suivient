<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LivretPositionnement;
use App\Models\Rapport;

class RapportController extends Controller
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

          if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi' || $type_utilisateur->libelletype == 'Superviseur')
          {

            $rapports = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur','ifads.LibelleIfad')
            ->orderBy('rapports.id','DESC')
            ->get();
      
              return view('rapports.index', compact('rapports'));
          }
          elseif($type_utilisateur->libelletype == 'DG IFAD')
          {
            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
            {
                return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
            }
            else
            {
              /** recuperation du derniere id de ifad dans le quel on a entregistre le moniteur **/
              $ifad_id = DB::table('ifad_moniteurs')
              ->where('ifad_moniteurs.user_id','=',$user_id)
              ->select('ifad_moniteurs.ifad_id')
              ->get()->last()->ifad_id;

              $rapports = DB::table('users')
              ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
              ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
              ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
              ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
              ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur','ifads.LibelleIfad')
              ->orderBy('rapports.id','DESC')
              ->get();
        
                return view('rapports.index', compact('rapports'));
            }
          }
          else
          {
            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
            {
                return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
            }
            else
            {
              /** recuperation du derniere id de ifad dans le quel on a entregistre le moniteur **/
              $ifad_id = DB::table('ifad_moniteurs')
              ->where('ifad_moniteurs.user_id','=',$user_id)
              ->select('ifad_moniteurs.ifad_id')
              ->get()->last()->ifad_id;

              $rapports = DB::table('users')
              ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
              ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
              ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
              ->where('ifad_moniteurs.user_id','=',$user_id)
              ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
              ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur','ifads.LibelleIfad')
              ->orderBy('rapports.id','DESC')
              ->get();
              
              return view('rapports.index', compact('rapports'));
            
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
         /*
         $rapport = new Rapport();
  
         return view('rapports.create',compact('rapport'));*/
     }
  
       /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
  
     public function store()
     {   
       /* $users_id = (Auth::user())->id;

        $rapport = Rapport::create([
                'LibelleRapport'=> request('LibelleRapport'),
                'user_id'=> $users_id,
                ]);
  
        return redirect('activites');*/
     }
  
     // return redirect('rapports')->with('message', 'Rapport bien ajoutée.');
      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
  
     public function show(Rapport $rapport)
     {
     try
     {
        $user_id = (Auth::user()->id);
        $type_utilisateur = (Auth::user()->type_utilisateur_id);


        $type_utilisateur = DB::table('type_utilisateurs')
        ->where('type_utilisateurs.id','=',$type_utilisateur)
        ->select('type_utilisateurs.*')
        ->first();

        if(LivretPositionnement::select('id')->where('rapport_id','=',$rapport->id)->doesntExist())
        {
          /** recuperation des activite_saisies associees au rapport selectionnne classées par fonction **/
          $fonctions = DB::table('rapports')
          ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
          ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
          ->where('rapports.id','=',$rapport->id)
          ->select('activite_saisies.*','fonctions.LibelleFonction')
          ->orderBy('fonctions.id')
          ->get();

           return view('rapports.showactivite',compact('rapport','fonctions'));
        }
        else
        {
            /** recuperation de id du livret associé au rapport **/
          $livret_id = LivretPositionnement::select('id')
          ->where('rapport_id','=',$rapport->id)->first()->id;

              /*if(DB::table('rapports')
              ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
              ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
              ->where('rapports.id','=',$rapport->id)->doesntExist())
              {
                return back()->with('messagealert', "Ajouter au moins une activité au rapport");
              }*/


          if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi' || $type_utilisateur->libelletype == 'Superviseur')
          {
            /** recuperation du livret classé par type_activites, activites, positionnement et temps 
               * tout cela dans une collection **/

              $livrets = DB::table('rapports')
              ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
              ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
              ->join('type_activites','type_activites.id','=','temps_types.type_activite_id')
              ->where('livret_positionnements.id','=',$livret_id)
              ->where('rapports.id','=',$rapport->id)
              ->select('type_activites.LibelleType','type_activites.id','temps_types.TempsPost')
              ->distinct('type_activites.LibelleType','type_activites.id')
              ->orderBy('type_activites.id')
              ->get();


              $i = 0;
              foreach($livrets as $livret)
              { 
                  $LibelleType[$i] =  $livret->LibelleType;
                  $TempsType[$i] =  $livret->TempsPost;
                  $type_id[$i] =  $livret->id;


                  $activites[$i] = DB::table('rapports')
                  ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                  ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                  ->join('activites','activites.id','=','positionnements.activite_id')
                  ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                  ->join('temps_types', function ($join) {
                    $join->on('type_activites.id','=','temps_types.type_activite_id')
                        ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                  ->where('livret_positionnements.id','=',$livret_id)
                  ->where('rapports.id','=',$rapport->id)
                  ->where('type_activites.id','=',$type_id[$i])
                  ->select('positionnements.*','activites.LibelleActivite')
                  ->orderBy('type_activites.id')
                  ->get();

                  $positionnement_activites[$i] = $activites[$i];
                  $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i]])->all();
                  $i++;
              }

              /** recuperation des activite_saisies associees au rapport selectionnne classées par fonction **/
              $fonctions = DB::table('rapports')
              ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
              ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
              ->where('rapports.id','=',$rapport->id)
              ->select('activite_saisies.*','fonctions.LibelleFonction')
              ->orderBy('fonctions.id')
              ->get();

              /*$a = 0;
              foreach($fonctions as $fonction)
              { 
                  $LibelleFonction[$a] =  $fonction->LibelleFonction;
                  $fonction_id[$a] =  $fonction->id;


                  $activite_saisies[$a] = DB::table('rapports')
                  ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
                  ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
                  ->select('activite_saisies.*')
                  ->where('rapports.id','=',$rapport->id)
                  ->where('fonctions.id','=',$fonction_id[$a])
                  ->orderBy('fonctions.id')
                  ->get();

                  $value_activite_saisies[$a] = $activite_saisies[$a];
                  $fonction_activites[$a] = collect([$LibelleFonction[$a],$value_activite_saisies[$a]])->all();
                  $a++;
              }*/
      
                return view('rapports.show',compact('rapport','collections','fonctions'));

          }
          elseif($type_utilisateur->libelletype == 'DG IFAD')
          {
            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
            {
                return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
            }
            else
            {
               /** recuperation du derniere id de ifad dans le quel on a entregistre le moniteur **/
              $ifad_id = DB::table('ifad_moniteurs')
              ->where('ifad_moniteurs.user_id','=',$user_id)
              ->select('ifad_moniteurs.ifad_id')
              ->get()->last()->ifad_id;

              /** recuperation du livret classé par type_activites, activites, positionnement et temps 
               * tout cela dans une collection **/

              $livrets = DB::table('rapports')
              ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
              ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
              ->join('type_activites','type_activites.id','=','temps_types.type_activite_id')
              ->where('livret_positionnements.id','=',$livret_id)
              ->where('rapports.id','=',$rapport->id)
              ->select('type_activites.LibelleType','type_activites.id','temps_types.TempsPost')
              ->distinct('type_activites.LibelleType','type_activites.id')
              ->orderBy('type_activites.id')
              ->get();


              $i = 0;
              foreach($livrets as $livret)
              { 
                  $LibelleType[$i] =  $livret->LibelleType;
                  $TempsType[$i] =  $livret->TempsPost;
                  $type_id[$i] =  $livret->id;


                  $activites[$i] = DB::table('ifad_moniteurs')
                  ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                  ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                  ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                  ->join('activites','activites.id','=','positionnements.activite_id')
                  ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                  ->join('temps_types', function ($join) {
                    $join->on('type_activites.id','=','temps_types.type_activite_id')
                        ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                  ->where('livret_positionnements.id','=',$livret_id)
                  ->where('rapports.id','=',$rapport->id)
                  ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                  ->where('type_activites.id','=',$type_id[$i])
                  ->select('positionnements.*','activites.LibelleActivite')
                  ->orderBy('type_activites.id')
                  ->get();

                  $positionnement_activites[$i] = $activites[$i];
                  $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i]])->all();
                  $i++;
              }

              /** recuperation des activite_saisies associees au rapport selectionnne classées par fonction **/
              $fonctions = DB::table('rapports')
              ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
              ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
              ->where('rapports.id','=',$rapport->id)
              ->select('activite_saisies.*','fonctions.LibelleFonction')
              ->orderBy('fonctions.id')
              ->get();
      
                return view('rapports.show',compact('rapport','collections','fonctions'));
            }
          }
          else
          {
            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
            {
                return redirect('dashboard')->with('messagealert', "Vous n'est pas encore associé(e) à un IFAD");
            }
            else
            {
               /** recuperation du derniere id de ifad dans le quel on a entregistre le moniteur **/
                $ifad_id = DB::table('ifad_moniteurs')
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->select('ifad_moniteurs.ifad_id')
                ->get()->last()->ifad_id;

              /** recuperation du livret classé par type_activites, activites, positionnement et temps 
               * tout cela dans une collection **/

              $livrets = DB::table('rapports')
              ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
              ->join('temps_types','livret_positionnements.id','=','temps_types.livret_positionnement_id')
              ->join('type_activites','type_activites.id','=','temps_types.type_activite_id')
              ->where('livret_positionnements.id','=',$livret_id)
              ->where('rapports.id','=',$rapport->id)
              ->select('type_activites.LibelleType','type_activites.id','temps_types.TempsPost')
              ->distinct('type_activites.LibelleType','type_activites.id')
              ->orderBy('type_activites.id')
              ->get();


              $i = 0;
              foreach($livrets as $livret)
              { 
                  $LibelleType[$i] =  $livret->LibelleType;
                  $TempsType[$i] =  $livret->TempsPost;
                  $type_id[$i] =  $livret->id;


                  $activites[$i] = DB::table('ifad_moniteurs')
                  ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                  ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                  ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                  ->join('activites','activites.id','=','positionnements.activite_id')
                  ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                  ->join('temps_types', function ($join) {
                    $join->on('type_activites.id','=','temps_types.type_activite_id')
                        ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                  ->where('livret_positionnements.id','=',$livret_id)
                  ->where('rapports.id','=',$rapport->id)
                  ->where('ifad_moniteurs.user_id','=',$user_id)
                  ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                  ->where('type_activites.id','=',$type_id[$i])
                  ->select('positionnements.*','activites.LibelleActivite')
                  ->orderBy('type_activites.id')
                  ->get();

                  $positionnement_activites[$i] = $activites[$i];
                  $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i]])->all();
                  $i++;
              }

              /** recuperation des activite_saisies associees au rapport selectionnne classées par fonction **/
              $fonctions = DB::table('rapports')
              ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
              ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
              ->where('rapports.id','=',$rapport->id)
              ->select('activite_saisies.*','fonctions.LibelleFonction')
              ->orderBy('fonctions.id')
              ->get();

              /*$a = 0;
              foreach($fonctions as $fonction)
              { 
                  $LibelleFonction[$a] =  $fonction->LibelleFonction;
                  $fonction_id[$a] =  $fonction->id;


                  $activite_saisies[$a] = DB::table('rapports')
                  ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
                  ->join('fonctions','fonctions.id','=','activite_saisies.fonction_id')
                  ->select('activite_saisies.*')
                  ->where('rapports.id','=',$rapport->id)
                  ->where('fonctions.id','=',$fonction_id[$a])
                  ->orderBy('fonctions.id')
                  ->get();

                  $value_activite_saisies[$a] = $activite_saisies[$a];
                  $fonction_activites[$a] = collect([$LibelleFonction[$a],$value_activite_saisies[$a]])->all();
                  $a++;
              }*/
      
                return view('rapports.show',compact('rapport','collections','fonctions'));
            }
          }
        }

        
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
  
     public function edit(Rapport $rapport)
     {
        try
        {
         return view('rapports.edit', compact('rapport'));
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
  
     public function update(Rapport $rapport)
     {
       try
       {
         if(DB::table('rapports')->where('rapports.id','=',$rapport->id)->select('rapports.etat')->first()->etat == 1)
         {
          return  redirect('rapports/'. $rapport->id)->with('messagealert', $rapport->LibelleRapport.' déjà validé.');
         }
         else
         {
            $etat_rapport = DB::table('rapports')
            ->where('rapports.id','=',$rapport->id)
            ->update(['rapports.etat' => 1]);
    
            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Rapport',
              'attribute' => $rapport->LibelleRapport,
              'action'=> 'validation',
            ]);
    
            return  redirect('rapports')->with('message', $rapport->LibelleRapport.' bien validé.');
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
  
     public function destroy(Rapport $rapport)
     {
         /* $rapport->delete();
  
          return redirect('rapports');  */  
     }

     /** ficher assocoie aux rapports selon les activites **/
     public function RapportFicher()
     {
       try
       {
        $activite_saisie_id = request('activite_saisie_id');

        $rapportfichers = DB::table('activite_saisies')
        ->join('fichers','activite_saisies.id','=','fichers.activite_saisie_id')
        ->where('activite_saisies.id','=',$activite_saisie_id)
        ->select('fichers.*','activite_saisies.TitreActiviteSaisie')
        ->get();

        return view('rapports.ficherassocier',compact('rapportfichers'));
      }
      catch(\Exception $exception)
      {
         return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }

     }
}

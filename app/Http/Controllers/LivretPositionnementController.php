<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LivretPositionnement;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

class LivretPositionnementController extends Controller
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

            $livret_positionnements = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
            ->select('livret_positionnements.*','users.nomutilisateur','users.prenomutilisateur','ifads.LibelleIfad')
            ->orderBy('livret_positionnements.id','DESC')
            ->get();

              return view('livret_positionnements.index', compact('livret_positionnements'));
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

              $livret_positionnements = DB::table('users')
              ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
              ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
              ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
              ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
              ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
              ->select('livret_positionnements.*','users.nomutilisateur','users.prenomutilisateur','ifads.LibelleIfad')
              ->orderBy('livret_positionnements.id','DESC')
              ->get();

              return view('livret_positionnements.index', compact('livret_positionnements'));

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

              $livret_positionnements = DB::table('users')
              ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
              ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
              ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
              ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
              ->where('ifad_moniteurs.user_id','=',$user_id)
              ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
              ->select('livret_positionnements.*','users.nomutilisateur','users.prenomutilisateur','ifads.LibelleIfad')
              ->orderBy('livret_positionnements.id','DESC')
              ->get();

              return view('livret_positionnements.index', compact('livret_positionnements'));

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

     }

       /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */

     public function store()
     {

     }

     // return redirect('rapports')->with('message', 'Rapport bien ajoutée.');
      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function show(LivretPositionnement $livret_positionnement)
     {
     try
     {
        $user_id = (Auth::user()->id);
        $type_utilisateur = (Auth::user()->type_utilisateur_id);


        $type_utilisateur = DB::table('type_utilisateurs')
        ->where('type_utilisateurs.id','=',$type_utilisateur)
        ->select('type_utilisateurs.*')
        ->first();
        /** Recuperation du livret de l'utilisateur **/
        $users = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
        ->where('livret_positionnements.id','=',$livret_positionnement->id)
        ->select('users.*','ifads.LibelleIfad')
        ->get();

        $rapport_id = DB::table('rapports')
        ->where('rapports.id','=',$livret_positionnement->rapport_id)
        ->select('rapports.etat')->first()->etat;

        if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi' || $type_utilisateur->libelletype == 'Superviseur')
        {
          $positionnements = DB::table('livret_positionnements')
            ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
            ->join('activites','activites.id','=','positionnements.activite_id')
            ->join('type_activites','type_activites.id','=','activites.type_activite_id')
            ->join('temps_types', function ($join) {
              $join->on('type_activites.id','=','temps_types.type_activite_id')
                  ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
            ->where('livret_positionnements.id','=',$livret_positionnement->id)
            ->select('type_activites.LibelleType','type_activites.id','temps_types.id as temps_type_id','temps_types.TempsPost')
            ->distinct('type_activites.LibelleType','type_activites.id')
            ->orderBy('type_activites.id')
            ->get();


            $i = 0;
            foreach($positionnements as $positionnement)
            {
                $LibelleType[$i] =  $positionnement->LibelleType;
                $TempsType[$i] =  $positionnement->TempsPost;
                $type_id[$i] =  $positionnement->id;
                $temps_type_id[$i] =  $positionnement->temps_type_id;


                $activites[$i] = DB::table('livret_positionnements')
                ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                ->join('activites','activites.id','=','positionnements.activite_id')
                ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                ->join('temps_types', function ($join) {
                  $join->on('type_activites.id','=','temps_types.type_activite_id')
                      ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                ->where('livret_positionnements.id','=',$livret_positionnement->id)
                ->where('type_activites.id','=',$type_id[$i])
                ->select('positionnements.*','activites.LibelleActivite')
                ->orderBy('type_activites.id')
                ->get();

                $positionnement_activites[$i] = $activites[$i];
                $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i],$temps_type_id[$i]])->all();
                $i++;
            }

           return view('livret_positionnements.show',compact('livret_positionnement','collections','rapport_id','users'));
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

            $positionnements = DB::table('ifad_moniteurs')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
            ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
            ->join('activites','activites.id','=','positionnements.activite_id')
            ->join('type_activites','type_activites.id','=','activites.type_activite_id')
            ->join('temps_types', function ($join) {
              $join->on('type_activites.id','=','temps_types.type_activite_id')
                   ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
            ->where('livret_positionnements.id','=',$livret_positionnement->id)
            ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
            ->select('type_activites.LibelleType','type_activites.id','temps_types.id as temps_type_id','temps_types.TempsPost')
            ->distinct('type_activites.LibelleType','type_activites.id')
            ->orderBy('type_activites.id')
            ->get();


            $i = 0;
            foreach($positionnements as $positionnement)
            {
                $LibelleType[$i] =  $positionnement->LibelleType;
                $TempsType[$i] =  $positionnement->TempsPost;
                $type_id[$i] =  $positionnement->id;
                $temps_type_id[$i] =  $positionnement->temps_type_id;


                $activites[$i] = DB::table('ifad_moniteurs')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                ->join('activites','activites.id','=','positionnements.activite_id')
                ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                ->join('temps_types', function ($join) {
                  $join->on('type_activites.id','=','temps_types.type_activite_id')
                       ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                ->where('livret_positionnements.id','=',$livret_positionnement->id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->where('type_activites.id','=',$type_id[$i])
                ->select('positionnements.*','activites.LibelleActivite')
                ->orderBy('type_activites.id')
                ->get();

                $positionnement_activites[$i] = $activites[$i];
                $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i],$temps_type_id[$i]])->all();
                $i++;
            }

              return view('livret_positionnements.show',compact('livret_positionnement','collections','rapport_id','users'));
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

            $positionnements = DB::table('ifad_moniteurs')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
            ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
            ->join('activites','activites.id','=','positionnements.activite_id')
            ->join('type_activites','type_activites.id','=','activites.type_activite_id')
            ->join('temps_types', function ($join) {
              $join->on('type_activites.id','=','temps_types.type_activite_id')
                   ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
            ->where('livret_positionnements.id','=',$livret_positionnement->id)
            ->where('ifad_moniteurs.user_id','=',$user_id)
            ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
            ->select('type_activites.LibelleType','type_activites.id','temps_types.id as temps_type_id','temps_types.TempsPost')
            ->distinct('type_activites.LibelleType','type_activites.id')
            ->orderBy('type_activites.id')
            ->get();


            $i = 0;
            foreach($positionnements as $positionnement)
            {
                $LibelleType[$i] =  $positionnement->LibelleType;
                $TempsType[$i] =  $positionnement->TempsPost;
                $type_id[$i] =  $positionnement->id;
                $temps_type_id[$i] =  $positionnement->temps_type_id;


                $activites[$i] = DB::table('ifad_moniteurs')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                ->join('activites','activites.id','=','positionnements.activite_id')
                ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                ->join('temps_types', function ($join) {
                  $join->on('type_activites.id','=','temps_types.type_activite_id')
                       ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                ->where('livret_positionnements.id','=',$livret_positionnement->id)
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->where('type_activites.id','=',$type_id[$i])
                ->select('positionnements.*','activites.LibelleActivite')
                ->orderBy('type_activites.id')
                ->get();

                $positionnement_activites[$i] = $activites[$i];
                $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i],$temps_type_id[$i]])->all();
                $i++;
            }

              return view('livret_positionnements.show',compact('livret_positionnement','collections','rapport_id','users'));
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

     public function edit(LivretPositionnement $livret_positionnement)
     {
        try
        {
            $user_id = (Auth::user()->id);
            $type_utilisateur = (Auth::user()->type_utilisateur_id);


            $type_utilisateur = DB::table('type_utilisateurs')
            ->where('type_utilisateurs.id','=',$type_utilisateur)
            ->select('type_utilisateurs.*')
            ->first();
            /** Recuperation du livret de l'utilisateur **/
            $users = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
            ->where('livret_positionnements.id','=',$livret_positionnement->id)
            ->select('users.*','ifads.LibelleIfad')
            ->get();

            $rapport_id = DB::table('rapports')
            ->where('rapports.id','=',$livret_positionnement->rapport_id)
            ->select('rapports.etat')->first()->etat;

            if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi' || $type_utilisateur->libelletype == 'Superviseur')
            {
              $positionnements = DB::table('livret_positionnements')
                ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                ->join('activites','activites.id','=','positionnements.activite_id')
                ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                ->join('temps_types', function ($join) {
                  $join->on('type_activites.id','=','temps_types.type_activite_id')
                      ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                ->where('livret_positionnements.id','=',$livret_positionnement->id)
                ->select('type_activites.LibelleType','type_activites.id','temps_types.id as temps_type_id','temps_types.TempsPost')
                ->distinct('type_activites.LibelleType','type_activites.id')
                ->orderBy('type_activites.id')
                ->get();


                $i = 0;
                foreach($positionnements as $positionnement)
                {
                    $LibelleType[$i] =  $positionnement->LibelleType;
                    $TempsType[$i] =  $positionnement->TempsPost;
                    $type_id[$i] =  $positionnement->id;
                    $temps_type_id[$i] =  $positionnement->temps_type_id;


                    $activites[$i] = DB::table('livret_positionnements')
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('temps_types', function ($join) {
                      $join->on('type_activites.id','=','temps_types.type_activite_id')
                          ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                    ->where('livret_positionnements.id','=',$livret_positionnement->id)
                    ->where('type_activites.id','=',$type_id[$i])
                    ->select('positionnements.*','activites.LibelleActivite')
                    ->orderBy('type_activites.id')
                    ->get();

                    $positionnement_activites[$i] = $activites[$i];
                    $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i],$temps_type_id[$i]])->all();
                    $i++;
                }

               return view('livret_positionnements.edit',compact('livret_positionnement','collections','rapport_id','users'));
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

                $positionnements = DB::table('ifad_moniteurs')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                ->join('activites','activites.id','=','positionnements.activite_id')
                ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                ->join('temps_types', function ($join) {
                  $join->on('type_activites.id','=','temps_types.type_activite_id')
                       ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                ->where('livret_positionnements.id','=',$livret_positionnement->id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->select('type_activites.LibelleType','type_activites.id','temps_types.id as temps_type_id','temps_types.TempsPost')
                ->distinct('type_activites.LibelleType','type_activites.id')
                ->orderBy('type_activites.id')
                ->get();


                $i = 0;
                foreach($positionnements as $positionnement)
                {
                    $LibelleType[$i] =  $positionnement->LibelleType;
                    $TempsType[$i] =  $positionnement->TempsPost;
                    $type_id[$i] =  $positionnement->id;
                    $temps_type_id[$i] =  $positionnement->temps_type_id;


                    $activites[$i] = DB::table('ifad_moniteurs')
                    ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                    ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('temps_types', function ($join) {
                      $join->on('type_activites.id','=','temps_types.type_activite_id')
                           ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                    ->where('livret_positionnements.id','=',$livret_positionnement->id)
                    ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                    ->where('type_activites.id','=',$type_id[$i])
                    ->select('positionnements.*','activites.LibelleActivite')
                    ->orderBy('type_activites.id')
                    ->get();

                    $positionnement_activites[$i] = $activites[$i];
                    $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i],$temps_type_id[$i]])->all();
                    $i++;
                }

                  return view('livret_positionnements.edit',compact('livret_positionnement','collections','rapport_id','users'));
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

                $positionnements = DB::table('ifad_moniteurs')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                ->join('activites','activites.id','=','positionnements.activite_id')
                ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                ->join('temps_types', function ($join) {
                  $join->on('type_activites.id','=','temps_types.type_activite_id')
                       ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                ->where('livret_positionnements.id','=',$livret_positionnement->id)
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->select('type_activites.LibelleType','type_activites.id','temps_types.id as temps_type_id','temps_types.TempsPost')
                ->distinct('type_activites.LibelleType','type_activites.id')
                ->orderBy('type_activites.id')
                ->get();


                $i = 0;
                foreach($positionnements as $positionnement)
                {
                    $LibelleType[$i] =  $positionnement->LibelleType;
                    $TempsType[$i] =  $positionnement->TempsPost;
                    $type_id[$i] =  $positionnement->id;
                    $temps_type_id[$i] =  $positionnement->temps_type_id;


                    $activites[$i] = DB::table('ifad_moniteurs')
                    ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                    ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                    ->join('positionnements','livret_positionnements.id','=','positionnements.livret_positionnement_id')
                    ->join('activites','activites.id','=','positionnements.activite_id')
                    ->join('type_activites','type_activites.id','=','activites.type_activite_id')
                    ->join('temps_types', function ($join) {
                      $join->on('type_activites.id','=','temps_types.type_activite_id')
                           ->on('livret_positionnements.id','=','temps_types.livret_positionnement_id');})
                    ->where('livret_positionnements.id','=',$livret_positionnement->id)
                    ->where('ifad_moniteurs.user_id','=',$user_id)
                    ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                    ->where('type_activites.id','=',$type_id[$i])
                    ->select('positionnements.*','activites.LibelleActivite')
                    ->orderBy('type_activites.id')
                    ->get();

                    $positionnement_activites[$i] = $activites[$i];
                    $collections[$i] = collect([$LibelleType[$i],$positionnement_activites[$i],$TempsType[$i],$temps_type_id[$i]])->all();
                    $i++;
                }

                  return view('livret_positionnements.edit',compact('livret_positionnement','collections','rapport_id','users'));
              }
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

     public function update(LivretPositionnement $livret_positionnement)
     {
         try
         {
            /** Recuperation des valeurs **/
            $positionnement_values = DB::table('positionnements')->where('livret_positionnement_id','=',$livret_positionnement->id)->select('*')->get();
            $i = 1;
            foreach($positionnement_values as $positionnement_value)
            {
                $value[$i]= request('positionnement_'.$positionnement_value->id);
                /** Actualisation des positionnements **/
                $positionnements = DB::table('positionnements')
                                        ->where('positionnements.id','=',$positionnement_value->id)
                                        ->update(['positionnements.ValeurPost' => $value[$i]]);
                    $i++;
            }

            /** Recuperation des valeurs **/
            $temps_types_values = DB::table('temps_types')->where('livret_positionnement_id','=',$livret_positionnement->id)->select('*')->get();
            $j = 1;
            foreach($temps_types_values as $temps_types_value)
            {
                $value[$j]= request('temps_type_'.$temps_types_value->id);
                /** Actualisation des positionnements **/
                $positionnements = DB::table('temps_types')
                                        ->where('temps_types.id','=',$temps_types_value->id)
                                        ->update(['temps_types.TempsPost' => $value[$j]]);
                    $j++;
            }

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
                /** historiques des actions sur le systeme **/
                $historique = Historique::create([
                'user'=> $huser,
                'table'=> 'Livret positionnement',
                'attribute' => $livret_positionnement->LibelleLivret,
                'action'=> 'Modification',]);

                /** Recuperation de l'utilisateur a qui appartient le livret **/
                    $usermodif = DB::table('users')
                    ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
                    ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
                    ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                    ->join('livret_positionnements','rapports.id','=','livret_positionnements.rapport_id')
                    ->where('livret_positionnements.id','=',$livret_positionnement->id)
                    ->select('users.*','ifads.LibelleIfad')
                    ->first();

                    if(Auth::user()->id == $usermodif->id)
                    {
                        return redirect('livret_positionnements/' .$livret_positionnement->id)->with('message', "Livret de positionnement bien mise à jour");
                    }
                    else
                    {
                        $notefemail = ['email' => Auth::user()->email,
                        'livret' => $livret_positionnement->LibelleLivret,
                        'huser' => $huser,
                        'usermodifnom' => $usermodif->nomutilisateur,
                        'usermodifprenom' => $usermodif->prenomutilisateur,
                        'usermodifemail' => $usermodif->email];

                        Mail::to($notefemail['usermodifemail'])->send(new NotificationMail($notefemail));

                        return redirect('livret_positionnements/' .$livret_positionnement->id)->with('message', "Livret de positionnement bien mise à jour");
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

     public function destroy(LivretPositionnement $livret_positionnement)
     {
         /* $livret_positionnement->delete();

          return redirect('livret_positionnements');  */
     }

}

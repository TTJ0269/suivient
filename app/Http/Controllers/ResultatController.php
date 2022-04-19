<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use App\Models\TypeActivite;
use App\Models\Activite;
use App\Models\Rapport;
use App\Models\Fonction;
use App\Models\Ifad;
use App\Models\User;

class ResultatController extends Controller
{  
    public function indexBilanFormation()
    {
      try
      {
        $user_id = (Auth::user()->id);

        $bilanusers = DB::table('type_utilisateurs')
        ->join('users','type_utilisateurs.id','=','users.type_utilisateur_id')
        ->where('type_utilisateurs.libelletype','=','Moniteur ENT')
        ->select('users.*')
        ->get();

        $bilantypeactivites = TypeActivite::all();
        $bilanifads = Ifad::all();
        $fonctions = Fonction::all();

        return view('Visualisation.bilanformation.index',compact('bilanusers','bilantypeactivites','bilanifads','fonctions'));
    }
    catch(\Exception $exception)
    {
       return redirect('erreur')->with('messageerreur',$exception->getMessage());
    }
  }
    public function BilanFormationGeneral()
    {
      try
      {
          $showformations = DB::table('ifads')
          ->join('ifad_moniteurs','ifads.id','=','ifad_moniteurs.ifad_id')
          ->join('users','users.id','=','ifad_moniteurs.user_id')
          ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
          ->join('activites','rapports.id','=','activites.rapport_id')
          ->join('type_activites','type_activites.id','=','activites.type_activite_id')
          ->select('activites.*')
          ->orderBy('activites.id','DESC')
          ->get();

          return view('Visualisation.bilanformation.show',compact('showformations'));
        }
        catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }

    public function showBilanFormation()
    {
      try
      {
        $type_activite_id = request('type_activite_id');
        $user_id = request('user_id');
        $ifad_id = request('ifad_id');

        $showformations = DB::table('ifads')
        ->join('ifad_moniteurs','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('users','users.id','=','ifad_moniteurs.user_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->where('type_activites.id','=',$type_activite_id)
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
        ->select('activites.*')
        ->orderBy('activites.id','DESC')
        ->get();

        return view('Visualisation.bilanformation.show',compact('showformations'));
      }
        catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }


    public function RapportValider()
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
            ->where('rapports.etat','=',1)
            ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
            ->orderBy('rapports.id','DESC')
            ->get();
    
            return view('Visualisation.rapportvalider', compact('rapports'));
        }
        elseif($type_utilisateur->libelletype == 'DG IFAD') 
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

            $rapports = DB::table('users')
            ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
            ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
            ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
            ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
            ->where('rapports.etat','=',1)
            ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
            ->orderBy('rapports.id','DESC')
            ->get();
            
            return view('Visualisation.rapportvalider', compact('rapports'));
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
            /** recuperation de ifad_id selon l'utilisateur **/
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
            ->where('rapports.etat','=',1)
            ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
            ->orderBy('rapports.id','DESC')
            ->get();
            
            return view('Visualisation.rapportvalider', compact('rapports'));
          }
        }
    }
    catch(\Exception $exception)
   {
       return redirect('erreur')->with('messageerreur',$exception->getMessage());
   }
    }

    public function RapportnonValider()
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
            ->where('rapports.etat','=',0)
            ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
            ->orderBy('rapports.id','DESC')
            ->get();
      
              return view('Visualisation.rapportnonvalider', compact('rapports'));
          }
          elseif($type_utilisateur->libelletype == 'DG IFAD')
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

              $rapports = DB::table('users')
              ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
              ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
              ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
              ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
              ->where('rapports.etat','=',0)
              ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
              ->orderBy('rapports.id','DESC')
              ->get();
              
              return view('Visualisation.rapportnonvalider', compact('rapports'));
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
              /** recuperation de ifad_id selon l'utilisateur **/
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
              ->where('rapports.etat','=',0)
              ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
              ->orderBy('rapports.id','DESC')
              ->get();
              
              return view('Visualisation.rapportnonvalider', compact('rapports'));
            }
          }
        }
        catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }


    public function EtatFonctionnementEnvironnement()
    {
      try
      {
        $user_id = request('user_id');
        $ifad_id = request('ifad_id');
        $fonction_id = request('fonction_id');


        $showformations = DB::table('ifads') 
        ->join('ifad_moniteurs','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('users','users.id','=','ifad_moniteurs.user_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->join('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
        ->where('type_activites.fonction_id','=',$fonction_id)
        ->select('activites.*')
        ->orderBy('activites.id','DESC')
        ->get();

        return view('Visualisation.bilanformation.show',compact('showformations'));
      }
        catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ficher;
use App\Models\User;
use App\Models\TypeUtilisateur;
use App\Models\Commentaire;
use App\Models\Activite;
use App\Models\Ifad;
use App\Models\Fonction;
use App\Models\TypeActivite;
use App\Models\Rapport;

class RechercheController extends Controller
{
    public function Rechercheficher()
    {
      try
      {
        $search = request('search');

        $ifficher = Ficher::where('libelleficher','like',"%$search%")->first();

        if($ifficher != null)
        {
          $fichers = Ficher::where('libelleficher','like',"%$search%")
          ->orderBy('id','DESC')->get();
          
          return view('fichers.recherche')->with('fichers', $fichers);
        }
        else
        {
          return redirect('fichers')->with('messagealert', ' Zéro résultat pour cette recherche.');
        }
      }
      catch(\Exception $exception)
     {
         return redirect('erreur')->with('messageerreur',$exception->getMessage());
     }

    }


    public function Rechercheuser()
    {
        $type_utilisateurs = TypeUtilisateur::all();
        $search = request('search');

        $users = User::where('nomutilisateur','like',"%$search%")
        ->orWhere('prenomutilisateur','like',"%$search%")
        ->orWhere('telutilisateur','like',"%$search%")
        ->orWhere('email','like',"%$search%")
        ->get();

        $ifusers = User::where('nomutilisateur','like',"%$search%")
        ->orWhere('prenomutilisateur','like',"%$search%")
        ->orWhere('telutilisateur','like',"%$search%")
        ->orWhere('email','like',"%$search%")
        ->first();

        if($ifusers != null)
        {
          return view('users.index', compact('users', 'type_utilisateurs'));
        }
        else
        {
          return redirect('users')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
        }
    }


    public function Rechercheactivite()
    {
      $search = request('search');
      $user_id = (Auth::user()->id);
      $type_utilisateur = (Auth::user()->type_utilisateur_id);

      $activites = DB::table('type_utilisateurs')
      ->where('type_utilisateurs.id','=',$type_utilisateur)
      ->select('type_utilisateurs.*')
      ->first();

      $ifactivites = DB::table('users')
      ->join('rapports','users.id','=','rapports.user_id')
      ->join('activites','rapports.id','=','activites.rapport_id')
      ->select('activites.*','rapports.LibelleRapport')
      ->where('activites.LibelleActivite','like',"%$search%")
      ->orderBy('rapports.id','DESC')
      ->first();

      $ifaussiactivites = DB::table('users')
        ->join('rapports','users.id','=','rapports.user_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->where('users.id','=',$user_id)
        ->select('activites.*','rapports.LibelleRapport')
        ->where('activites.LibelleActivite','like',"%$search%")
        ->orderBy('rapports.id','DESC')
        ->first();

        if($ifactivites != null || $ifaussiactivites != null)
        {
          if($activites->libelletype == 'Administrateur' || $activites->libelletype == 'Responsable du suivi')
          {
            $activites = DB::table('users')
            ->join('rapports','users.id','=','rapports.user_id')
            ->join('activites','rapports.id','=','activites.rapport_id')
            ->select('activites.*','rapports.LibelleRapport')
            ->where('activites.LibelleActivite','like',"%$search%")
            ->orderBy('rapports.id','DESC')
            ->get();
    
            return view('activites.index', compact('activites'));
          }
          else
          {
            $activites = DB::table('users')
            ->join('rapports','users.id','=','rapports.user_id')
            ->join('activites','rapports.id','=','activites.rapport_id')
            ->where('users.id','=',$user_id)
            ->select('activites.*','rapports.LibelleRapport')
            ->where('activites.LibelleActivite','like',"%$search%")
            ->orderBy('rapports.id','DESC')
            ->get();
    
            return view('activites.index', compact('activites'));
          }
        }
        else
        {
          return redirect('activites')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
        }

    }

    public function Rechercherapport()
    {
        $search = request('search');

        $user_id = (Auth::user()->id);
        $type_utilisateur = (Auth::user()->type_utilisateur_id);

        $type_utilisateur = DB::table('type_utilisateurs')
        ->where('type_utilisateurs.id','=',$type_utilisateur)
        ->select('type_utilisateurs.*')
        ->first();

        $ifrapports = Rapport::where('LibelleRapport','like',"%$search%")->first();

        $ifaussirapports = DB::table('users')
          ->join('rapports','users.id','=','rapports.user_id')
          ->where('users.id','=',$user_id)
          ->where('rapports.LibelleRapport','like',"%$search%")
          ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
          ->first();

          if($ifaussirapports != null || $ifrapports != null)
          {
            if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi')
            {
                $rapports = Rapport::where('LibelleRapport','like',"%$search%")
                ->orderBy('id','DESC')->get();
        
                return view('rapports.index', compact('rapports'));
            }
            else
            {
              $rapports = DB::table('users')
              ->join('rapports','users.id','=','rapports.user_id')
              ->where('users.id','=',$user_id)
              ->where('rapports.LibelleRapport','like',"%$search%")
              ->select('rapports.*','users.nomutilisateur','users.prenomutilisateur')
              ->orderBy('rapports.id','DESC')
              ->get();
              
              return view('rapports.index', compact('rapports'));
            }
          }
          else
          {
            return redirect('rapports')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
          }

    }

    public function Recherchetypeactivite()
    {
         $search = request('search');

         $iftype_activites = TypeActivite::where('LibelleType','like',"%$search%")->first();
         
         if($iftype_activites != null)
         {
          $type_activites = TypeActivite::where('LibelleType','like',"%$search%")->get();

          return view('TypeActivites.index', compact('type_activites'));
         }
         else
         {
          return redirect('type_activites')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
         }
  
    }

    public function Rechercheifad()
    {
      $search = request('search');

      $users = User::all();
      $ififads = Ifad::where('LibelleIfad','like',"%$search%")->first();
      if($ififads != null)
      {
        $ifads = Ifad::where('LibelleIfad','like',"%$search%")->get();

        return view('ifads.index', compact('ifads','users'));
      }
      else
      {
        return redirect('ifads')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
      }
    }

    public function Recherchefonction()
    {
      $search = request('search');

       $iffonctions = Fonction::where('LibelleFonction','like',"%$search%")->first();

       if($iffonctions != null)
       {
        $fonctions = Fonction::where('LibelleFonction','like',"%$search%")->get();

        return view('fonctions.index', compact('fonctions'));
       }
       else
       {
        return redirect('fonctions')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
       }   
    }


    public function Recherchetypeutilisateur()
    {
      $search = request('search');

      $iftype_utilisateurs = TypeUtilisateur::where('libelletype','like',"%$search%")->first();

      if($iftype_utilisateurs != null)
      {
        $type_utilisateurs = TypeUtilisateur::where('libelletype','like',"%$search%")->get();

        return view('TypeUtilisateur.index', compact('type_utilisateurs'));
      }
      else
      {
        return redirect('type_utilisateurs')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
      }
      
    }

    public function Recherchecommentaire()
    {
      $search = request('search');

      $ifcommentaires = DB::table('users')
        ->join('commentaires','users.id','=','commentaires.user_id')
        ->join('activites','activites.id','=','commentaires.activite_id')
        ->where('DescriptionCommentaire','like',"%$search%")
        ->select('commentaires.*','activites.LibelleActivite')
        ->orderBy('commentaires.id','DESC')
        ->first();

        if($ifcommentaires != null)
        {
          $commentaires = DB::table('users')
          ->join('commentaires','users.id','=','commentaires.user_id')
          ->join('activites','activites.id','=','commentaires.activite_id')
          ->where('DescriptionCommentaire','like',"%$search%")
          ->select('commentaires.*','activites.LibelleActivite')
          ->orderBy('commentaires.id','DESC')
          ->get();
  
          return view('commentaires.index', compact('commentaires'));
        }
        else
        {
          return redirect('commentaires')->with('messagealert', ' Zéro résultat pour cette recherche.'); 
        }
      
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
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

        $font = DB::table('fonctions')
        ->select('fonctions.LibelleFonction')
        ->get();

        $fonctions = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->rightjoin('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->select('fonctions.LibelleFonction', DB::raw('(SUM(activites.DateFin - activites.DateDebut)/10000) as temps'))
        ->groupBy('fonctions.LibelleFonction')
        ->get();


        $fonction_first = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->rightjoin('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->select('fonctions.LibelleFonction', DB::raw('(SUM(activites.DateFin - activites.DateDebut)/10000) as temps'))
        ->groupBy('fonctions.LibelleFonction')
        ->get()->count();

        if($fonction_first == 0)
        {
          return redirect('dashboard')->with('messagealert', "Pas d'activité realisée par ce moniteur ENT");
        }
        elseif($fonction_first == 1)
        {
          foreach($fonctions as $fonction)
          {
            $tabfonction[1] = $fonction->LibelleFonction;
            $tabtemps[1] = $fonction->temps;
          }
      
          $chart = (new LarapexChart)->horizontalBarChart()
          ->setTitle('Résultat')
          ->setSubtitle('Temps consacré par fonction.')
          ->setColors(['#03A9F4'])
          ->addData('Temps',[$tabtemps[1]])
          ->setXAxis([$tabfonction[1]]);
          return view ('charts.sample', compact('chart'));
        }
        elseif($fonction_first == 2)
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabtemps[$i] = $fonction->temps;
              $i++;
          }
      
          $chart = (new LarapexChart)->horizontalBarChart()
          ->setTitle('Résultat')
          ->setSubtitle('Temps consacré par fonction.')
          ->setColors(['#03A9F4'])
          ->addData('Temps',[$tabtemps[1], $tabtemps[2]])
          ->setXAxis([$tabfonction[1], $tabfonction[2]]);
          return view ('charts.sample', compact('chart'));
        }
        elseif($fonction_first == 3)
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabtemps[$i] = $fonction->temps;
              $i++;
          }
      
          $chart = (new LarapexChart)->horizontalBarChart()
          ->setTitle('Résultat')
          ->setSubtitle('Temps consacré par fonction.')
          ->setColors(['#03A9F4'])
          ->addData('Temps',[$tabtemps[1], $tabtemps[2], $tabtemps[3]])
          ->setXAxis([$tabfonction[1], $tabfonction[2], $tabfonction[3]]);
          return view ('charts.sample', compact('chart'));
        }
        elseif($fonction_first == 4)
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabtemps[$i] = $fonction->temps;
              $i++;
          }
      
          $chart = (new LarapexChart)->horizontalBarChart()
          ->setTitle('Résultat')
          ->setSubtitle('Temps consacré par fonction.')
          ->setColors(['#03A9F4'])
          ->addData('Temps',[$tabtemps[1], $tabtemps[2], $tabtemps[3], $tabtemps[4]])
          ->setXAxis([$tabfonction[1], $tabfonction[2], $tabfonction[3], $tabfonction[4]]);
          return view ('charts.sample', compact('chart'));
        }
        else
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabtemps[$i] = $fonction->temps;
  
            if($tabtemps[$i] == null)
            {
              $tabtemps[$i] = '0';
            }
              $i++;
          }
      
          $chart = (new LarapexChart)->horizontalBarChart()
          ->setTitle('Résultat')
          ->setSubtitle('Temps consacré par fonction.')
          ->setColors(['#03A9F4'])
          ->addData('Temps',[$tabtemps[1], $tabtemps[2], $tabtemps[3], $tabtemps[4], $tabtemps[5]])
          ->setXAxis([$tabfonction[1], $tabfonction[2], $tabfonction[3], $tabfonction[4], $tabfonction[5]]);
          return view ('charts.sample', compact('chart'));
        }
      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }

    public function NombreActiviteParFonctionGet()
    {
        try
        {
          $users = DB::table('type_utilisateurs')
            ->join('users','type_utilisateurs.id','=','users.type_utilisateur_id')
            ->where('type_utilisateurs.libelletype','=','Moniteur ENT')
            ->select('users.*')
            ->get();
          
          return view('Resultats.NombreActiviteParFonctionget',compact('users'));
      }
      catch(\Exception $exception)
      {
        return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
    }
    public function NombreActiviteParFonction()
    {
      try
      {
        $user_id = request('user_id');

        $fonctions = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->rightjoin('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->select('fonctions.LibelleFonction',DB::raw('count(activites.id) as nombre'))
        ->groupBy('fonctions.LibelleFonction')
        ->get();

        $fonction_count = DB::table('users')
        ->join('ifad_moniteurs','users.id','=','ifad_moniteurs.user_id')
        ->join('ifads','ifads.id','=','ifad_moniteurs.ifad_id')
        ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
        ->join('activites','rapports.id','=','activites.rapport_id')
        ->join('type_activites','type_activites.id','=','activites.type_activite_id')
        ->rightjoin('fonctions','fonctions.id','=','type_activites.fonction_id')
        ->where('ifad_moniteurs.user_id','=',$user_id)
        ->select('fonctions.LibelleFonction',DB::raw('count(activites.id) as nombre'))
        ->groupBy('fonctions.LibelleFonction')
        ->get()->count();

        if($fonction_count == 0)
        {
          return redirect('dashboard')->with('messagealert', "Pas d'activité realisée par ce moniteur ENT");
        }
        elseif($fonction_count == 1)
        {
          foreach($fonctions as $fonction)
          {
            $tabfonction[1] = $fonction->LibelleFonction;
            $tabnombre[1] = $fonction->nombre;
          }
      
          $chart = (new LarapexChart)->donutChart()
          ->setTitle('Fontion.')
          ->setSubtitle('Nobmbre activité par fonction.')
          ->addData([$tabnombre[1]])
          ->setLabels([$tabfonction[1]]);
        
          return view ('charts.bar', compact('chart'));
        }
        elseif($fonction_count == 2)
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabnombre[$i] = $fonction->nombre;
              $i++;
          }
      
          $chart = (new LarapexChart)->donutChart()
          ->setTitle('Fontion.')
          ->setSubtitle('Nobmbre activité par fonction.')
          ->addData([$tabnombre[1], $tabnombre[2]])
          ->setLabels([$tabfonction[1], $tabfonction[2]]);
        
          return view ('charts.bar', compact('chart'));
        }
        elseif($fonction_count == 3)
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabnombre[$i] = $fonction->nombre;
              $i++;
          }
      
          $chart = (new LarapexChart)->donutChart()
          ->setTitle('Fontion.')
          ->setSubtitle('Nobmbre activité par fonction.')
          ->addData([$tabnombre[1], $tabnombre[2], $tabnombre[3]])
          ->setLabels([$tabfonction[1], $tabfonction[2], $tabfonction[3]]);
        
          return view ('charts.bar', compact('chart'));
        }
        elseif($fonction_count == 4)
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabnombre[$i] = $fonction->nombre;
              $i++;
          }
      
          $chart = (new LarapexChart)->donutChart()
          ->setTitle('Fontion.')
          ->setSubtitle('Nobmbre activité par fonction.')
          ->addData([$tabnombre[1], $tabnombre[2], $tabnombre[3], $tabnombre[4]])
          ->setLabels([$tabfonction[1], $tabfonction[2], $tabfonction[3], $tabfonction[4]]);
        
          return view ('charts.bar', compact('chart'));
        }
        else
        {
          $i = 1;
          foreach($fonctions as $fonction)
          {
            $tabfonction[$i] = $fonction->LibelleFonction;
            $tabnombre[$i] = $fonction->nombre;
            $i++;
          }

            $chart = (new LarapexChart)->donutChart()
            ->setTitle('Fontion.')
            ->setSubtitle('Nobmbre activité par fonction.')
            ->addData([$tabnombre[1], $tabnombre[2], $tabnombre[3], $tabnombre[4], $tabnombre[5]])
            ->setLabels([$tabfonction[1], $tabfonction[2], $tabfonction[3], $tabfonction[4], $tabfonction[5]]);
          
            return view ('charts.bar', compact('chart'));
        }

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

        if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi')
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
        else
        { if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
          {
              return redirect('dashboard')->with('messagealert', "Nous n'est pas encore associé(e) à un IFAD");
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

          if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi')
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
          else
          {
            if (DB::table('ifad_moniteurs')->where('user_id', $user_id)->doesntExist())
              {
                  return redirect('dashboard')->with('messagealert', "Nous n'est pas encore associé(e) à un IFAD");
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

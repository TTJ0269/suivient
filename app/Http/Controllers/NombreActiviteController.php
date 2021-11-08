<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NombreActiviteController extends Controller
{
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
                $i = 1;
                foreach($fonctions as $fonction)
                {
                    $tabfonction[$i] = $fonction->LibelleFonction;
                    $tabnombre[$i] = $fonction->nombre;
                    $i++;
                }
                $LibelleFonction1 = $tabfonction[1];
                $LibelleFonction2 = '';
                $LibelleFonction3 = '';
                $LibelleFonction4 = '';
                $LibelleFonction5 = '';
                $NombreFonction1  = $tabnombre[1];
                $NombreFonction2  = 0;
                $NombreFonction3  = 0;
                $NombreFonction4  = 0;
                $NombreFonction5  = 0;

                $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
                $tabvaleurnombre   = [$NombreFonction1,$NombreFonction2,$NombreFonction3,$NombreFonction4,$NombreFonction5];
                
                return view ('charts.donut',compact('tabvaleurfonction','tabvaleurnombre'));
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
                $LibelleFonction1 = $tabfonction[1];
                $LibelleFonction2 = $tabfonction[2];
                $LibelleFonction3 = '';
                $LibelleFonction4 = '';
                $LibelleFonction5 = '';
                $NombreFonction1  = $tabnombre[1];
                $NombreFonction2  = $tabnombre[2];
                $NombreFonction3  = 0;
                $NombreFonction4  = 0;
                $NombreFonction5  = 0;

                $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
                $tabvaleurnombre   = [$NombreFonction1,$NombreFonction2,$NombreFonction3,$NombreFonction4,$NombreFonction5];
                
                return view ('charts.donut',compact('tabvaleurfonction','tabvaleurnombre'));
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
                $LibelleFonction1 = $tabfonction[1];
                $LibelleFonction2 = $tabfonction[2];
                $LibelleFonction3 = $tabfonction[3];
                $LibelleFonction4 = '';
                $LibelleFonction5 = '';
                $NombreFonction1  = $tabnombre[1];
                $NombreFonction2  = $tabnombre[2];
                $NombreFonction3  = $tabnombre[3];
                $NombreFonction4  = 0;
                $NombreFonction5  = 0;

                $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
                $tabvaleurnombre   = [$NombreFonction1,$NombreFonction2,$NombreFonction3,$NombreFonction4,$NombreFonction5];
                
                return view ('charts.donut',compact('tabvaleurfonction','tabvaleurnombre'));
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
                $LibelleFonction1 = $tabfonction[1];
                $LibelleFonction2 = $tabfonction[2];
                $LibelleFonction3 = $tabfonction[3];
                $LibelleFonction4 = $tabfonction[4];
                $LibelleFonction5 = '';
                $NombreFonction1  = $tabnombre[1];
                $NombreFonction2  = $tabnombre[2];
                $NombreFonction3  = $tabnombre[3];
                $NombreFonction4  = $tabnombre[4];
                $NombreFonction5  = 0;

                $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
                $tabvaleurnombre   = [$NombreFonction1,$NombreFonction2,$NombreFonction3,$NombreFonction4,$NombreFonction5];
                
                return view ('charts.donut',compact('tabvaleurfonction','tabvaleurnombre'));
            }
            else
            {
            $i = 1;
            $i = 1;
            foreach($fonctions as $fonction)
            {
                $tabfonction[$i] = $fonction->LibelleFonction;
                $tabnombre[$i] = $fonction->nombre;
                $i++;
            }
            $LibelleFonction1 = $tabfonction[1];
            $LibelleFonction2 = $tabfonction[2];
            $LibelleFonction3 = $tabfonction[3];
            $LibelleFonction4 = $tabfonction[4];
            $LibelleFonction5 = $tabfonction[5];
            $NombreFonction1  = $tabnombre[1];
            $NombreFonction2  = $tabnombre[2];
            $NombreFonction3  = $tabnombre[3];
            $NombreFonction4  = $tabnombre[4];
            $NombreFonction5  = $tabnombre[5];

            $tabvaleurfonction = [$LibelleFonction1,$LibelleFonction2,$LibelleFonction3,$LibelleFonction4,$LibelleFonction5];
            $tabvaleurnombre   = [$NombreFonction1,$NombreFonction2,$NombreFonction3,$NombreFonction4,$NombreFonction5];
            
            return view ('charts.donut',compact('tabvaleurfonction','tabvaleurnombre'));
            }

        }
        
        catch(\Exception $exception)
        {
            return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }

    }
}

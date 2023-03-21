<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ficher;
use App\Models\ActiviteSaisie;
use App\Models\Historique;

class FicherController extends Controller
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
     //
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

          if($type_utilisateur->libelletype == 'Administrateur' || $type_utilisateur->libelletype == 'Responsable du suivi')
          {
              $fichers = DB::table('activite_saisies')
              ->join('fichers','activite_saisies.id','=','fichers.activite_saisie_id')
              ->select('fichers.*','activite_saisies.TitreActiviteSaisie')
              ->orderBy('fichers.id','DESC')
              ->get();

              return view('fichers.index', compact('fichers'));
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
              $ifad_id = DB::table('ifads')
              ->join('ifad_moniteurs','ifads.id','=','ifad_moniteurs.ifad_id')
              ->join('users','users.id','=','ifad_moniteurs.user_id')
              ->where('users.id','=',$user_id)
              ->select('ifad_moniteurs.ifad_id')
              ->get()->last()->ifad_id;

                $fichers = DB::table('ifad_moniteurs')
                ->join('rapports','ifad_moniteurs.id','=','rapports.ifad_moniteur_id')
                ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
                ->join('fichers','activite_saisies.id','=','fichers.activite_saisie_id')
                ->where('ifad_moniteurs.user_id','=',$user_id)
                ->where('ifad_moniteurs.ifad_id','=',$ifad_id)
                ->select('fichers.*','activite_saisies.TitreActiviteSaisie')
                ->orderBy('fichers.id','DESC')
                ->get();

                return view('fichers.index', compact('fichers'));
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

     public function create($activite_saisy)
     {
        try
        {
          $rapport_id = DB::table('activite_saisies')->where('activite_saisies.id','=',$activite_saisy)
          ->select('activite_saisies.rapport_id')->first()->rapport_id;

          if(DB::table('rapports')->where('rapports.id','=',$rapport_id)->select('rapports.etat')->first()->etat == 1)
          {
            return  redirect('activite_saisies')->with('messagealert'," Le rapport associé à l'activité a été déjà validé vous ne pouvez plus joindre un fichier.");
          }
          else
          {
            $activite_saisies = ActiviteSaisie::select('*')->where('id','=',$activite_saisy)->get();
            $ficher = new Ficher();

            return view('fichers.create',compact('ficher','activite_saisies'));
          }
        }
        catch(\Exception $exception)
        {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
     }

       /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */

     public function store(Request  $request)
     {
       try
       {
        if($request->file('urlficher') == null)
        {
          return back()->with('messagealert', 'Choisissez un fichier.');
        }
        elseif (request('libelleficher') == null) {
          return back()->with('messagealert', 'Veuillez donner un nom au fichier.');
        }
        else
        {
          $fichers = new Ficher;

          $fichers->libelleficher=request('libelleficher');
          $fichers->activite_saisie_id=request('activite_saisie_id');
          if($request->file('urlficher'))
          {
              $file=$request->file('urlficher');
              $filename=time().'.'.$file->getClientOriginalExtension();
              $request->urlficher->move('storage/fichier/', $filename);

              $fichers->urlficher=$filename;
          }
          $fichers->save();

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
            $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Fichier',
            'attribute' => request('libelleficher'),
            'action'=> 'ajout',
          ]);

            return redirect('activite_saisies')->with('message', 'Fichier bien ajouté.');
        }

      }
      catch(\Exception $exception)
      {
          return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
     }

      /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */

     public function show(Ficher $ficher)
     {
        try
        {
          return view('fichers.show',compact('ficher'));
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

     public function edit(Ficher $ficher)
     {
        try
        {
         return view('fichers.edit', compact('ficher'));
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

     public function update(Ficher $ficher)
     {
      try
      {
        $ficher->update([
              'libelleficher'=> request('libelleficher'),
              'urlficher'=> request('urlficher'),
              'activite_id'=> request('activite_saisie_id'),
          ]);

          $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
          /** historiques des actions sur le systeme **/
          $historique = Historique::create([
            'user'=> $huser,
            'table'=> 'Fichier',
            'attribute' => request('libelleficher'),
            'action'=> 'modification',
          ]);

          return redirect('fichers/' . $ficher->id);
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

     public function destroy(Ficher $ficher)
     {
       try
       {
          $etat_rapport = DB::table('rapports')
          ->join('activite_saisies','rapports.id','=','activite_saisies.rapport_id')
          ->join('fichers','activite_saisies.id','=','fichers.activite_saisie_id')
          ->where('fichers.id','=',$ficher->id)
          ->select('rapports.etat')
          ->first();

          if($etat_rapport->etat == 1)
          {
            return redirect('fichers/' . $ficher->id)->with('messagealert', 'Le rapport associé à l’activité a été validé, vous ne pouvez plus faire la suppression.');
          }
          else
          {
            $ficher->delete();

            $huser = (Auth::user()->nomutilisateur). ' ' .(Auth::user()->prenomutilisateur);
            /** historiques des actions sur le systeme **/
            $historique = Historique::create([
              'user'=> $huser,
              'table'=> 'Fichier',
              'attribute' => $ficher->libelleficher,
              'action'=> 'suppression',
            ]);

            return redirect('fichers')->with('messagealert', 'Suppression effectuée avec succès.');
          }
      }
      catch(\Exception $exception)
      {
         return redirect('erreur')->with('messageerreur',$exception->getMessage());
      }
     }

     public function Telecharger($ficher)
     {
        try
        {
           return response()->download('storage/fichier/'.$ficher);
        }
        catch(\Exception $exception)
        {
           return redirect('erreur')->with('messageerreur',$exception->getMessage());
        }
     }
}
